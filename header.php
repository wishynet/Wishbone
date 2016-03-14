<!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>

	<!-- Meta Data -->
	<meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>" />
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

						<img src="<?php echo get_theme_mod( 'wishbone_logo_setting' ); ?>" alt="<?php _e( 'logo', 'wishbone' ); ?>" />

					<?php else : ?>

						<img src="<?php echo get_template_directory_uri(); ?>/images/wishbone.png" alt="<?php _e( 'logo', 'wishbone' ); ?>" />

					<?php endif; ?>

				</div><!-- end of logo -->

			<?php endif; ?>


			<?php if ( get_header_textcolor() != 'blank' ) : ?>

			<div id="title">

				<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
					<h1><?php bloginfo( 'name' ); ?></h1>
				</a>

				<p><?php bloginfo( 'description' ); ?></p>

			</div><!-- end of title -->

			<?php endif; ?>


			<?php if ( get_theme_mod( 'wishbone_header_toggle_login_setting', true ) ) : ?>

			<div id="login">

				<?php if ( is_user_logged_in() ) : ?>

				<ul>
					<li class="button">
						<?php
							$current_user = wp_get_current_user();
							echo 'Hi there, ' . $current_user->user_login;
						?>
					</li>
				</ul>

				<a href="<?php echo esc_url( wp_logout_url() ); ?>" title="<?php _e( 'Logout', 'wishbone' ); ?>"><?php _e( 'Logout', 'wishbone' ); ?></a>

				<?php else : ?>

				<ul>
					<li><a href="<?php echo esc_url( wp_login_url() ); ?>" class="button"><?php _e( 'Login', 'wishbone' ); ?></a></li>
					<li><a href="<?php echo esc_url( wp_registration_url() ); ?>" class="button"><?php _e( 'Sign Up', 'wishbone' ); ?></a></li>
				</ul>

				<a href="<?php echo esc_url( wp_lostpassword_url() ); ?>" title="<?php _e( 'Password Lost and Found', 'wishbone' ); ?>"><?php _e( 'Lost your password?', 'wishbone' ); ?></a>

				<?php endif; ?>

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

				<p><?php _e( 'Menu', 'wishbone'); ?></p>

				<ul class="menuoverlay">

					<?php if ( get_theme_mod( 'wishbone_logo_setting', true ) ) : ?>

					<li class="menulogo">

						<img src="<?php echo get_theme_mod( 'wishbone_logo_setting' ); ?>" alt="<?php _e( 'logo', 'wishbone' ); ?>" />

					</li>

					<?php endif; ?>

					<li class="menutitle"><h2><?php bloginfo( 'name' ); ?></h2></li>

					<li class="menulist"><?php wp_nav_menu( 'theme_location=mobile_menu' ); ?></li>

					<li class="menufooter"><p><?php _e( 'Thanks for Visiting', 'wishbone' ); ?></p></li>

				</ul><!-- end of menu -->

			</div><!-- end of mobile_menu -->

			<div id="desktop_menu">

				<?php wp_nav_menu( 'theme_location=desktop_menu' ); ?>

			</div><!-- end of desktop_menu -->

		</div><!-- end of sixteen columns -->


	</div><!-- container -->

	</div><!-- end of navigation -->

	<?php } /* end of wishbone_toggle_navmenu_setting */ ?>


	<!-- back to top button -->
	<a href="#back-to-top" id="back-to-top">

		<img src="<?php echo get_template_directory_uri(); ?>/images/backtotop.png" alt="backtotop" />

	</a>
