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
    Assets::get_instance(); // Load assets
    Theme_Support::get_instance(); // Enable theme functionality
    After_Setup_Theme::get_instance(); // Quick actions after theme setup

    $this->setup_hooks();
  }

  protected function setup_hooks() {
    // actions and filters
  }
}
