<?php
//remove gutenberg block library css from loading on frontend
function df_remove_wp_block_library_css(){
	wp_dequeue_style( 'wp-block-library' );
	wp_dequeue_style( 'wp-block-library-theme' );
	wp_dequeue_style( 'wc-block-style' ); // remove woocommerce block css
	wp_dequeue_style( 'global-styles' ); // remove theme.json
	wp_dequeue_style( 'classic-theme-styles' ); //  classic-theme-styles inline css
}
add_action( 'wp_enqueue_scripts', 'df_remove_wp_block_library_css', 10);