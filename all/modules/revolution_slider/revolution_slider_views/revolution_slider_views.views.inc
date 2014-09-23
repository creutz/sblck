<?php
/**
 * @file
 * Contains core functions for the Views module support.
 */

/*
 * Implements hook_views_plugins().
 *
 * This function annnounces the style plugin for revolution_slider views.
 */
function revolution_slider_views_views_plugins() {
  return array(
    'style' => array(
      // Style plugin for the navigation.
      'revolution_slider' => array(
        'title' => t('revolution_slider'),
        'help' => t('Display the results in a revolution_slider widget.'),
        'handler' => 'revolution_slider_views_plugin_style_revolution_slider',
        'theme' => 'views_view_revolution_slider',
        'theme file' => 'revolution_slider_views.theme.inc',
        'theme path' => drupal_get_path('module', 'revolution_slider_views') . '/theme',
        'uses row plugin' => TRUE,
        'uses fields' => TRUE,
        'uses options' => TRUE,
        'type' => 'normal',
        'even empty' => FALSE,
      ),
    ),
  );
}
