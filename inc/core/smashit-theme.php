<?php

/**
 * Bootstraps the Theme.
 * 
 * @package Smashit
 */

namespace Smashit\Inc\Core;

use Smashit\Inc\Traits\Singleton;

class Smashit_Theme {
  use Singleton;

  protected function __construct() {
    // Load classes
    Assets::get_instance();
    After_Setup_Theme::get_instance();

    $this->setup_hooks();
  }

  protected function setup_hooks() {
    // actions and filters
  }
}
