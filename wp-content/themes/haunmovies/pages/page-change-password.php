<?php
/**
* Template Name: Đổi mật khẩu
*/
get_header();

if (is_user_logged_in()) {
	$current_user = wp_get_current_user();
}
?>
<style>
	.card {
		position: relative;
		display: flex;
		flex-direction: column;
		min-width: 0;
		word-wrap: break-word;
		background-color: #1e1e1e;
		color: #fff;
		background-clip: border-box;
		border: 0 solid transparent;
		border-radius: .25rem;
		margin-bottom: 1.5rem;
		box-shadow: 0 2px 6px 0 rgba(0,0,0,.65),0 2px 6px 0 rgba(0,0,0,.54)
	}

	.form-update-info {
		width: 50%;
	}

	@media (max-width: 576px) {
		.form-update-info {
			width: 80%;
		}
	}
</style>
<main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">
	<?php if ( is_active_sidebar( 'halim-ad-above-category' ) ) { ?>
		<div class="a--d-wrapper" style="text-align: center; margin: 10px 0;">
			<?php dynamic_sidebar( 'halim-ad-above-category' ); ?>
		</div>
	<?php } ?>
	<section>
		<div class="main-body mt-4">
			<?php if (is_user_logged_in()): ?>
				<div class="card p-4">
					<div class="card-body">
						<div class="row mb-3 d-flex justify-content-center">
							<div class="form-update-info">
								<form method="post" id="update-info">
									<div class="form-group">
										<label for="new_password">Mật khẩu mới:</label>
										<input type="password" name="new_password" class="form-control" required>
									</div>
									<div class="form-group">
										<label for="confirm_password">Nhập lại mật khẩu:</label>
										<input type="password" name="confirm_password" class="form-control" required>
									</div>
									<button type="submit" class="btn btn-success mb-15">Đổi mật khẩu</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			<?php endif ?>
		</div>
	</section>
	<?php if ( is_active_sidebar( 'halim-ad-below-category' ) ) { ?>
		<div class="a--d-wrapper" style="text-align: center; margin: 10px 0;">
			<?php dynamic_sidebar( 'halim-ad-below-category' ); ?>
		</div>
	<?php } ?>
</main>
<?php get_sidebar(); get_footer(); ?>
<script>
	let isProcessing = false;

	$('#update-info').on('submit', function (e) {
		e.preventDefault();

		if (isProcessing) return; // Đang xử lý, không gửi tiếp

		let form = $(this);
		let newPassword = form.find('input[name="new_password"]').val();
		let confirmPassword = form.find('input[name="confirm_password"]').val();
		let btn = form.find('button[type="submit"]');
		let btnText = btn.html();

		if (newPassword !== confirmPassword) {
			createToast({
				type: "error",
				text: "Mật khẩu không khớp"
			});
			return false;
		}

		isProcessing = true;
		btn.attr('disabled', true);
		btn.html('<i class="fas fa-spinner fa-pulse"></i>');

		$.post(halim.ajax_url, {
			action: 'halim_change_password',
			nonce: '<?= wp_create_nonce('change_password_nonce') ?>',
			new_password: newPassword,
			confirm_password: confirmPassword
		}, function (res) {
			btn.attr('disabled', false);
			btn.html(btnText);
			isProcessing = false;

			if (res.success) {
				createToast({
					type: "success",
					text: res.data.message
				});
			} else {
				createToast({
					type: "error",
					text: res.data.message || "Cập nhật thất bại"
				});
			}
		}).fail(function () {
			isProcessing = false;
			createToast({
				type: "error",
				text: "Lỗi hệ thống. Vui lòng thử lại."
			});
		});
	});


</script>