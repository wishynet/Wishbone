<?php

/* 
* 
* please note: don't forget to check off the format value against the expected permalink structure:
* when using pretty permalinks, use '/page/%#%' otherwise use '?page/%#%'.
* 
*/

global $wp_query;

$maxpages = 999999999;
  
echo paginate_links( array(  
    'base' 			=> str_replace( $maxpages, '%#%', esc_url( get_pagenum_link( $maxpages ) ) ),  
    'format' 		=> '?paged=%#%',  
    'current' 		=> max( 1, get_query_var( 'paged' ) ),  
    'total' 		=> $wp_query->max_num_pages,
    'type' 			=> 'list',
    'prev_text' 	=> 'Prev',  
    'next_text' 	=> 'Next'  
) ); 

?>