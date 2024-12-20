<?php
/* Template Name: About Page */
get_header();
?>

<!-- About Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <div class="about-img position-relative overflow-hidden p-5 pe-0">
                    <!-- Use get_theme_mod() to dynamically load the image -->
                    <img class="img-fluid w-100" src="<?php echo esc_url(get_theme_mod('about_image', get_template_directory_uri() . '/img/about.jpg')); ?>" alt="About Image">
                </div>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <h1 class="mb-4">
                    <?php echo esc_html(get_theme_mod('about_title', '#1 Place To Find The Perfect Property')); ?>
                </h1>
                <p class="mb-4">
                    <?php echo esc_html(get_theme_mod('about_description', 'Tempor erat elitr rebum at clita...')); ?>
                </p>
                <p><i class="fa fa-check text-primary me-3"></i>Tempor erat elitr rebum at clita</p>
                <p><i class="fa fa-check text-primary me-3"></i>Aliqu diam amet diam et eos</p>
                <p><i class="fa fa-check text-primary me-3"></i>Clita duo justo magna dolore erat amet</p>
                <a class="btn btn-primary py-3 px-5 mt-3" href="">Read More</a>
            </div>
        </div>
    </div>
</div>
<!-- About End -->

<!-- About End -->

<!-- About End -->

<!-- Call to Action Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="bg-light rounded p-3">
            <div class="bg-white rounded p-4" style="border: 1px dashed rgba(0, 185, 142, .3)">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                        <!-- Dynamic Image -->
                        <img class="img-fluid rounded w-100" src="<?php echo esc_url(get_theme_mod('cta_image')); ?>" alt="Call to Action">
                    </div>
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                        <div class="mb-4">
                            <!-- Dynamic Title -->
                            <h1 class="mb-3"><?php echo esc_html(get_theme_mod('cta_title', 'Contact With Our Certified Agent')); ?></h1>
                            <!-- Dynamic Description -->
                            <p><?php echo esc_html(get_theme_mod('cta_description', 'Eirmod sed ipsum dolor sit rebum magna erat. Tempor lorem kasd vero ipsum sit sit diam justo sed vero dolor duo.')); ?></p>
                        </div>
                        <!-- Dynamic Buttons -->
                        <a href="<?php echo esc_url(get_theme_mod('cta_call_link', '#')); ?>" class="btn btn-primary py-3 px-4 me-2">
                            <i class="fa fa-phone-alt me-2"></i><?php echo esc_html(get_theme_mod('cta_call_text', 'Make A Call')); ?>
                        </a>
                        <a href="<?php echo esc_url(get_theme_mod('cta_appointment_link', '#')); ?>" class="btn btn-dark py-3 px-4">
                            <i class="fa fa-calendar-alt me-2"></i><?php echo esc_html(get_theme_mod('cta_appointment_text', 'Get Appointment')); ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Team Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="mb-3">Property Agents</h1>
            <p>Meet our team of experienced professionals who are here to help you find your dream property.</p>
        </div>
        <div class="row g-4">
            <?php
            $team_query = new WP_Query(array(
                'post_type' => 'team_member',
                'posts_per_page' => -1,
            ));

            if ($team_query->have_posts()) :
                while ($team_query->have_posts()) : $team_query->the_post();
                    // Get custom fields (social links)
                    $facebook_url = get_field('facebook_url');
                    $twitter_url = get_field('twitter_url');
                    $instagram_url = get_field('instagram_url');
            ?>
                    <div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="team-item rounded overflow-hidden">
                            <div class="position-relative">
                                <!-- Dynamic Featured Image -->
                                <img class="img-fluid" src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                                <div class="position-absolute start-50 top-100 translate-middle d-flex align-items-center">
                                    <?php if ($facebook_url) : ?>
                                        <a class="btn btn-square mx-1" href="<?php echo esc_url($facebook_url); ?>"><i class="fab fa-facebook-f"></i></a>
                                    <?php endif; ?>
                                    <?php if ($twitter_url) : ?>
                                        <a class="btn btn-square mx-1" href="<?php echo esc_url($twitter_url); ?>"><i class="fab fa-twitter"></i></a>
                                    <?php endif; ?>
                                    <?php if ($instagram_url) : ?>
                                        <a class="btn btn-square mx-1" href="<?php echo esc_url($instagram_url); ?>"><i class="fab fa-instagram"></i></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="text-center p-4 mt-3">
                                <h5 class="fw-bold mb-0"><?php the_title(); ?></h5>
                                <small><?php echo get_the_content(); ?></small>
                            </div>
                        </div>
                    </div>
            <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>
    </div>
</div>
<!-- Team End -->

<!-- Team End -->

<!-- Team End -->



<?php get_footer(); ?>