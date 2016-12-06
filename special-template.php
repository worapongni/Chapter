<?php 

/* Template Name: Special Layout */

get_header();

if (have_posts()) : 
	while (have_posts()) :
		the_post(); ?>

		<article class="page">
		
			<h2><?php the_title(); ?></h2>

			<!-- Info-box -->
			<div class="info-box">
				<h4>Disclaimeer Title</h4>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas eget ligula vestibulum, semper lacus nec, placerat nibh.</p>
			</div><!-- Info-box -->
			
			<?php the_content(); ?>
		
		</article>

	<?php endwhile;

	else :
		echo '<p>No content found</p>';
endif;

get_sidebar();
get_footer();

?>