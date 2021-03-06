


	<?php get_header(); ?>
	
	
	
	<div id="content">
	
	<div class="container">
			
			
		<div class="five columns">
			
			<h2><?php single_cat_title(); ?></h2>
			
			<?php
				$category_description = category_description();
				
				if ( !empty( $category_description ) )
				
				echo '<div class="category-description">' . $category_description . '</div>';
			?>

		</div><!-- end of five columns -->
		
		
		<div class="eleven columns">
			
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				
				<div class="postexcerpt">
					
					<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					
					<div class="postmeta">
						
						<small><?php the_time( get_option( 'time_format' ) ) ?> / <?php _e( 'Posted By ', 'wishbone' ); ?><?php the_author_posts_link(); ?> / <?php comments_number( __( 'No Comments', 'wishbone' ), __( '1 Comment', 'wishbone' ), __( '% Comments', 'wishbone' ) ); ?></small>
					
					</div><!-- end of postmeta -->
					
					<?php the_excerpt( __( 'Read More', 'wishbone' ) ); ?>
					
					<div class="postmore">
						
						<a href="<?php the_permalink(); ?>" class="button" rel="bookmark" title="<?php _e( 'Permanent Link to', 'wishbone' ); ?> <?php the_title(); ?>"><?php _e( 'Read More', 'wishbone' ); ?></a>
						
					</div><!-- end of postmore -->
					
				</div><!-- end of postexcerpt -->
				
			<?php endwhile; ?>
			
			
			<div class="pagenav">
			
				<?php the_posts_pagination(); ?>
				
			</div><!-- end of pagenav -->
			
			<?php else: ?>
			
				<p><?php _e( 'No Posts In This Category', 'wishbone' ); ?></p>	
			
			<?php endif; ?>
			
		</div><!-- end of eleven columns -->
		
		
	</div><!-- container -->
	
	</div><!-- end of content -->



	<?php get_footer(); ?>


