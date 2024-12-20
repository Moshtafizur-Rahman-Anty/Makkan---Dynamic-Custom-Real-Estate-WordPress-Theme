<?php
// Hook to enqueue theme scripts and styles
function makaan_theme_enqueue_scripts()
{
    // Enqueue CSS files
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '5.0.0', 'all');
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css', array(), '5.15.4', 'all'); // Font Awesome 5
    wp_enqueue_style('main-style', get_template_directory_uri() . '/css/style.css', array('bootstrap', 'font-awesome'), '1.0', 'all');
    wp_enqueue_style('theme-root-style', get_stylesheet_uri(), array(), '1.0', 'all'); // Add root style.css


    wp_enqueue_style('owl-carousel-css', get_template_directory_uri() . '/lib/owlcarousel/assets/owl.carousel.min.css');
    wp_enqueue_style('owl-theme-css', get_template_directory_uri() . '/lib/owlcarousel/assets/owl.theme.default.min.css');
    wp_enqueue_style('bootstrap-icons', 'https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css');


    wp_enqueue_script('owl-carousel-js', get_template_directory_uri() . '/lib/owlcarousel/owl.carousel.min.js', array('jquery'), '2.2.1', true);

    wp_enqueue_script('wow-js', get_template_directory_uri() . '/lib/wow/wow.min.js', array(), '1.3.0', true);
    wp_enqueue_script('easing-js', get_template_directory_uri() . '/lib/easing/easing.min.js', array('jquery'), '1.4.1', true);

    // Enqueue JS files
    wp_enqueue_script('jquery'); // WordPress jQuery
    wp_enqueue_script('main-script', get_template_directory_uri() . '/js/main.js', array('jquery'), '1.0', true);

    // Add additional libraries and utilities as needed
}
add_action('wp_enqueue_scripts', 'makaan_theme_enqueue_scripts');



function register_my_menu()
{
    register_nav_menu('primary', 'Primary Menu');
}
add_action('after_setup_theme', 'register_my_menu');

require_once get_template_directory() . '/lib/wp-bootstrap-navwalker.php';
