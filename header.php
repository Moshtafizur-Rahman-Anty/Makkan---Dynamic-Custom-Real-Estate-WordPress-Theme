<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title('|', true, 'right'); ?></title>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->


        <div class="container-fluid nav-bar bg-transparent">
            <nav class="navbar navbar-expand-lg bg-white navbar-light py-0 px-4">
                <a href="<?php echo home_url(); ?>" class="navbar-brand d-flex align-items-center text-center">
                    <div class="icon p-2 me-2">
                        <img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/img/icon-deal.png" alt="Icon" style="width: 30px; height: 30px;">
                    </div>
                    <h1 class="m-0 text-primary">Makaan</h1>
                </a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <?php
                    // Define the WordPress menu location
                    wp_nav_menu(array(
                        'theme_location' => 'primary', // the location where the menu will be displayed (set in the `functions.php`)
                        'depth'           => 2, // how many levels of menu to display
                        'container'       => false, // do not wrap in a container div
                        'menu_class'      => 'navbar-nav ms-auto', // CSS class for the menu
                        'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback', // fallback to default if no menu is set
                        'walker'           => new WP_Bootstrap_Navwalker(), // use the navwalker class for Bootstrap menu
                        'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>' // wrap the items correctly
                    ));


                    ?>
                    <a href="" class="btn btn-primary px-3 d-none d-lg-flex">Add Property</a>
                </div>
            </nav>
        </div>


        <!-- Navbar End -->

        <!-- Header Start -->
        <div class="container-fluid header bg-white p-0">
            <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
                <div class="col-md-6 p-5 mt-lg-5">
                    <h1 class="display-5 animated fadeIn mb-4">Find A <span class="text-primary">Perfect Home</span> To Live With Your Family</h1>
                    <p class="animated fadeIn mb-4 pb-2">Vero elitr justo clita lorem. Ipsum dolor at sed stet
                        sit diam no. Kasd rebum ipsum et diam justo clita et kasd rebum sea elitr.</p>
                    <a href="" class="btn btn-primary py-3 px-5 me-3 animated fadeIn">Get Started</a>
                </div>
                <div class="col-md-6 animated fadeIn">
                    <div class="owl-carousel header-carousel">
                        <div class="owl-carousel-item">
                            <img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/img/carousel-1.jpg" alt="">
                        </div>
                        <div class="owl-carousel-item">
                            <img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/img/carousel-2.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->