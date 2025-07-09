function showModalLogin() {
	$('#custom-login-modal').addClass('active');
}

function showCustomConfirm(options) {
	const {
		title = 'Xác nhận',
		message = 'Bạn có chắc chắn?',
		confirmText = 'Xác nhận',
		cancelText = 'Hủy',
		onConfirm = () => {},
		onCancel = () => {}
	} = options;

	// Set nội dung
	$('.custom-confirm-title').text(title);
	$('.custom-confirm-text').text(message);
	$('.custom-confirm-confirm').text(confirmText);
	$('.custom-confirm-cancel').text(cancelText);

	// Hiển thị modal
	$('.custom-confirm-overlay').fadeIn(200);

	// Clear sự kiện cũ
	$('.custom-confirm-confirm').off('click');
	$('.custom-confirm-cancel').off('click');

	// Gán sự kiện mới
	$('.custom-confirm-confirm').on('click', function () {
		$('.custom-confirm-overlay').fadeOut(200);
		onConfirm();
	});
	$('.custom-confirm-cancel').on('click', function () {
		$('.custom-confirm-overlay').fadeOut(200);
		onCancel();
	});

	// Click ra ngoài để đóng
	$('.custom-confirm-overlay').off('click').on('click', function (e) {
		if ($(e.target).is('.custom-confirm-overlay')) {
			$(this).fadeOut(200);
			onCancel();
		}
	});
}

$(document).ready(function() {
	$('body').on('click', '#halim-advanced-widget-2 .showtime .item', function(e) {
		let btn = $(this);
		let tab = btn.attr('data-tab');

		if (btn.attr('disabled')) return false;

		btn.attr('disabled', true);
		$('#halim-advanced-widget-2-ajax-box').append('<div class="halim-ajax-popular-post-loading"></div>');

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

	$('body').on('click', '[href="#collapseShowtime"]', function(e) {
		$(this).toggleClass('active');
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
		let totalVote = $('.total-vote').html() || 0;
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
		let btn = $(this);
		let post = btn.closest('.last').attr('data-id');

		btn.attr('disabled', true);
		btn.find('.follow-btn').html('<i class="fa fa-spinner fa-spin"></i>');

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

		return false;
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

	$('#custom-login-form').on('submit', function(e) {
		e.preventDefault();

		let btn = $(this).find('button[type="submit"]');
		let btnText = btn.html();
		let nonce = $(this).find('input[name="nonce"]').val();
		let username = $(this).find('input[name="username"]').val();
		let password = $(this).find('input[name="password"]').val();
		let remember = $(this).find('input[name="remember"]').is(':checked') ? 1 : 0;

		if (nonce.length <= 0 || username.length <= 0 || password.length <= 0) {
			createToast({
				type: "error",
				text: "Vui lòng nhập đầy đủ thông tin"
			});
			return false;
		}

		btn.attr('disabled', true);
		btn.html('<i class="fa fa-spinner fa-spin"></i>');

		$.ajax({
			url: halim.ajax_url,
			type: "POST",
			data: {
				action: "halim_user_login",
				nonce: nonce,
				username: username,
				password: password,
				remember: remember
			},
			success: function(rs) {
				btn.html(btnText);

				if (rs.success) {
					createToast({
						type: "success",
						text: "Đăng nhập thành công"
					});
					setTimeout(function() {
						location.reload();
					}, 1000);
				}
				else {
					btn.attr('disabled', false);
					createToast({
						type: "error",
						text: "Đăng nhập thất bại"
					});
				}
			}
		});
	});

	// EmojiPicker
	$('body').on('click', '.open-emoji-picker', function() {
		let parent = $(this).parent();

		parent.find('.block-emoji-picker').toggleClass('show');
	});

	$('body').on('emoji-click', 'emoji-picker', function(event) {
		let comment = $(this).closest('.wpd-textarea-wrap').find('[name="wc_comment"]');

		comment.val(comment.val() + event.detail.unicode);
	});

	$(document).click(function(e) {
		if (!$(e.target).closest('.block-emoji-picker').length && !$(e.target).closest('.open-emoji-picker').length) {
			$('.block-emoji-picker').removeClass('show');
		}
	});

	// End of EmojiPicker

	// Delete comment
	$('body').on('click', '.wpd_delete_btn', function() {
		let commentId = $(this).attr('data-commentid');
		let nonce = $(this).attr('data-nonce');
		let comment = $(this).closest('.comment');

		$.ajax({
			url: halim.ajax_url,
			type: "POST",
			data: {
				action: "halim_delete_comment",
				nonce: nonce,
				comment_id: commentId
			},
			success: function(rs) {
				if (rs.success) {
					$(this).closest('.wpd-comment-right').remove();
					createToast({
						type: "success",
						text: "Đã xóa bình luận"
					});
					comment.fadeOut(300);
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
	// End of Hide comment
});