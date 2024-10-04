<?php
function simple_project_setup() {
    // Add support for featured images
    add_theme_support('post-thumbnails');

    // Register navigation menu
    register_nav_menus(array(
        'primary' => __('Primary Menu'),
    ));
}
add_action('after_setup_theme', 'simple_project_setup');

function simple_project_scripts() {
    wp_enqueue_style('style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'simple_project_scripts');
