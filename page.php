<?php 

/* Page */

get_header(); ?>

	<div class="site-content clearfix">

		<div class="main-column">

			<?php if (have_posts()) : 
				while (have_posts()) : the_post(); 

					get_template_part( 'content', 'page' );

				endwhile;

				else :
					echo '<p>No content found</p>';
			endif;
			?>

		</div>
	
		<div class="secondary-column">

			<?php get_sidebar(); ?>

		</div>

	</div>


<?php get_footer();

?>
