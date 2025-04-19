<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Kcm
 */

get_header();
?>

	<?php get_template_part( 'parts/top/hero'); ?>
	<?php get_template_part( 'parts/top/column'); ?>
	<?php get_template_part( 'parts/top/news'); ?>

	

<?php
get_footer();
