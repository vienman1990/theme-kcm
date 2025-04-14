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

	<?php //get_template_part( 'parts/top/hero'); ?>
	<?php //get_template_part( 'parts/top/card'); ?>
	<?php //get_template_part( 'parts/top/posts'); ?>

	<div class="collapse bg-base-100 border border-base-300">
  <input type="radio" name="my-accordion-1" checked="checked" />
  <div class="collapse-title font-semibold">How do I create an account?</div>
  <div class="collapse-content text-sm">Click the "Sign Up" button in the top right corner and follow the registration process.</div>
</div>
<div class="collapse bg-base-100 border border-base-300">
  <input type="radio" name="my-accordion-1" />
  <div class="collapse-title font-semibold">I forgot my password. What should I do?</div>
  <div class="collapse-content text-sm">Click on "Forgot Password" on the login page and follow the instructions sent to your email.</div>
</div>
<div class="collapse bg-base-100 border border-base-300">
  <input type="radio" name="my-accordion-1" />
  <div class="collapse-title font-semibold">How do I update my profile information?</div>
  <div class="collapse-content text-sm">Go to "My Account" settings and select "Edit Profile" to make changes.</div>
</div>

<?php
get_footer();
