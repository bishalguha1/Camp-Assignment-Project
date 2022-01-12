<?php
/**
 * camp assign functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package camp_assign
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'campassign_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function campassign_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on camp assign, use a find and replace
		 * to change 'campassign' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'campassign', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'campassign' ),
			)
		);

		function add_menu_link_class( $atts, $item, $args ) {
			if (property_exists($args, 'link_class')) {
			  $atts['class'] = $args->link_class;
			}
			return $atts;
		  }
		  add_filter( 'nav_menu_link_attributes', 'add_menu_link_class', 1, 3 );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'campassign_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 40,
				'width'       => 135,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}

	
	// function change_logo_class( $html ) {

	// 	if(class_exists('logo-white')){
	// 		$html = str_replace( 'custom-logo', 'logo-dark', $html );
	// 		$html = str_replace( 'custom-logo-link', 'logo-dark', $html );
	// 	}
	
		
	
	// 	return $html;
	// }
	// add_filter( 'get_custom_logo', 'change_logo_class' );


endif;
add_action( 'after_setup_theme', 'campassign_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function campassign_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'campassign_content_width', 640 );
}
add_action( 'after_setup_theme', 'campassign_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function campassign_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'campassign' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'campassign' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'campassign_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function campassign_scripts() {
	wp_enqueue_style( 'campassign-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'campassign-style', 'rtl', 'replace' );

	wp_enqueue_style( 'bootstrap', get_theme_file_uri('assets/css/bootstrap.min.css'), array(), _S_VERSION );
	wp_enqueue_style( 'all-css', get_theme_file_uri('assets/css/all.css'), array(), _S_VERSION );
	wp_enqueue_style( 'font-icon-css', get_theme_file_uri('assets/css/elegant-font-icons.css'), array(), _S_VERSION );
	wp_enqueue_style( 'owl-css', get_theme_file_uri('assets/css/owl.carousel.css'), array(), _S_VERSION );
	wp_enqueue_style( 'custom-css', get_theme_file_uri('assets/css/custom.css'), array(), _S_VERSION );
	wp_enqueue_style( 'main-theme-style', get_theme_file_uri('assets/css/style.css'), array(), _S_VERSION );

	wp_enqueue_script( 'campassign-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'popper-js', get_theme_file_uri('assets/js/popper.min.js'), array('jquery'), _S_VERSION, true );
	wp_enqueue_script( 'bootstrap-js', get_theme_file_uri ('assets/js/bootstrap.min.js'), array('jquery'), _S_VERSION, true );
	wp_enqueue_script( 'contact-ajax', get_theme_file_uri ('assets/js/ajax-contact.js'), array('jquery'), _S_VERSION, true );
	wp_enqueue_script( 'owl-js', get_theme_file_uri ('assets/js/owl.carousel.min.js'), array('jquery'), _S_VERSION, true );
	wp_enqueue_script( 'switch-js', get_theme_file_uri ('assets/js/switch.js'), array('jquery'), _S_VERSION, true );
	wp_enqueue_script( 'main-theme-js', get_theme_file_uri ('assets/js/main.js'), array('jquery'), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'campassign_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Custom comment template
 */
require get_template_directory() . '/inc/custom-comment-list.php';

// Class for nav menu item
// Add class to menu item
function campassign_menu_item_css($classes , $item){
    $classes[] = 'nav-item';
    return $classes;
}

add_filter('nav_menu_css_class' , 'campassign_menu_item_css' , 10 , 2);

// Add classes to menu item anchor
function campassign_menu_anchor_attributes ( $atts, $item, $args ) {
    $atts['class'] = ( ! empty( $item->attr_title ) ) ? $item->attr_title : 'nav-link';
    return $atts;
}
add_filter( 'nav_menu_link_attributes', 'campassign_menu_anchor_attributes', 10, 3 );
