<?php
/*featured image on post*/
add_theme_support( 'post-thumbnails' );

if ( function_exists( 'add_theme_support' ) ) {
	
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 940, 450, true );
}
/*end featured image on post*/


add_image_size( 'single-featured', 940, 590, true );


?>