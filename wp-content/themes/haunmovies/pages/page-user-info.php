<?php
/**
* Template Name: Trang cá nhân
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

	.avatar {
		width: 100px;
		height: 100px;
		object-fit: cover;
		border-radius: 50%;
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
						<div class="d-flex flex-column align-items-center gap-4">
							<?= get_avatar( $current_user->ID ) ?>
							<label for="custom_avatar" class="btn btn-success" style="font-size: 8px;">THAY ĐỔI AVATAR</label>
							<input type="file" name="custom_avatar" id="custom_avatar" accept="image/*" class="d-none">
							<h4 class="display-name"><b><?= $current_user->display_name ?></b></h4>
						</div>
						<div class="row mb-3 d-flex justify-content-center">
							<div class="col-sm-6 fullright">
								<form method="post" id="update-info">
									<div class="form-group">
										<label for="display_name">Tên:</label>
										<input maxlength="50" type="text" name="display_name" class="form-control" value="<?= $current_user->display_name ?>" required>
									</div>
									<div class="form-group hh3d-form">
										<label for="user_dob">Ngày đăng ký:</label>
										<input type="text" class="form-control" value="<?= $current_user->user_registered ?>" readonly>
									</div>
									<div class="form-group hh3d-form">
										<label for="user_email">Email:</label>
										<input type="text" class="form-control" value="<?= $current_user->user_email ?>" readonly>
									</div>
									<button type="submit" class="btn btn-success mb-15">Cập nhật</button>
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
	$('#custom_avatar').on('change', function () {
		let formData = new FormData();
		let file = this.files[0];

		if (!file) return;

		formData.append('custom_avatar', file);
		formData.append('action', 'halim_upload_avatar');
		formData.append('nonce', '<?= wp_create_nonce('upload_avatar_nonce') ?>'); // nonce này cần thêm từ PHP

		$.ajax({
			url: halim.ajax_url,
			type: 'POST',
			data: formData,
			processData: false,
			contentType: false,
			success: function (res) {
				if (res.success) {
					createToast({
						type: "success",
						text: "Đã cập nhật avatar!"
					});
					// Cập nhật lại ảnh
					$('.avatar').attr('src', res.data.avatar + '?t=' + Date.now());
				} else {
					createToast({
						type: "error",
						text: res.data.message || "Lỗi cập nhật avatar"
					});
				}
			}
		});
	});

	let isUpdatingInfo = false;

	$('#update-info').on('submit', function (e) {
		e.preventDefault();

		if (isUpdatingInfo) return; // Đang xử lý, không gửi tiếp

		const form = $(this);
		const displayName = form.find('input[name="display_name"]').val();

		if (displayName == $('.display-name b').html()) {
			createToast({
				type: "error",
				text: "Nhập tên mới"
			});
			return false;
		}

		isUpdatingInfo = true;

		$.post(halim.ajax_url, {
			action: 'halim_update_user_info',
			nonce: '<?= wp_create_nonce('update_user_info_nonce') ?>',
			display_name: displayName
		}, function (res) {
			isUpdatingInfo = false;

			if (res.success) {
				createToast({
					type: "success",
					text: res.data.message
				});
				$('.display-name b').text(displayName);
			} else {
				createToast({
					type: "error",
					text: res.data.message || "Cập nhật thất bại"
				});
			}
		}).fail(function () {
			isUpdatingInfo = false;
			createToast({
				type: "error",
				text: "Lỗi hệ thống. Vui lòng thử lại."
			});
		});
	});


</script>