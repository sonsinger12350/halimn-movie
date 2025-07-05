<?php
/**
 * Plugin Name: Custom Halim
 * Description: Điều chỉnh core Halim
 * Version: 1.0
 * Author: Lucas
 */

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