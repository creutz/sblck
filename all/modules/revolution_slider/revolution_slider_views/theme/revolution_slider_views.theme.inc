<?php

/**
 * @file
 * Theme functions for revolution_slider Views integration
 *
 * @author Mathew Winstone <mwinstone@coldfrontlabs.ca>
 */

/**
 * Defines theme_views_view_revolution_slider().
 */
function theme_views_view_revolution_slider($vars) {
  $items = array();
  $view = $vars['view'];
  $options = $vars['options'];
  $optionset = revolution_slider_optionset_load($options['optionset']);

  $img_field_name = $vars['img_field_name'];
  $img_field_field_name = 'field_' . $img_field_name;

  $row_plugin = $view->style_plugin->row_plugin;

  foreach ($vars['rows'] as $id => $row) {
    // Render the row into a slide
    $view->row_index = $id;
    $item['slide'] = $row_plugin->render($row);

    // If an image field is set, use it to set a slide thumbnail
    if (isset($row->_field_data[$view->base_field]['entity']->{$img_field_name}) and isset($row->{$img_field_field_name}[0]['raw']['uri'])) {
      $item['thumb'] = image_style_url($optionset->imagestyle_thumbnail, $row->{$img_field_field_name}[0]['raw']['uri']);
    }
    else {
      $item['thumb'] = '';
    }

    $items[] = $item;
  }

  return theme('revolution_slider', array(
    'items' => $items,
    'settings' => $options,
  ));
}
