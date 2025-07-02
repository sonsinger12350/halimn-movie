$(document).ready(function() {
	$('body').on('click', '#halim-advanced-widget-2 .showtime .item', function(e) {
		let btn = $(this);
		let tab = btn.attr('data-tab');

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
					
					btn.addClass('active');
				}
			});
		}
	});
});