<?php
/**
 * Functions to register client-side assets (scripts and stylesheets) for the
 * Gutenberg block.
 *
 * @package kcm
 */

/**
 * Registers all block assets so that they can be enqueued through Gutenberg in
 * the corresponding context.
 *
 * @see https://wordpress.org/gutenberg/handbook/designers-developers/developers/tutorials/block-tutorial/applying-styles-with-stylesheets/
 */
function accordion_block_init() {
	// Skip block registration if Gutenberg is not enabled/merged.
	if ( ! function_exists( 'register_block_type' ) ) {
		return;
	}
	$dir = get_stylesheet_directory() . '/blocks';

	$index_js = 'accordion/index.js';
	wp_register_script(
		'accordion-block-editor',
		get_stylesheet_directory_uri() . "/blocks/{$index_js}",
		[
			'wp-blocks',
			'wp-i18n',
			'wp-element',
			'wp-block-editor'
		],
		filemtime( "{$dir}/{$index_js}" )
	);

	register_block_type( 'kcm/accordion', [
		'editor_script' => 'accordion-block-editor',
		'editor_style'  => 'accordion-block-editor',
		'style'         => 'accordion-block',
	] );
}

add_action( 'init', 'accordion_block_init' );