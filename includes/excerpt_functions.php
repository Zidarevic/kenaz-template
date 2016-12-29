<?php
//Remove [] from excerpt
function new_excerpt_more( $more ) {
	
	return ' ...';//dots replace [...]
}
add_filter('excerpt_more', 'new_excerpt_more');
//end Remove [] from excerpt

//limit the_excerpt character
function custom_excerpt_length( $length ) {
	return 60;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
//end limit the_excerpt character
?>