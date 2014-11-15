


	<?php get_header(); ?>
	
	
	
	<div id="content">
	
	<div class="container">
			
			
		<div class="five columns">
			
			<h2><?php single_tag_title(); ?></h2>
			
			<?php			
				$tag_description = tag_description();
				
				if ( ! empty( $tag_description ))
				
					echo '<div class="tag-description">' . $tag_description . '</div>';
					
				get_template_part( 'loop', 'tag' );
			?>

		</div><!-- end of five columns -->
		
		
		<div class="eleven columns">
			
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				
				<div class="postexcerpt">
					
					<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					
					<div class="postmeta">
						
						<small><?php the_time( 'F j, Y' ) ?> / <?php _e( 'Posted By ', 'wishbone' ); ?><?php the_author_posts_link(); ?> / <?php comments_number( 'No Comments', '1 Comment', '% Comments' ); ?></small>
					
					</div><!-- end of postmeta -->
					
					<?php the_excerpt( 'Read More' ); ?>
					
					<div class="postmore">
						
						<a href="<?php the_permalink(); ?>" class="button" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php _e( 'Read More', 'wishbone' ); ?></a>
						
					</div><!-- end of postmore -->
					
				</div><!-- end of postexcerpt -->
				
			<?php endwhile; ?>
			
						
			<div class="pagenav">
			
				<?php get_template_part( 'nav-page' ); ?>
				
			</div><!-- end of pagenav -->
			
			<?php else: ?>
			
				<p><?php _e( 'No Posts With This Tag', 'wishbone' ); ?></p>	
			
			<?php endif; ?>
			
		</div><!-- end of eleven columns -->
		
		
	</div><!-- container -->
	
	</div><!-- end of content -->



	<?php get_footer(); ?>


