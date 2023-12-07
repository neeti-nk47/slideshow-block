<?php
/**
 * Plugin Name:       Slideshow Block
 * Description:       Custom Gutenberg block that fetches the latest data from a WordPress site and display data as a slideshow.
 * Version:           1.0
 * Author:            Neeti Kumar
 */

 if(!defined('ABSPATH')){
    header("Location: /slideshow-block");
    die("");
 }

 function slideshow_enqueue_scripts() {
   wp_enqueue_script(
      'block-script  ',
      plugin_dir_url(__FILE__) . 'block.js',
      ['wp-blocks', 'wp-components', 'wp-element', 'wp-api-fetch'],
      null,
      true
  );
  wp_enqueue_style(
   'block-style',
   plugin_dir_url(__FILE__) . 'block.css',
   array(),
   '1.0.0'
);
wp_set_script_translations('block', 'slideshow-block');
}

add_action('enqueue_block_editor_assets', 'slideshow_enqueue_scripts');

// Register the Gutenberg block
function my_register_block() {
   register_block_type('slideshow-block/script-block', array(
       'editor_script' => 'block-script',
       'editor_style' => 'block-style',
   ));
}

add_action('init', 'my_register_block');


 
