<?php
/*
 * @ https://EasyToYou.eu - IonCube v11 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

add_action("wp_ajax_halim_update_download_viewcount", "halim_ajax_update_download_viewcount");
add_action("wp_ajax_save_episode_server_hidden_option", "halim_ajax_episode_server_hidden");
add_action("wp_ajax_halim_ajax_update_post_meta", "halim_ajax_update_post_meta_callback");
add_action("wp_ajax_halim_ajax_importer", "halim_ajax_importer_callback");
add_action("wp_ajax_halim_ajax_addnewserver", "halim_add_new_server_callback");
function halim_ajax_update_download_viewcount()
{
    $_obfuscated_0D1A0725351501221F2426130A073C340D19100D053022_ = isset($_POST["post_id"]) ? absint($_POST["post_id"]) : NULL;
    $_obfuscated_0D0A0E39170D370A2826293D2402260918342F161E3B32_ = isset($_POST["index"]) ? absint($_POST["index"]) : NULL;
    if ($_obfuscated_0D1A0725351501221F2426130A073C340D19100D053022_) {
        $_obfuscated_0D0F1E270C133D371B061F2E5C1E2F2E390D1639163822_ = get_post_meta($_obfuscated_0D1A0725351501221F2426130A073C340D19100D053022_, "halim_download_fields", true);
        $_obfuscated_0D0F1E270C133D371B061F2E5C1E2F2E390D1639163822_[$_obfuscated_0D0A0E39170D370A2826293D2402260918342F161E3B32_]["view"] = $_obfuscated_0D0F1E270C133D371B061F2E5C1E2F2E390D1639163822_[$_obfuscated_0D0A0E39170D370A2826293D2402260918342F161E3B32_]["view"] + 1;
        update_post_meta($_obfuscated_0D1A0725351501221F2426130A073C340D19100D053022_, "halim_download_fields", $_obfuscated_0D0F1E270C133D371B061F2E5C1E2F2E390D1639163822_);
        wp_send_json(["view" => $_obfuscated_0D0F1E270C133D371B061F2E5C1E2F2E390D1639163822_[$_obfuscated_0D0A0E39170D370A2826293D2402260918342F161E3B32_]["view"]]);
    }
    exit("post id not found!");
}
function halim_ajax_episode_server_hidden()
{
    $value = isset($_POST["value"]) ? $_POST["value"] : "";
    $_obfuscated_0D1A0725351501221F2426130A073C340D19100D053022_ = isset($_POST["post_id"]) ? absint($_POST["post_id"]) : "";
    update_post_meta($_obfuscated_0D1A0725351501221F2426130A073C340D19100D053022_, "episode_server_hidden", $value);
    wp_die();
}
function get_list_episode_by_server_id($server, $postid)
{
    $_obfuscated_0D400F241F230C21100F1506251A360D325C191B0A1522_ = get_post_meta($_obfuscated_0D1C402405290E40271F3B072C1F21022A2430143F1C32_, "_halimmovies", true);
    $data = json_decode(stripslashes($_obfuscated_0D400F241F230C21100F1506251A360D325C191B0A1522_))[$_obfuscated_0D2C3C34273F350315385C332E075C191316352A044032_];
    return $data;
}
function halim_ajax_update_post_meta_callback()
{
    $_obfuscated_0D1A0725351501221F2426130A073C340D19100D053022_ = isset($_POST["post_id"]) ? absint($_POST["post_id"]) : "";
    $_obfuscated_0D2C3C34273F350315385C332E075C191316352A044032_ = isset($_POST["server"]) ? absint($_POST["server"]) : "";
    $_obfuscated_0D211B120F1C332325081D1602093B13312809360D1322_ = isset($_POST["post_meta"]) ? $_POST["post_meta"] : "";
    $_obfuscated_0D182E0B21332A25160C18143E3435405B27263B212B22_ = get_post_meta($_obfuscated_0D1A0725351501221F2426130A073C340D19100D053022_, "_halim_metabox_options", true);
    $array["halim_poster_url"] = sanitize_text_field($_obfuscated_0D182E0B21332A25160C18143E3435405B27263B212B22_["halim_poster_url"]);
    $array["halim_thumb_url"] = sanitize_text_field($_obfuscated_0D182E0B21332A25160C18143E3435405B27263B212B22_["halim_thumb_url"]);
    foreach ($_obfuscated_0D211B120F1C332325081D1602093B13312809360D1322_ as $key => $val) {
        $array[$val["name"]] = sanitize_text_field($val["value"]);
        if ($val["name"] == "halim_add_to_widget") {
            $_obfuscated_0D0F103139355C1B24022B1F13052239031B275C323D11_[] = sanitize_text_field($val["value"]);
        }
    }
    $array["halim_add_to_widget"] = $_obfuscated_0D0F103139355C1B24022B1F13052239031B275C323D11_;
    HALIMHelper::set_post_modified($_obfuscated_0D1A0725351501221F2426130A073C340D19100D053022_);
    update_post_meta($_obfuscated_0D1A0725351501221F2426130A073C340D19100D053022_, "_halim_metabox_options", $array);
    sleep(1);
    $_obfuscated_0D211B120F1C332325081D1602093B13312809360D1322_ = get_post_meta($_obfuscated_0D1A0725351501221F2426130A073C340D19100D053022_, "_halim_metabox_options", true);
    wp_set_object_terms($_obfuscated_0D1A0725351501221F2426130A073C340D19100D053022_, $_obfuscated_0D211B120F1C332325081D1602093B13312809360D1322_["halim_movie_status"], "status", false);
    wp_set_object_terms($_obfuscated_0D1A0725351501221F2426130A073C340D19100D053022_, $_obfuscated_0D211B120F1C332325081D1602093B13312809360D1322_["halim_add_to_widget"], "post_options", false);
    $_obfuscated_0D141A2C0A230131060D1137313C081F03402B065B0D01_ = halim_get_post_format_type($_obfuscated_0D211B120F1C332325081D1602093B13312809360D1322_["halim_movie_formality"]);
    set_post_format($_obfuscated_0D1A0725351501221F2426130A073C340D19100D053022_, $_obfuscated_0D141A2C0A230131060D1137313C081F03402B065B0D01_);
    wp_die(json_encode($array, JSON_UNESCAPED_UNICODE));
}
function halim_ajax_importer_callback()
{
    $_obfuscated_0D1A0725351501221F2426130A073C340D19100D053022_ = isset($_POST["post_id"]) ? absint($_POST["post_id"]) : "";
    $_obfuscated_0D2C3C34273F350315385C332E075C191316352A044032_ = isset($_POST["server"]) ? absint($_POST["server"]) : "";
    $_obfuscated_0D1F35233910382534050D112B282122330C2603291B11_ = isset($_POST["list_link"]) ? $_POST["list_link"] : "";
    $_obfuscated_0D17320F38033B1D1C3F0D0704193130271D013C260C22_ = isset($_POST["import_type"]) ? sanitize_text_field($_POST["import_type"]) : "";
    $_obfuscated_0D1A0E34243B362D0311183E0C3316362F2A09012E5C22_ = isset($_POST["episode_slug"]) ? sanitize_text_field($_POST["episode_slug"]) : "";
    $_obfuscated_0D2F07241E04230737171F250425051F0C340C39403D32_ = cs_get_option("halim_episode_url");
    $_obfuscated_0D2D15121C300423011427362E2A372515061B16221701_ = json_decode(stripslashes(get_post_meta($_obfuscated_0D1A0725351501221F2426130A073C340D19100D053022_, "_halimmovies", true)), true);
    foreach ($_obfuscated_0D1F35233910382534050D112B282122330C2603291B11_ as $key => $_obfuscated_0D111F31182F12072F31373223050A130716133F011A01_) {
        if ($_obfuscated_0D111F31182F12072F31373223050A130716133F011A01_ != "") {
            if ($_obfuscated_0D17320F38033B1D1C3F0D0704193130271D013C260C22_ == "listserver") {
                $_obfuscated_0D2A031B0C1C03261222325C07400907135B5C05093611_ = explode("|", $_obfuscated_0D111F31182F12072F31373223050A130716133F011A01_);
                if ($_obfuscated_0D2D15121C300423011427362E2A372515061B16221701_[$_obfuscated_0D2C3C34273F350315385C332E075C191316352A044032_]["halimmovies_server_data"][$_obfuscated_0D1A0E34243B362D0311183E0C3316362F2A09012E5C22_]["halimmovies_ep_listsv"] == NULL) {
                    $_obfuscated_0D0D0F2E19323F2D1C3F3203222F5C2C36091F37255C22_[$key]["halimmovies_ep_listsv_name"] = sanitize_text_field($_obfuscated_0D2A031B0C1C03261222325C07400907135B5C05093611_[0]);
                    $_obfuscated_0D0D0F2E19323F2D1C3F3203222F5C2C36091F37255C22_[$key]["halimmovies_ep_listsv_link"] = sanitize_text_field($_obfuscated_0D2A031B0C1C03261222325C07400907135B5C05093611_[1]);
                    $_obfuscated_0D0D0F2E19323F2D1C3F3203222F5C2C36091F37255C22_[$key]["halimmovies_ep_listsv_type"] = sanitize_text_field($_obfuscated_0D2A031B0C1C03261222325C07400907135B5C05093611_[2]);
                    $_obfuscated_0D2D15121C300423011427362E2A372515061B16221701_[$_obfuscated_0D2C3C34273F350315385C332E075C191316352A044032_]["halimmovies_server_data"][$_obfuscated_0D1A0E34243B362D0311183E0C3316362F2A09012E5C22_]["halimmovies_ep_listsv"] = $_obfuscated_0D0D0F2E19323F2D1C3F3203222F5C2C36091F37255C22_;
                } else {
                    $_obfuscated_0D0D0F2E19323F2D1C3F3203222F5C2C36091F37255C22_["halimmovies_ep_listsv_name"] = sanitize_text_field($_obfuscated_0D2A031B0C1C03261222325C07400907135B5C05093611_[0]);
                    $_obfuscated_0D0D0F2E19323F2D1C3F3203222F5C2C36091F37255C22_["halimmovies_ep_listsv_link"] = sanitize_text_field($_obfuscated_0D2A031B0C1C03261222325C07400907135B5C05093611_[1]);
                    $_obfuscated_0D0D0F2E19323F2D1C3F3203222F5C2C36091F37255C22_["halimmovies_ep_listsv_type"] = sanitize_text_field($_obfuscated_0D2A031B0C1C03261222325C07400907135B5C05093611_[2]);
                    array_push($_obfuscated_0D2D15121C300423011427362E2A372515061B16221701_[$_obfuscated_0D2C3C34273F350315385C332E075C191316352A044032_]["halimmovies_server_data"][$_obfuscated_0D1A0E34243B362D0311183E0C3316362F2A09012E5C22_]["halimmovies_ep_listsv"], $_obfuscated_0D0D0F2E19323F2D1C3F3203222F5C2C36091F37255C22_);
                }
            } else {
                if ($_obfuscated_0D17320F38033B1D1C3F0D0704193130271D013C260C22_ == "subtitle") {
                    $_obfuscated_0D3F2F110813272F3201261A1D170C0D2E3B3816221F22_ = explode("|", $_obfuscated_0D111F31182F12072F31373223050A130716133F011A01_);
                    if ($_obfuscated_0D2D15121C300423011427362E2A372515061B16221701_[$_obfuscated_0D2C3C34273F350315385C332E075C191316352A044032_]["halimmovies_server_data"][$_obfuscated_0D1A0E34243B362D0311183E0C3316362F2A09012E5C22_]["halimmovies_ep_subs"] == NULL) {
                        $_obfuscated_0D32323622161A0F120C1F3F1F0B322E0C2B21292C1222_[$key]["halimmovies_ep_sub_label"] = sanitize_text_field($_obfuscated_0D3F2F110813272F3201261A1D170C0D2E3B3816221F22_[0]);
                        $_obfuscated_0D32323622161A0F120C1F3F1F0B322E0C2B21292C1222_[$key]["halimmovies_ep_sub_file"] = sanitize_text_field($_obfuscated_0D3F2F110813272F3201261A1D170C0D2E3B3816221F22_[1]);
                        $_obfuscated_0D32323622161A0F120C1F3F1F0B322E0C2B21292C1222_[$key]["halimmovies_ep_sub_default"] = 1;
                        $_obfuscated_0D2D15121C300423011427362E2A372515061B16221701_[$_obfuscated_0D2C3C34273F350315385C332E075C191316352A044032_]["halimmovies_server_data"][$_obfuscated_0D1A0E34243B362D0311183E0C3316362F2A09012E5C22_]["halimmovies_ep_subs"] = $_obfuscated_0D32323622161A0F120C1F3F1F0B322E0C2B21292C1222_;
                    } else {
                        $_obfuscated_0D32323622161A0F120C1F3F1F0B322E0C2B21292C1222_["halimmovies_ep_sub_label"] = sanitize_text_field($_obfuscated_0D3F2F110813272F3201261A1D170C0D2E3B3816221F22_[0]);
                        $_obfuscated_0D32323622161A0F120C1F3F1F0B322E0C2B21292C1222_["halimmovies_ep_sub_file"] = sanitize_text_field($_obfuscated_0D3F2F110813272F3201261A1D170C0D2E3B3816221F22_[1]);
                        $_obfuscated_0D32323622161A0F120C1F3F1F0B322E0C2B21292C1222_["halimmovies_ep_sub_default"] = 1;
                        array_push($_obfuscated_0D2D15121C300423011427362E2A372515061B16221701_[$_obfuscated_0D2C3C34273F350315385C332E075C191316352A044032_]["halimmovies_server_data"][$_obfuscated_0D1A0E34243B362D0311183E0C3316362F2A09012E5C22_]["halimmovies_ep_subs"], $_obfuscated_0D32323622161A0F120C1F3F1F0B322E0C2B21292C1222_);
                    }
                } else {
                    $data = explode("|", $_obfuscated_0D111F31182F12072F31373223050A130716133F011A01_);
                    $_obfuscated_0D100B34010A2B08231D2F264019185C1B1E1908110A01_ = sanitize_text_field($data[0]);
                    $_obfuscated_0D0D29250B14090D02091B31270B12270C171E0C1E0F22_ = sanitize_text_field($data[1]);
                    $_obfuscated_0D13142F0414373F11291A1D24371C33333F1E16322F11_ = sanitize_text_field($data[2]);
                    $_obfuscated_0D121D303204083B2D0A11173B39351F2B183403101C01_ = preg_match("/([a-z]+)/is", $_obfuscated_0D100B34010A2B08231D2F264019185C1B1E1908110A01_) ? sanitize_title($_obfuscated_0D100B34010A2B08231D2F264019185C1B1E1908110A01_) : sanitize_title($_obfuscated_0D2F07241E04230737171F250425051F0C340C39403D32_ . " " . $_obfuscated_0D100B34010A2B08231D2F264019185C1B1E1908110A01_);
                    $_obfuscated_0D392F0312333F1C292B25103D270C3223283E1A351B11_ = str_replace("-", "_", $_obfuscated_0D121D303204083B2D0A11173B39351F2B183403101C01_);
                    $array = ["halimmovies_ep_name" => $_obfuscated_0D100B34010A2B08231D2F264019185C1B1E1908110A01_, "halimmovies_ep_slug" => $_obfuscated_0D121D303204083B2D0A11173B39351F2B183403101C01_, "halimmovies_ep_type" => $_obfuscated_0D13142F0414373F11291A1D24371C33333F1E16322F11_, "halimmovies_ep_link" => $_obfuscated_0D0D29250B14090D02091B31270B12270C171E0C1E0F22_, "halimmovies_ep_subs" => [], "halimmovies_ep_listsv" => []];
                    $_obfuscated_0D2D15121C300423011427362E2A372515061B16221701_[$_obfuscated_0D2C3C34273F350315385C332E075C191316352A044032_]["halimmovies_server_data"][$_obfuscated_0D392F0312333F1C292B25103D270C3223283E1A351B11_] = $array;
                }
            }
        }
    }
    HALIMHelper::set_post_modified($_obfuscated_0D1A0725351501221F2426130A073C340D19100D053022_);
    update_post_meta($_obfuscated_0D1A0725351501221F2426130A073C340D19100D053022_, "_halimmovies", json_encode($_obfuscated_0D2D15121C300423011427362E2A372515061B16221701_, JSON_UNESCAPED_UNICODE));
    wp_die(json_encode($_obfuscated_0D2D15121C300423011427362E2A372515061B16221701_, JSON_UNESCAPED_UNICODE));
}
function halim_add_new_server_callback()
{
    $_obfuscated_0D1A0725351501221F2426130A073C340D19100D053022_ = isset($_POST["post_id"]) ? absint($_POST["post_id"]) : "";
    $_obfuscated_0D2C3C34273F350315385C332E075C191316352A044032_ = isset($_POST["server"]) ? absint($_POST["server"]) : "";
    $_obfuscated_0D1F250A192C2D3E310207283C40171707140C302A3B32_ = isset($_POST["server_name"]) ? sanitize_text_field($_POST["server_name"]) : "";
    $_obfuscated_0D1F35233910382534050D112B282122330C2603291B11_ = isset($_POST["list_link"]) ? $_POST["list_link"] : "";
    $_obfuscated_0D2F07241E04230737171F250425051F0C340C39403D32_ = cs_get_option("halim_episode_url");
    $_obfuscated_0D2D15121C300423011427362E2A372515061B16221701_ = json_decode(stripslashes(get_post_meta($_obfuscated_0D1A0725351501221F2426130A073C340D19100D053022_, "_halimmovies", true)), true);
    $_obfuscated_0D2D15121C300423011427362E2A372515061B16221701_[$_obfuscated_0D2C3C34273F350315385C332E075C191316352A044032_]["halimmovies_server_name"] = $_obfuscated_0D1F250A192C2D3E310207283C40171707140C302A3B32_;
    foreach ($_obfuscated_0D1F35233910382534050D112B282122330C2603291B11_ as $key => $_obfuscated_0D111F31182F12072F31373223050A130716133F011A01_) {
        $data = explode("|", $_obfuscated_0D111F31182F12072F31373223050A130716133F011A01_);
        $_obfuscated_0D100B34010A2B08231D2F264019185C1B1E1908110A01_ = sanitize_text_field($data[0]);
        $_obfuscated_0D0D29250B14090D02091B31270B12270C171E0C1E0F22_ = sanitize_text_field($data[1]);
        $_obfuscated_0D13142F0414373F11291A1D24371C33333F1E16322F11_ = sanitize_text_field($data[2]);
        $_obfuscated_0D121D303204083B2D0A11173B39351F2B183403101C01_ = preg_match("/([a-z]+)/is", $_obfuscated_0D100B34010A2B08231D2F264019185C1B1E1908110A01_) ? sanitize_title($_obfuscated_0D100B34010A2B08231D2F264019185C1B1E1908110A01_) : sanitize_title($_obfuscated_0D2F07241E04230737171F250425051F0C340C39403D32_ . " " . $_obfuscated_0D100B34010A2B08231D2F264019185C1B1E1908110A01_);
        $_obfuscated_0D392F0312333F1C292B25103D270C3223283E1A351B11_ = str_replace("-", "_", $_obfuscated_0D121D303204083B2D0A11173B39351F2B183403101C01_);
        $_obfuscated_0D2D15121C300423011427362E2A372515061B16221701_[$_obfuscated_0D2C3C34273F350315385C332E075C191316352A044032_]["halimmovies_server_data"][$_obfuscated_0D392F0312333F1C292B25103D270C3223283E1A351B11_] = ["halimmovies_ep_name" => $_obfuscated_0D100B34010A2B08231D2F264019185C1B1E1908110A01_, "halimmovies_ep_slug" => $_obfuscated_0D121D303204083B2D0A11173B39351F2B183403101C01_, "halimmovies_ep_type" => $_obfuscated_0D13142F0414373F11291A1D24371C33333F1E16322F11_, "halimmovies_ep_link" => $_obfuscated_0D0D29250B14090D02091B31270B12270C171E0C1E0F22_, "halimmovies_ep_subs" => [], "halimmovies_ep_listsv" => []];
    }
    HALIMHelper::set_post_modified($_obfuscated_0D1A0725351501221F2426130A073C340D19100D053022_);
    update_post_meta($_obfuscated_0D1A0725351501221F2426130A073C340D19100D053022_, "_halimmovies", json_encode($_obfuscated_0D2D15121C300423011427362E2A372515061B16221701_, JSON_UNESCAPED_UNICODE));
    wp_die(json_encode($_obfuscated_0D2D15121C300423011427362E2A372515061B16221701_, JSON_UNESCAPED_UNICODE));
}
function halim_footer_copyright($html = "")
{
    $html = cs_get_option("copyright_text");
    if (!$html) {
        $html = "Theme developed by Hậu Nguyễn";
    }
    $text = "© <a id=\"halimthemes\" href=\"" . home_url("/") . "\" title=\"" . $html . "\">" . $html . "</a>";
    return apply_filters("halim_copyright_text", $text);
}

add_action('wp_ajax_halim_get_showtime', 'handle_halim_get_showtime');
add_action('wp_ajax_nopriv_halim_get_showtime', 'handle_halim_get_showtime');
function handle_halim_get_showtime() {
    $showtime = isset($_GET["showtime"]) ? sanitize_text_field($_GET["showtime"]) : "";

    $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'meta_query'     => array(
            array(
                'key'     => 'halim_showtime_movies',
                'value'   => $showtime,
                'compare' => 'LIKE',
            ),
        ),
    );
    $query = new WP_Query( $args );

    $content = '';
    if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
        $content .= HaLimCore::display_post_items();
    endwhile; wp_reset_postdata(); endif;

    exit;
}

add_action('wp_ajax_halim_follow_movie', 'handle_halim_follow_movie');
add_action('wp_ajax_nopriv_halim_follow_movie', 'handle_halim_follow_movie');

function handle_halim_follow_movie() {
    if (!wp_verify_nonce($_POST['nonce'], 'follow_movie_nonce')) wp_send_json_error(['message' => 'Xác thực không hợp lệ']);
    if (empty($_POST["post_id"]) && empty($_POST["clear_all"])) wp_send_json_error(['message' => 'Thiếu thông tin']);

    $post_id = isset($_POST["post_id"]) ? absint($_POST["post_id"]) : 0;
    $user_id = get_current_user_id();

    if (!empty($_POST["clear_all"])) {
        if ( is_user_logged_in() ) {
            delete_user_meta($user_id, 'halim_followed_movies');
        }
        else {
            setcookie('halim_followed_movies', '', time() - 3600, COOKIEPATH, COOKIE_DOMAIN);
        }

        wp_send_json_success([
            'message' => 'Đã xóa tất cả phim theo dõi',
            'action' => 'clear_all'
        ]);
    }

    if ( is_user_logged_in() ) $followed_movies = get_user_meta($user_id, 'halim_followed_movies', true);
    else $followed_movies = isset($_COOKIE['halim_followed_movies']) ? json_decode($_COOKIE['halim_followed_movies'], true) : [];

    if ( empty($followed_movies) || !is_array($followed_movies) ) $followed_movies = [];

    if (!in_array($post_id, $followed_movies)) {
        // Follow
        $followed_movies[] = $post_id;
        $action = 'follow';
    } else {
        // Unfollow
        $followed_movies = array_diff($followed_movies, [$post_id]);
        $action = 'unfollow';
    }

    if ( is_user_logged_in() ) {
        update_user_meta($user_id, 'halim_followed_movies', $followed_movies);
    }
    else {
        setcookie('halim_followed_movies', json_encode($followed_movies), time() + (DAY_IN_SECONDS * 31), COOKIEPATH, COOKIE_DOMAIN);
    }

    wp_send_json_success([
        'message' => $action == 'follow' ? 'Phim đã được theo dõi!' : 'Phim đã được hủy theo dõi!',
        'action' => $action
    ]);
}

add_action('wp_ajax_delete_history', 'halim_delete_history');
add_action('wp_ajax_nopriv_delete_history', 'halim_delete_history');

function halim_delete_history() {
    if (!wp_verify_nonce($_POST['nonce'], 'delete_history_nonce')) wp_send_json_error(['message' => 'Xác thực không hợp lệ']);
	$clear_all = !empty($_POST['clear_all']) ? 1 : 0;
	$post_id = isset($_POST['post_id']) ? intval($_POST['post_id']) : 0;
	if (!$clear_all && !$post_id) wp_send_json_error(['message' => 'Thiếu thông tin']);

	if (is_user_logged_in()) {
		$user_id = get_current_user_id();

		if ($clear_all) {
			delete_user_meta($user_id, 'halim_watch_history');
		}
        else {
			$history = get_user_meta($user_id, 'halim_watch_history', true);
			if (!is_array($history)) $history = [];

			$history = array_filter($history, function ($item) use ($post_id) {
				return $item['post_id'] != $post_id;
			});
			update_user_meta($user_id, 'halim_watch_history', $history);
		}
	} else {
		$cookie_name = 'halim_recent_posts';

		if ($clear_all) {
			setcookie($cookie_name, '', time() - 3600, COOKIEPATH, COOKIE_DOMAIN);
		}
        else {
			$history = isset($_COOKIE[$cookie_name]) ? json_decode(stripslashes($_COOKIE[$cookie_name]), true) : [];
			if (!is_array($history)) $history = [];

			$history = array_filter($history, function ($item) use ($post_id) {
				return $item['post_id'] != $post_id;
			});

			setcookie($cookie_name, json_encode($history), time() + (DAY_IN_SECONDS * 31), COOKIEPATH, COOKIE_DOMAIN);
		}
	}

	wp_send_json_success();
}

add_action('wp_ajax_halim_upload_avatar', function() {
	if (!is_user_logged_in()) wp_send_json_error(['message' => 'Bạn chưa đăng nhập']);
	if (!wp_verify_nonce($_POST['nonce'], 'upload_avatar_nonce')) wp_send_json_error(['message' => 'Xác thực không hợp lệ']);

	if (empty($_FILES['custom_avatar'])) wp_send_json_error(['message' => 'Không có file nào được chọn']);

	$file = $_FILES['custom_avatar'];
	$user_id = get_current_user_id();

    if ($file['size'] > 512000) wp_send_json_error(['message' => 'Ảnh không được lớn hơn 500KB']);

	require_once ABSPATH . 'wp-admin/includes/file.php';
	require_once ABSPATH . 'wp-admin/includes/image.php';

	$upload = wp_handle_upload($file, ['test_form' => false]);

	if (!empty($upload['error'])) {
		wp_send_json_error(['message' => $upload['error']]);
	}

	// Tạo attachment
	$attachment = [
		'post_mime_type' => $upload['type'],
		'post_title'     => sanitize_file_name($file['name']),
		'post_status'    => 'inherit'
	];

	$attach_id = wp_insert_attachment($attachment, $upload['file']);
	$attach_data = wp_generate_attachment_metadata($attach_id, $upload['file']);
	wp_update_attachment_metadata($attach_id, $attach_data);

	update_user_meta($user_id, 'custom_avatar_id', $attach_id);

	$avatar_url = wp_get_attachment_image_src($attach_id, 'thumbnail')[0];

	wp_send_json_success(['avatar' => $avatar_url]);
});

add_action('wp_ajax_halim_update_user_info', function () {
	if (!is_user_logged_in()) wp_send_json_error(['message' => 'Bạn chưa đăng nhập']);

	if (!wp_verify_nonce($_POST['nonce'], 'update_user_info_nonce')) wp_send_json_error(['message' => 'Xác thực không hợp lệ']);

	$user_id = get_current_user_id();
	$display_name = sanitize_text_field($_POST['display_name']);

	if (strlen($display_name) < 2) wp_send_json_error(['message' => 'Tên hiển thị quá ngắn']);
	if (strlen($display_name) > 50) wp_send_json_error(['message' => 'Tên hiển phải ít hơn 50 kí tự']);

	wp_update_user([
		'ID' => $user_id,
		'display_name' => $display_name,
	]);

	wp_send_json_success(['message' => 'Đã cập nhật thông tin']);
});

add_action('wp_ajax_halim_change_password', function () {
	if (!is_user_logged_in()) wp_send_json_error(['message' => 'Bạn chưa đăng nhập']);
	if (!wp_verify_nonce($_POST['nonce'], 'change_password_nonce')) wp_send_json_error(['message' => 'Xác thực không hợp lệ']);

	$user_id = get_current_user_id();
	$new_password = sanitize_text_field($_POST['new_password']);
	$confirm_password = sanitize_text_field($_POST['confirm_password']);

	if ($new_password !== $confirm_password) wp_send_json_error(['message' => 'Mật khẩu không khớp']);

	wp_set_password($new_password, $user_id);

	wp_send_json_success(['message' => 'Đã cập nhật mật khẩu']);
});

add_action('wp_ajax_nopriv_halim_user_login', 'halim_user_login');
add_action('wp_ajax_halim_user_login', 'halim_user_login');

function halim_user_login() {
    if (!wp_verify_nonce($_POST['nonce'], 'user_login_nonce')) wp_send_json_error(['message' => 'Xác thực không hợp lệ']);

    $login_input = sanitize_text_field($_POST['username']);
    $password = sanitize_text_field($_POST['password']);
    $remember = !empty($_POST['remember']) ? true : false;
    // Cho phép đăng nhập bằng email
    $user = get_user_by('email', $login_input);

    if ($user) {
        $login_input = $user->user_login;
    }

    $creds = [
        'user_login'    => $login_input,
        'user_password' => $password,
        'remember'      => $remember,
    ];

    $user = wp_signon($creds, is_ssl());

    if (is_wp_error($user)) {
        wp_send_json_error(['message' => 'Sai tài khoản hoặc mật khẩu']);
    }

    wp_send_json_success(['message' => 'Đăng nhập thành công']);
}

add_action('wp_ajax_halim_delete_comment', 'halim_delete_comment');
add_action('wp_ajax_nopriv_halim_delete_comment', 'halim_delete_comment');

function halim_delete_comment() {
    if (!wp_verify_nonce($_POST['nonce'], 'halim_delete_comment')) wp_send_json_error(['message' => 'Xác thực không hợp lệ']);

    $comment_id = isset($_POST['comment_id']) ? intval($_POST['comment_id']) : 0;
    if (!$comment_id) wp_send_json_error(['message' => 'Thiếu thông tin']);

    delete_comment_and_children($comment_id);
    wp_delete_comment($comment_id, true);

    wp_send_json_success(['message' => 'Đã xóa bình luận']);
}

function delete_comment_and_children($comment_id) {
    $children = get_comments([
        'parent'  => $comment_id,
        'status'  => 'all',
        'orderby' => 'comment_ID',
        'order'   => 'ASC',
        'number'  => 0,
    ]);

    foreach ($children as $child) {
        delete_comment_and_children($child->comment_ID);
    }

    wp_delete_comment($comment_id, true);
}

add_action('wp_ajax_halim_get_showtime_movies', 'halim_get_showtime_movies');
add_action('wp_ajax_nopriv_halim_get_showtime_movies', 'halim_get_showtime_movies');

function halim_get_showtime_movies() {
    if (!wp_verify_nonce($_POST['nonce'], 'halim_get_showtime_movies')) wp_send_json_error(['message' => 'Xác thực không hợp lệ']);

    $day = isset($_POST['day']) ? sanitize_text_field($_POST['day']) : '';

    if (empty($day)) wp_send_json_error(['message' => 'Thiếu thông tin']);

    $content = show_showtime_movies($day);
    wp_send_json_success(['content' => $content]);
}
?>