<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package camp_assign
 */

get_header();
?>

	
    <!--Categorie-->
    <section class="categorie-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="categorie-title">
                        <small>
                            <a href="index.html">Home</a>
                            <span class="arrow_carrot-right"></span> Livestyle
                        </small>
                        <h3><span><?php the_archive_title(false , ''); ?></span> </h3>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/-->

		    <!--mansory-layout-->
			<section class="masonry-layout col2-layout mt-30">
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
