


	<?php get_header(); ?>
	
	
	
	<div id="content">
	
	<div class="container">
		
		
		<!-- database query to retrieve current author information -->
		<?php $curauth = ( isset( $_GET['author_name'] ) ) ? get_userby( 'slug', $author_name ) : get_userdata( intval( $author ) ); ?>	
			
			
		<div class="five columns">
			
			<div class="authorimg">
				
				<?php echo get_avatar( get_the_author_meta( 'email' ), '250' ); ?>
				
			</div><!-- end of author-img -->
			
			<h2 class="authorname"><?php echo $curauth->user_firstname . ' ' . $curauth->user_lastname; ?></h2>

			<div class="authorurl">
				
				<p><?php _e( 'Website: ', 'wishbone' ); ?><a href="<?php echo $curauth->user_url; ?>"><?php echo $curauth->user_url; ?></a></p>
				
			</div><!-- end of author-url -->
				
			<div class="authoremail">
				
				<p><?php _e( 'Email: ', 'wishbone' ); ?><a href="<?php echo $curauth->user_email; ?>"><?php echo $curauth->user_email; ?></a></p>
				
			</div><!-- end of author-email -->
			
			<div class="authordescription">
				
				<p><?php echo $curauth->description; ?></p>
				
			</div><!-- end of author-description -->
			
			<hr>
			
			<h4><?php _e( 'Looking For Another Author?', 'wishbone' ); ?></h4>
			
			<ul>
				<?php wp_list_authors( 'exclude_admin=0' ); ?>
			</ul>
			
		</div><!-- end of five columns -->
		
		
		<div class="eleven columns">
			
			<ul id="author-post-list">
				
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				
				<div class="postexcerpt">
					
					<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					
					<div class="postmeta">
						
						<small><?php the_time( 'F j, Y' ); ?> / <?php _e( 'Posted By ', 'wishbone' ); ?><?php the_author_posts_link(); ?> / <?php comments_number( 'No Comments', '1 Comment', '% Comments' ); ?></small>
					
					</div><!-- end of postmeta -->
					
					<p><?php the_excerpt( 'Read More' ); ?></p>
					
					<div class="postmore">
						
						<a href="<?php the_permalink(); ?>" class="button" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php _e( 'Read More', 'wishbone' ); ?></a>
						
					</div><!-- end of postmore -->
					
				</div><!-- end of postexcerpt -->
				
				<?php endwhile; ?>
				
				
				<div class="pagenav">
			
					<?php get_template_part( 'nav-page' ); ?>
				
				</div><!-- end of pagenav -->
				
				
				<?php else: ?>
			
					<h2><?php _e( 'No Posts By This Author', 'wishbone' ); ?></h2>
			
				<?php endif; ?>
				
			</ul><!-- end of author-post-list --> 
			
		</div><!-- end of eleven columns -->
		
		
	</div><!-- container -->
	
	</div><!-- end of content -->


	<?php get_footer(); ?>


