<?php
/**
* A Simple Page Template
*/
?>
<?php get_header(); ?>
			<div class="wrapper">
				<div id="slider">
					<ul id="slider1">
							<?php	$recent = new WP_Query( array(
							
										'post_type' => array(
										
											'local news','editorials','post'),
											'posts_per_page' => 5,
											'orderby' => 'date',
											'meta_key' => '_thumbnail_id'
										)
									);
							if( $recent->have_posts() ) : while( $recent->have_posts() ) : $recent->the_post();
								echo '<li>'; the_post_thumbnail();
									?><div class="postSlide">
										<p class="date"><?php echo get_the_date( 'F j, Y' ); ?></p>
										<p class="comments"><?php comments_number( '0 Comments', '1 Comment', '% Comments', 'comments-link', 'Comments closed'); ?></p>
										<h1><?php the_title(); ?></h1>
										<a href="<?php the_permalink(); ?>" title="Read article <?php the_title(); ?>" class="more-link">Read article</a><?php
								echo '</div></li>';
							endwhile; endif; wp_reset_postdata(); ?>
					</ul>
				</div>
				<div id="mainLeft">
					<div id="pageSingle">
						
						<?php while(have_posts()): the_post(); ?>
							<h1><?php the_title(); ?></h1></br>
							<?php the_content(); ?>
						<?php endwhile; ?>
					</div>
				</div>
				<div id="mainRight">
					<?php get_sidebar(); ?>
				</div>
				<div class="clear"> </div>
			</div>
			<?php get_footer(); ?>