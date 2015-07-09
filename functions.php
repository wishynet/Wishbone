<?php


/**
*
*
* WISHBONE FUNCTIONS
*
* This file enables, extends or modifies functionality of WordPress and the Wishbone theme.
*
* Contents:
*
* 1.0 - HOOKS (ACTIONS + FILTERS) AND OTHER SETUPS
* 2.0 - SCRIPT ENQUEUING
* 3.0 - STYLE ENQUEUING
* 4.0 - WORDPRESS UI CUSTOMIZATIONS
* 5.0 - OPTIONS MENUS
* 6.0 - MEDIA HANDLING
* 7.0 - OTHER
*
* Notes:
*
* This file's structure is based on work by Justin Tadlock, read here for more information:
* http://justintadlock.com/archives/2010/12/30/wordpress-theme-function-files
*
*
**/


add_action( 'after_setup_theme', 'wishbone_theme_setup' );


/**
*
* 1.0 - HOOKS (ACTIONS + FILTERS) AND OTHER SETUPS
*
**/

function wishbone_theme_setup() {

    global $content_width;

    /* Set the $content_width for things such as video embeds. */
    if ( !isset( $content_width ) )
	$content_width = 600;

	/* Add theme support for custom headers. */
    add_theme_support( 'custom-header' );

	/* Add theme support for custom backgrounds. */
    add_theme_support( 'custom-background' );

	/* Add theme support for title tags */
	add_theme_support( 'title-tag' );

    /* Add theme support for automatic feed links. */
    add_theme_support( 'automatic-feed-links' );

    /* Add theme support for post thumbnails (featured images). */
    add_theme_support( 'post-thumbnails' );

	/* Add theme support for Wordpress post formats */
	add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' ) );

	/* Load theme text domain for language translations */
	load_theme_textdomain( 'wishbone', get_template_directory() . '/languages' );

	/* Add a stylesheet for the TinyMCE editor */
	add_editor_style( 'style-tinymce.css' );

	/* ACTIONS */

    /* Add your sidebars function to the 'widgets_init' action hook. */
    add_action( 'widgets_init', 'wishbone_register_widget_areas' );

    /* Load Script files on the 'wp_enqueue_scripts' action hook. */
    add_action( 'wp_enqueue_scripts', 'wishbone_load_frontend_scripts' );

    /* Load CSS files on the 'wp_enqueue_styles' action hook. */
    add_action( 'wp_enqueue_scripts', 'wishbone_load_frontend_styles' );

    /* Load Script files on the 'admin_enqueue_scripts' action hook. */
    add_action( 'admin_enqueue_scripts', 'wishbone_load_backend_scripts' );

    /* Load CSS files on the 'admin_enqueue_styles' action hook. */
    add_action( 'admin_enqueue_scripts', 'wishbone_load_backend_styles' );

	/* Adds additional CSS to align links under the dashboard login page */
    add_action( 'login_head', 'wishbone_dash_login_page' );

    /* FILTERS */

    /* Adds home page link to the Menus admin page */
    add_filter( 'wp_page_menu_args' , 'wishbone_home_page_link' );

	/* Adds a CSS class to next post links */
	add_filter( 'next_post_link', 'wishbone_nav_post_class' );

	/* Adds a CSS class to previous post links */
	add_filter( 'previous_post_link', 'wishbone_nav_post_class' );

	/* Adds custom image sizes to media library settings */
	add_filter( 'image_size_names_choose', 'wishbone_image_sizes' );

    /* Removes the default WordPress gallery styles */
    add_filter( 'use_default_gallery_style' , '__return_false' );

	/* Filters the default WordPress gallery shortcode attributes */
	add_filter( 'shortcode_atts_gallery', 'wishbone_gallery' );

	/* MENUS */

	register_nav_menus(	array(
			'mobile_menu' 	=> 'Mobile Menu',
			'desktop_menu'	=> 'Desktop Menu'
	) );

	/* IMAGE SIZES */

	/* Adds custom image sizes when importing images */
    add_image_size( 'wishbone-slide', 1260, 350, true );
    add_image_size( 'wishbone-gallery', 400, 400, true );
	  add_image_size( 'wishbone-gallery-wide', 600, 400, true );
    add_image_size( 'wishbone-post-half', 620, 250, true );
    add_image_size( 'wishbone-post-large', 860, 250, true );
    add_image_size( 'wishbone-post-full', 1260, 350, true );
}

function wishbone_register_widget_areas() {
    /* Register dynamic sidebars using register_sidebar() here. */
    register_sidebar( array(
        'before_title' 	=> '<h3 class="widgettitle">',
        'after_title' 	=> '</h3>'
	) );

	/* Registers a widget area in the comments area next to post comments */
	register_sidebar( array(
		'name' 			=> __( 'Comments Widget', 'wishbone' ),
		'id'			=> 'comments-widget',
		'before_widget' => '',
		'after_widget' 	=> '',
		'before_title' 	=> '<h2>',
		'after_title' 	=> '</h2>'
    ) );

    /* Registers the four columns in the semi-footer as widget ready. */
    register_sidebar( array(
		'name' 			=> __( 'Footer Widget 1', 'wishbone' ),
		'id'			=> 'footer-widget1',
		'before_widget' => '',
		'after_widget' 	=> '',
		'before_title' 	=> '<h3>',
		'after_title' 	=> '</h3>'
    ) );

    register_sidebar( array(
        'name' 			=> __( 'Footer Widget 2', 'wishbone' ),
        'id'			=> 'footer-widget2',
        'before_widget' => '',
        'after_widget' 	=> '',
        'before_title' 	=> '<h3>',
        'after_title' 	=> '</h3>'
    ) );

    register_sidebar( array(
        'name' 			=> __( 'Footer Widget 3', 'wishbone' ),
        'id'			=> 'footer-widget3',
        'before_widget' => '',
        'after_widget' 	=> '',
        'before_title' 	=> '<h3>',
        'after_title' 	=> '</h3>'
    ) );

    register_sidebar( array(
        'name' 			=> __( 'Footer Widget 4', 'wishbone' ),
        'id'			=> 'footer-widget4',
        'before_widget' => '',
        'after_widget' 	=> '',
        'before_title' 	=> '<h3>',
        'after_title' 	=> '</h3>'
    ) );
}




