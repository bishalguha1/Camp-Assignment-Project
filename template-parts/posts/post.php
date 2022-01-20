<?php
/**
 * The post is for standard post
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package camp_assign
 */

?>

<div class="card">
    <div class="post-card">
    <div class="post-card-image">
        <a href="<?php the_permalink(); ?>">
            <?php 
                if(has_post_thumbnail()){
                    the_post_thumbnail('full' , null);
                }
            ?>
        </a>
    </div>
    <div class="post-card-content">
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
        <h5><a href="<?php the_permalink(); ?>">
            <?php 
                the_title();
            ?>
        </a> </h5>
        <p>
            <?php 
                echo wp_trim_words( get_the_content(), 20, 0 );

            ?>
        </p>
        <div class="post-card-info">
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
                <li>
                    <?php 
                        $campassign_post_formats = get_post_format();
                        if($campassign_post_formats == 'audio'){
                            echo '<span class="dashicons dashicons-format-audio"></span>';
                        }else if($campassign_post_formats == 'video'){
                            echo '<span class="dashicons dashicons-format-video"></span>';
                        }
                    ?>
                </li>
                <li class="dot"></li>
                <li><?php echo get_the_date(); ?></li>
            </ul>
        </div>
    </div>
    </div><!--/-->
</div>