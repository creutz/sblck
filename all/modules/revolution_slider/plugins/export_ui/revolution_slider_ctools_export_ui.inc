<?php

/**
 * @file
 * Export interface plugin
 *
 * @author Mathew Winstone <mwinstone@coldfrontlabs.ca>
 */


/**
 * Define this Export UI plugin.
 */
$plugin = array(
  'schema' => 'revolution_slider_optionset',  // As defined in hook_schema().
  'access' => 'administer revolution_slider',  // Define a permission users must have to access these pages.

  // Define the menu item.
  'menu' => array(
    'menu prefix' => 'admin/config/media',
    'menu item' => 'revolution_slider',
    'menu title' => 'Revolution Slider',
    'menu description' => 'Administer Revolution Slider presets.',
  ),

  // Define user interface texts.
  'title singular' => t('optionset'),
  'title plural' => t('optionsets'),
  'title singular proper' => t('Revolution Slider optionset'),
  'title plural proper' => t('Revolution Slider optionsets'),

  // Define the names of the functions that provide the add/edit forms.
  'form' => array(
    'settings' => 'revolution_slider_ctools_export_ui_form',
    'validate' => 'revolution_slider_ctools_export_ui_form_validate',
    'submit' => 'revolution_slider_ctools_export_ui_form_submit',
  ),
);

/**
 * Export UI form
 */
function revolution_slider_ctools_export_ui_form(&$form, &$form_state) {
  // Load the admin form include
  module_load_include('inc', 'revolution_slider', 'revolution_slider.admin');

  // Make optionset reference in form_state
  $form_state['optionset'] = &$form_state['item'];

  // Load the configuration form
  $form = drupal_retrieve_form('revolution_slider_form_optionset_edit', $form_state);
}

/**
 * Validation handler
 */
function revolution_slider_ctools_export_ui_form_validate(&$form, &$form_state) {
  // @todo
}

/**
 * Submit handler
 */
function revolution_slider_ctools_export_ui_form_submit(&$form, &$form_state) {
  // Edit the reference to $form_state['optionset'] which will in turn
  // reference $form_state['item'] which is what CTools is looking for.
  $optionset = &$form_state['optionset'];
  $optionset->title = $form_state['values']['title'];
  $optionset->imagestyle_normal = $form_state['values']['image_style']['normal'];
  $optionset->imagestyle_thumbnail = $form_state['values']['image_style']['thumbnail'];

  // Assign the values to the option set
  $optionset->options = _revolution_slider_optionset_defaults();

  // Save all the values for the optionset
  foreach ($optionset->options as $key => $value) {
    if (array_key_exists($key, $form_state['values'])) {
      $optionset->options[$key] = $form_state['values'][$key];
    }
  }
}