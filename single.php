


	<?php get_header(); ?>
	
	
	
	<div id="content">
	
	<div class="container">
			
			
		<div class="eleven columns">
			
			
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
				
				<!-- include the content by post format using the 'content-xyz' templates -->
				<?php get_template_part( 'content', get_post_format() ); ?>
				
				
				<!-- trackback functionality -->
				<?php trackback_rdf(); ?>
				
				
				<!-- wp_link_pages functionality -->
				<?php $args = array(
					'before'		=> '<p class="postpages">' . __( 'Pages In This Post:', 'wishbone' ),
					'after'			=> '</p>',
					'link_before'	=> '<span class="button">',
					'link_after'	=> '</span>'
				);
				
				wp_link_pages( $args ); 
				
				?>

				
			<?php endwhile; endif; ?>
			

			<div class="postnav">
				
				<?php get_template_part( 'nav-post' ); ?>
				
			</div><!-- end of postnav -->
			
			
			<?php if ( comments_open() ) : ?>
				
				<div class="comments">
				
					<?php comments_template( '', false ); ?>
				
				</div><!-- end of comments -->
			
			<?php else : ?>
				
				<!-- do not display any comment template -->
				
			<?php endif; ?>
			
			
		</div><!-- end of eleven columns -->			
			
			
		<div class="five columns">
				
				<?php get_sidebar(); ?>
			
		</div><!-- end of five columns -->
		
					
	</div><!-- container -->
	
	</div><!-- end of content -->


	<?php get_footer(); ?>


