<?php
/**
 * Plugin Name: Custom Halim
 * Description: Điều chỉnh core Halim
 * Version: 1.0
 * Author: Lucas
 */

register_activation_hook(__FILE__, 'custom_halim_create_table');

function custom_halim_create_table() {
	global $wpdb;

	$table_name = $wpdb->prefix . 'halim_report_movie_error';

	$charset_collate = $wpdb->get_charset_collate();

	// Câu lệnh tạo bảng
	$sql = "CREATE TABLE IF NOT EXISTS $table_name (
		`id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
		`movie_id` BIGINT(20) UNSIGNED DEFAULT NULL,
		`episode` VARCHAR(100) DEFAULT '',
		`server` VARCHAR(100) DEFAULT '',
		`name` VARCHAR(255) DEFAULT '',
		`message` TEXT DEFAULT '',
		`status` VARCHAR(50) DEFAULT 'pending',
		`created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
		PRIMARY KEY (`id`)
	) $charset_collate;";

	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
	dbDelta($sql);
}

add_action('admin_menu', 'custom_halim_register_menu');

function custom_halim_register_menu() {
	add_menu_page(
		'Báo lỗi phim',              // Page title
		'Báo lỗi phim',              // Menu title
		'manage_options',                // Capability
		'halim-report-movie-error',           // Menu slug
		'custom_halim_render_report_movie_error',   // Callback function
		'dashicons-warning',          // Icon
		25                               // Position
	);
}

