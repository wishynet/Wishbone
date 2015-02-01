<!DOCTYPE html>

<html <?php language_attributes(); ?>>
	
<head>

	<!-- Title and Meta -->
	<title><?php wp_title( '' ); ?></title>
	<meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>" /> 
	<meta name="keywords" content="black, white, light, dark, two-columns, three-columns, left-sidebar, right-sidebar, custom-background, custom-header, custom-menu, editor-style, featured-images, sticky-post, flexible-header, full-width-template, post-formats, rtl-language-support, theme-options, translation-ready" />  
	<meta name="description" content="Wishbone is a responsive WordPress theme" />  
	<meta name="author" content="Paul Williamson" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Additional CSS loaded from the Wishbone theme customizer options -->
	<?php wishbone_options_css(); ?>

	<!-- The wp_head hook -->
	<?php wp_head(); ?>
	
</head>


<body <?php body_class(); ?>>
	

	<?php if( get_theme_mod( 'wishbone_toggle_header_setting', true ) != '' ) { ?>

	<div id="header">
	
	<div class="container">
	

		<div class="sixteen columns">
		
			<?php if ( get_theme_mod( 'wishbone_header_toggle_logo_setting', true ) ) : ?>
	
				<div id="logo">
					
					<?php if ( get_theme_mod( 'wishbone_logo_setting', false ) ) : ?>
		
						<img src="<?php echo get_theme_mod( 'wishbone_logo_setting' ); ?>" alt="logo" />
					
					<?php else : ?>
						
						<img src="<?php echo get_template_directory_uri(); ?>/images/wishbone.png" alt="wishbone" />
					
					<?php endif; ?>
	
				</div><!-- end of logo -->
		
			<?php endif; ?>

			
			<?php if ( get_header_textcolor() != 'blank' ) : ?>
		
			<div id="title">
		
				<a href="<?php echo home_url(); ?>">
					<h1><?php bloginfo( 'name' ); ?></h1>
				</a>
		
				<p><?php bloginfo( 'description' ); ?></p>
				
			</div><!-- end of title -->
		
			<?php endif; ?>
		
		
			<?php if ( get_theme_mod( 'wishbone_header_toggle_login_setting', true ) ) : ?>
	
			<div id="login">
			
				<ul>
					<li><a href="<?php echo home_url(); ?>/wp-login.php" class="button"><?php _e( 'Login', 'wishbone' ); ?></a></li>
					<li><a href="<?php echo home_url(); ?>/wp-login.php?action=register" class="button"><?php _e( 'Signup', 'wishbone' ); ?></a></li>
				</ul>
			
				<a href="<?php echo home_url(); ?>/wp-login.php?action=lostpassword" title="Password Lost and Found"><?php _e( 'Lost your password?', 'wishbone' ); ?></a>
				
			</div><!-- end of login -->
		
			<?php endif; ?>

		</div><!-- end of sixteen columns -->
	
		
	</div><!-- container -->
	
	</div><!-- end of header -->

	<?php } /* end of wishbone_toggle_header_setting */ ?>



	<?php if( get_theme_mod( 'wishbone_toggle_navmenu_setting', true ) != '' ) { ?>

	<div id="navigation">
		
	<div class="container">
	
		
		<div class="sixteen columns">
		
			<div id="mobile_menu">
			
				<img src="<?php echo get_template_directory_uri(); ?>/images/menu.png" alt="menu" />
			
				<p>Menu</p>
		
				<ul class="menu">
					
					<li class="menulogo">
						
						<?php if ( get_theme_mod( 'wishbone_logo_setting', true ) ) : ?>
		
							<img src="<?php echo get_theme_mod( 'wishbone_logo_setting' ); ?>" alt="logo" />
					
						<?php else : ?>
						
							<img src="<?php echo get_template_directory_uri(); ?>/images/wishbone.png" alt="wishbone" />
					
						<?php endif; ?>
						
					</li>
					
					<li class="menutitle"><h2><?php bloginfo( 'name' ); ?></h2></li>
					
					<hr>
					
					<li class="menulist"><?php wp_nav_menu( array( 'menu_class' => 'main-menu' ) ); ?></li>
					
					<hr>
					
					<li><p><?php _e( 'Thanks for Visiting', 'wishbone' ); ?></p></li>
					
				</ul><!-- end of menu -->				
		
			</div><!-- end of mobile_menu -->
		
			<div id="desktop_menu">
		
				<?php wp_nav_menu(); ?>
			
			</div><!-- end of desktop_menu -->
		
		</div><!-- end of sixteen columns -->
	

	</div><!-- container -->
	
	</div><!-- end of navigation -->

	<?php } /* end of wishbone_toggle_navmenu_setting */ ?>


	<!-- back to top button -->
	<a href="#back-to-top" id="back-to-top">
		<img src="<?php echo get_template_directory_uri(); ?>/images/backtotop.png" alt="backtotop" />
	</a>

