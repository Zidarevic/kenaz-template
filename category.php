<?php
/**
 * The template for displaying posts form selected category
 *

 */
 
get_header(); ?>
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
										<h1><?php if (strlen($post->post_title) > 100) {
									
												echo substr(the_title($before = '', $after = '', FALSE), 0, 100) . '...'; } else {
										
													the_title();
											} ?>
										</h1>
										<a href="<?php the_permalink(); ?>" title="Read article <?php the_title(); ?>" class="more-link">Read article</a><?php
								echo '</div></li>';
							endwhile; endif; wp_reset_postdata(); ?>
					</ul>
				</div>
				<div id="mainLeft">
					<div id="categoryList">
						<?php global $query_string;
							$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
							$query_args = explode("&", $query_string);							
							$cat_query = array( 'posts_per_page' => 6, 'paged' => $paged );
							foreach($query_args as $key => $string) {
								$query_split = explode("=", $string);
								$cat_query[$query_split[0]] = urldecode($query_split[1]);
							} // foreach
							$the_query = new WP_Query($cat_query);
							if ( $the_query->have_posts() ) :
						?>
						<!-- the loop -->
						<h1 class="archive-title"> <?php single_cat_title( '', true ); ?></h1>
						<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
							<li>
								<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
								<small class="date"><?php the_time('F j, Y') ?></small><small class="author">Author: <?php the_author();?></small><small class="comments"><?php comments_number( '0 Comments', '1 Comment', '% Comments', 'comments-link', 'Comments closed'); ?></small>
								<div class="entry">
									<div class="left"><?php the_post_thumbnail(); ?></div>
									<div class="right">
										<?php the_excerpt(); ?>
										<a href="<?php the_permalink(); ?>" title="Read article <?php the_title(); ?>" class="more-link">Read article</a>
									</div>
								</div>
							</li>
						<?php endwhile; ?>
						<?php
						if (function_exists(custom_pagination)) {
								
							custom_pagination($the_query->max_num_pages,"",$paged);
						}
						?>
						<div style="clear: both;"></div>
						<!-- end of the loop -->
						<?php wp_reset_postdata(); ?>
							<?php else :  // no results?>
								<h1 class="archive-title"> <?php single_cat_title( '', true ); ?></h1>
								<article>
									<h1 class="noPosts">Sorry, no posts :(</h1>
								</article>
						<?php endif; ?>
					</div>
					<div class="medium-banner">
						<?php do_shortcode('[sitelogo]'); ?><!--display banner-->
					</div>
				</div>
				<div id="mainRight">
					<?php get_sidebar(); ?>
				</div>
				<div class="clear"> </div>
			</div>
			<?php get_footer(); ?>