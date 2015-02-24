<?php
/*
Template Name: Search
*/
?>



	<?php get_header(); ?>

	
	
	<div id="content">
	
	<div class="container">
		
		
		<div class="sixteen columns">
			
			<h2><?php _e( 'Search Page', 'wishbone' ); ?></h2>
			
			<p><?php _e( 'Looking for something on this site? Try using the search bar and archive lists below to help you find it.', 'wishbone' ); ?></p>
			
			<hr>
	
		</div><!-- end of sixteen columns -->
		
		
		<div class="four columns">

			<?php get_search_form(); ?>
			
			<p><?php _e( 'Perhaps these links can also help you find what you are looking for:', 'wishbone' ); ?></p>
			
			<ul class="search-page-links">
				
				<?php if( file_exists( 'sitemap.xml' ) ) : ?> 
				
				<li>
					<a class="button" href="<?php echo esc_url( home_url( '/' ) ); ?>/sitemap.xml"><?php _e( 'Site Map', 'wishbone' ); ?></a>
				</li>
				
				<?php endif; ?>
				
				<li>
					<a class="button" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php _e( 'Home Page', 'wishbone' ); ?></a>
				</li>
			</ul>

		</div><!-- end of four columns -->
					
			
		<div class="four columns">
				
			<h3><?php _e( 'Archives by Month:', 'wishbone' ); ?></h3>
			<ul>
				<?php wp_get_archives( 'type=monthly' ); ?>
			</ul>
				
		</div><!-- end of four columns -->
			
			
		<div class="four columns">
				
			<h3><?php _e( 'Archives by Category:', 'wishbone' ); ?></h3>
			<ul>
				 <?php wp_list_categories( 'title_li=' ); ?>
			</ul>
				
		</div><!-- end of four columns -->
			
			
		<div class="four columns">
				
			<h3><?php _e( 'Archives by Author:', 'wishbone' ); ?></h3>
			<ul>
				 <?php wp_list_authors( 'orderby=name&show_fullname=true&hide_empty=0' ); ?>
			</ul>
			
		</div><!-- end of four columns -->
		
			
	</div><!-- container -->
	
	</div><!-- end of content -->
	
	
	<?php get_footer(); ?>
	
	
	