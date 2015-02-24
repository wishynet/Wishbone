


	<?php get_header(); ?>


	
	<div id="content">
	
	<div class="container">
	

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				
			<div class="post" id="post-<?php the_ID(); ?>">
					
				<div class="eleven columns">
						
					<?php if ( wp_attachment_is_image( $post->id ) ) {
								
						$att_image = wp_get_attachment_image_src( $post->id, "wishbone-post-large" ); ?>
								
						<p class="attachment">
								
							<a href="<?php echo wp_get_attachment_url( $post->id ); ?>" title="<?php the_title(); ?>">
								<img src="<?php echo $att_image[0];?>" width="<?php echo $att_image[1];?>" height="<?php echo $att_image[2];?>"  class="attachment-large" alt="<?php $post->post_excerpt; ?>" />
							</a>
								
						</p>
								
					<?php } ?>
						
				</div><!-- end of eleven columns -->
				
						
				<div class="five columns">
					
					<div class="attachment-meta">
					
						<h2><?php the_title(); ?></h2>
						
						<p><?php the_excerpt(); ?></p>
					
					</div><!-- end of attachment-meta -->	
						
				</div><!-- end of five columns -->

			</div><!-- end of post -->
				
		<?php endwhile; endif; ?>
		
			
	</div><!-- container -->
	
	</div><!-- end of content -->
	

	<?php get_footer(); ?>


