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

		<div class="grid grid-cols-3 gap-5">

		<?php if ( have_posts() ) : ?>

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				get_template_part( 'parts/top/post-item');

			endwhile;

			the_posts_navigation();

		endif;
		?>

		</div>

	</main><!-- #main -->

<?php
get_footer();
