<?php
/**
Theme Name: Kenaz

Author: Plava Tvornica



* the main template file



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

					<div id="newsList">

						<h1 class="archive-title">News</h1>

						<?php

						//Get the ID of a given category

						$category_id = get_cat_ID( 'News' );

   						// Get the URL of this category

   						$category_link = get_category_link( $category_id );

   						?>

						<p><a href="<?php echo esc_url( $category_link ); ?>">See all</a></p>

						<ul>

							<?php

							$category_id = get_cat_ID('News');

							$q = array('cat' => $category_id, 'orderby' => 'post_date', 'order' => 'DESC', 'posts_per_page' => 3,'post_status' => 'publish');

							query_posts($q);

							if (have_posts()) : while (have_posts()) : the_post(); ?>

								<li>

									<?php the_post_thumbnail(); ?>

									<p class="small"><small class="date"><?php the_time('F j, Y') ?></small><small class="comments"><?php comments_number( '0 ', '1 ', '% ', 'comments-link', 'Comments closed'); ?></small></p>

									<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>	

								</li>

							<?php endwhile; ?>

						</ul>

						<?php else :  // no results?>

									<h1 class="noPosts">Sorry, no posts :(</h1>

									<style>#newsList p a{display: none;}</style>

						<?php endif; ?>

					</div>

					<div id="sportList">

						<h1 class="archive-title">Sport</h1>

						<?php

						//Get the ID of a given category

						$category_id = get_cat_ID( 'Sport' );

   						// Get the URL of this category

   						$category_link = get_category_link( $category_id );

   						?>

						<p><a href="<?php echo esc_url( $category_link ); ?>">See all</a></p>

						<ul>

							<?php

							$category_id = get_cat_ID('sport');

							$q = array('cat' => $category_id, 'orderby' => 'post_date', 'order' => 'DESC', 'posts_per_page' => 3,'post_status' => 'publish');

							query_posts($q);

							if (have_posts()) : while (have_posts()) : the_post(); ?>

								<li>

									<?php the_post_thumbnail(); ?>

									<p class="small"><small class="date"><?php the_time('F j, Y') ?></small><!--<small class="comments"><?php comments_number( '0 ', '1 ', '% ', 'comments-link', 'Comments closed'); ?></small>--></p>

									<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>		

								</li>

							<?php endwhile; ?>

						</ul>

						<?php else :  // no results?>

									<h1 class="noPosts">Sorry, no posts :(</h1>

									<style>#sportList p a{display: none;}</style>

						<?php endif; ?>

					</div>

					<div class="medium-banner">

						<?php do_shortcode('[sitelogo]'); ?><!--display banner-->

					</div>

					<div id="businessList">

						<h1 class="archive-title">Business</h1>

						<?php

						//Get the ID of a given category

						$category_id = get_cat_ID( 'Business' );

   						// Get the URL of this category

   						$category_link = get_category_link( $category_id );

   						?>

						<p><a href="<?php echo esc_url( $category_link ); ?>">See all</a></p>

						<ul>

							<?php

							$category_id = get_cat_ID('business');

							$q = array('cat' => $category_id, 'orderby' => 'post_date', 'order' => 'DESC', 'posts_per_page' => 4,'post_status' => 'publish');

							query_posts($q);

							if (have_posts()) : while (have_posts()) : the_post(); ?>

								<li>

									<?php the_post_thumbnail(); ?>

									<div class="businessRight">

										<p class="small"><small class="date"><?php the_time('F j, Y') ?></small></p>

										<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

									</div>

								</li>

							<?php endwhile; ?>

						</ul>

						<?php else :  // no results?>

									<h1 class="noPosts">Sorry, no posts :(</h1>

									<style>#businessList p a{display: none;}</style>

						<?php endif; ?>

					</div>

					<div class="medium-banner">

						<?php do_shortcode('[sitelogo]'); ?><!--display banner-->

					</div>

					<div id="carouselList">

						<h1 class="archive-title">News Carousel</h1>

						<div class="custom-navigation3">

							<a href="#" class="flex-prev">&#10094;</a>

							<div class="custom-controls-container3"></div>

							<a href="#" class="flex-next">&#10095;</a>

						</div>

						<div class="clear"> </div>

						<div id="flexslider3" class="flexslider">

							<ul class="slides">

								<?php

								$category_id = get_cat_ID('news');

								$q = array('cat' => $category_id, 'orderby' => 'post_date', 'order' => 'DESC', 'posts_per_page' => -1,'post_status' => 'publish');

								query_posts($q);

								if (have_posts()) : while (have_posts()) : the_post(); ?>

									<li>

										<?php the_post_thumbnail(); ?>

										<p class="small"><small class="date"><?php the_time('F j, Y') ?></small></p>

										<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>		

									</li>

								<?php endwhile; ?>

							</ul>

						</div>

						<?php else :  // no results?>

									<h1 class="noPosts">Sorry, no posts :(</h1>

									<style>#carouselList p a{display: none;}</style>

						<?php endif; ?>

					</div>

					<div id="customPost">

						<div id="editorialsList">

							<h1 class="archive-title">Editorials</h1>

							<div class="custom-navigation">

								<a href="#" class="flex-prev">&#10094;</a>

								<div class="custom-controls-container"></div>

								<a href="#" class="flex-next">&#10095;</a>

							</div>

							<div class="clear"> </div>

							<div id="flexslider1" class="flexslider">

								<ul class="slides">

									<?php

									$type = 'editorials';

									$args=array(

										'post_type' => $type,

										'post_status' => 'publish',

										'posts_per_page' => -1,

										//'caller_get_posts'=> 1

										);

									$my_query = null;

									$my_query = new WP_Query($args);

									if( $my_query->have_posts() ) :	while ($my_query->have_posts()) : $my_query->the_post(); ?>

									<li>

										<?php the_post_thumbnail(); ?>

										<p class="small"><small class="date"><?php the_time('F j, Y') ?></small></p>

										<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

									</li>

									<?php

									endwhile; ?>

								</ul>

							</div>

							<?php else :  // no results?>

								<h1 class="noPosts">Sorry, no posts:(</h1>

								<style>#carouselList p a{display: none;}</style>

							<?php endif; 

							wp_reset_query();  // Restore global post data stomped by the_post().

							?>

						</div>

						<div id="localnewsList">

							<h1 class="archive-title">Local News</h1>

							<div class="custom-navigation2">

								<a href="#" class="flex-prev">&#10094;</a>

									<div class="custom-controls-container2"></div>

								<a href="#" class="flex-next">&#10095;</a>

							</div>

							<div class="clear"> </div>

							<div id="flexslider2" class="flexslider">

								<ul class="slides">

									<?php

									$type = 'local news';

									$args=array(

										'post_type' => $type,

										'post_status' => 'publish',

										'posts_per_page' => -1,

										//'caller_get_posts'=> 1

										);

									$my_query = null;

									$my_query = new WP_Query($args);

									if( $my_query->have_posts() ) :	while ($my_query->have_posts()) : $my_query->the_post(); ?>

									<li>

										<?php the_post_thumbnail(); ?>

										<p class="small"><small class="date"><?php the_time('F j, Y') ?></small></p>

										<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

									</li>

									<?php

									endwhile; ?>

								</ul>

							</div>

							<?php else :  // no results?>

								<h1 class="noPosts">Sorry, no posts:(</h1>

								<style>#carouselList p a{display: none;}</style>

							<?php endif; 

							wp_reset_query();  // Restore global post data stomped by the_post().

							?>

						</div>

					</div>

				</div>

				<div id="mainRight">

					<?php get_sidebar(); ?>

				</div>

				<div class="clear"> </div>

				<div class="banner">

					<div class="wrapper">

						<?php do_shortcode('[sitelogo]'); ?><!--display banner-->

					</div>

				</div>

			</div>

			<?php get_footer(); ?>
