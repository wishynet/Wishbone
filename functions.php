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

    /* Add your nav menus function to the 'init' action hook. */
    add_action( 'init', 'wishbone_register_menus' );

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
	
	/* Load the sites Favicon via wp_head */
	add_action( 'wp_head', 'wishbone_favicon' ); 
	
	/* Adds additional CSS to align links under the dashboard login page */
    add_action( 'login_head', 'wishbone_dash_login_page' );
	
    /* Changes the icon at the top-left corner of the Dashboard */
    add_action( 'admin_head', 'wishbone_custom_dash_logo' );
    
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

	/* Filters the default WordPress gallery shortcode output */
	add_filter( 'post_gallery', 'wishbone_gallery', 10, 2 );
}

function wishbone_register_menus() {	
    /* Register nav menus using register_nav_menu() or register_nav_menus() here. */
    register_nav_menu( 'main_menu', __( 'Main Menu', 'wishbone' ) );
}

function wishbone_register_widget_areas() {	
    /* Register dynamic sidebars using register_sidebar() here. */
    register_sidebar(array(
        'before_title' 	=> '<h3 class="widgettitle">',
        'after_title' 	=> '</h3>'
	));
	
    /* registers the four columns in the semi-footer as widget ready. */
    register_sidebar(array(
		'name' 			=> 'Footer 1',
		'before_widget' => '',
		'after_widget' 	=> '',
		'before_title' 	=> '<h3>',
		'after_title' 	=> '</h3>'
    ));

    register_sidebar(array(
        'name' 			=> 'Footer 2',
        'before_widget' => '',
        'after_widget' 	=> '',
        'before_title' 	=> '<h3>',
        'after_title' 	=> '</h3>'
    ));

    register_sidebar(array(
        'name' 			=> 'Footer 3',
        'before_widget' => '',
        'after_widget' 	=> '',
        'before_title' 	=> '<h3>',
        'after_title' 	=> '</h3>'
    ));
    
    register_sidebar(array(
        'name' 			=> 'Footer 4',
        'before_widget' => '',
        'after_widget' 	=> '',
        'before_title' 	=> '<h3>',
        'after_title' 	=> '</h3>'
    ));
}

function wishbone_favicon() { ?>
	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
	<link rel="apple-touch-icon-precomposed" href="<?php echo get_template_directory_uri(); ?>/images/favicon-152.png">
<?php }


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
	/* Loads 'thickbox' lightbox functionality for WordPress */
	/* please note: these scripts are disabled by default due to thickbox creating invalid markup */
	/*	 
	wp_enqueue_script( 'thickbox' );
	wp_enqueue_script( 'wishbone-thickbox', get_template_directory_uri() . '/javascript/wishbone.thickbox.js', array( 'jquery' ), '', true  ); 
	*/
	
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
    /* WordPress colour picker scripts*/
    /* wp_enqueue_script( 'wishbone-colour-picker-script', get_template_directory_uri() . '/javascript/colour-picker.js', array( 'jquery', 'wp-color-picker' ), false, true ); */
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
	
	/* Loads 'thickbox' lightbox functionality CSS */
	/* wp_enqueue_style( 'thickbox' ); */
	
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

