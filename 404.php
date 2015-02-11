


	<?php get_header(); ?>

	
	
	<div id="content">
	
	<div class="container">	
		
			
		<div class="eight columns">
			
        	<h1 class="fourzerofour">404:</h1>
			
		</div><!-- end of eight columns -->
		
		
		<div class="eight columns">
			
			<h2 class="fourzerofour"><?php _e( 'Whoops! Sorry, the page you are looking for cannot be found anywhere.', 'wishbone' ); ?></h2>
			
		</div><!-- end of eight columns -->
		
		
		<div class="sixteen columns">
			
			<div class="fourzerofourhelp">
			
				<p><?php _e( 'Something went wrong when trying to reach the requested page, Maybe these links can help you find what you are looking for:', 'wishbone' ); ?></p>
			
			</div><!-- end of fourzerofourhelp -->
			
		</div><!-- end of sixteen columns -->
		
		
		<div class="sixteen columns">

				<ul class="fourzerofour-page-links aligncenter">
					<li>
						<a class="button" href="<?php echo esc_url( home_url( '/' ) ); ?>page-search.php" alt="search"><?php _e( 'Search Page', 'wishbone' ); ?></a>
					</li>
					
					<?php if( file_exists( 'sitemap.xml' ) ) : ?> 
						
					<li>
						<a class="button" href="<?php echo esc_url( home_url( '/' ) ); ?>sitemap.xml" alt="sitemap"><?php _e( 'Site Map', 'wishbone' ); ?></a>
					</li>
						
					<?php endif; ?>
					
					<li>
						<a class="button" href="<?php echo esc_url( home_url( '/' ) ); ?>" alt="home"><?php _e( 'Home Page', 'wishbone' ); ?></a>
					</li>
				</ul>
			
		</div><!-- end of sixteen columns -->
		

	</div><!-- container -->
	
	</div><!-- end of content -->
	

	<?php get_footer(); ?>


