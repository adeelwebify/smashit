<?php

/**
 * Theme Support.
 * 
 * @package Smashit
 */

namespace Smashit\Inc\Core;

use Smashit\Inc\Traits\Singleton;

class Theme_Support {
  use Singleton;

  protected function __construct() {
    add_action('after_setup_theme', [$this, 'theme_support']);
  }

  public function theme_support() {
    add_theme_support('title-tag');

    add_theme_support('custom-logo', [
      'width' => 200,
      'height' => 100,
      'flex-width' => true,
      'flex-height' => true
    ]);

    add_theme_support('post-thumbnails');

    add_theme_support('customize-selective-refresh-widgets');

    add_theme_support('html5', [
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
      'script',
      'style'
    ]);

    add_theme_support('wp-block-styles');

    add_theme_support('align-wide');
  }
}
