<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package camp_assign
 */

get_header();
?>



    <!--post-default-->
    <section class="section pt-55 ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 mb-20">
                    <!--Post-single-->
                    <div class="post-single">
                        <div class="post-single-image">
							<?php 
								if(has_post_thumbnail()){
									the_post_thumbnail('full' , null);
								}
							?>
                        </div>
                        <div class="post-single-content">
						<?php 
							$Categories = get_the_category();
							$Seperator = '  ';
							$result = ' ';

							if($Categories){
								foreach($Categories as $Category){
									$result .= '<a class="categorie" href="' . get_category_link($Category -> term_id) . '">' . $Category -> cat_name . '</a>' . $Seperator;
								}

								echo trim($result , $Seperator);
							}
						?>
                            <h4><?php the_title(); ?></h4>
                            <div class="post-single-info">
                                <ul class="list-inline">
                                    <li><a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">
									<?php
										$get_author_id = get_the_author_meta('ID');
										$get_author_gravatar = get_avatar_url($get_author_id, array('size' => 450));

										if(has_post_thumbnail()){
											the_post_thumbnail();
										} else {
											echo '<img src="'.$get_author_gravatar.'" alt="'.get_the_title().'" />';
										}
										?>
									</a></li>
                                    <li>
										<a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php echo get_the_author_meta('display_name') ?></a>
									</li>
                                    <li class="dot"></li>
                                    <li><?php echo get_the_date(); ?></li>
                                    <li class="dot"></li>
                                    <li><?php echo get_comments_number(); ?> comments</li>
                                </ul>
                            </div>
                        </div>
                  
                        <div class="post-single-body">
                            <p>
								<?php the_content(); ?>
							</p>
                        </div>

                        <div class="post-single-footer">
                            <div class="tags">
								<?php echo get_the_tag_list('<ul class="list-inline"><li>', '</li> <li>' , '</li></ul>') ?>
                            </div>
                            <div class="social-media">
                                <ul class="list-inline">
                                    <li>
                                        <a href="#" class="color-facebook">
                                            <i class="fab fa-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="color-instagram">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="color-twitter">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="color-youtube">
                                            <i class="fab fa-youtube"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="color-pinterest">
                                            <i class="fab fa-pinterest"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>                           
                        </div>
                    </div> <!--/-->

                    <!--next & previous-posts-->
                    <div class="row">
                        <div class="col-md-6">
                        <?php 
                            $next= get_next_post();
                            if(is_a($next, 'WP_Post')):
                        ?>
                            <div class="widget">
                                <div class="widget-next-post">
                                    <div class="small-post">
                                        <div class="image">
                                            <a href="<?php echo get_permalink( $next->ID ); ?>">
											<?php echo get_the_post_thumbnail($next->ID, 'thumbnail'); ?>
                                            </a>                                          
                                        </div>
                                        <div class="content">
                                            <div>
                                                <a class="link" href="<?php echo get_permalink( $next->ID ); ?>"><i class="arrow_left"></i>Preview post</a>
                                            </div>
                                            <a href="<?php echo get_permalink( $next->ID ); ?>"><?php echo apply_filters( 'the_title', $next->post_title ); ?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                        <?php
                            endif;
                            $prev = get_previous_post();
                            if(is_a($prev, 'WP_Post')):	
                        ?>
                            <div class="widget">
                            
                                <div class="widget-previous-post">
                                    <div class="small-post">
                                        
                                            <div class="image">
                                                <a href="<?php echo get_permalink($prev->ID); ?>">
                                                <?php echo get_the_post_thumbnail($prev -> ID , 'thumbnail'); ?>
                                                </a>
                                            </div>
                                            <div class="content">
                                                <div>
                                                    <a class="link" href="<?php echo get_permalink($prev->ID); ?>">
                                                        <span> Next post</span>
                                                        <span class="arrow_right"></span>
                                                    </a>
                                                </div>
                                                <a href="<?php echo get_permalink($prev->ID) ?>"><?php echo apply_filters('the_title', $prev->post_title); ?></a>
                                            </div>
                                       
                                        
                                    </div>
                                </div>
                                
                            </div>
                            <?php
                                endif;
                            ?>
                        </div>
                    </div><!--/-->


                       <!--Leave-comments-->
						<?php 
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;
						?>
                </div>
                <div class="col-lg-4 max-width">
                    <?php get_template_part('sidebar'); ?>
                </div>
            </div>
        </div>
    </section><!--/-->



<?php
get_footer();
