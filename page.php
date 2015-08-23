


	<?php get_header(); ?>



	<div id="content">

	<div class="container">


		<div class="sixteen columns">

			<div class="page">

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<article class="post" id="post-<?php the_ID(); ?>">

						<h2><?php the_title(); ?></h2>

						<div class="entry">
							<?php the_content( __( '<p class="serif">Read the rest of this page &raquo;</p>', 'wishbone' ) ); ?>
						</div>

					</article><!-- end of post -->

					<!-- trackback functionality -->
					<?php trackback_rdf(); ?>

					<!-- wp_link_pages functionality -->
					<?php wp_link_pages( array(
						'before'		=> '<p class="postpages">' . __( 'Pages In This Post:', 'wishbone' ),
						'after'			=> '</p>',
						'link_before'	=> '<span class="button">',
						'link_after'	=> '</span>'
					) ); ?>

				<?php endwhile; endif; ?>

			</div><!-- end of page -->


			<?php if ( is_active_sidebar( 'page-widget' ) ) : ?>

				<div class="pagewidgetarea">

				<hr>

				<?php if ( !dynamic_sidebar( 'Page Widget' ) ) : ?>

					$instance = array(
						'title'			=> __( 'The Page Widget Area', 'wishbone' ),
						'text'			=> __( 'This is a Widget Area. Replace the default Widgets with a Widget of your choice from the WordPress Dashboard menu.', 'wishbone' )
					);

					$args = array(
						'before_title'	=> '<h2 class="widgettitle">',
						'after_title'	=> '</h2>',
					);

					the_widget( 'WP_Widget_Text', $instance, $args );

				<?php endif; ?>

			</div><!-- end of pagewidgetarea -->

			<?php endif; ?>


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
