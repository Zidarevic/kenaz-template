<?php
function add_logo_page_to_settings() {
		
	add_theme_page(
	
	'Theme Banner',
	'Customize Banner->',
	'manage_options',
	'edit_logo',
	'logo_edit_page'
	);
}

add_action('admin_menu', 'add_logo_page_to_settings');

function logo_edit_page() {
	
	  ?>
	  <div class="section panel">
      <h1>Custom Banner Options</h1>
      <form method="post" enctype="multipart/form-data" action="options.php">
      	<?php settings_fields('logo_options_group'); // this will come later
      	do_settings_sections('logo_options_group'); // and this too...
      	?>	<p class="submit">
      			<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
      		</p>
      </form>
<?php  }

function add_logo_options_to_page(){
		
	add_settings_section(
	'custom_logo',
	'Customize the site banner:',
	'custom_logo_fields',
	'logo_options_group'
	);
	
	$args=array(); // pass arguments to add_settings_array to use in fields
	add_settings_field( 'logo_url', "Banner Url", 'logo_upload_url' , 'logo_options_group', 'custom_logo', $args );
	// here you can add more settings fields like width, height etc... just make sure that the "logo_options_group" and "custom_logo" stay..
	// more info at:
	//http://codex.wordpress.org/Function_Reference/add_settings_field
}
add_action('admin_init','add_logo_options_to_page');

function logo_upload_url($args){
	$options=get_option('logo_options_group') ;
	?><br>
	<label for="upload_image">
		<input id="url" type="text" size="36" value="<?php echo $options['url']; ?>" name="logo_options_group[url]" />
		<input id="upload_logo_button" type="button" value="Upload Image" />
		<br />Enter an URL or upload an image for the banner.
	</label>
	<script type="text/javascript">
		jQuery(document).ready(function() {
			
			jQuery('#upload_logo_button').click(function() {
				
				formfield = jQuery('#url').attr('name');
				tb_show('', 'media-upload.php?type=image&TB_iframe=true');
				return false;
			});
			window.send_to_editor = function(html) {
				
				imgurl = jQuery('img',html).attr('src');
				jQuery('#url').val(imgurl);
				tb_remove();
				}
			});
	</script>
	<?php
		if($options['url']){
		
			echo "<br>This is your current banner: <br><img src='". $options['url'] ."' style='padding:20px;' />";
			echo "<br>To use it in a theme copy this: <blockquote>". htmlspecialchars("<?php do_shortcode('[sitelogo]'); ?>") ."</blockquote><br> To use it in a post or page copy this code:<blockquote>[sitelogo]</blockquote>";
	}
}

function custom_logo_fields(){
// you can add stuff here if you like...
}
function my_admin_scripts() {
		
	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
}
function my_admin_styles() {
		
	wp_enqueue_style('thickbox');
}
if (isset($_GET['page']) && $_GET['page'] == 'edit_logo') {
		
	add_action('admin_print_scripts', 'my_admin_scripts');
	add_action('admin_print_styles', 'my_admin_styles');
}

function get_site_logo(){
		
	$option=get_option("logo_options_group");
	if($option['url']){
			
		echo "<img src='". $option['url'] ."' />";
	}
	else {
			
		echo "Sorry, No banenr selected";
	}
}
add_shortcode('sitelogo', 'get_site_logo');



?>
