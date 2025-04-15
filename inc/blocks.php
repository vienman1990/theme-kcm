<?php 

if ( file_exists( get_template_directory() . '/blocks/' ) ) {
    $block_php_files = glob( get_template_directory() . '/blocks/*.php' );

    if(!empty($block_php_files)) {
        foreach ( $block_php_files as $block_php_file ) {
            require_once $block_php_file;
        }
    }
}