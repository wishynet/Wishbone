<ul>
	
    <?php if ( get_adjacent_post( false, '', true ) ) : ?>
    
	<li class="prevlink">							
	    <?php previous_post_link( '%link', '<', false ); ?>
	</li>
	
    <?php endif; ?>
    
    
    <li class="spacer"></li>
    
    
    <li class="homelink">
		<a class="button" href="<?php echo home_url(); ?>">Home</a>
    </li>
    
    
    <li class="spacer"></li>
    
    
    <?php if ( get_adjacent_post( false, '', false ) ) : ?>
    
	<li class="nextlink">
	    <?php next_post_link( '%link', '>', false ); ?>
    </li>
	
    <?php endif; ?>
    
</ul>