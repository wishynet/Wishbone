


	<?php get_header(); ?>

	
	
	<div id="content">
	
	<div class="container">
			
			
		<div class="five columns">
			
			<h2><?php _e( 'Search Results', 'wishbone' ); ?></h2>
				
			<p><?php _e( 'Your search criteria was found in the following pages: ', 'wishbone' ); ?></p>
			
		</div><!-- end of five columns -->
			
		<div class="eleven columns">
			
		<div id="posts">		
			
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

				<div <?php post_class() ?>>
					
					<h3 class="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
					
					<small><?php the_time( 'l, F jS, Y' ) ?></small>
					
					<?php the_excerpt(); ?>
					
				</div>

			<?php endwhile; ?>


			<div class="pagenav">
			
				<?php the_posts_pagination( ); ?>
				
			</div><!-- end of pagenav -->


			<?php else : ?>

				<h2><?php _e( 'Sorry, no posts found. Perhaps try a different search?', 'wishbone' ); ?></h2>
				
				<?php get_search_form(); ?>

			<?php endif; ?>
								
		</div><!-- end of posts -->			
			
		</div><!-- end of eleven columns -->
		
			
	</div><!-- container -->
	
	</div><!-- end of content -->


	<?php get_footer(); ?>


