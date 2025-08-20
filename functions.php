<?php

/**
 * Theme Functions.
 * 
 * @package Smashit
 */

use Smashit\Inc\Core\Smashit_Theme;

defined('SMASHIT_DIRECTORY') or define('SMASHIT_DIRECTORY', get_template_directory());
defined('SMASHIT_DIRECTORY_URI') or define('SMASHIT_DIRECTORY_URI', get_template_directory_uri());
defined('SMASHIT_ASSETS_URI') or define('SMASHIT_ASSETS_URI', SMASHIT_DIRECTORY_URI . '/assets');
defined('SMASHIT_CSS_URI') or define('SMASHIT_CSS_URI', SMASHIT_DIRECTORY_URI . '/assets/build/css');
defined('SMASHIT_JS_URI') or define('SMASHIT_JS_URI', SMASHIT_DIRECTORY_URI . '/assets/build/js');

require_once SMASHIT_DIRECTORY . '/inc/helpers/autoloader.php';

Smashit_Theme::get_instance();

/**
 * Cleans up unnecessary WordPress meta tags and version information from the site's <head> and RSS feeds.
 */
function smashit_wordpress_cleaner() {
  remove_action('wp_head', 'rest_output_link_wp_head', 10);
  remove_action('wp_head', 'rsd_link');
  remove_action('wp_head', 'wlwmanifest_link');
  remove_action('wp_head', 'wp_shortlink_wp_head', 10);
  remove_action('wp_head', 'wp_generator');
  add_filter('the_generator', '__return_empty_string');
}

add_action('after_setup_theme', 'smashit_wordpress_cleaner');


/**
 * Enqueue styles & scripts
 */
function smashit_enqueue_scripts() {
  // Styles
  wp_register_style('smashit-styles', SMASHIT_CSS_URI . '/smashit-frontend.css');
  wp_enqueue_style('smashit-styles');

  // Scripts
  wp_register_script('smashit-script', SMASHIT_JS_URI . '/smashit-frontend.js', [], '', true);
  wp_enqueue_script('smashit-script');
}
add_action('wp_enqueue_scripts', 'smashit_enqueue_scripts');
