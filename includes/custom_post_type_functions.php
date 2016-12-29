<?php
/*custom post type*/
// Our custom post type function
function create_post_type() {

	register_post_type( 'Editorials',
	// CPT Options
		array(
			'labels' => array(
				'name' => __( 'Editorials' ),
				'singular_name' => __( 'Editorial' )
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'editorials'),
			'supports' => array( 'title', 'editor', 'thumbnail', 'revisions', 'comments' ),
        	'show_ui' => true,
		)
	);
	register_post_type( 'Local news',
	// CPT Options
		array(
			'labels' => array(
				
				'name' => __( 'Local news' ),
				'singular_name' => __( 'Local new' )
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'local news'),
			'supports' => array( 'title', 'editor', 'thumbnail', 'revisions', 'comments' ),
        	'show_ui' => true,
		)
	);
}
// Hooking up our function to theme setup
add_action( 'init', 'create_post_type' );
/*end custom post type*/
?>