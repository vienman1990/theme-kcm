<?php get_header(); ?>

	<main class="content">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'parts/single/head', get_post_type() );

			the_title( '<h1 class=" text-3xl font-bold mb-5">', '</h1>' );

			the_content();

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
