<?php


/**
*
*
* WISHBONE OPTIONS CUSTOMIZER
* 
* This file creates an additional menu system for managing Wishbone theme options.
*
* This menu system uses the WordPress Customizer system.
* 
* Contents:
* 
* 1.0 - HOOKS (ACTIONS + FILTERS) AND MENU
* 2.0 - PANELS
* 3.0 - SECTIONS
* 4.0 - SETTINGS
* 5.0 - SANITIZATION
* 6.0 - CONTROLS
* 7.0 - CSS  
*
*
**/




/**
* 
* 1.0 - HOOKS (ACTIONS + FILTERS) AND MENU
*  
**/

/* Adds the menu using the admin_menu hook */
add_action( 'admin_menu', 'wishbone_options_menus' );

/* Registers the option panels */
add_action( 'customize_register', 'wishbone_options_panels' );

/* Registers the option sections */
add_action( 'customize_register', 'wishbone_options_sections' );

/* Registers the option settings */
add_action( 'customize_register', 'wishbone_options_settings' );

/* Registers the option controls */
add_action( 'customize_register', 'wishbone_options_controls' );

/* Displays the Customizer menu on the main WordPress Dashboard */
function wishbone_options_menus() {
	add_theme_page( 'Wishbone Theme Options', 'Wishbone Theme', 'edit_theme_options', 'customize.php' );
}
    



/**
* 
* 2.0 - PANELS 
* 
**/

function wishbone_options_panels( $wp_customize ) {
	$wp_customize->add_panel(    
        'wishbone_colors_panel',
        array(
            'title'         => 'Site Colors',
            'priority'      => 32,
            'description'   => 'Change the colors of your site'
        )
    );
}




/**
* 
* 3.0 - SECTIONS
* 
**/

function wishbone_options_sections( $wp_customize ) {
    
    $wp_customize->add_section(    
        'wishbone_logo_section',
        array(
            'title'         => 'Site Logo',
            'priority'      => 30,
            'description'   => 'Choose your site logo'
        )
    );
	
	$wp_customize->add_section(    
        'wishbone_fonts_section',
        array(
            'title'         => 'Site Fonts',
            'priority'      => 31,
            'description'   => 'Choose your site fonts'
        )
    );
	
	$wp_customize->add_section(    
        'wishbone_colors_theme_section',
        array(
            'title'         => 'Colors: Theme',
            'priority'      => 40,
            'description'   => 'Choose your site theme colors',
            'panel'			=> 'wishbone_colors_panel'
        )
    );
    
    $wp_customize->add_section(    
        'wishbone_colors_bg_section',
        array(
            'title'         => 'Colors: Backgrounds',
            'priority'      => 41,
            'description'   => 'Customize the background colors',
            'panel'			=> 'wishbone_colors_panel'
        )
    );
	
	$wp_customize->add_section(    
        'wishbone_colors_text_section',
        array(
            'title'         => 'Colors: Text',
            'priority'      => 42,
            'description'   => 'Customize the text colors',
            'panel'			=> 'wishbone_colors_panel'
        )
    );
	
	$wp_customize->add_section(    
        'wishbone_colors_nav_section',
        array(
            'title'         => 'Colors: Navigation',
            'priority'      => 43,
            'description'   => 'Customize the Navigation Bar colors',
            'panel'			=> 'wishbone_colors_panel'
        )
    );
   
    $wp_customize->add_section(    
        'wishbone_page_section',
        array(
            'title'         => 'Site Components',
            'priority'      => 33,
            'description'   => 'Choose which page components to display'
        )
    );
    
    $wp_customize->add_section(    
        'wishbone_header_section',
        array(
            'title'         => 'Header',
            'priority'      => 34,
            'description'   => 'Modify header options'
        )
    );
	
	$wp_customize->add_section(    
        'wishbone_navigation_section',
        array(
            'title'         => 'Navigation',
            'priority'      => 35,
            'description'   => 'Modify navigation options'
        )
    );
	
    $wp_customize->add_section(    
        'wishbone_showcase_section',
        array(
            'title'         => 'Showcase',
            'priority'      => 36,
            'description'   => 'Modify showcase options'
        )
    );
    
    $wp_customize->add_section(    
        'wishbone_blog_section',
        array(
            'title'         => 'Blog',
            'priority'      => 37,
            'description'   => 'Modify blog options'
        )
    );

	$wp_customize->add_section(    
        'wishbone_footer_section',
        array(
            'title'         => 'Footer',
            'priority'      => 38,
            'description'   => 'Modify footer options'
        )
    );

    /* Hides some of the default sections */
    
    $wp_customize->remove_section( 'colors' );
	$wp_customize->remove_section( 'header_image' );
    $wp_customize->remove_section( 'background_image' );
	$wp_customize->remove_section( 'nav' );
	$wp_customize->remove_section( 'static_front_page' );
}


 

/**
* 
* 4.0 - SETTINGS 
* 
**/

