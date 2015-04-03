<?php if( get_theme_mod( 'wishbone_toggle_semifooter_setting', true ) != '' ) { ?>

<div id="semi_footer">
	
<div class="container">
	
	<!-- please note: this section is widget ready -->

	<div class="four columns">
	
		<?php if ( !dynamic_sidebar( 'Footer 1' ) ) : 
			
			$instance = array(
				'title'			=> __( 'The Footer Widget Area', 'wishbone' ),
				'text'			=> __( 'This is a Widget Area. Replace the default Widgets with a Widget of your choice from the WordPress Dashboard menu.', 'wishbone' )
			);
			
			$args = array(
				'before_title'	=> '<h3 class="widgettitle">',
				'after_title'	=> '</h3>',
			);
			
			the_widget( 'WP_Widget_Text', $instance, $args ); 
	
		endif; ?>
		
	</div><!-- end of four columns -->


	<div class="four columns">
	
		<?php if ( !dynamic_sidebar( 'Footer 2' ) ) :  
			
			$instance = array(
				'title'			=> __( 'Popular Topics', 'wishbone' ),
				'taxonomy'		=> 'post_tag'
			);
			
			$args = array(
				'before_title'	=> '<h3 class="widgettitle">',
				'after_title'	=> '</h3>',
			);
			
			the_widget( 'WP_Widget_Tag_Cloud', $instance, $args ); 

		endif; ?>
		
	</div><!-- end of four columns -->


	<div class="four columns">
	
		<?php if ( !dynamic_sidebar( 'Footer 3' ) ) :		
			
			$instance = array(
				'title'			=> __( 'Recent Articles', 'wishbone' ),
				'number'		=> 4
			);
			
			$args = array(
				'before_title'	=> '<h3 class="widgettitle">',
				'after_title'	=> '</h3>',
			);
			
			the_widget( 'WP_Widget_Recent_Posts', $instance, $args );

		endif; ?>
		
	</div><!-- end of four columns -->
	
	
	<div class="four columns">
	
		<?php if ( !dynamic_sidebar( 'Footer 4' ) ) : 
			
			$instance = array(
				'title'			=> __( 'Site Links', 'wishbone' )
			);
			
			$args = array(
				'before_title'	=> '<h3 class="widgettitle">',
				'after_title'	=> '</h3>',
			);
			
			the_widget( 'WP_Widget_Meta', $instance, $args );
	
		endif; ?>
	
	</div><!-- end of four columns -->
	

</div><!-- end of container -->

</div><!-- end of semi_footer -->

<?php } /* end of wishbone_toggle_semifooter_setting */ ?>




<div id="footer">
	
<div class="container">


	<div class="sixteen columns">
		
		<?php if ( get_theme_mod( 'wishbone_footer_copyrights_setting', false ) ) : ?>
			
			<p><?php echo get_theme_mod( 'wishbone_footer_copyrights_setting' );?></p>
		
		<?php else : ?>	
	
			<p><?php _e( 'Copyrights etc. go here. Wishbone theme development by Wishynet. All Rights Reserved.', 'wishbone' ); ?></p>
			
		<?php endif; ?>
	
	</div><!-- end of sixteen columns -->


</div><!-- end of container -->
	
</div><!-- end of footer -->
	

<!-- the wp_footer hook -->
<!-- please note: to add, modify or remove any javascript - please check the functions.php file -->
<?php wp_footer(); ?>


</body>
</html>

