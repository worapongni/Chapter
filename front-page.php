<?php 

/* Front Page */
get_header(); ?>

	<div class="site-content clearfix">

			<?php if (have_posts()) : 
			
				while (have_posts()) : the_post(); 

					get_template_part( 'content', 'page' );

				endwhile;

				else :
					echo '<p>No content found</p>';
			endif; ?>

			<!-- home-columns -->
			<div class="home-columns clearfix">

				<!-- one-half -->
				<div class="one-half">

				<h2>Latest <?php echo get_cat_name(6); ?></h2>

					<?php
						$args = array(
							'cat' => 6,
							'posts_per_page' => 2
						);


						// opinion posts loop begins here
						$opinionPosts = new WP_Query($args);

						if( $opinionPosts->have_posts() ) :
							while( $opinionPosts->have_posts() ) : $opinionPosts->the_post(); ?>

							<article class="post <?php if( has_post_thumbnail() ) { ?>has-thumbnail <?php } ?>">
								<div class="post-thumbnail">
									<?php the_post_thumbnail('tiny-thumbnail'); ?>
								</div>

								<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

								<?php the_excerpt(); ?>
							</article>

							<?php endwhile;

							else :
								// fallback no content message here
						endif;

						wp_reset_postdata();
					?>

					<div class="btn">
						<a href="<?php echo get_category_link(6); ?>" class="btn-a">View all <?php echo get_cat_name(6); ?> Posts</a>
					</div>

				</div><!-- /one-half -->

				<!-- one-half -->
				<div class="one-half last">

				<h2>Latest <?php echo get_cat_name(7); ?></h2>

					<?php 
						$args = array(
						'cat' => 7,
						'posts_per_page' => 2
						);


						// opinion posts loop begins here
						$newsPosts = new WP_Query($args);

						if( $newsPosts->have_posts() ) :
							while( $newsPosts->have_posts() ) : $newsPosts->the_post(); ?>

							<article class="post <?php if( has_post_thumbnail() ) { ?>has-thumbnail <?php } ?>">
								<div class="post-thumbnail">
									<?php the_post_thumbnail('tiny-thumbnail'); ?>
								</div>

								<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

								<?php the_excerpt(); ?>
							</article>

							<?php endwhile;

							else :
								// fallback no content message here
						endif;

						wp_reset_postdata();
					?>

					<div class="btn">
						<a href="<?php echo get_category_link(7); ?>" class="btn-a">View all <?php echo get_cat_name(7); ?> Posts</a>
					</div>


				</div><!-- /one-half -->

			</div><!-- /home-columns -->

	</div>

<?php get_footer();

?>
