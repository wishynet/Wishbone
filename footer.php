<?php if( get_theme_mod( 'wishbone_toggle_semifooter_setting', true ) != '' ) { ?>

<div id="semi_footer">
	
<div class="container">
	
	<!-- please note: this section is widget ready -->

	<div class="four columns">
	
		<?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar( 'Footer 1' ) ) : ?>
		
			<h3><?php _e( 'About Us', 'wishbone' ); ?></h3>
		
			<p>Wishbone is a Wordpress theme based on the Skellington boilerplate, both created by Wishynet. Support for a variety of site styles are included out of the box.</p>
			<p>This theme is free for any use. Please let me know what you think of it, any suggestions welcome. I love to hear from you!</p>
	
		<?php endif; ?>
		
	</div><!-- end of four columns -->


	<div class="four columns">
	
		<?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar( 'Footer 2' ) ) : ?>
		
			<h3><?php _e( 'Popular Topics', 'wishbone' ); ?></h3>
		
			<?php wp_tag_cloud( 'unit=px&format=list' ); ?>
		
		<?php endif; ?>
		
	</div><!-- end of four columns -->


	<div class="four columns">
	
		<?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar( 'Footer 3' ) ) : ?>
		
			<h3><?php _e( 'Recent News', 'wishbone' ); ?></h3>
		
			<ul id="recentnews">
				<?php
				$args = array(
					'numberposts' 	=> 4 ,
					'orderby' 		=> 'post_date'
				);

				$recent_posts = wp_get_recent_posts( $args );

				foreach( $recent_posts as $recent ){
					echo ' <li><a href="' . get_permalink( $recent["ID"] ) . '" title="'.esc_attr( $recent["post_title"] ).'" class="button">' .   $recent["post_title"].'</a></li> ';
				}
				?>
			</ul>

	
		<?php endif; ?>
		
	</div><!-- end of four columns -->
	
	
	<div class="four columns">
	
		<?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar( 'Footer 4' ) ) : ?>
		
			<div class="contactus">
			
				<h3><?php _e( 'Contact Us', 'wishbone' ); ?></h3>
				
				<ul>
					<li>23 Somewhere Street</li>
					<li>Relevant Road</li>
					<li>Town</li>
					<li>Area</li>
					<li>Country</li>
					<li>PST C0D3</li>
				</ul>
			
				<h4>+44 7624 123456</h4>
			
			</div><!-- end of contactus -->
	
		<?php endif; ?>
	
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


<!-- End Document
================================================== -->


</body>
</html>

