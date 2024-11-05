<?php
function my_add_custom_box() {
    add_meta_box(
        'my_meta_box_id', // id
        'My Meta Box Title', // title
        'my_show_custom_box', // callback function
        'CustomPostType', // post type
        'side', // position
        '' // priority high default low
    );
}
add_action('add_meta_boxes', 'my_add_custom_box');

function my_show_custom_box() {
  global $post;
  $value = get_post_meta( $post->ID, 'my_field_id', true );
  ?>
  <input type="text" name="my_field_id" value="<?php echo esc_attr( $value ); ?>">
  <?php
}

function my_save_custom_box( $post_id ) {
  if ( array_key_exists( 'my_field_id', $_POST ) ) {
      update_post_meta( $post_id, 'my_field_id', sanitize_text_field( $_POST['my_field_id'] ) );
  }
}
add_action( 'save_post', 'my_save_custom_box' );