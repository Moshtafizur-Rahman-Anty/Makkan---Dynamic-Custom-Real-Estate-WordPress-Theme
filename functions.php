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


function makaan_theme_customizer($wp_customize)
{
    // Add Header Section
    $wp_customize->add_section('makaan_header_section', array(
        'title' => __('Header Settings', 'makaan'),
        'priority' => 30,
    ));

    // Add Header Title Setting
    $wp_customize->add_setting('header_title', array(
        'default' => __('Find A Perfect Home', 'makaan'),
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('header_title', array(
        'label' => __('Header Title', 'makaan'),
        'section' => 'makaan_header_section',
        'type' => 'text',
    ));

    // Add Header Subtitle Setting
    $wp_customize->add_setting('header_subtitle', array(
        'default' => __('Vero elitr justo clita lorem...', 'makaan'),
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('header_subtitle', array(
        'label' => __('Header Subtitle', 'makaan'),
        'section' => 'makaan_header_section',
        'type' => 'text',
    ));

    // Add Header Image 1 Setting (Upload Image Option)
    $wp_customize->add_setting('header_image_1', array(
        'default' => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'header_image_1', array(
        'label' => __('Header Image 1', 'makaan'),
        'section' => 'makaan_header_section',
        'settings' => 'header_image_1',
    )));

    // Add Header Image 2 Setting (Upload Image Option)
    $wp_customize->add_setting('header_image_2', array(
        'default' => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'header_image_2', array(
        'label' => __('Header Image 2', 'makaan'),
        'section' => 'makaan_header_section',
        'settings' => 'header_image_2',
    )));



    // Add About Section
    $wp_customize->add_section('makaan_about_section', array(
        'title' => __('About Section Settings', 'makaan'),
        'priority' => 30,
    ));

    // Add About Title Setting
    $wp_customize->add_setting('about_title', array(
        'default' => __('#1 Place To Find The Perfect Property', 'makaan'),
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('about_title', array(
        'label' => __('About Section Title', 'makaan'),
        'section' => 'makaan_about_section',
        'type' => 'text',
    ));

    // Add About Description Setting
    $wp_customize->add_setting('about_description', array(
        'default' => __('Tempor erat elitr rebum at clita...', 'makaan'),
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('about_description', array(
        'label' => __('About Section Description', 'makaan'),
        'section' => 'makaan_about_section',
        'type' => 'textarea',
    ));

    // Add About Image Setting (Upload Image Option)
    $wp_customize->add_setting('about_image', array(
        'default' => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'about_image', array(
        'label' => __('About Section Image', 'makaan'),
        'section' => 'makaan_about_section',
        'settings' => 'about_image',
    )));

    $wp_customize->add_section('cta_section', array(
        'title'    => __('Call to Action', 'yourtheme'),
        'priority' => 30,
    ));

    // Call to Action
    $wp_customize->add_setting('cta_image', array(
        'default'   => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'cta_image', array(
        'label'    => __('CTA Image', 'yourtheme'),
        'section'  => 'cta_section',
        'settings' => 'cta_image',
    )));

    // Title
    $wp_customize->add_setting('cta_title', array(
        'default'   => 'Contact With Our Certified Agent',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('cta_title', array(
        'label'    => __('CTA Title', 'yourtheme'),
        'section'  => 'cta_section',
        'type'     => 'text',
    ));

    // Description
    $wp_customize->add_setting('cta_description', array(
        'default'   => 'Eirmod sed ipsum dolor sit rebum magna erat. Tempor lorem kasd vero ipsum sit sit diam justo sed vero dolor duo.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('cta_description', array(
        'label'    => __('CTA Description', 'yourtheme'),
        'section'  => 'cta_section',
        'type'     => 'textarea',
    ));

    // Call Button Text
    $wp_customize->add_setting('cta_call_text', array(
        'default'   => 'Make A Call',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('cta_call_text', array(
        'label'    => __('Call Button Text', 'yourtheme'),
        'section'  => 'cta_section',
        'type'     => 'text',
    ));

    // Call Button Link
    $wp_customize->add_setting('cta_call_link', array(
        'default'   => '#',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('cta_call_link', array(
        'label'    => __('Call Button Link', 'yourtheme'),
        'section'  => 'cta_section',
        'type'     => 'url',
    ));

    // Appointment Button Text
    $wp_customize->add_setting('cta_appointment_text', array(
        'default'   => 'Get Appointment',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('cta_appointment_text', array(
        'label'    => __('Appointment Button Text', 'yourtheme'),
        'section'  => 'cta_section',
        'type'     => 'text',
    ));

    // Appointment Button Link
    $wp_customize->add_setting('cta_appointment_link', array(
        'default'   => '#',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('cta_appointment_link', array(
        'label'    => __('Appointment Button Link', 'yourtheme'),
        'section'  => 'cta_section',
        'type'     => 'url',
    ));
}

add_action('customize_register', 'makaan_theme_customizer');

function create_team_post_type()
{
    register_post_type(
        'team_member',
        array(
            'labels' => array(
                'name' => __('Team Members'),
                'singular_name' => __('Team Member'),
                'add_new' => __('Add New Team Member'),
                'add_new_item' => __('Add New Team Member'),
                'edit_item' => __('Edit Team Member'),
                'new_item' => __('New Team Member'),
                'view_item' => __('View Team Member'),
                'all_items' => __('All Team Members'),
                'search_items' => __('Search Team Members'),
            ),
            'public' => true,
            'has_archive' => true,
            'menu_icon' => 'dashicons-groups',
            'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),  // Make sure 'thumbnail' is here
            'show_in_rest' => true,  // This is to support the block editor (Gutenberg)
        )
    );
}
add_action('init', 'create_team_post_type');

add_theme_support('post-thumbnails');
