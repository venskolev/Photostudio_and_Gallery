<?php
/*
Plugin Name: Photostudio and Gallery Plugin
Plugin URI: https://www.alfatrex.com/
Description: A plugin to manage clients and galleries for a photo studio
Version: 1.0.0
Author: Vens Kolev
Author URI: https://www.alfatrex.com/
License: GPL2
*/

// Load plugin files
require_once plugin_dir_path( __FILE__ ) . 'includes/photostudio-client.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/photostudio-gallery.php';

// Register activation and deactivation hooks
register_activation_hook( __FILE__, 'photostudio_plugin_activate' );
register_deactivation_hook( __FILE__, 'photostudio_plugin_deactivate' );

// Activation hook function
function photostudio_plugin_activate() {
    // Code to run on plugin activation
}

// Deactivation hook function
function photostudio_plugin_deactivate() {
    // Code to run on plugin deactivation
}

// Register the shortcode generator
function register_photostudio_shortcodes() {
  add_shortcode('photostudio-gallery-shortcode', 'generate_photostudio_gallery_shortcode');
}
add_action('init', 'register_photostudio_shortcodes');

// Generate the shortcode for a gallery
function generate_photostudio_gallery_shortcode($atts) {
  $gallery_id = $atts['id'];
  $gallery = get_post($gallery_id);
  $title = $atts['title'] ?: $gallery->post_title;

  return '[photostudio-gallery id="' . $gallery_id . '" title="' . $title . '"]';
}

require_once plugin_dir_path( __FILE__ ) . 'widgets/photostudio-galleries-widget.php';
