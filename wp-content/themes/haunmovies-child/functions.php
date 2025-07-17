<?php

// Do not remove
add_action( 'wp_enqueue_scripts', 'halim_child_theme_enqueue_styles' );
function halim_child_theme_enqueue_styles() {
    wp_deregister_style('halimmovie-style');
    wp_enqueue_style( 'halimmovie-style', HALIM_THEME_URI . '/style.css', array(), wp_get_theme('halimmovies')->get('Version') );
    wp_enqueue_style( 'halimmovie-child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( 'halimmovie-style' ),
        wp_get_theme('halimmovies')->get('Version')
    );
}

require_once 'custom-player.php';

// add_filter('halim_episode_type', function($type) {
//     return 'google-drive'; // set type mặc định cho tập phim
// });
