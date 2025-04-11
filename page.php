<?php get_header(); ?>

	<main class=" max-w-[1040px] mx-auto px-5 py-10">

		<?php
		while ( have_posts() ) :
			the_post();

			the_title( '<h1 class=" text-3xl font-bold my-5">', '</h1>' );

			the_content();

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
