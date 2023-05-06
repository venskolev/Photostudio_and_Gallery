<?php
// Get all published galleries

function generate_photostudio_gallery_shortcode($atts) {
    include('shortcut-photostudio-gallery.php');

    $gallery_id = $atts['id'];
    $gallery = get_post($gallery_id);
    $title = $atts['title'] ?: $gallery->post_title;

    return '[photostudio-gallery id="' . $gallery_id . '" title="' . $title . '"]';
}
