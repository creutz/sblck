<?php
/**
 * @file
 * Theming functions for the revolution_slider module.
 *
 * Preprocessor functions fill variables for templates and helper
 * functions to make theming easier.
 */

/**
 * Default theme implementation for revolution_slider_list
 */
function theme_revolution_slider_list(&$vars) {
  // Reference configuration variables
  $optionset = &$vars['settings']['optionset'];
  $items = &$vars['items'];
  $attributes = &$vars['settings']['attributes'];
  $type = &$vars['settings']['type'];
  $output = '';

  // Build the list
  if (!empty($items)) {
    $output .= "<$type" . drupal_attributes($attributes) . '>';
    foreach ($items as $i => $item) {
      // If the slide hasn't been set, build the slide using the image
      // attributes given (assumes we're using a multi-image field)
      // @todo need to allow for different types of field and collection fields
      if (!isset($item['slide'])) {
        $image_options = array(
          'style_name' => $optionset->imagestyle_normal,
          'path'       => $item['uri'],
          'height'     => $item['height'],
          'width'      => $item['width'],
          'title'      => $item['title'],
        );
      }

      $output .= theme('revolution_slider_list_item', array(
        'item' => isset($item['slide']) ? $item['slide'] : theme_image_style($image_options),
        'optionset' => $optionset,
      ));
    }
    $output .= "</$type>";
  }

  return $output;
}

/**
 * Default theme implementation for revolution_slider_list_item
 */
function theme_revolution_slider_list_item(&$vars) {
  // Reference configuration variables
  $item = &$vars['item'];
  $attributes = &$vars['settings']['attributes'];
  $output = '';
  $output .= $item;

  return $output;
}

/**
 * Template preprocess handler for 'revolution_slider' theme.
 */
function template_preprocess_revolution_slider(&$vars) {

  // Reference configuration variables
  $optionset = &$vars['settings']['optionset'];
  $settings = &$vars['settings'];
  $items = &$vars['items'];

  // Set the list type
  // @todo make this configurable
  $settings['type'] = 'ul';

  // Load the selected optionset
  if (!empty($optionset)) {
    $optionset = revolution_slider_optionset_load($optionset);
  }

  // Check if an optionset was loaded
  if (empty($optionset)) {
    // Fall back to 'default' option set
    $optionset = revolution_slider_optionset_load('default');
    watchdog('revolution_slider', 'Fallback to default optionset.', array(), WATCHDOG_WARNING);
  }

  // Configure attributes for containing elements
  $attributes = array();
  // Merge with defined attributes
  if (isset($settings['attributes']) and is_array($settings['attributes'])) {
    $attributes += $settings['attributes'];
  }

  // Each revolution_slider instance gets a unique id
  $revolution_slider_id = &drupal_static('revolution_slider_id', 0);
  $attributes['id'] = 'revolution_slider-' . ++$revolution_slider_id;
  
  // Add default class
  $attributes['class'][] = 'fullwidthbanner';
  // Add the attributes to the settings array.
  
  // Add stylesheet
  drupal_add_css(drupal_get_path('module', 'revolution_slider') . '/theme/settings.css');
  
  // Add javascript
  drupal_add_js(drupal_get_path('module', 'revolution_slider') . '/js/jquery.themepunch.plugins.min.js');
  drupal_add_js(drupal_get_path('module', 'revolution_slider') . '/js/jquery.themepunch.revolution.min.js');
  
  $settings['attributes'] = $attributes;

  // Finally, add the revolution_slider library
  revolution_slider_add($settings['attributes']['id'], $optionset);
}


/**
 * Preprocess function for revolution_slider_list_item
 */
function template_preprocess_revolution_slider_list(&$vars) {
  // Reset the list of attributes
  $vars['settings']['attributes'] = array(
    // @todo find a way to detect the outter container class if possible
    'class' => array('slides'),
  );
}

/**
 * Preprocess function for revolution_slider_list_item
 */
function template_preprocess_revolution_slider_list_item(&$vars) {
  // Reset the list of attributes
  $vars['settings']['attributes'] = array();
  //dpm($vars);

  //$vars['item'] = implode('', $vars['item']);
  // @todo add attributes for thumbnails
}
