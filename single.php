<?php 

get_header(); ?>

<div class="site-content clearfix">
	<!-- main-column -->
	<div class="main-column">

		<?php if (have_posts()) : 
			while (have_posts()) : the_post(); 
			
				get_template_part( 'content', 'single' );

			endwhile;

			else :
				echo '<p>No content found</p>';
		endif; ?>
	</div>

	<!-- second-column -->
	<div class="secondary-column">
		<?php get_sidebar(); ?>
	</div>
</div>

<?php get_footer();

?>
