$(document).ready(function() {
	$('body').on('click', '#halim-advanced-widget-2 .showtime .item', function(e) {
		let btn = $(this);
		let tab = btn.attr('data-tab');

		if (btn.attr('disabled')) return false;

		btn.attr('disabled', true);

		if (tab) {
			$.ajax({
				url: halim.ajax_url,
				type: "GET",
				data: {
					action: "halim_get_showtime",
					showtime: tab
				},
				success: function(rs) {
					$('#halim-advanced-widget-2 .halim-pagination').remove();
					$('#halim-advanced-widget-2 .section-heading').remove();
					$('#halim-advanced-widget-2-ajax-box').html(rs);
					$('#halim-advanced-widget-2 .showtime .item').removeClass('active');
					$('#halim-advanced-widget-2 .mobile .showtime-tabs .tabs a').removeClass('active');
					
					btn.attr('disabled', false);
					btn.addClass('active');
				}
			});
		}
	});

	$('body').on('click', '.halim-rating-button', function(e) {
		$('.movie-rating-modal-overlay').addClass('active');
	});

	$('body').on('click', '.close-modal-rating', function(e) {
		$('.movie-rating-modal-overlay').removeClass('active');
	});

	$('body').on("click", ".movie-rating-rating-option", function() {
		$('.movie-rating-rating-option').removeClass('selected');       
		$(this).addClass('selected');       
	});

	$('body').on("click", "#submitRatingBtn", function() {
		let selectedOption = $('.movie-rating-rating-option.selected');
		let totalVote = $('.total-vote').html();
		let btn = $(this);
		let id = btn.val();

		if (selectedOption.length === 0) {
			createToast({
				type: "warning",
				text: "Vui lòng chọn một đánh giá trước khi gửi."
			});
			return false;
		}

		btn.attr('disabled', true);

		return $.post(halim_rate.ajaxurl, {
			action: "halim_rate_post",
			nonce: halim_rate.nonce,
			post: id,
			value: selectedOption.attr('data-value'),
		},
		function(data) {
			btn.attr('disabled', false);

			if(data !== 'Voted'){
				$(".total-rating").html(data);
				$(".total-vote").html(parseInt(totalVote) + 1);
				createToast({
					type: "success",
					text: halim_rate.your_rating
				});
				$('.movie-rating-modal-overlay').removeClass('active');
			} else {
				createToast({
					type: "info",
					text: 'Bạn đã đánh giá phim này rồi!'
				});
			}
		}, "html"), !1
	});

	$('body').on("input", "#keyword-ep", function() {
		let keyword = $(this).val().trim();
		
		if (keyword.length <= 0) {
			$('#halim-list-server .halim-list-eps .halim-episode').show();
			return false;
		}

		$('#halim-list-server .halim-list-eps .halim-episode').each(function() {
			let ep = $(this).find('span').html();

			if (ep.indexOf(keyword) !== -1) {
				$(this).show();
			}
			else {
				$(this).hide();
			}
		});
	});

	$('body').on("click", "#follow-btn", function() {
		if (halim.is_logged_in != '1') {
			createToast({
				type: "error",
				text: "Vui lòng đăng nhập để theo dõi phim!"
			});
			return;
		}

		let btn = $(this);
		let post = btn.closest('.last').attr('data-id');

		btn.attr('disabled', true);

		if (!post) {
			createToast({
				type: "error",
				text: "Có lỗi, vui lòng thử lại"
			});
			return;
		}

		$.ajax({
			url: halim_rate.ajaxurl,
			type: "POST",
			data: {
				action: "halim_follow_movie",
				nonce: halim_rate.follow_movie_nonce,
				post_id: post
			},
			success: function(rs) {
				btn.attr('disabled', false);
				if (rs.success) {
					if (rs.data.action == 'follow') {
						$('#follow-btn').addClass('followed');
						$('.follow-btn').text('Hủy Theo Dõi');
						createToast({
							type: "success",
							text: "Bạn đã theo dõi phim này!"
						});
					}
					else {
						$('#follow-btn').removeClass('followed');
						$('.follow-btn').text('Theo Dõi');
						createToast({
							type: "success",
							text: "Bạn đã bỏ theo dõi phim này!"
						});
					}
				}
				else {
					createToast({
						type: "error",
						text: "Có lỗi, vui lòng thử lại"
					});
				}
			}
		});
	});

	$('body').on("input", "#keyword-ep", function() {
		let keyword = $(this).val().trim();
		
		if (keyword.length <= 0) {
			$('#halim-list-server .halim-list-eps .halim-episode').show();
			return false;
		}

		$('#halim-list-server .halim-list-eps .halim-episode').each(function() {
			let ep = $(this).find('span').html();

			if (ep.indexOf(keyword) !== -1) {
				$(this).show();
			}
			else {
				$(this).hide();
			}
		});
	});

	$('body').on("click", ".open-profile-info", function() {
		$('.profile-info').toggleClass('show');
	});

	$(document).on('click', function(e) {
		if (
			!$(e.target).closest('.profile-info').length &&
			!$(e.target).closest('.open-profile-info').length
		) {
			$('.profile-info').removeClass('show');
		}
	});
});