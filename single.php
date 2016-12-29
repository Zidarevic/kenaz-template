<?php
/**
Theme Name: Kenaz
Author: Plava Tvornica

* the single template file

*/
			get_header(); ?>
			<div class="wrapper">
				<div id="sliderSingle">
					<?php /* The loop */ 
						while ( have_posts() ) : the_post(); ?>
							<?php the_post_thumbnail('single-featured'); ?>
							<div class="titleSingle">
								<p class="date"><?php echo get_the_date( 'F j, Y' ); ?></p>
								<h1><?php if (strlen($post->post_title) > 90) {
									
									echo substr(the_title($before = '', $after = '', FALSE), 0, 90) . '...'; } else {
										
										the_title();
									} ?>
								</h1>
							</div>
						<?php endwhile; ?>
				</div>
				<div
				<div id="mainLeft">
					<div id="postSingle">
						<?php /* The loop */ 
						while ( have_posts() ) : the_post(); ?>

							<?php the_content(); ?>
							
							
					</div>
					<div class="medium-banner">
						<?php do_shortcode('[sitelogo]'); ?><!--display banner-->
					</div>
					<div class="authorinfo">
						<h2>About the Author</h2></br>
						<div class="left">
							<?php echo get_avatar( get_the_author_meta( 'user_email' ), 70 ); ?>
						</div>
						<div class="right">
							<h2><?php the_author(); ?></h2>
							<p><?php the_author_meta( 'description' ); ?></p>
						</div>
					</div>
					<div class="clear"> </div>
					<div class="postComments">
						<h2>Comments</h2>	
						<?php comments_template(); ?>
						<?php endwhile; ?>
					</div>
				</div>
				<div id="mainRight">
					<?php get_sidebar(); ?>
				</div>
				<div class="clear"> </div>
			</div>
			<?php get_footer(); ?>