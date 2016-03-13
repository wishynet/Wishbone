<h3><?php _e( 'Search', 'wishbone' ); ?></h3>

<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<p>
		<input type="text" id="search-input" value="<?php the_search_query(); ?>" name="s" placeholder="<?php _e( 'Search...', 'wishbone' ); ?>" />
		<input type="submit" id="search-submit" value="<?php _e( 'Search', 'wishbone' ); ?>" />
	</p>
</form>
