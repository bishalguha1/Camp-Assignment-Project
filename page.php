<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package camp_assign
 */

get_header();
?>


    <section class="section pt-50">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h5><?php the_title(); ?></h5>
                    </div>
                </div>
            </div>
        
            <div class="row ">
                <div class="col-lg-8 mt-30">
                    <div class="about-us">
                        <div class="about-us-image">
                            <?php 
								if(has_post_thumbnail()){
									the_post_thumbnail('full', null);
								}
							?>
                        </div>
                        <div class="description">
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 max-width">
                    <!--widget-latest-posts-->
					<?php 
						if(is_active_sidebar('page-sidebar')){
							dynamic_sidebar('page-sidebar');
						}
					?>
                </div>
            </div>
        </div>
    </section>    


<?php
get_footer();
