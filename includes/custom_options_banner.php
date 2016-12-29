<?php
/*custom options - banner*/
require_once ( get_stylesheet_directory() . '/theme-banner.php' );
function register_my_logo() {
		
	register_setting( 'logo_options_group', 'logo_options_group');
}
add_action( 'admin_init', 'register_my_logo' );
/*end custom options - banner*/
?>