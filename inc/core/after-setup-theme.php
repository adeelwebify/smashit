<?php

/**
 * After setup theme actions.
 * 
 * @package Smashit
 */

namespace Smashit\Inc\Core;

use Smashit\Inc\Traits\Singleton;

class After_Setup_Theme {
  use Singleton;

  protected function __construct() {
    $this->setup_hooks();
  }

  protected function setup_hooks() {
    add_action('after_setup_theme', [$this, 'site_head_tag_cleaner']);
  }

  /**
   * Cleans up unnecessary WordPress meta tags and version information from the site's <head>.
   */
  public function site_head_tag_cleaner() {
    remove_action('wp_head', 'rest_output_link_wp_head', 10);
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'wp_shortlink_wp_head', 10);
    remove_action('wp_head', 'wp_generator');
    add_filter('the_generator', '__return_empty_string');
  }
}