function wishbone_options_settings( $wp_customize ) {
    
    /* logo settings */
    
    $wp_customize->add_setting(
        'wishbone_logo_setting',
        array(
            'default'       	=> '',
            'type'          	=> 'theme_mod',
            'capability'    	=> 'edit_theme_options',
            'transport'     	=> '',
            'sanitize_callback'	=> 'esc_url_raw'
        )
    );
	
	/* font settings */
    
    $wp_customize->add_setting(
		'wishbone_font_header_setting',
		array(
			'default'			=> '',
			'type'          	=> 'theme_mod',
            'capability'    	=> 'edit_theme_options',
            'transport'     	=> '',
            'sanitize_callback'	=> 'wishbone_sanitize_font_header_setting'
		)	
	);
	
	$wp_customize->add_setting(
		'wishbone_font_content_setting',
		array(
			'default'			=> '',
			'type'          	=> 'theme_mod',
            'capability'    	=> 'edit_theme_options',
            'transport'     	=> '',
            'sanitize_callback'	=> 'wishbone_sanitize_font_content_setting'
		)	
	);

    /* color settings */
	
	$wp_customize->add_setting(
        'wishbone_theme_color_setting',
        array(
            'default'       	=> '#444444',
            'type'          	=> 'theme_mod',
            'capability'    	=> 'edit_theme_options',
            'transport'     	=> '',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );
	
	$wp_customize->add_setting(
        'wishbone_theme_sub_color_setting',
        array(
            'default'       	=> '#eeeeee',
            'type'          	=> 'theme_mod',
            'capability'    	=> 'edit_theme_options',
            'transport'     	=> '',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );
    
    $wp_customize->add_setting(
        'wishbone_header_background_color_setting',
        array(
            'default'       	=> '#eeeeee',
            'type'          	=> 'theme_mod',
            'capability'    	=> 'edit_theme_options',
            'transport'     	=> '',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );
	
	$wp_customize->add_setting(
        'wishbone_nav_background_color_setting',
        array(
            'default'       	=> '#ffffff',
            'type'          	=> 'theme_mod',
            'capability'    	=> 'edit_theme_options',
            'transport'     	=> '',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );
	
	$wp_customize->add_setting(
        'wishbone_content_background_color_setting',
        array(
            'default'       	=> '#ffffff',
            'type'          	=> 'theme_mod',
            'capability'    	=> 'edit_theme_options',
            'transport'     	=> '',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );
    
    $wp_customize->add_setting(
        'wishbone_semifooter_background_color_setting',
        array(
            'default'       	=> '#eeeeee',
            'type'          	=> 'theme_mod',
            'capability'    	=> 'edit_theme_options',
            'transport'     	=> '',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );
    
    $wp_customize->add_setting(
        'wishbone_footer_background_color_setting',
        array(
            'default'       	=> '#cccccc',
            'type'          	=> 'theme_mod',
            'capability'    	=> 'edit_theme_options',
            'transport'     	=> '',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );
    
    $wp_customize->add_setting(
        'wishbone_heading_text_color_setting',
        array(
            'default'       	=> '#444444',
            'type'          	=> 'theme_mod',
            'capability'    	=> 'edit_theme_options',
            'transport'     	=> '',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );
    
    $wp_customize->add_setting(
        'wishbone_content_text_color_setting',
        array(
            'default'       	=> '#444444',
            'type'          	=> 'theme_mod',
            'capability'    	=> 'edit_theme_options',
            'transport'     	=> '',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );
		   
    /* page settings */
    
    $wp_customize->add_setting(
        'wishbone_toggle_header_setting',
        array(
            'default'       	=> 'true',
            'type'          	=> 'theme_mod',
            'capability'    	=> 'edit_theme_options',
            'transport'     	=> '',
            'sanitize_callback' => 'wishbone_sanitize_checkbox'
        )
    );
    
    $wp_customize->add_setting(
        'wishbone_toggle_navmenu_setting',
        array(
            'default'       	=> 'true',
            'type'          	=> 'theme_mod',
            'capability'    	=> 'edit_theme_options',
            'transport'     	=> '',
            'sanitize_callback' => 'wishbone_sanitize_checkbox'
        )
    );
    
    $wp_customize->add_setting(
        'wishbone_toggle_showcase_setting',
        array(
            'default'       	=> 'true',
            'type'          	=> 'theme_mod',
            'capability'    	=> 'edit_theme_options',
            'transport'     	=> '',
            'sanitize_callback' => 'wishbone_sanitize_checkbox'
        )
    );

    $wp_customize->add_setting(
        'wishbone_toggle_semifooter_setting',
        array(
            'default'       	=> 'true',
            'type'          	=> 'theme_mod',
            'capability'    	=> 'edit_theme_options',
            'transport'     	=> '',
            'sanitize_callback' => 'wishbone_sanitize_checkbox'
        )
    );
    
	/* header settings */
    
    $wp_customize->add_setting(
        'wishbone_header_toggle_logo_setting',
        array(
            'default'       	=> 'true',
            'type'          	=> 'theme_mod',
            'capability'    	=> 'edit_theme_options',
            'transport'     	=> '',
            'sanitize_callback' => 'wishbone_sanitize_checkbox'
        )
    );
	
	$wp_customize->add_setting(
        'wishbone_toggle_title_tagline_setting',
        array(
            'default'       	=> 'true',
            'type'          	=> 'theme_mod',
            'capability'    	=> 'edit_theme_options',
            'transport'     	=> '',
            'sanitize_callback' => 'wishbone_sanitize_checkbox'
        )
    );
	
    $wp_customize->add_setting(
        'wishbone_header_toggle_login_setting',
        array(
            'default'       	=> 'true',
            'type'          	=> 'theme_mod',
            'capability'    	=> 'edit_theme_options',
            'transport'     	=> '',
            'sanitize_callback' => 'wishbone_sanitize_checkbox'
        )
    );
	
	$wp_customize->add_setting(
        'wishbone_header_bg_image_setting',
        array(
            'default'       	=> '',
            'type'          	=> 'theme_mod',
            'capability'    	=> 'edit_theme_options',
            'transport'     	=> '',
            'sanitize_callback'	=> 'esc_url_raw'
        )
    );
	
	/* navigation settings */
    
    $wp_customize->add_setting(
        'wishbone_navigation_border_setting',
        array(
            'default'       	=> 'top',
            'type'          	=> 'theme_mod',
            'capability'    	=> 'edit_theme_options',
            'transport'     	=> '',
            'sanitize_callback'	=> 'wishbone_sanitize_navigation_border_setting'
        )
    );
	
    /* showcase settings */
    
    $wp_customize->add_setting(
        'wishbone_showcase_type_setting',
        array(
            'default'       	=> 'static',
            'type'          	=> 'theme_mod',
            'capability'    	=> 'edit_theme_options',
            'transport'     	=> '',
            'sanitize_callback'	=> 'wishbone_sanitize_showcase_type_setting'
        )
    );
    
    $wp_customize->add_setting(
        'wishbone_showcase_img_setting',
        array(
            'default'       	=> '',
            'type'          	=> 'theme_mod',
            'capability'    	=> 'edit_theme_options',
            'transport'     	=> '',
            'sanitize_callback'	=> 'esc_url_raw'
        )
    );
	
	$wp_customize->add_setting(
        'wishbone_showcase_bg_color_setting',
        array(
            'default'       	=> '#444444',
            'type'          	=> 'theme_mod',
            'capability'    	=> 'edit_theme_options',
            'transport'     	=> '',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );
    
    $wp_customize->add_setting(
        'wishbone_showcase_heading_setting',
        array(
            'default'       	=> 'Welcome To WishBone',
            'type'          	=> 'theme_mod',
            'capability'    	=> 'edit_theme_options',
            'transport'     	=> '',
            'sanitize_callback' => 'wishbone_sanitize_text'
        )
    );
    
    $wp_customize->add_setting(
        'wishbone_showcase_slogan_setting',
        array(
            'default'       	=> 'A slideshow, carousel or slogan will go here.',
            'type'          	=> 'theme_mod',
            'capability'    	=> 'edit_theme_options',
            'transport'     	=> '',
            'sanitize_callback' => 'wishbone_sanitize_text'
        )
    );
    
    /* blog settings */
    
    $wp_customize->add_setting(
        'wishbone_blog_layout_setting',
        array(
            'default'       	=> '',
            'type'          	=> 'theme_mod',
            'capability'    	=> 'edit_theme_options',
            'transport'     	=> '',
            'sanitize_callback'	=> 'wishbone_sanitize_blog_layout_setting'
        )
    );
	
	/* footer settings */
	
	$wp_customize->add_setting(
        'wishbone_footer_copyrights_setting',
        array(
            'default'       	=> 'Copyrights etc. go here. Wishbone theme development by Wishynet. All Rights Reserved.',
            'type'          	=> 'theme_mod',
            'capability'    	=> 'edit_theme_options',
            'transport'     	=> '',
            'sanitize_callback' => 'wishbone_sanitize_text'
        )
    );
}




/**
* 
* 5.0 - SANITIZATION
* 
**/

function wishbone_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}

function wishbone_sanitize_checkbox( $input ) {
    if ( $input == 1 ) {
        return 1;
    } else {
        return '';
    }
}

function wishbone_sanitize_font_header_setting( $input ) {
	$valid = array(
		''				=> '',
		'abril'			=> 'Abril Fatface',
		'arvo'			=> 'Arvo',				
		'helvetica'		=> 'Helvetica',
		'josefin'		=> 'Josefin Slab',
		'lato'			=> 'Lato',
		'lobster'		=> 'Lobster',
		'oldstandard'	=> 'Old Standard TT',
		'opensans'		=> 'Open Sans',				
		'ubuntu'		=> 'Ubuntu',				
		'volkhov'		=> 'Volkhov'
	);
	
	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	} else {
		return '';
	}
}

function wishbone_sanitize_font_content_setting( $input ) {
	$valid = array(
		''				=> '',
		'abril'			=> 'Abril Fatface',
		'arvo'			=> 'Arvo',				
		'helvetica'		=> 'Helvetica',
		'josefin'		=> 'Josefin Slab',
		'lato'			=> 'Lato',
		'lobster'		=> 'Lobster',
		'oldstandard'	=> 'Old Standard TT',
		'opensans'		=> 'Open Sans',				
		'ubuntu'		=> 'Ubuntu',				
		'volkhov'		=> 'Volkhov'
	);
	
	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	} else {
		return '';
	}
}

function wishbone_sanitize_navigation_border_setting( $input ) {
	$valid = array(
		'top'       => 'Border Top',
        'bottom'    => 'Border Bottom',
        'none'		=> 'No Border'
	);
	
	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	} else {
		return '';
	}
}

function wishbone_sanitize_showcase_type_setting( $input ) {
	$valid = array(
		'static'	=> 'Static Background',
        'slider'    => 'Slider'
	);
	
	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	} else {
		return '';
	}
}

function wishbone_sanitize_blog_layout_setting( $input ) {
	$valid = array(
		'blog_sidebar_right'	=> 'Blog with Right-hand Sidebar',
        'blog_sidebar_left'     => 'Blog with Left-hand Sidebar',
        'blog_sidebar_none'     => 'Blog with no Sidebar'
	);
	
	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	} else {
		return '';
	}
}




/**
* 
* 6.0 - CONTROLS
* 
**/

function wishbone_options_controls( $wp_customize ) {
    
    /* logo controls */
    
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'wishbone_logo_control',
            array(
                'label'         => 'Site Logo',
                'section'       => 'wishbone_logo_section',
                'settings'      => 'wishbone_logo_setting'
            )
        )
    );
	
	/* font controls */
    
    $wp_customize->add_control(
		'wishbone_font_header_control',
		array(
			'label'         => 'Header Font',
			'section'       => 'wishbone_fonts_section',
            'settings'      => 'wishbone_font_header_setting',
			'type'          => 'select',
			'choices'		=> array(
				''				=> '',
				'abril'			=> 'Abril Fatface',
				'arvo'			=> 'Arvo',				
				'helvetica'		=> 'Helvetica',
				'josefin'		=> 'Josefin Slab',
				'lato'			=> 'Lato',
				'lobster'		=> 'Lobster',
				'oldstandard'	=> 'Old Standard TT',
				'opensans'		=> 'Open Sans',				
				'ubuntu'		=> 'Ubuntu',				
				'volkhov'		=> 'Volkhov'
			)
        )
    );
	
	$wp_customize->add_control(
		'wishbone_font_content_control',
		array(
			'label'         => 'Content Font',
			'section'       => 'wishbone_fonts_section',
            'settings'      => 'wishbone_font_content_setting',
			'type'          => 'select',
			'choices'		=> array(
				''				=> '',
				'abril'			=> 'Abril Fatface',
				'arvo'			=> 'Arvo',				
				'helvetica'		=> 'Helvetica',
				'josefin'		=> 'Josefin Slab',
				'lato'			=> 'Lato',
				'lobster'		=> 'Lobster',
				'oldstandard'	=> 'Old Standard TT',
				'opensans'		=> 'Open Sans',				
				'ubuntu'		=> 'Ubuntu',				
				'volkhov'		=> 'Volkhov'
			)
        )
    );
	
	/* color controls */
	
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'wishbone_theme_color_control',
            array(
                'label'         => 'Theme Accent Color',
                'section'       => 'wishbone_colors_theme_section',
                'settings'      => 'wishbone_theme_color_setting',
                'priority'   	=> 1
            )
        )
    );
	
	$wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'wishbone_theme_sub_color_control',
            array(
                'label'         => 'Theme Accent Sub Color',
                'section'       => 'wishbone_colors_theme_section',
                'settings'      => 'wishbone_theme_sub_color_setting',
                'priority'   	=> 2
            )
        )
    );
	
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'wishbone_header_background_color_control',
            array(
                'label'         => 'Header Background Color',
                'section'       => 'wishbone_colors_bg_section',
                'settings'      => 'wishbone_header_background_color_setting',
                'priority'   	=> 3
            )
        )
    );
	
	$wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'wishbone_nav_background_color_control',
            array(
                'label'         => 'Navigation Background Color',
                'section'       => 'wishbone_colors_bg_section',
                'settings'      => 'wishbone_nav_background_color_setting',
                'priority'   	=> 4
            )
        )
    );
	
	$wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'wishbone_content_background_color_control',
            array(
                'label'         => 'Content Background Color',
                'section'       => 'wishbone_colors_bg_section',
                'settings'      => 'wishbone_content_background_color_setting',
                'priority'   	=> 5
            )
        )
    );
    
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'wishbone_semifooter_background_color_control',
            array(
                'label'         => 'Semi-Footer Background Color',
                'section'       => 'wishbone_colors_bg_section',
                'settings'      => 'wishbone_semifooter_background_color_setting',
                'priority'   	=> 6
            )
        )
    );
    
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'wishbone_footer_background_color_control',
            array(
                'label'         => 'Footer Background Color',
                'section'       => 'wishbone_colors_bg_section',
                'settings'      => 'wishbone_footer_background_color_setting',
                'priority'   	=> 7
            )
        )
    );
    
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'wishbone_heading_text_color_control',
            array(
                'label'         => 'Heading Text Color',
                'section'       => 'wishbone_colors_text_section',
                'settings'      => 'wishbone_heading_text_color_setting',
                'priority'   	=> 8
            )
        )
    );
    
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'wishbone_content_text_color_control',
            array(
                'label'         => 'Content Text Color',
                'section'       => 'wishbone_colors_text_section',
                'settings'      => 'wishbone_content_text_color_setting',
                'priority'   	=> 9
            )
        )
    );
	
    /* page controls */
    
    $wp_customize->add_control(
        'wishbone_toggle_header_control',
        array(
            'label'         => 'Display Header',
            'section'       => 'wishbone_page_section',
            'settings'      => 'wishbone_toggle_header_setting',
            'type'          => 'checkbox'
        )
    );
    
    $wp_customize->add_control(
        'wishbone_toggle_navmenu_control',
        array(
            'label'         => 'Display Navigation Menu',
            'section'       => 'wishbone_page_section',
            'settings'      => 'wishbone_toggle_navmenu_setting',
            'type'          => 'checkbox'
        )
    );
    
    $wp_customize->add_control(
        'wishbone_toggle_showcase_control',
        array(
            'label'         => 'Display Showcase',
            'section'       => 'wishbone_page_section',
            'settings'      => 'wishbone_toggle_showcase_setting',
            'type'          => 'checkbox'
        )
    );

    $wp_customize->add_control(
        'wishbone_toggle_semifooter_control',
        array(
            'label'         => 'Display Semi-Footer',
            'section'       => 'wishbone_page_section',
            'settings'      => 'wishbone_toggle_semifooter_setting',
            'type'          => 'checkbox'
        )
    );
    
	/* header controls */
    
    $wp_customize->add_control(
        'wishbone_header_toggle_logo_control',
        array(
            'label'         => 'Display Logo',
            'section'       => 'wishbone_header_section',
            'settings'      => 'wishbone_header_toggle_logo_setting',
            'type'          => 'checkbox'
        )
    );
	
	$wp_customize->add_control(
        'wishbone_toggle_title_tagline_control',
        array(
            'label'         => 'Display Title & Tagline',
            'section'       => 'wishbone_header_section',
            'settings'      => 'wishbone_toggle_title_tagline_setting',
            'type'          => 'checkbox'
        )
    );
	
    $wp_customize->add_control(
        'wishbone_header_toggle_login_control',
        array(
            'label'         => 'Display Login',
            'section'       => 'wishbone_header_section',
            'settings'      => 'wishbone_header_toggle_login_setting',
            'type'          => 'checkbox'
        )
    );
	
	$wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'wishbone_header_bg_image_control',
            array(
                'label'         => 'Header Background Image',
                'section'       => 'wishbone_header_section',
                'settings'      => 'wishbone_header_bg_image_setting'
            )
        )
    );
	
	/* navigation controls */
    
    $wp_customize->add_control(
        'wishbone_navigation_border_control',
        array(
            'label'         => 'Navigation Border',
            'section'       => 'wishbone_navigation_section',
            'settings'      => 'wishbone_navigation_border_setting',
            'type'          => 'radio',
            'choices'       => array(
                'top'       => 'Border Top',
                'bottom'    => 'Border Bottom',
                'none'		=> 'No Border'
            )
        )
    );
	
    /* showcase controls */
    
    $wp_customize->add_control(
        'wishbone_showcase_type_control',
        array(
            'label'         => 'What to Display in the Showcase',
            'section'       => 'wishbone_showcase_section',
            'settings'      => 'wishbone_showcase_type_setting',
            'type'          => 'radio',
            'choices'       => array(
                'static'        => 'Static Background',
                'slider'        => 'Slider'
            )
        )
    );
    
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'wishbone_showcase_img_control',
            array(
                'label'         => 'Showcase Image',
                'section'       => 'wishbone_showcase_section',
                'settings'      => 'wishbone_showcase_img_setting'
            )
        )
    );
    
	$wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'wishbone_showcase_bg_color_control',
            array(
                'label'         => 'Showcase Background Color',
                'section'       => 'wishbone_showcase_section',
                'settings'      => 'wishbone_showcase_bg_color_setting'
            )
        )
    );
	
    $wp_customize->add_control(
        'wishbone_showcase_heading_control',
        array(
            'label'         => 'Showcase Heading',
            'section'       => 'wishbone_showcase_section',
            'settings'      => 'wishbone_showcase_heading_setting',
            'type'          => 'text'
        )
    );
    
    $wp_customize->add_control(
        'wishbone_showcase_slogan_control',
        array(
            'label'         => 'Showcase Slogan',
            'section'       => 'wishbone_showcase_section',
            'settings'      => 'wishbone_showcase_slogan_setting',
            'type'          => 'text'
        )
    );
    
    /* blog controls */
    
    $wp_customize->add_control(
        'wishbone_blog_layout_control',
        array(
            'label'         => 'Blog Layout',
            'section'       => 'wishbone_blog_section',
            'settings'      => 'wishbone_blog_layout_setting',
            'type'          => 'radio',
            'choices'       => array(
                'blog_sidebar_right'      => 'Blog with Right-hand Sidebar',
                'blog_sidebar_left'       => 'Blog with Left-hand Sidebar',
                'blog_sidebar_none'       => 'Blog with no Sidebar'
            )
        )
    );
	
	/* footer controls */
	
	$wp_customize->add_control(
        'wishbone_footer_copyrights_control',
        array(
            'label'         => 'Footer Text',
            'section'       => 'wishbone_footer_section',
            'settings'      => 'wishbone_footer_copyrights_setting',
            'type'          => 'text'
        )
    );
}