function wishbone_custom_dash_logo() {
    /* Changes the icon at the top-left corner of the Dashboard */
    echo '<style type="text/css">
	#header-logo { background-image: url( ' .get_template_directory_uri() . '/images/dash_icon.jpg ) !important; }
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

include 'customizer.php';




/**
* 
* 6.0 - MEDIA HANDLING
* 
* Notes:
*  
* Adds additional image sizes for custom image size support.
* 
**/

if ( function_exists( 'add_image_size' ) ) {
	/* Adds custom image sizes when importing images */
    add_image_size( 'wishbone-slide', 1260, 350, true ); 
    add_image_size( 'wishbone-gallery', 400, 400, true );
	add_image_size( 'wishbone-gallery-wide', 600, 400, true );
    add_image_size( 'wishbone-post-half', 620, 250, true );
    add_image_size( 'wishbone-post-large', 860, 250, true );
    add_image_size( 'wishbone-post-full', 1260, 350, true );
}

function wishbone_image_sizes( $sizes ) {
	/* Adds custom image sizes to media library settings */
    return array_merge( $sizes, array(
        'wishbone-slide' 		=> __( 'Wishbone - Slide', 'wishbone' ),
        'wishbone-gallery' 		=> __( 'Wishbone - Gallery', 'wishbone' ),
        'wishbone-gallery-wide'	=> __( 'Wishbone - Gallery Wide', 'wishbone' ),
        'wishbone-post-half' 	=> __( 'Wishbone - Post (normal)', 'wishbone' ),
        'wishbone-post-large'	=> __( 'Wishbone - Post (large)', 'wishbone' ),
        'wishbone-post-full' 	=> __( 'Wishbone - Post (full)', 'wishbone' )
    ) );
}

function wishbone_gallery( $output, $attr ) {
	/* Filters the default gallery shortcode output */

	/* Initialize */
	global $post, $wp_locale;

	/* Gallery instance counter */
	static $instance = 0;
	$instance++;

	/* Validate the author's orderby attribute */
	if ( isset( $attr['orderby'] ) ) {
		$attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
		if ( ! $attr['orderby'] ) unset( $attr['orderby'] );
	}
	
	/* Set the 'size' attribute depending on the number of columns in the gallery */
	if  ( $attr['columns'] == 1 ) {
		$attr['size'] = 'full';
	}
	
	if  ( $attr['columns'] == 2 ) {
		$attr['size'] = 'wishbone-gallery-wide';
	}
	
	/* Get attributes from shortcode */
	extract( shortcode_atts( array(
		'order'      => 'ASC',
		'orderby'    => 'menu_order ID',
		'id'         => $post->ID,
		'itemtag'    => 'dl',
		'icontag'    => 'dt',
		'captiontag' => 'dd',
		'columns'    => 3,
		'size'       => 'wishbone-gallery',
		'include'    => '',
		'exclude'    => ''
	), $attr ) );

	/* Initialize */
	$id = intval( $id );
	$attachments = array();
	if ( $order == 'RAND' ) $orderby = 'none';

	if ( ! empty( $include ) ) {

		/* Include attribute is present */
		$include = preg_replace( '/[^0-9,]+/', '', $include );
		$_attachments = get_posts( array( 'include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby ) );

		/* Setup attachments array */
		foreach ( $_attachments as $key => $val ) {
			$attachments[ $val->ID ] = $_attachments[ $key ];
		}

	} else if ( ! empty( $exclude ) ) {

		/* Exclude attribute is present */
		$exclude = preg_replace( '/[^0-9,]+/', '', $exclude );

		/* Setup attachments array */
		$attachments = get_children( array( 'post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby ) );
	} else {
		/* Setup attachments array */
		$attachments = get_children( array( 'post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby ) );
	}

	if ( empty( $attachments ) ) return '';

	/* Filter gallery differently for feeds */
	if ( is_feed() ) {
		$output = "\n";
		foreach ( $attachments as $att_id => $attachment ) $output .= wp_get_attachment_link( $att_id, $size, true ) . "\n";
		return $output;
	}

	/* Filter tags and attributes */
	$itemtag = tag_escape( $itemtag );
	$captiontag = tag_escape( $captiontag );
	$columns = intval( $columns );
	$itemwidth = $columns > 0 ? floor( 100 / $columns ) : 100;
	$float = is_rtl() ? 'right' : 'left';
	$selector = "gallery-{$instance}";

	/* Filter gallery CSS */
	$gallery_style = $gallery_div = '';
	if ( apply_filters( 'use_default_gallery_style', true ) )
		$gallery_style = "
		<style type='text/css'>
			#{$selector} {
				margin: auto;
			}
			#{$selector} .gallery-item {
				float: {$float};
				margin-top: 10px;
				text-align: center;
				width: {$itemwidth}%;
			}
			#{$selector} img {
				border: 2px solid #cfcfcf;
			}
			#{$selector} .gallery-caption {
				margin-left: 0;
			}
			/* see gallery_shortcode() in wp-includes/media.php */
		</style>";
	$size_class = sanitize_html_class( $size );
	$gallery_div = "<div id='$selector' class='gallery galleryid-{$id} gallery-columns-{$columns} gallery-size-{$size_class}'>";
	$output = apply_filters( 'gallery_style', $gallery_style . "\n\t\t" . $gallery_div );

	/* Iterate through the attachments in this gallery instance */
	$i = 0;
	foreach ( $attachments as $id => $attachment ) {

		/* Attachment link */
		$link = isset( $attr['link'] ) && 'file' == $attr['link'] ? wp_get_attachment_link( $id, $size, false, false ) : wp_get_attachment_link( $id, $size, true, false ); 

		/* Start itemtag */
		$output .= "<{$itemtag} class='gallery-item'>";

		/* icontag */
		$output .= "
		<{$icontag} class='gallery-icon'>
			$link
		</{$icontag}>";

		if ( $captiontag && trim( $attachment->post_excerpt ) ) {

			/* captiontag */
			$output .= "
			<{$captiontag} class='gallery-caption'>
				" . wptexturize($attachment->post_excerpt) . "
			</{$captiontag}>";

		}

		/* End itemtag */
		$output .= "</{$itemtag}>";

		/* Line breaks by columns set */
		if($columns > 0 && ++$i % $columns == 0) $output .= '<br style="clear: both">';

	}

	/* End gallery output */
	$output .= "
		<br style='clear: both;'>
	</div>\n";

	return $output;

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