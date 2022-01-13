<?php

/**
 * Template name: 404 page- 1
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package camp_assign
 */
get_header();

?>


<section class="section pt-55 mb-50">
    <div class="container-fluid">
        <div class="page404  widget">
            <div class="image text-center">
            <iframe src="https://embed.lottiefiles.com/animation/36395"></iframe>
            </div>
            <div class="content">
                <h3>Page Not Found.</h3>
                <p>It looks like nothing was found at this location. </p>
                <a href="<?php echo get_site_url(); ?>" class="btn-custom">Go back to Home</a>
            </div>
        </div>
    </div>
</section> 



<?php get_footer(); ?>
