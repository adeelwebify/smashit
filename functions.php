<?php

/**
 * Theme Functions.
 * 
 * @package Smashit
 */

if (!defined('ABSPATH')) {
  exit;
}

use Smashit\Inc\Core\Smashit_Theme;

defined('SMASHIT_DIRECTORY') or define('SMASHIT_DIRECTORY', get_template_directory());
defined('SMASHIT_DIRECTORY_URI') or define('SMASHIT_DIRECTORY_URI', get_template_directory_uri());
defined('SMASHIT_ASSETS_URI') or define('SMASHIT_ASSETS_URI', SMASHIT_DIRECTORY_URI . '/assets');
defined('SMASHIT_CSS_URI') or define('SMASHIT_CSS_URI', SMASHIT_DIRECTORY_URI . '/assets/build/css');
defined('SMASHIT_JS_URI') or define('SMASHIT_JS_URI', SMASHIT_DIRECTORY_URI . '/assets/build/js');

require_once SMASHIT_DIRECTORY . '/inc/helpers/autoloader.php';

Smashit_Theme::get_instance();