/**
*  
* 7.0 - CSS
* 
* Notes:
* 
* Loads CSS from the Wishbone theme customizer options.
* 
**/

function wishbone_options_css() {

/* fonts - header */

$header_font = get_theme_mod( 'wishbone_font_header_setting' );

/* fonts - content */

$content_font = get_theme_mod( 'wishbone_font_content_setting' );

/* colors - theme */
	
$theme_color = get_theme_mod( 'wishbone_theme_color_setting' );
$theme_sub_color = get_theme_mod( 'wishbone_theme_sub_color_setting' );

/* colors - backgrounds */
 
$header_background_color = get_theme_mod( 'wishbone_header_background_color_setting' );
$nav_background_color = get_theme_mod( 'wishbone_nav_background_color_setting' );
$showcase_background_color = get_theme_mod( 'wishbone_showcase_bg_color_setting' );
$content_background_color = get_theme_mod( 'wishbone_content_background_color_setting' );
$semifooter_background_color = get_theme_mod( 'wishbone_semifooter_background_color_setting' );
$footer_background_color = get_theme_mod( 'wishbone_footer_background_color_setting' );

/* colors - text */
	
$text_heading_color = get_theme_mod( 'wishbone_heading_text_color_setting' );
$text_content_color = get_theme_mod( 'wishbone_content_text_color_setting' );

/* header - bg image */

$header_toggle_logo = get_theme_mod( 'wishbone_header_toggle_logo_setting' );
$header_bg_image = get_theme_mod( 'wishbone_header_bg_image_setting' );

/* navigation - border */

$navigation_border = get_theme_mod( 'wishbone_navigation_border_setting' );

/* blog - layout */

$blog_layout = get_theme_mod( 'wishbone_blog_layout_setting' );


/* fonts - header */

if ( $header_font != '' ) {
	switch ( $header_font )
	{
		case '' :
			echo '<style>';
				echo 'h1, h1 a, h1 a:visited, h2, h2 a, h2 a:visited, h3, h3 a, h3 a:visited, h4, h4 a, h4 a:visited, h5, h5 a, h5 a:visited, h6, h6 a, h6 a:visited{ font-family: "HelveticaNeue", "Helvetica Neue", Helvetica, Arial, sans-serif; }';
			echo '</style>';
		break;
		
		case 'abril' :
			echo '<style>';
				echo '@import url(https://fonts.googleapis.com/css?family=Abril+Fatface);';
				echo 'h1, h1 a, h1 a:visited, h2, h2 a, h2 a:visited, h3, h3 a, h3 a:visited, h4, h4 a, h4 a:visited, h5, h5 a, h5 a:visited, h6, h6 a, h6 a:visited{ font-family: "Abril Fatface, cursive; }';
			echo '</style>';
		break;
		
		case 'arvo' :
			echo '<style>';
				echo '@import url(https://fonts.googleapis.com/css?family=Arvo);';
				echo 'h1, h1 a, h1 a:visited, h2, h2 a, h2 a:visited, h3, h3 a, h3 a:visited, h4, h4 a, h4 a:visited, h5, h5 a, h5 a:visited, h6, h6 a, h6 a:visited{ font-family: "Arvo", sans-serif; }';
			echo '</style>';
		break;
		
		case 'helvetica' :
			echo '<style>';
				echo 'h1, h1 a, h1 a:visited, h2, h2 a, h2 a:visited, h3, h3 a, h3 a:visited, h4, h4 a, h4 a:visited, h5, h5 a, h5 a:visited, h6, h6 a, h6 a:visited{ font-family: "HelveticaNeue", "Helvetica Neue", Helvetica, Arial, sans-serif; }';
			echo '</style>';
		break;
		
		case 'josefin' :
			echo '<style>';
				echo '@import url(https://fonts.googleapis.com/css?family=Josefin+Slab);';
				echo 'h1, h1 a, h1 a:visited, h2, h2 a, h2 a:visited, h3, h3 a, h3 a:visited, h4, h4 a, h4 a:visited, h5, h5 a, h5 a:visited, h6, h6 a, h6 a:visited{ font-family: "Josefin Slab", serif; }';
			echo '</style>';
		break;
		
		case 'lato' :
			echo '<style>';
				echo '@import url(https://fonts.googleapis.com/css?family=Lato);';
				echo 'h1, h1 a, h1 a:visited, h2, h2 a, h2 a:visited, h3, h3 a, h3 a:visited, h4, h4 a, h4 a:visited, h5, h5 a, h5 a:visited, h6, h6 a, h6 a:visited{ font-family: "Lato", sans-serif; }';
			echo '</style>';
		break;
		
		case 'lobster' :
			echo '<style>';
				echo '@import url(https://fonts.googleapis.com/css?family=Lobster);';
				echo 'h1, h1 a, h1 a:visited, h2, h2 a, h2 a:visited, h3, h3 a, h3 a:visited, h4, h4 a, h4 a:visited, h5, h5 a, h5 a:visited, h6, h6 a, h6 a:visited{ font-family: "Lobster", cursive; }';
			echo '</style>';
		break;
		
		case 'oldstandard' :
			echo '<style>';
				echo '@import url(https://fonts.googleapis.com/css?family=Old+Standard+TT);';
				echo 'h1, h1 a, h1 a:visited, h2, h2 a, h2 a:visited, h3, h3 a, h3 a:visited, h4, h4 a, h4 a:visited, h5, h5 a, h5 a:visited, h6, h6 a, h6 a:visited{ font-family: "Old Standard TT", serif; }';
			echo '</style>';
		break;
		
		case 'opensans' :
			echo '<style>';
				echo '@import url(https://fonts.googleapis.com/css?family=Open+Sans);';
				echo 'h1, h1 a, h1 a:visited, h2, h2 a, h2 a:visited, h3, h3 a, h3 a:visited, h4, h4 a, h4 a:visited, h5, h5 a, h5 a:visited, h6, h6 a, h6 a:visited{ font-family: "Open Sans", sans-serif; }';
			echo '</style>';
		break;
		
		case 'ubuntu' :
			echo '<style>';
				echo '@import url(https://fonts.googleapis.com/css?family=Ubuntu);';
				echo 'h1, h1 a, h1 a:visited, h2, h2 a, h2 a:visited, h3, h3 a, h3 a:visited, h4, h4 a, h4 a:visited, h5, h5 a, h5 a:visited, h6, h6 a, h6 a:visited{ font-family: "Ubuntu", sans-serif; }';
			echo '</style>';
		break;
		
		case 'volkhov' :
			echo '<style>';
				echo '@import url(https://fonts.googleapis.com/css?family=Volkhov);';
				echo 'h1, h1 a, h1 a:visited, h2, h2 a, h2 a:visited, h3, h3 a, h3 a:visited, h4, h4 a, h4 a:visited, h5, h5 a, h5 a:visited, h6, h6 a, h6 a:visited{ font-family: "Volkhov", serif; }';
			echo '</style>';
		break;
	}	
};


/* fonts - content */

if ( $content_font != '' ) {
	switch ( $content_font ) {
		case '' :
			echo '<style>';
				echo 'p{ font-family: "HelveticaNeue", "Helvetica Neue", Helvetica, Arial, sans-serif; }';
			echo '</style>';
		break;
		
		case 'abril' :
			echo '<style>';
				echo '@import url(https://fonts.googleapis.com/css?family=Abril+Fatface);';
				echo 'p{ font-family: "Abril Fatface, cursive; }';
			echo '</style>';
		break;
		
		case 'arvo' :
			echo '<style>';
				echo '@import url(https://fonts.googleapis.com/css?family=Arvo);';
				echo 'p{ font-family: "Arvo", sans-serif; }';
			echo '</style>';
		break;
		
		case 'helvetica' :
			echo '<style>';
				echo 'p{ font-family: "HelveticaNeue", "Helvetica Neue", Helvetica, Arial, sans-serif; }';
			echo '</style>';
		break;
		
		case 'josefin' :
			echo '<style>';
				echo '@import url(https://fonts.googleapis.com/css?family=Josefin+Slab);';
				echo 'p{ font-family: "Josefin Slab", serif; }';
			echo '</style>';
		break;
		
		case 'lato' :
			echo '<style>';
				echo '@import url(https://fonts.googleapis.com/css?family=Lato);';
				echo 'p{ font-family: "Lato", sans-serif; }';
			echo '</style>';
		break;
		
		case 'lobster' :
			echo '<style>';
				echo '@import url(https://fonts.googleapis.com/css?family=Lobster);';
				echo 'p{ font-family: "Lobster", cursive; }';
			echo '</style>';
		break;
		
		case 'oldstandard' :
			echo '<style>';
				echo '@import url(https://fonts.googleapis.com/css?family=Old+Standard+TT);';
				echo 'p{ font-family: "Old Standard TT", serif; }';
			echo '</style>';
		break;
		
		case 'opensans' :
			echo '<style>';
				echo '@import url(https://fonts.googleapis.com/css?family=Open+Sans);';
				echo 'p{ font-family: "Open Sans", sans-serif; }';
			echo '</style>';
		break;
		
		case 'ubuntu' :
			echo '<style>';
				echo '@import url(https://fonts.googleapis.com/css?family=Ubuntu);';
				echo 'p{ font-family: "Ubuntu", sans-serif; }';
			echo '</style>';
		break;
		
		case 'volkhov' :
			echo '<style>';
				echo '@import url(https://fonts.googleapis.com/css?family=Volkhov);';
				echo 'p{ font-family: "Volkhov", serif; }';
			echo '</style>';
		break;
	}
};


/* colors - accent */

if ( $theme_color !='' ) {
	echo '<style type="text/css">';
		echo '.button, button, .submit, .more-link, .comment-reply-link, input[type="submit"], input[type="reset"], input[type="button"], .posttags a:hover, #wp-calendar tbody #today, #wp-calendar tbody td:hover, .wp-tag-cloud a, #sidebar ul li a:hover, .pagenav ul li .current, .pagenav ul li a:hover, p.postpages .button:hover, .gallery .gallery-caption, #back-to-top{ background-color:' . $theme_color . '; }';
		echo '.gallery .gallery-caption:before{ border-bottom-color: ' . $theme_color . '; }';
		echo '#navigation, #semi_footer{ border-top: 5px solid' . $theme_color . '; }';
		echo '#mobile_menu, #desktop_menu li.menu-item:hover, #desktop_menu li.current-page-item, #desktop_menu li.current-menu-item, #desktop_menu li.menu-item-has-children:hover ul.sub-menu li a, #desktop_menu li.menu-item-has-children:hover ul.sub-menu ul.sub-menu li a{ background-color:' . $theme_color . ' }';
	echo '</style>';
};

if ( $theme_sub_color !='' ) {
	echo '<style type="text/css">';
		echo '.posttags a, p.postpages .button, #sidebar ul li a{ background-color:' . $theme_sub_color . '; }';
	echo '</style>';
};

/* colors - backgrounds */ 

if ( $header_background_color !='' ) {
	echo '<style type="text/css">';
		echo '#header{ background-color:' . $header_background_color . '; }';
	echo '</style>'; 
};

if ( $nav_background_color !='' ) {
	echo '<style type="text/css">';
		echo '#navigation{ background-color:' . $nav_background_color . '; }';
	echo '</style>';
};

if ( $showcase_background_color !='' ) {
	echo '<style type="text/css">';
		echo '#showcase{ background-color:' . $showcase_background_color . '; }';
	echo '</style>';
};

if ( $content_background_color !='' ) {
	echo '<style type="text/css">';
		echo '#content{ background-color:' . $content_background_color . '; }';
	echo '</style>';
};

if ( $semifooter_background_color !='' ) {
	echo '<style type="text/css">';
		echo '#semi_footer{ background-color:' . $semifooter_background_color . '; }';
	echo '</style>';
};

if ( $footer_background_color !='' ) {
	echo '<style type="text/css">';
		echo '#footer{ background-color:' . $footer_background_color . '; }';
	echo '</style>';
};


/* colors - text */

if ( $text_heading_color !='' ) {
	echo '<style type="text/css">';
		echo 'h1, h1 a, h1 a:visited, h2, h2 a, h2 a:visited, h3, h3 a, h3 a:visited, h4, h4 a, h4 a:visited, h5, h5 a, h5 a:visited, h6, h6 a, h6 a:visited{ color:' . $text_heading_color . '; }';
	echo '</style>';
};

if ( $text_content_color !='' ) {
	echo '<style type="text/css">';
		echo 'p, small{ color:' . $text_content_color . '; }';
	echo '</style>';
};


/* header - bg image */

if ( $header_toggle_logo == false ) {
	echo '<style type="text/css">';
		echo '#title{ position: relative; top: 0; margin: 35px 0 30px 0; }';
	echo '</style>';	
}

if ( $header_bg_image != '' ) {
	echo '<style type="text/css">';
		echo '#header{ background-image: url("' . $header_bg_image . '"); }';
	echo '</style>';
}


/* navigation - border */

if ( $navigation_border != '' ) {
	switch ( $navigation_border ) {
		case 'top' :
			echo '<style type="text/css">';
				echo '#navigation{ border-top-width: 5px; border-top-style: solid; border-bottom: none; }';
			echo '</style>';
		break;
		
		case 'bottom' :
			echo '<style type="text/css">';
				echo '#navigation{ border-top: none; border-bottom-width: 5px; border-bottom-style: solid; }';
			echo '</style>';
		break;
			
		case 'none' :
			echo '<style type="text/css">';
				echo '#navigation{ border: none; }';
			echo '</style>';
		break;
	}	
};


/* blog - layout */

if ( $blog_layout != '' ) {
	switch ( $blog_layout ) {
		case 'blog_sidebar_right' :
			/* Don't add any additional css */
		break;
		
		case 'blog_sidebar_left' :
			echo '<style type="text/css">';
				echo '#posts{ float: right; }';
			echo '</style>';
		break;
		
		case 'blog_sidebar_none' :
			echo '<style type="text/css">';
				echo '#sidebar{ display: none; }';
				echo '#posts{ width: 100%; padding-right: 10px; }';
			echo '</style>';
		break;
	}	
};


}


/* END OF FILE */


?>