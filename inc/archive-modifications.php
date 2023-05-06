<?php
function photostudio_modify_archive_query( $query ) {
  if ( is_post_type_archive( 'photostudio_gallery' ) || is_tax( 'photostudio_gallery_category' ) ) {
    $query->set( 'post_type', array( 'post', 'photostudio_gallery' ) );
    $query->set( 'posts_per_page', 10 );
    $query->set( 'orderby', 'date' );
    $query->set( 'order', 'DESC' );
  }
}

add_action( 'pre_get_posts', 'photostudio_modify_archive_query' );
