<?php
/**
 * The Header template for our theme Kenaz
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * 
 */
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<link href="<?php bloginfo ('stylesheet_url'); ?>" rel="stylesheet" type="text/css" media="screen"/>
		
		<!-- jQuery library (served from Google) -->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js" type="text/javascript"></script>
		<!-- bxSlider Javascript file -->
		<script src="<?php bloginfo("template_url"); ?>/bxslider/jquery.bxslider.min.js"></script>
		<!-- bxSlider CSS file -->
		<link href="<?php bloginfo("template_url"); ?>/bxslider/jquery.bxslider.css" rel="stylesheet" />
		<!-- flexSlider Javascript file -->
		<script src="<?php bloginfo("template_url"); ?>/flexslider/jquery.flexslider.js"></script>
		<!-- bxSlider CSS file -->
		<link href="<?php bloginfo("template_url"); ?>/flexslider/flexslider.css" rel="stylesheet" />
		<?php wp_head(); ?>
	</head>
	<body>
		<div class="loader"></div>
		<div id="header">
			<div id="head">
				<div class="wrapper">
					<div id="logo">
						<p><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php bloginfo("template_url"); ?>/images/logo.png" alt="back" /><?php bloginfo( 'name' ); ?></a></p>
					</div>
					<div id="appMenu">
						<?php wp_nav_menu( array( 'theme_location' => 'extra-menu' ) ); ?>
						<?php get_search_form(); ?>
					</div>
					<div class="clear"> </div>
				</div>
				<div id="menu">
					<div class="wrapper">
						<?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
					</div>
					
				</div>
				<div class="banner">
					<div class="wrapper">
						<?php do_shortcode('[sitelogo]'); ?><!--display banner-->
					</div>
				</div>
			</div>
		</div>
		<div id="main">