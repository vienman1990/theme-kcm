<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Kcm
 */

get_header();
?>

	<main id="primary" class="content">

		<h1 class=" text-3xl font-bold my-5"> <?php the_archive_title() ?></h1>

		<div class="grid grid-cols-3 gap-5">

		<?php if ( have_posts() ) : ?>

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				get_template_part( 'parts/top/post-item');

			endwhile;

			dm_wp_pagenavi();

		endif;
		?>

		</div>

	</main><!-- #main -->

<?php
get_footer();
