<hr>

<!-- if the post is password protected, don't load any comments elements -->
<?php if ( post_password_required() ) {
	return;
}; ?>


<h2><?php _e( 'Comments', 'wishbone' ); ?></h2>


<!-- if there are any comments, then do the following... -->
<?php if ( have_comments() ) : ?>
	

<!-- comment count -->
<p id="comment-count">( <?php printf( _n( 'One Comment', '%1$s Comments', get_comments_number() ), number_format_i18n( get_comments_number() ) ); ?> )</p>
	
	
<!-- comment loop -->
<?php $args = array(
	
	'style'             => 'div',
	'callback'          => null,
	'end-callback'      => null,
	'type'              => 'all',
	'reply_text'        => __( 'Reply To This Comment', 'wishbone' ),
	'page'              => null,
	'per_page'          => '',
	'avatar_size'       => 96,
				
); ?>

<?php wp_list_comments( $args ); ?>


<!-- comment pagination -->
<div class="comment-nav">	
	
	<?php paginate_comments_links(); ?>
	
</div><!-- end of comment-nav -->


<!-- alternate responses -->
<?php else: ?>
	
	<p><?php _e( 'There are no Comments', 'wishbone' ); ?></p>
	
<?php endif; ?>


<?php if ( !comments_open() ) : ?>

	<h3><?php _e( 'Comments are Closed', 'wishbone' ); ?></h3>
	
<?php else: ?>
	

<!-- comment form -->
<?php $args = array(
	
	'title_reply' 	=> __( 'Leave a Comment:', 'wishbone' ),
	'label_submit' 	=> __( 'Add Your Comment', 'wishbone' )
	
); ?>
		
<?php comment_form( $args ); ?>
		
	
<?php endif; ?><!-- end 'if' have comments -->