function custom_halim_render_report_movie_error() {
	global $wpdb;

	$table_name = $wpdb->prefix . 'halim_report_movie_error';
	$table_posts = $wpdb->prefix . 'posts';

	$results = $wpdb->get_results("SELECT $table_name.*, post_title 
		FROM $table_name 
		LEFT JOIN {$table_posts} ON $table_name.movie_id = {$table_posts}.ID
		ORDER BY $table_name.created_at DESC 
		LIMIT 100
	");

	$content = '
		<div class="wrap">
			<h1>Báo lỗi phim</h1>';

	if (empty($results)) {
		echo '<p>Không có dữ liệu.</p></div>';
		return;
	}

	$content .= '
		<style>
			.badge {
				display: inline-block;
				padding: 8px 16px;
				font-size: 14px;
				font-weight: 700;
				line-height: 1;
				color: #fff;
				text-align: center;
				white-space: nowrap;
				vertical-align: baseline;
				border-radius: .25rem;
				color: #000;
			}

			.badge-warning {
				background-color: #ffc107;
			}

			.badge-success {
				background-color: #198754;
				color: #fff;
			}

			.btn-handle-report-movie-error {
				background-color: #dc3545;
				color: #fff;
				border: none;
				padding: 8px 16px;
				font-size: 14px;
				font-weight: 700;
				line-height: 1;
				border-radius: .25rem;
				cursor: pointer;
			}
		</style>
		<table class="widefat fixed striped">
			<thead>
				<tr>
					<th>Thời gian</th>
					<th>Phim</th>
					<th>Tập</th>
					<th>Server</th>
					<th>Người báo</th>
					<th>Tin nhắn</th>
					<th>Trạng thái</th>
					<th>Hành động</th>
				</tr>
			</thead>
		<tbody>
	';

	foreach ($results as $row) {
		$status_class = $row->status == 'pending' ? 'warning' : 'success';
		$status_text = $row->status == 'pending' ? 'Chưa xử lý' : 'Đã xử lý';
		$image = get_the_post_thumbnail_url($row->movie_id, 'thumbnail');

		$content .= '
			<tr>
				<td>' . esc_html($row->created_at) . '</td>
				<td><img src="' . esc_url($image) . '" alt="' . esc_attr($row->post_title) . '" style="width: 50px; height: 50px;object-fit: cover;" /></br><b>' . esc_html($row->post_title) . '</b></td>
				<td>' . esc_html($row->episode) . '</td>
				<td>' . esc_html($row->server) . '</td>
				<td>' . esc_html($row->name) . '</td>
				<td>' . esc_html($row->message) . '</td>
				<td><span class="badge badge-' . $status_class . '">' . esc_html($status_text) . '</span></td>
				<td>
					'. ($row->status == 'pending' ? '<button type="button" class="btn-handle-report-movie-error" data-id="' . $row->id . '">Xử lý</button>' : '') .'
				</td>
			</tr>
		';
	}

	$content .= '
				</tbody>
			</table>
		</div>
		<script>
			document.addEventListener("DOMContentLoaded", function () {
				const buttons = document.querySelectorAll(".btn-handle-report-movie-error");

				buttons.forEach(button => {
					button.addEventListener("click", function () {
						const reportId = this.getAttribute("data-id");
						if (!reportId) return;

						if (!confirm("Bạn có chắc muốn đánh dấu là đã xử lý?")) return;

						const btn = this;
						btn.disabled = true;
						btn.innerHTML = "Đang xử lý...";

						fetch(ajaxurl, {
							method: "POST",
							headers: {
								"Content-Type": "application/x-www-form-urlencoded",
							},
							body: "action=handle_report_movie_error&id=" + reportId
						})
						.then(res => res.json())
						.then(data => {
							if (data.success) {
								// ✅ Cập nhật giao diện
								const row = btn.closest("tr");
								const statusCell = row.querySelector("td span.badge");

								if (statusCell) {
									statusCell.classList.remove("badge-danger");
									statusCell.classList.add("badge-success");
									statusCell.innerText = "Đã xử lý";
								}

								// Ẩn nút "Xử lý"
								btn.style.display = "none";
							} else {
								alert("Lỗi: " + data.data);
							}
						})
						.catch(err => {
							alert("Lỗi khi gửi yêu cầu: " + err);
						});
					});
				});
			});
		</script>
	';

	echo $content;
}

add_action('wp_ajax_handle_report_movie_error', 'custom_halim_handle_report_movie_error');

function custom_halim_handle_report_movie_error() {
    if (!current_user_can('manage_options')) {
        wp_send_json_error('Không có quyền');
    }

    if (empty($_POST['id']) || !is_numeric($_POST['id'])) {
        wp_send_json_error('ID không hợp lệ');
    }

    global $wpdb;
    $table_name = $wpdb->prefix . 'halim_report_movie_error';
    $id = intval($_POST['id']);

    $updated = $wpdb->update(
        $table_name,
        ['status' => 'success'],
        ['id' => $id],
        ['%s'],
        ['%d']
    );

    if ($updated === false) {
        wp_send_json_error('Cập nhật thất bại');
    }

    wp_send_json_success();
}

// Hàm lấy URL avatar tùy chỉnh nếu có
function halim_get_custom_avatar_url($id_or_email, $size = 96) {
	$user = false;

	if (is_numeric($id_or_email)) $user = get_user_by('id', $id_or_email); 
	elseif (is_object($id_or_email) && !empty($id_or_email->user_id)) $user = get_user_by('id', $id_or_email->user_id); 
	elseif (is_string($id_or_email)) $user = get_user_by('email', $id_or_email);

	if ($user) {
		$custom_avatar_id = get_user_meta($user->ID, 'custom_avatar_id', true);

		if ($custom_avatar_id) {
			$image = wp_get_attachment_image_src($custom_avatar_id, [$size, $size]);

			if (!empty($image[0])) return esc_url($image[0]);
		}
	}

	return false;
}

// Ghi đè HTML avatar
add_filter('get_avatar', function($avatar, $id_or_email, $size, $default, $alt) {
	$custom_url = halim_get_custom_avatar_url($id_or_email, $size);

	if ($custom_url) {
		$alt_attr = esc_attr($alt);
		return "<img alt='{$alt_attr}' src='{$custom_url}' class='avatar avatar-{$size} photo' height='{$size}' width='{$size}' loading='lazy'/>";
	}

	return $avatar;
}, 10, 5);

add_action('wp_ajax_halim_report_movie_error', 'halim_report_movie_error');
add_action('wp_ajax_nopriv_halim_report_movie_error', 'halim_report_movie_error');

function halim_report_movie_error() {
	global $wpdb;

	if (!wp_verify_nonce($_POST['nonce'], 'report_movie_error_nonce')) wp_send_json_error(['message' => 'Xác thực không hợp lệ']);

	$user_id = is_user_logged_in() ? get_current_user_id() : 0;

	$wpdb->insert($wpdb->prefix . 'halim_report_movie_error', [
		'user_id' => $user_id,
		'movie_id' => sanitize_text_field($_POST['post_id']),
		'episode' => sanitize_text_field($_POST['episode']),
		'server' => sanitize_text_field($_POST['server']),
		'name' => sanitize_text_field($_POST['name']),
		'message' => sanitize_text_field($_POST['message'])
	]);

	wp_send_json_success(['message' => 'Báo lỗi thành công']);
}

add_action('add_meta_boxes', function () {
    add_meta_box(
        'custom_related_movie',
        'Liên kết phim',
        'render_custom_related_movie',
        'post', // ← post thường
        'normal',
        'default'
    );
});

function render_custom_related_movie($post) {
    $values = get_post_meta($post->ID, '_custom_related_movie', true);
    wp_nonce_field('save_custom_related_movie', 'custom_related_movie_nonce');

    $posts = get_posts([
        'post_type' => 'post',
        'posts_per_page' => -1,
        'orderby' => 'title',
        'order' => 'ASC'
    ]);

    $used_ids = [];

    ?>
    <style>
        #custom-repeatable-fields .repeatable-item {
            margin-bottom: 10px;
            border: 1px solid #ccc;
            padding: 10px;
            background: #f9f9f9;
            display: flex;
            align-items: center;
            gap: 24px;
        }
        #custom-repeatable-fields .remove-item {
            color: #b32d2e;
            text-decoration: none;
        }
        #custom-repeatable-fields input,
        #custom-repeatable-fields select {
            width: 100%;
        }
    </style>

    <div id="custom-repeatable-fields">
        <?php if (!empty($values) && is_array($values)) : ?>
            <?php foreach ($values as $index => $item): ?>
                <?php $used_ids[] = $item['post_id'] ?? 0; ?>
                <div class="repeatable-item">
                    <a href="javascript:void(0)" class="remove-item"><span class="dashicons dashicons-remove"></span></a>
                    <input type="text" name="custom_related_movie[<?= $index ?>][title]" value="<?= esc_attr($item['title'] ?? '') ?>" placeholder="Tiêu đề" />
                    <select name="custom_related_movie[<?= $index ?>][post_id]">
                        <option value="">Chọn phim</option>
                        <?php foreach ($posts as $p): ?>
                            <?php
                            $selected_id = $item['post_id'] ?? '';
                            $disabled = (in_array($p->ID, $used_ids) && $p->ID != $selected_id) ? 'disabled' : '';
                            ?>
                            <option value="<?= $p->ID ?>" <?= selected($selected_id, $p->ID, false) ?> <?= $disabled ?>>
                                <?= esc_html($p->post_title) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

    <button class="button" id="add-new-item">Thêm phần mới</button>

    <script>
    jQuery(function($){
        let index = $('#custom-repeatable-fields .repeatable-item').length || 0;

        const allPosts = <?php echo json_encode(array_map(function($p){
            return ['id' => $p->ID, 'title' => $p->post_title];
        }, $posts)); ?>;

        function getUsedPostIds() {
            const ids = [];
            $('#custom-repeatable-fields select').each(function() {
                const val = $(this).val();
                if (val) ids.push(parseInt(val));
            });
            return ids;
        }

        $('#add-new-item').on('click', function(e){
            e.preventDefault();

            const used = getUsedPostIds();
            let options = '<option value="">Chọn phim</option>';
            allPosts.forEach(function(post){
                if (!used.includes(post.id)) {
                    options += `<option value="${post.id}">${post.title}</option>`;
                }
            });

            const html = `
                <div class="repeatable-item">
                    <a href="javascript:void(0)" class="remove-item"><span class="dashicons dashicons-remove"></span></a>
                    <input type="text" name="custom_related_movie[${index}][title]" value="" placeholder="Tiêu đề" />
                    <select name="custom_related_movie[${index}][post_id]">
                        ${options}
                    </select>
                </div>`;
            $('#custom-repeatable-fields').append(html);
            index++;
        });

        $(document).on('click', '.remove-item', function(e){
            e.preventDefault();
            $(this).closest('.repeatable-item').remove();
        });
    });
    </script>
    <?php
}

