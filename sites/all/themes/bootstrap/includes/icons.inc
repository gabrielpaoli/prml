<?php

/**
 * @file
 * Provide Bootstrap Glyphicons support via the Icon API module.
 */

require_once dirname(__FILE__) . '/common.inc';

/**
 * Implements hook_icon_providers().
 */
function bootstrap_icon_providers() {
  $providers['bootstrap'] = array(
    'title' => t('Bootstrap'),
    'url' => 'https://getbootstrap.com/docs/3.3/components/#glyphicons',
  );
  return $providers;
}

/**
 * Implements hook_icon_bundles().
 */
function bootstrap_icon_bundles() {
  $bundles['bootstrap'] = array(
    'render' => 'sprite',
    'provider' => 'bootstrap',
    'title' => t('Bootstrap'),
    'version' => t('Icons by Glyphicons'),
    'variations' => array(
      'icon-white' => t('White'),
    ),
    'settings' => array(
      'tag' => 'span',
    ),
    'icons' => _bootstrap_glyphicons(),
  );

  return $bundles;
}
