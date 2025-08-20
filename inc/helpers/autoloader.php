<?php

/**
 * Theme Autoloader.
 *
 * @package Smashit
 */

namespace Smashit\Inc\Helpers;

function autoloader($resource = '') {
  $namespace_root = 'Smashit\\';
  $resource       = trim($resource, '\\');

  if (empty($resource) || strpos($resource, '\\') === false || strpos($resource, $namespace_root) !== 0) {
    return;
  }

  // Remove root namespace.
  $resource = str_replace($namespace_root, '', $resource);

  $path_parts = explode('\\', $resource);
  $class_name = array_pop($path_parts); // last element is class/trait name
  $sub_path   = strtolower(implode('/', $path_parts));

  // Convert class name → filename
  if (strpos($class_name, '_') !== false) {
    // underscores → hyphen
    $file_name = strtolower(str_replace('_', '-', $class_name)) . '.php';
  } elseif (preg_match('/[A-Z]/', $class_name)) {
    // camelCase → lowercase
    $file_name = strtolower($class_name) . '.php';
  } else {
    // plain
    $file_name = strtolower($class_name) . '.php';
  }

  $resource_path = sprintf(
    '%s/%s/%s',
    untrailingslashit(SMASHIT_DIRECTORY),
    $sub_path,
    $file_name
  );

  $is_valid_file = validate_file($resource_path);

  if (! empty($resource_path) && file_exists($resource_path) && (0 === $is_valid_file || 2 === $is_valid_file)) {
    require_once $resource_path;
  }
}

spl_autoload_register('\Smashit\Inc\Helpers\autoloader');
