<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package camp_assign
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!--loading -->
<!-- <div class="loading">
	<div class="circle"></div>
</div> -->







    
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container-fluid">
            <!--logo-->
            <div class="logo">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <?php the_custom_logo(); ?>
                </a>
            </div>
            <!--/-->
    
            <!--navbar-collapse-->
            <div class="collapse navbar-collapse" id="main_nav">
                <?php 
                    get_template_part("template-parts/nav");
                ?>
            </div>
            <!--/-->
    
            <!--navbar-right-->
            <div class="navbar-right ml-auto">
                <div class="theme-switch-wrapper">
                    <label class="theme-switch" for="checkbox">
                        <input type="checkbox" id="checkbox" />
                        <div class="slider round"></div>
                    </label>
                </div>
                
                <div class="social-icones">
                    <ul class="list-inline">
                        <li>
                            <a href="#">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fab fa-youtube"></i>
                            </a>
                        </li>
                    </ul>
                </div>
    
                <div class="search-icon">
                    <i class="icon_search"></i>
                </div>
    
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </div>
    </nav>
    <!--/-->