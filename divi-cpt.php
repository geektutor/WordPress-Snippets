add_action( 'pre_get_posts', function ( $q ) {
  if (!is_admin() && $q->is_category()) {
    $q->set( 'post_type', ['post', 'your_cpt'] );
  }
});

/* Add a CPT to the category Divi Blog Module - https://tutorial.blackandblue.tech/wordpress/divi/how-to-use-divi-blog-module-for-custom-post-type/ */
