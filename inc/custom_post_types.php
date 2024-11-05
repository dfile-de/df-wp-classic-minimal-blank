<?php
function create_post_type_customPostType() {
    register_post_type( 'CustomPostType',
        array(
            'labels' => array(
                'name' => __( 'CustomPostType' ),
                'singular_name' => __( 'CustomPostType' )
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => array( 'title', 'editor', 'thumbnail' )
        )
    );
}
add_action( 'init', 'create_post_type_customPostType' );