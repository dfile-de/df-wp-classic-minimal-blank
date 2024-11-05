<?php
//Clean wp head
function df_clean_wp_head(){
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wp_generator');
	remove_action('wp_head', 'index_rel_link');
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action('wp_head', 'feed_links', 2);
	remove_action('wp_head', 'feed_links_extra', 3);
	remove_action('wp_head', 'parent_post_rel_link', 10, 0);
	remove_action('wp_head', 'start_post_rel_link', 10, 0);
	remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
	remove_action('wp_head', 'wp_shortlink_header', 10, 0);
	remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
	//Remove REST API link tag
	remove_action( 'wp_head', 'rest_output_link_wp_head', 10);
	//Remove oEmbed links
	remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10);
	//Remove REST API in HTTP Headers
	remove_action( 'template_redirect', 'rest_output_link_header', 11, 0 );
	}

add_action('init', 'df_clean_wp_head');