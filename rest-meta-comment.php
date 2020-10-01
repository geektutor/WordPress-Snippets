//Add meta
$object_type = 'post';
$meta_args = array( // Validate and sanitize the meta value.
    // Note: currently (4.7) one of 'string', 'boolean', 'integer',
    // 'number' must be used as 'type'. The default is 'string'.
    'type'         => 'string',
    // Shown in the schema for the meta key.
    'description'  => 'A meta key associated with a string meta value.',
    // Return a single value of the type.
    'single'       => true,
    // Show in the WP REST API response. Default: false.
    'show_in_rest' => true,
);
register_meta( $object_type, 'youtube', $meta_args );
// Add meta to REST API
function my_rest_prepare_post( $data, $post, $request ) {
  $_data = $data->data;
  $_data[$youtube] = get_post_meta( $post->ID, 'youtube', true );
  $data->data = $_data;
  return $data;
}
add_filter( 'rest_prepare_post', 'my_rest_prepare_post', 10, 3 );
// Allow annonymous comments
add_filter( 'rest_allow_anonymous_comments', '__return_true' );

// allows you to register and send post meta to the rest api
