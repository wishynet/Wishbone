<?php
/*
Template Name: Blog
*/
?>


	<?php get_header(); ?>	
	
	
	<div id="content">
	
	<div class="container">
			
			
		<div class="eleven columns" id="posts">
			
			<!-- the loop -->
			
			<?php
				
			$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
			$args = array(
			'post_type' 	=> 'post',
			'numberposts' 	=> -1,
			'orderby' 		=> 'post_date',
			'paged'			=> $paged
			);
				
			query_posts( $args ); ?>
				
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					
					
				<!-- include the content by post format using the 'content-xyz' templates -->
				<?php get_template_part( 'content', get_post_format() ); ?>
			
				
				<div class="postmore">
						
					<a href="<?php the_permalink(); ?>" class="button" rel="bookmark" title="<?php _e( 'Permanent Link to', 'wishbone' ); ?> <?php the_title(); ?>"><?php _e( 'Read More', 'wishbone' ); ?></a>
						
				</div><!-- end of postmore -->
					
									
			<?php endwhile; else: ?>
					
				<p><?php _e( 'Sorry, no posts matched your criteria.', 'wishbone' ); ?></p>
					
			<?php endif; ?>
				
			<!-- end of the loop -->
			

			<div class="pagenav">
			
				<?php the_posts_pagination(); ?>
				
			</div><!-- end of pagenav -->
			
			
		</div><!-- end of posts -->			
			
			
		<div class="five columns">
				
				<?php get_sidebar(); ?>
			
		</div><!-- end of five columns -->

					
	</div><!-- container -->
	
	</div><!-- end of content -->


	<?php get_footer(); ?>
	

