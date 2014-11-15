


	<?php get_header(); ?>
	
	
	
	<div id="content">
	
	<div class="container">
			
			
		<div class="sixteen columns">
			
			<div class="page">
		
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				
					<article class="post" id="post-<?php the_ID(); ?>">
					
						<h2><?php the_title(); ?></h2>
					
						<div class="entry">
							<?php the_content( '<p class="serif">Read the rest of this page &raquo;</p>' ); ?>	
						</div>
					
					</article><!-- end of post -->
					
					
					<!-- trackback functionality -->
					<?php trackback_rdf(); ?>
				
				
				<?php endwhile; endif; ?>
				
			</div><!-- end of page -->
			
			
			<div class="pagenav">
			
				<?php get_template_part( 'nav-page' ); ?>
				
			</div><!-- end of pagenav -->
			
			
			<?php if ( comments_open() ) : ?>
				
				<div class="comments">
				
					<?php comments_template( '', false ); ?>
				
				</div><!-- end of comments -->
			
			<?php else : ?>
				
				<!-- do not display any comment template -->
				
			<?php endif; ?>			
			
		</div><!-- end of sixteen columns -->
		
			
	</div><!-- container -->
	
	</div><!-- end of content -->
	

	<?php get_footer(); ?>