add_action('save_post_post', function($post_id) {
    if (!isset($_POST['custom_related_movie_nonce']) || !wp_verify_nonce($_POST['custom_related_movie_nonce'], 'save_custom_related_movie'))
        return;

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return;

    if (!current_user_can('edit_post', $post_id))
        return;

    if (isset($_POST['custom_related_movie']) && is_array($_POST['custom_related_movie'])) {
        $data = array_values(array_filter($_POST['custom_related_movie'], function($item){
            return !empty($item['title']) || !empty($item['post_id']);
        }));
        update_post_meta($post_id, '_custom_related_movie', $data);
    } else {
        delete_post_meta($post_id, '_custom_related_movie');
    }
});

add_filter('wpdiscuz_comment_text_after', function($html, $comment){
    if (get_current_user_id() == $comment->user_id) {
        $html .= '<a href="#" class="hide-my-comment" data-commentid="' . $comment->comment_ID . '">Ẩn bình luận</a>';
    }
    return $html;
}, 10, 2);

add_action('init', 'restrict_wp_admin_access');
function restrict_wp_admin_access() {
    // Kiểm tra nếu người dùng đã đăng nhập nhưng không phải admin
    if (is_admin() && is_user_logged_in() && !current_user_can('administrator') && !defined('DOING_AJAX')) {
        wp_redirect(home_url()); // Chuyển hướng về trang chủ
        exit;
    }
}

add_filter('nav_menu_link_attributes', 'remove_menu_link_title_attribute', 10, 3);
function remove_menu_link_title_attribute($atts, $item, $args) {
    // Nếu có title thì xóa nó đi
    if (isset($atts['title'])) {
        unset($atts['title']);
    }
    return $atts;
}