/**
*
* 2.0 - SCRIPT ENQUEUING
*
*
* Notes:
*
* Enqueue any external scripts here.
* Both front-end and back-end scripts are loaded by separate functions in this section.
*
**/

function wishbone_load_frontend_scripts() {
	/* Loads 'colorbox' lightbox functionality for WordPress */
	wp_enqueue_script( 'colorbox', get_template_directory_uri() . '/javascript/jquery.colorbox.js', array( 'jquery' ), '', true  );
	wp_enqueue_script( 'wishbone-colorbox', get_template_directory_uri() . '/javascript/wishbone.colorbox.js', array( 'jquery' ), '', true  );

    /* Load the Comment Reply JavaScript. */
    if ( is_singular() && get_option( 'thread_comments' ) && comments_open() )
    wp_enqueue_script( 'comment-reply' );

	/* Loads the 'Back-To-Top' button script */
    wp_enqueue_script( 'wishbone-backtotop', get_template_directory_uri() . '/javascript/wishbone.backtotop.js', array( 'jquery' ), '', true );
}

function wishbone_load_backend_scripts() {
    /* Backend scripts should be enqueued here */
}




/**
*
* 3.0 - STYLE ENQUEUING
*
* Notes:
*
* Enqueue any external CSS stylesheets here.
* Both front-end and back-end styles are loaded by separate functions in this section.
*
**/

function wishbone_load_frontend_styles() {
	/* Loads the style.css file */
	wp_enqueue_style( 'styles', get_template_directory_uri() . '/style.css' );

	/* Loads 'colorbox' lightbox functionality CSS */
	wp_enqueue_style( 'colorbox', get_template_directory_uri() . '/stylesheets/modules/colorbox.css', false, '1.0', 'all' );
}

function wishbone_load_backend_styles() {
    /* Adds styling for the WordPress colour picker */
    wp_enqueue_style( 'wp-color-picker' );
}




/**
*
* 4.0 - WORDPRESS UI CUSTOMIZATIONS
*
* Notes:
*
* Modifies default WordPress back-end elements to match theme branding etc.
*
**/

function wishbone_dash_login_page() {
	/* Adds additional CSS to align links under the dashboard login page */
	echo '<style type="text/css">
	.login #nav,
	.login #backtoblog
	{
		text-align: center;
	}
	.login #nav a,
	.login #backtoblog a
	{
		color: #999999 !important;
	}
    </style>';
}

function wishbone_home_page_link( $args ) {
    /* Adds home page link to the Menus admin page */
    $args['show_home']=true;
    return $args;
}




/**
*
* 5.0 - OPTIONS MENUS
*
* Notes:
*
* Loads additional functions for handling either the WordPress Customizer or Theme Options Page.
*
**/

require_once get_template_directory() . '/customizer.php';




/**
*
* 6.0 - MEDIA HANDLING
*
* Notes:
*
* Adds additional image sizes for custom image size support.
*
**/

function wishbone_image_sizes( $sizes ) {
	/* Adds custom image sizes to media library settings */
    return array_merge( $sizes, array(
        'wishbone-slide' 				=> __( 'Wishbone - Slide', 'wishbone' ),
        'wishbone-gallery' 			=> __( 'Wishbone - Gallery', 'wishbone' ),
        'wishbone-gallery-wide'	=> __( 'Wishbone - Gallery Wide', 'wishbone' ),
        'wishbone-post-half' 		=> __( 'Wishbone - Post (normal)', 'wishbone' ),
        'wishbone-post-large'		=> __( 'Wishbone - Post (large)', 'wishbone' ),
        'wishbone-post-full' 		=> __( 'Wishbone - Post (full)', 'wishbone' )
    ) );
}

function wishbone_gallery( $attr ) {
        /* Set initial gallery thumbnail size */
        $attr['size'] = 'wishbone-gallery';

        /* set 'thumbnail size' if smaller than 3 columns */
        if  ( $attr['columns'] == 1 ) {
                $attr['size'] = 'full';
        }

        if  ( $attr['columns'] == 2 ) {
                $attr['size'] = 'wishbone-gallery-wide';
        }

        return $attr;
}


/**
*
* 7.0 - OTHER
*
* Notes:
*
* Loads any additional miscellaneous functions.
*
**/

function wishbone_nav_post_class( $output ) {
	/* Adds a 'button' CSS class to next and prev post links */
	$nav_link_class = 'class="button"';
	return str_replace( '<a href=', '<a '. $nav_link_class .' href=', $output );
}


/* END OF FILE */


?>
