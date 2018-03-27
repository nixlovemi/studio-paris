<?php
add_action( 'after_setup_theme', 'setup_features' );
function setup_features() {
    add_theme_support( 'post-thumbnails' );
    add_image_size( 'sessao-home', 640, 480, true );
    add_image_size( 'blog-home', 640, 480, true );
    add_image_size( 'blog-single', 240, 180, true );
    add_image_size( 'product-single', 500, 500, true );
}

/**
 * Get an attachment ID given a URL.
 *
 * @param string $url
 *
 * @return int Attachment ID on success, 0 on failure
 */
function get_attachment_id( $url ) {
	$attachment_id = 0;
	$dir = wp_upload_dir();
	if ( false !== strpos( $url, $dir['baseurl'] . '/' ) ) { // Is URL in uploads directory?
		$file = basename( $url );
		$query_args = array(
			'post_type'   => 'attachment',
			'post_status' => 'inherit',
			'fields'      => 'ids',
			'meta_query'  => array(
				array(
					'value'   => $file,
					'compare' => 'LIKE',
					'key'     => '_wp_attachment_metadata',
				),
			)
		);
		$query = new WP_Query( $query_args );
		if ( $query->have_posts() ) {
			foreach ( $query->posts as $post_id ) {
				$meta = wp_get_attachment_metadata( $post_id );
				$original_file       = basename( $meta['file'] );
				$cropped_image_files = wp_list_pluck( $meta['sizes'], 'file' );
				if ( $original_file === $file || in_array( $file, $cropped_image_files ) ) {
					$attachment_id = $post_id;
					break;
				}
			}
		}
	}
	return $attachment_id;
}

function getArrUniqueCatFromPosts(){
  $arrRetCat = [];

  $cat_args=array(
    'orderby' => 'name',
    'order' => 'ASC'
     );
  $categories=get_categories($cat_args);
  foreach($categories as $category) {
    $args=array(
      'showposts' => -1,
      'category__in' => array($category->term_id),
      'caller_get_posts'=>1
    );
    $posts=get_posts($args);
    if ($posts) {
        $arrRetCat[$category->name] = $category;
    } // if ($posts
  } // foreach($categories

  return $arrRetCat;
}
