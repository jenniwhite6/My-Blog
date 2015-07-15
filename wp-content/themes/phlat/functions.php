<?php 

function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

function phlat_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on phlat, use a find and replace
	 * to change 'phlat' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'phlat', get_template_directory() . '/languages' );

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
	 * See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 100, 0, true );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu','phlat' ),
		'secondary' => __('Secondary Menu', 'phlat')
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
	) );
}

add_action( 'after_setup_theme', 'phlat_setup' );

/**
 * Register widget area.
 *
 * @since Phlat 1.0
 *
 * @link https://codex.wordpress.org/Function_Reference/register_sidebar
 */
function phlat_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Widget Area', 'phlat' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'phlat' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'phlat_widgets_init' );

/**
 * Enqueue scripts and styles.
 *
 * @since Twenty Fifteen 1.0
 */
function phlat_scripts() {

	wp_enqueue_style('phlat-normalize', get_template_directory_uri() . '/css/normalize.css', array(), null);

	wp_enqueue_style('phlat-roboto', 'http://fonts.googleapis.com/css?family=Roboto+Slab:400,700,300', array(), null); 

	wp_enqueue_style('phlat-grid', get_template_directory_uri() . '/css/grid.css', array(), null);

	wp_enqueue_style('phlat-stylesheet', get_template_directory_uri() . '/style.css', array(), null);

	// wp_enqueue_script( '', array(), '20141010', true );



	// // Add Genericons, used in the main stylesheet.
	// wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.2' );

	// // Load our main stylesheet.
	// wp_enqueue_style( 'phlat-style', get_stylesheet_uri() );

	// // Load the Internet Explorer specific stylesheet.
	// wp_enqueue_style( 'phlat-ie', get_template_directory_uri() . '/css/ie.css', array( 'phlat-style' ), '20141010' );
	// wp_style_add_data( 'phlat-ie', 'conditional', 'lt IE 9' );

	// // Load the Internet Explorer 7 specific stylesheet.
	// wp_enqueue_style( 'phlat-ie7', get_template_directory_uri() . '/css/ie7.css', array( 'phlat-style' ), '20141010' );
	// wp_style_add_data( 'phlat-ie7', 'conditional', 'lt IE 8' );

	

	// if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	// 	wp_enqueue_script( 'comment-reply' );
	// }

	// if ( is_singular() && wp_attachment_is_image() ) {
	// 	wp_enqueue_script( 'phlat-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20141010' );
	// }

	// wp_enqueue_script( 'phlat-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20150330', true );
	// wp_localize_script( 'phlat-script', 'screenReaderText', array(
	// 	'expand'   => '<span class="screen-reader-text">' . __( 'expand child menu', 'phlat' ) . '</span>',
	// 	'collapse' => '<span class="screen-reader-text">' . __( 'collapse child menu', 'phlat' ) . '</span>',
	// ) );
}

add_action( 'wp_enqueue_scripts', 'phlat_scripts' );


/**
 * Display descriptions in main navigation.
 *
 * @since Twenty Fifteen 1.0
 *
 * @param string  $item_output The menu item output.
 * @param WP_Post $item        Menu item object.
 * @param int     $depth       Depth of the menu.
 * @param array   $args        wp_nav_menu() arguments.
 * @return string Menu item with possible description.
 */
function phlat_nav_description( $item_output, $item, $depth, $args ) {
	if ( 'primary' == $args->theme_location && $item->description ) {
		$item_output = str_replace( $args->link_after . '</a>', '<div class="menu-item-description">' . $item->description . '</div>' . $args->link_after . '</a>', $item_output );
	}

	return $item_output;
}

add_filter( 'walker_nav_menu_start_el', 'phlat_nav_description', 10, 4 );

/**
 * Add a `screen-reader-text` class to the search form's submit button.
 *
 * @since Twenty Fifteen 1.0
 *
 * @param string $html Search form HTML.
 * @return string Modified search form HTML.
 */
function phlat_search_form_modify( $html ) {
	return str_replace( 'class="search-submit"', 'class="search-submit screen-reader-text"', $html );
}
add_filter( 'get_search_form', 'phlat_search_form_modify' );

?>

