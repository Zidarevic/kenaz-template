<?php
/*
 * functions.php
 * 
 */

/*sidebar*/
register_sidebar(array('name' => 'My new sidebar'));
/*end sidebar*/
require_once('includes/menu_functions.php');
require_once('includes/search_functions.php');
require_once('includes/custom_options_banner.php');
require_once('includes/featured_image_post.php');
require_once('includes/custom_post_type_functions.php');
require_once('includes/excerpt_functions.php');
require_once('includes/pagination_functions.php');//pagination
require_once('includes/comment-list.php');
/*set link to media file by default*/
update_option('image_default_link_type', 'file' );
/*end set link to media file by default*/






?>
