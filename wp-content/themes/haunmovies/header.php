<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#234556">
    <meta name="msapplication-navbutton-color" content="#234556">
    <meta name="apple-mobile-web-app-status-bar-style" content="#234556">
    <?php if (cs_get_option('favicon')): ?>
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo esc_url(cs_get_option('apple_touch_icon')); ?>" />
    <link rel="shortcut icon" href="<?php echo esc_url(cs_get_option('favicon')); ?>" type="image/x-icon" />
    <?php else: ?>
    <link rel="shortcut icon" href="<?php echo HALIM_THEME_URI ?>/assets/images/favicon.ico" type="image/x-icon" />
    <?php endif;
        wp_head();
        if (cs_get_option('header_code')) echo cs_get_option('header_code')."\n";
        $logo = '';
        if(cs_get_option('site_logo'))
            $logo = wp_get_attachment_image_src(cs_get_option('site_logo'), 'full')[0];
    if($logo) : ?>
        <style>#header .site-title {background: url(<?php echo esc_attr($logo); ?>) no-repeat top left;background-size: contain;text-indent: -9999px;}</style>
    <?php else: ?>
        <style>#header .site-title {background: url(<?php echo HALIM_THEME_URI ?>/assets/images/halim-dark-logo.png) no-repeat top left;background-size: contain;text-indent: -9999px;}</style>
    <?php endif; ?>
    <link rel="stylesheet" href="<?= get_stylesheet_directory_uri() ?>/assets/css/bootstrap-style.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"/>
    <link rel="stylesheet" href="<?= get_stylesheet_directory_uri() ?>/assets/css/custom.css?v=<?= time() ?>"/>
    <script type="module" src="https://cdn.jsdelivr.net/npm/emoji-picker-element@^1/index.js"></script>
</head>
<?php
    global $post;

    $current_user = is_user_logged_in() ? wp_get_current_user() : null;
    $wp_nonce = wp_create_nonce(get_the_ID());
