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

<?php
wp_nav_menu(
    array(
        'theme_location' => 'menu-1',
        'menu_id'        => 'primary-menu',
        'container'        => 'ul',
        'menu_class'        => 'navbar-nav ml-auto mr-auto'
    )
);
?>

