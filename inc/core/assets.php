<?php

/**
 * Register assets.
 * 
 * @package Smashit
 */

namespace Smashit\Inc\Core;

use Smashit\Inc\Traits\Singleton;

class Assets {
  use Singleton;

  protected function __construct() {
    $this->setup_hooks();
  }

  protected function setup_hooks() {
    add_action('wp_enqueue_scripts', [$this, 'register_styles']);
    add_action('wp_enqueue_scripts', [$this, 'register_scripts']);
  }

  public function register_styles() {
    wp_register_style('smashit-styles', SMASHIT_CSS_URI . '/smashit-frontend.css');
    wp_enqueue_style('smashit-styles');
  }

  public function register_scripts() {
    wp_register_script('smashit-script', SMASHIT_JS_URI . '/smashit-frontend.js', [], '', true);
    wp_enqueue_script('smashit-script');
  }
}
