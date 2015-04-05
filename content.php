<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
	<div class="postimg">
						
		<?php the_post_thumbnail( 'wishbone-post-large' ); ?>
						
	</div><!-- end of postimg -->
					
					
	<div class="posttitle">
					
		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						
	</div><!-- end of posttitle -->
					
					
	<div class="postmeta">
					
		<small><?php the_time( get_option( 'time_format' ) ) ?> / <?php _e( 'Posted By ', 'wishbone' ); ?><?php the_author_posts_link(); ?> / <?php comments_number( __( 'No Comments', 'wishbone' ), __( '1 Comment', 'wishbone' ), __( '% Comments', 'wishbone' ) ); ?></small>
							
	</div><!-- end of postmeta -->
	
	
	<div class="postcats">
		
		<p>Categories: <?php the_category( '/ ' ); ?></p>
		
	</div><!-- end of postcats -->
	
	
	<div class="posttags">
		
		<?php the_tags( 'Tags:', '', '' ); ?>
		
	</div><!-- end of posttags -->
					
					
	<div class="entry">
						
		<?php the_content( __( 'Continue Reading...', 'wishbone' ) ); ?>
						
	</div><!-- end of entry -->
					
</article><!-- end of post -->