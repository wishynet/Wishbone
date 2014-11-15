<div id="sidebar">
	
	<ul>

		<?php if ( !dynamic_sidebar() ) : ?>
	
		<li>
			<h3><?php _e( 'Search', 'wishbone' ); ?></h3>
			<?php get_search_form(); ?>
		</li>
	
	
		<li>
			<h3><?php _e( 'Categories', 'wishbone' ); ?></h3>
			<ul>
				<?php wp_list_categories( 'show_count=1&title_li=' ); ?>
			</ul>
		</li>

	
		<li>
			<h3><?php _e( 'Archives', 'wishbone' ); ?></h3>
			<ul>
				<?php wp_get_archives( 'type=monthly' ); ?>
			</ul>
		</li>
	
	
		<li>
			<h3><?php _e( 'Popular Tags', 'wishbone' ); ?></h3>
			<ul>
				<?php wp_tag_cloud( 'unit=px&format=list' ); ?>
			</ul>
		</li>


		<li>
			<h3><?php _e( 'Admin', 'wishbone' ); ?></h3>
			<ul>
				<li><?php wp_loginout(); ?></li>
			</ul>
		</li>
	
		<?php endif; ?>
	
	</ul>

</div><!-- end of sidebar -->

	
