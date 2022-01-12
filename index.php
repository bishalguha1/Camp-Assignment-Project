<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package camp_assign
 */

get_header();
?>




	    <!--mansory-layout-->
		<section class="masonry-layout col2-layout mt-120">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 mt--10 ">
                    <!--cards-->
                    <div class="card-columns">
                    <?php
                        if ( have_posts() ) :

                            /* Start the Loop */
                            while ( have_posts() ) :
                                the_post();

                                /*
                                * Include the Post-Type-specific template for the content.
                                * If you want to override this in a child theme, then include a file
                                * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                                */
                                get_template_part( 'template-parts/posts/post', get_post_type() );

                            endwhile;

                        else :

                            get_template_part( 'template-parts/content', 'none' );

                        endif;
                    ?>
                       
                    </div>
                    <!--pagination-->
                    <div class="pagination mt-30">
                            <?php 
                                the_posts_pagination( array(
                                    'prev_text' => __( '<i class="arrow_carrot-2left"></i>', 'campassign' ),
                                    'next_text' => __( '<i class="arrow_carrot-2right"></i>', 'campassign' )
                                )
                                );
                            ?>
                    </div><!--/-->
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4 max-width">
                    <?php get_template_part('sidebar') ?>
                </div>


            </div>
        </div>
    </section><!--/-->


<?php
get_footer();
