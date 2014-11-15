


	<?php get_header(); ?>

	
	
	<div id="content">
	
	<div class="container">
			
			
		<div class="sixteen columns">
			
                        <h2><?php _e( 'Archives', 'wishbone' ); ?></h2>
			
		</div><!-- end of sixteen columns -->
			
			
		<div class="five columns">
				
			<h3><?php _e( 'Archives by Month:', 'wishbone' ); ?></h3>
			<ul>
				<?php wp_get_archives( 'type=monthly' ); ?>
			</ul>
				
		</div><!-- end of five columns -->
			
			
		<div class="six columns">
				
			<h3><?php _e( 'Archives by Category:', 'wishbone' ); ?></h3>
			<ul>
				 <?php wp_list_categories( 'title_li=' ); ?>
			</ul>
				
		</div><!-- end of six columns -->
			
			
		<div class="five columns">
				
			<h3><?php _e( 'Archives by Author:', 'wishbone' ); ?></h3>
			<ul>
				 <?php wp_list_authors( 'orderby=name&show_fullname=1&hide_empty=0' ); ?>
			</ul>
			
		</div><!-- end of five columns -->
			
			
	</div><!-- container -->
	
	</div><!-- end of content -->	


	<?php get_footer(); ?>