?>
<body <?php body_class('halimmovie-version-'.HALIMMOVIE_VERSION); ?> data-masonry="<?php echo cs_get_option('masonry_grid'); ?>" data-nonce="<?php echo $wp_nonce; ?>">
    <?php
        if ( function_exists( 'wp_body_open' ) ) {
            wp_body_open();
        } else {
            do_action( 'wp_body_open' );
        }
        $postCount = __('Search', 'halimthemes');
        if(cs_get_option('show_total_post_in_search_form')) {
            $count_posts = wp_count_posts();
            if ( $count_posts ) {
                $postCount = number_format($count_posts->publish);
            }
        }

        $current_path = untrailingslashit(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
    ?>
    <div id="custom-login-modal" class="custom-login">
        <div class="custom-login-content">
            <span id="custom-close-login-modal" class="custom-close" onclick="jQuery('#custom-login-modal').removeClass('active')">×</span>
            <h2 class="custom-login-title">Đăng nhập</h2>
            <div class="wpd-social-login-buttons">
            <?php do_action('wpdiscuz_social_login_buttons'); ?>
            </div>
            <a id="custom-google-login" class="google-login-button" href="https://hswebfreelancer.info/wp-login.php?loginSocial=google" data-plugin="nsl" data-action="connect" data-redirect="current" data-provider="google" data-popupwidth="600" data-popupheight="600">
                <span class="google-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" class="LgbsSe-Bz112c" width="20px" height="20px">
                        <g>
                            <path fill="#EA4335" d="M24 9.5c3.54 0 6.71 1.22 9.21 3.6l6.85-6.85C35.9 2.38 30.47 0 24 0 14.62 0 6.51 5.38 2.56 13.22l7.98 6.19C12.43 13.72 17.74 9.5 24 9.5z"></path>
                            <path fill="#4285F4" d="M46.98 24.55c0-1.57-.15-3.09-.38-4.55H24v9.02h12.94c-.58 2.96-2.26 5.48-4.78 7.18l7.73 6c4.51-4.18 7.09-10.36 7.09-17.65z"></path>
                            <path fill="#FBBC05" d="M10.53 28.59c-.48-1.45-.76-2.99-.76-4.59s.27-3.14.76-4.59l-7.98-6.19C.92 16.46 0 20.12 0 24c0 3.88.92 7.54 2.56 10.78l7.97-6.19z"></path>
                            <path fill="#34A853" d="M24 48c6.48 0 11.93-2.13 15.89-5.81l-7.73-6c-2.15 1.45-4.92 2.3-8.16 2.3-6.26 0-11.57-4.22-13.47-9.91l-7.98 6.19C6.51 42.62 14.62 48 24 48z"></path>
                            <path fill="none" d="M0 0h48v48H0z"></path>
                        </g>
                    </svg>
                </span> Đăng nhập bằng Google
            </a>
            <form id="custom-login-form" class="custom-login-form">
                <input type="hidden" name="nonce" value="<?= wp_create_nonce('user_login_nonce') ?>">
                <input type="text" name="username" class="custom-input" placeholder="Email" required="">
                <input type="password" name="password" class="custom-input" placeholder="Mật khẩu" required="">
                <label for="custom-remember" class="custom-checkbox-label">
                <input type="checkbox" name="remember" class="custom-checkbox"> Ghi nhớ </label>
                <button type="submit" id="custom-login-submit" class="custom-submit active">Đăng nhập</button>
                <div id="custom-login-message" class="custom-message"></div>
            </form>
        </div>
    </div>
    <header id="header">
        <div class="container">
            <div class="row" id="headwrap">
                <div class="col-md-3 col-sm-6 slogan">
                    <?php if ( is_front_page() ) : ?>
                        <h1 class="site-title"><a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                    <?php else : ?>
                        <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                    <?php endif; ?>
                </div>

                <div class="col-md-5 col-sm-6 halim-search-form hidden-xs">
                    <div class="header-nav">
                        <div class="col-xs-12">
                            <form id="search-form-pc" name="halimForm" role="search" action="<?php echo esc_url(home_url('/')); ?>" method="GET">
                                <div class="form-group">
                                    <div class="input-group col-xs-12">
                                        <input id="search" type="text" name="s" value="<?php echo get_search_query(); ?>" class="form-control" data-toggle="tooltip" data-placement="bottom" data-original-title="<?php _e('Press Enter to search', 'halimthemes'); ?>" placeholder="<?php printf(  __( 'Search...', 'halimthemes' ) ); ?>" autocomplete="off" required>
                                        <i class="animate-spin hl-spin4 hidden"></i>
                                    </div>
                                </div>
                            </form>
                            <ul class="ui-autocomplete ajax-results hidden"></ul>
                        </div>
                    </div>
                </div>
                <div id="navdrop" class="col-md-4">
                    <div class="action-header">
                        <?php if (is_user_logged_in()): ?>
                            <a href="/lich-su-xem-phim" class="<?= $current_path == '/lich-su-xem-phim' ? 'active' : '' ?>"><i class="fa-solid fa-clock-rotate-left"></i></a>
                            <a href="/tu-phim-theo-doi" class="<?= $current_path == '/tu-phim-theo-doi' ? 'active' : '' ?>"><i class="fa-solid fa-bookmark"></i></a>
                            <a href="javascript:void(0)" class="open-profile-info"><i class="fa-solid fa-circle-user"></i></a>
                        <?php else: ?>
                            <a href="/lich-su-xem-phim" class="<?= $current_path == '/lich-su-xem-phim' ? 'active' : '' ?>"><i class="fa-solid fa-clock-rotate-left"></i></a>
                            <a href="/tu-phim-theo-doi" class="<?= $current_path == '/tu-phim-theo-doi' ? 'active' : '' ?>"><i class="fa-solid fa-bookmark"></i></a>
                            <a href="javascript:void(0)" onclick="showModalLogin()"><i class="fa-solid fa-arrow-right-to-bracket"></i></a>
                        <?php endif; ?>
                    </div>
                    <?php if (is_user_logged_in()): ?>
                        <div class="wrapper profile-info">
                            <ul class="menu-bar">
                                <li class="profile">
                                    <?= get_avatar( $current_user->ID ) ?>
                                    <p><?= $current_user->display_name ?></p>
                                </li>
                                <li class="setting-item">
                                    <a href="/trang-ca-nhan">
                                        <div class="icon">
                                            <i class="fa-solid fa-circle-info"></i>
                                        </div>
                                        <span>Thông Tin</span>
                                    </a>
                                </li>
                                <li class="setting-item">
                                    <a href="/doi-mat-khau">
                                        <div class="icon">
                                            <i class="fa-solid fa-key"></i>
                                        </div>
                                        <span>Đổi mật khẩu</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= esc_url( wp_logout_url( home_url() ) ) ?>">
                                        <div class="icon">
                                            <i class="fa-solid fa-right-from-bracket"></i>
                                        </div>
                                        Đăng Xuất
                                    </a>
                                </li>
                            </ul>
                        </div>
                    <?php endif; ?>
                </div>

            </div>
            <!-- <div class="notice-pc text-center mb-3">Lưu hoặc nhớ ngay link rút gọn <b><font color="#FFA500" style="font-size: 17px;">bit.ly/hh3d</font></b> để truy cập sẽ tự chuyển đến tên miền mới  khi nhà mạng chặn</div> -->
        </div>
    </header>
    <div class="navbar-container">
        <div class="container">
            <nav class="navbar halim-navbar main-navigation" role="navigation" data-dropdown-hover="<?php echo cs_get_option('hover_dropdown_menu'); ?>">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed pull-left" data-toggle="collapse" data-target="#halim" aria-expanded="false">
                        <span class="sr-only"><?php _e('Menu', 'halimthemes') ?></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <button type="button" class="navbar-toggle collapsed pull-right hidden-xs" data-toggle="collapse" data-target="#user-info" aria-expanded="false">
                        <span class="hl-dot-3 rotate" aria-hidden="true"></span>
                    </button>
                    <button type="button" class="navbar-toggle collapsed pull-right expand-search-form" data-toggle="collapse" data-target="#search-form" aria-expanded="false">
                        <span class="hl-search" aria-hidden="true"></span>
                    </button>
                    <button type="button" class="navbar-toggle collapsed pull-right get-bookmark-on-mobile hidden-xs">
                        <i class="hl-bookmark" aria-hidden="true"></i>
                        <span class="count">0</span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="halim">
                    <?php
                        wp_nav_menu( array(
                            'depth'             => 2,
                            'theme_location'    => 'header_menu',
                            'menu_class'        => 'nav navbar-nav navbar-left',
                            'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                            'walker'            => new wp_bootstrap_navwalker())
                        );
                    ?>
                </div>
                <!-- /.navbar-collapse -->
            </nav>
            <div class="collapse navbar-collapse" id="search-form">
                <div id="mobile-search-form" class="halim-search-form"></div>
            </div>
            <div class="collapse navbar-collapse" id="user-info">
                <div id="mobile-user-login"></div>
            </div>
        </div>
    </div>
<!-- /header -->
<div class="container">
    <?php if(cs_get_option('enable_header_banner_ads')) : ?>
    <div class="a--d-wrapper" style="text-align: center; margin: 10px 0;">
        <?php echo cs_get_option('header_banner_ads'); ?>
    </div>
    <?php endif; ?>
    <div class="row fullwith-slider">
        <?php if(is_home()) dynamic_sidebar('bs-slider') ?>
    </div>
</div>
<div class="container-fluid halim-full-player hidden halim-centered">
    <div id="halim-full-player" class="container col-md-offset-2s col-md-8"></div>
</div>
<div class="custom-confirm-overlay" style="display: none;">
    <div class="custom-confirm-modal">
        <h2 class="custom-confirm-title">Xác nhận xóa</h2>
        <p class="custom-confirm-text">Bạn có chắc chắn muốn xóa lịch sử này?</p>
        <div class="custom-confirm-actions">
            <button class="custom-confirm-cancel">Hủy</button>
            <button class="custom-confirm-confirm">Xóa</button>
        </div>
    </div>
</div>
<div class="container">
    <div class="row container" id="wrapper">