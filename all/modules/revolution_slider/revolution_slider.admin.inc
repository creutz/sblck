<?php
/**
 * @file
 * Administrative page callbacks for the revolution_slider module.
 */

/**
 * Submit handler for adding a new option set.
 */
function revolution_slider_form_optionset_add_submit($form, &$form_state) {
  $optionset = revolution_slider_optionset_create(array('name' => $form_state['values']['name'], 'title' => $form_state['values']['title']));

  $saved = revolution_slider_optionset_save($optionset, TRUE);

  if ($saved) {
    drupal_set_message(t('Option set %name was created.', array('%name' => $optionset->name)));
    $form_state['redirect'] = 'admin/config/media/revolution_slider/edit/' . $optionset->name;
  }
  else {
    drupal_set_message(t('Failed to create option set. Please verify your settings.'), 'error');
  }
}

/**
 * Defines the form elements used to edit the revolution_slider library options
 *
 * @param array $options [optional]
 *  Pass in a set of default values for the options
 * @return array
 *  Returns the option set array
 */
function revolution_slider_option_elements($options = array()) {
  $form = array();

  // General Slideshow and Animiation Settings
  $form['revolution_slider'] = array(
    '#type' => 'fieldset',
    '#title' => t('General Slideshow and Animation Settings'),
  );

  $form['revolution_slider']['delay'] = array(
    '#type' => 'textfield',
    '#title' => t('Delay'),
    '#description' => t('Set the speed of animations, in milliseconds (Default: 9000)'),
    '#element_validate' => array('_revolution_slider_validate_positive_integer'),
    '#default_value' => isset($options['delay']) ? $options['delay'] : _revolution_slider_optionset_defaults('delay'),
    '#size' => 30,
  );
  
  $form['revolution_slider']['startheight'] = array(
    '#type' => 'textfield',
    '#title' => t('Slider Height'),
    '#description' => t('Height of the slider in pixels, other screen sizes will be calculated from this value (Default: 490).'),
    '#element_validate' => array('_revolution_slider_validate_positive_integer'),
    '#default_value' => isset($options['startheight']) ? $options['startheight'] : _revolution_slider_optionset_defaults('startheight'),
    '#size' => 30,
  );

  $form['revolution_slider']['startwidth'] = array(
    '#type' => 'textfield',
    '#title' => t('Slider Width'),
    '#description' => t('Width of the slider in pixels, other screen sizes will be calculated from this value (Default: 890).'),
    '#element_validate' => array('_revolution_slider_validate_positive_integer'),
    '#default_value' => isset($options['startwidth']) ? $options['startwidth'] : _revolution_slider_optionset_defaults('startwidth'),
    '#size' => 30,
  );
  
  $form['revolution_slider']['hideThumbs'] = array(
    '#type' => 'textfield',
    '#title' => t('Hide Thumbnails'),
    '#description' => t('Amount of time in milliseconds before thumbnails are hidden (Default: 200).'),
    '#element_validate' => array('_revolution_slider_validate_positive_integer'),
    '#default_value' => isset($options['hideThumbs']) ? $options['hideThumbs'] : _revolution_slider_optionset_defaults('hideThumbs'),
    '#size' => 4,
  );
  
  $form['revolution_slider']['touchenabled'] = array(
  		'#type' => 'select',
  		'#title' => t('Touch Enabled?'),
  		'#description' => t('Allow touchenabled swipe navigation.'),
  		'#options' => array(
  				'on'   => t('on'),
  				'off'  => t('off'),
  		),
  		'#default_value' => isset($options['touchenabled']) ? $options['touchenabled'] : _revolution_slider_optionset_defaults('touchenabled'),
  );
  
  $form['revolution_slider']['shadow'] = array(
  		'#type' => 'select',
  		'#title' => t('Shadow'),
  		'#description' => t('Select the darkness of the shadow at the bottom of the slider. 0 is no shadow and 3 is the darkest (Default: 0).'),
  		'#options' => array(
  				'0'   => t('0'),
  				'1'  => t('1'),
  				'2'  => t('2'),
  				'3'  => t('3'),
  		),
  		'#default_value' => isset($options['shadow']) ? $options['shadow'] : _revolution_slider_optionset_defaults('shadow'),
  );
  
  $form['revolution_slider']['onHoverStop'] = array(
  		'#type' => 'select',
  		'#title' => t('Stop on hover?'),
  		'#description' => t('Stop the slider on hover.'),
  		'#options' => array(
  				'on'   => t('on'),
  				'off'  => t('off'),
  		),
  		'#default_value' => isset($options['onHoverStop']) ? $options['onHoverStop'] : _revolution_slider_optionset_defaults('onHoverStop'),
  );
  
  $form['revolution_slider']['thumbWidth'] = array(
  		'#type' => 'textfield',
  		'#title' => t('Thumbnail Width'),
  		'#description' => t('Width (in pixels) of one thumbnail (Default: 50).'),
  		'#size' => 3,
  		'#maxlength' => 3,
  		'#default_value' => isset($options['thumbWidth']) ? $options['thumbWidth'] : _revolution_slider_optionset_defaults('thumbWidth'),
  );
  
  $form['revolution_slider']['thumbHeight'] =  array(
  		'#type' => 'textfield',
  		'#title' => t('Thumbnail Height'),
  		'#description' => t('Height (in pixels) of one thumbnail (Default: 50).'),
  		'#size' => 3,
  		'#maxlength' => 3,
  		'#default_value' => isset($options['thumbHeight']) ? $options['thumbHeight'] : _revolution_slider_optionset_defaults('thumbHeight'),
  		//'#element_validate' => add validate on zero or greater integer
  );
  
  $form['revolution_slider']['thumbAmount'] = array(
  		'#type' => 'select',
  		'#title' => t('Thumbnail Amont'),
  		'#description' => t('The maximum amount of thumbnails to show.'),
  		'#options' => array(
  				'0'   => t('0'),
  				'1'  => t('1'),
  				'2'  => t('2'),
  				'3'  => t('3'),
  				'4'  => t('4'),
  				'5'  => t('5'),
  		),
  		'#default_value' => isset($options['thumbAmount']) ? $options['thumbAmount'] : _revolution_slider_optionset_defaults('thumbAmount'),
  );
  
  $form['revolution_slider']['fullWidth'] = array(
  		'#type' => 'radios',
  		'#title' => t('Full Width?'),
  		'#description' => t('Horizontally center images in the fullWidth slider. If the image is larger then the container width, the slider will fit the image to its height in the container and center the image horizontally.'),
  		'#default_value' => isset($options['fullWidth']) ? $options['fullWidth'] : _revolution_slider_optionset_defaults('fullWidth'),
  		'#options' => array(
  				'off' => t('No'),
  				'on' => t('Yes'),
  			)
  );
  
  $form['revolution_slider']['stopAtSlide'] = array(
  		'#type' => 'textfield',
  		'#title' => t('stopAtSlide'),
  		'#description' => t('Options are -1 or 1 to 999. To stop at the slideshow at a selected slide number, enter an integer between 1 and 999. If set to -1 the slideshow will loop without stopping. Only available if stopAfterLoops is not set to -1!'),
  		'#size' => 40,
  		'#maxlength' => 255,
  		'#default_value' => isset($options['stopAtSlide']) ? $options['stopAtSlide'] : _revolution_slider_optionset_defaults('stopAtSlide'),
  );
  $form['revolution_slider']['stopAfterLoops'] = array(
  		'#type' => 'textfield',
  		'#title' => t('stopAfterLoops'),
  		'#description' => t('Options are -1 or 1 to 999. To stop the slideshow at a selected slide number after x amount of loops, where x the integer value entered. If set to -1 the slideshow will loop without stopping. Only available if stopAtSlide not equal -1!'),
  		'#size' => 40,
  		'#maxlength' => 255,
  		'#default_value' => isset($options['stopAfterLoops']) ? $options['stopAfterLoops'] : _revolution_slider_optionset_defaults('stopAfterLoops'),
  );

  // Navigation and Control Settings
  $form['nav_controls'] = array(
    '#type' => 'fieldset',
    '#title' => t('Navigation and Control Settings'),
  );
  
  
  $form['nav_controls']['navigationType'] = array(
  		'#type' => 'select',
  		'#title' => t('Navigation Type'),
  		'#description' => t('Select the navigation bar type.'),
  		'#options' => array(
  				'bullet'   => t('Bullet'),
  				'thumb'  => t('Thumbnail'),
  				'none'  => t('None'),
  		),
  		'#default_value' => isset($options['navigationType']) ? $options['navigationType'] : _revolution_slider_optionset_defaults('navigationType'),
  );
  
  $form['nav_controls']['navigationArrows'] = array(
  		'#type' => 'select',
  		'#title' => t('Navigation Arrows'),
  		'#description' => t('Select the navigation arrow placement.'),
  		'#options' => array(
  				'nexttobullets'   => t('Next to Bullets'),
  				'verticalcentered'  => t('Vertical Centered'),
  				'none'  => t('None'),
  		),
  		'#default_value' => isset($options['navigationArrows']) ? $options['navigationArrows'] : _revolution_slider_optionset_defaults('navigationArrows'),
  );
  
  $form['nav_controls']['navigationStyle'] = array(
  		'#type' => 'select',
  		'#title' => t('Navigation Style'),
  		'#description' => t('The navigation bullet style (Default: navbar).'),
  		'#options' => array(
  				'round'   => t('round'),
  				'navbar'  => t('navbar'),
  		),
  		'#default_value' => isset($options['navigationStyle']) ? $options['navigationStyle'] : _revolution_slider_optionset_defaults('navigationStyle'),
  );
  
  $form['nav_controls']['navigationHAlign'] = array(
  		'#type' => 'select',
  		'#title' => t('navigationHAlign'),
  		'#description' => t('The horizontal alignment of bullets/thumbnails (Default: center).'),
  		'#options' => array(
  				'left'   => t('Left'),
  				'center'  => t('Center'),
  				'right'  => t('Right'),
  		),
  		'#default_value' => isset($options['navigationHAlign']) ? $options['navigationHAlign'] : _revolution_slider_optionset_defaults('navigationHAlign'),
  );
  
  $form['nav_controls']['navigationVAlign'] = array(
  		'#type' => 'select',
  		'#title' => t('navigationVAlign'),
  		'#description' => t('The vertical alignment of bullets/thumbnails (Default: bottom).'),
  		'#options' => array(
  				'top'   => t('Top'),
  				'center'  => t('Center'),
  				'bottom'  => t('Bottom'),
  		),
  		'#default_value' => isset($options['navigationVAlign']) ? $options['navigationVAlign'] : _revolution_slider_optionset_defaults('navigationVAlign'),
  );
  
  $form['nav_controls']['navigationHOffset'] = array(
  		'#type' => 'textfield',
  		'#title' => t('navigationHOffset'),
  		'#description' => t('Offset (in pixels) from current horizontal position of bullets / thumbnails negative and positive direction (Default: 10).'),
  		'#element_validate' => array('_revolution_slider_validate_positive_integer'),
  		'#default_value' => isset($options['navigationHOffset']) ? $options['navigationHOffset'] : _revolution_slider_optionset_defaults('navigationHOffset'),
  		'#size' => 30,
  );
  
  $form['nav_controls']['navigationVOffset'] = array(
  		'#type' => 'textfield',
  		'#title' => t('navigationVOffset'),
  		'#description' => t('Offset (in pixels) from current vertical position of bullets / thumbnails negative and positive direction (Default: 10).'),
  		'#element_validate' => array('_revolution_slider_validate_positive_integer'),
  		'#default_value' => isset($options['navigationVOffset']) ? $options['navigationVOffset'] : _revolution_slider_optionset_defaults('navigationVOffset'),
  		'#size' => 30,
  );
  
  $form['nav_controls']['soloArrowLeftHAlign'] = array(
  		'#type' => 'select',
  		'#title' => t('soloArrowLeftHAlign'),
  		'#description' => t('The horizontal alignment of left navigation arrow. (Default: None).'),
  		'#options' => array(
  				'left'   => t('Left'),
  				'center'  => t('Center'),
  				'right'  => t('Right'),
  				'null'  => t('None'),
  		),
  		'#default_value' => isset($options['soloArrowLeftHAlign']) ? $options['soloArrowLeftHAlign'] : _revolution_slider_optionset_defaults('soloArrowLeftHAlign'),
  );
  
  $form['nav_controls']['soloArrowLeftVAlign'] = array(
  		'#type' => 'select',
  		'#title' => t('soloArrowLeftVAlign'),
  		'#description' => t('The vertical alignment of the left navigation arrow. (Default: None).'),
  		'#options' => array(
  				'top'   => t('Top'),
  				'center'  => t('Center'),
  				'bottom'  => t('Bottom'),
  				'null'  => t('None'),
  		),
  		'#default_value' => isset($options['soloArrowLeftVAlign']) ? $options['soloArrowLeftVAlign'] : _revolution_slider_optionset_defaults('soloArrowLeftVAlign'),
  );
  
  $form['nav_controls']['soloArrowLeftHOffset'] = array(
  		'#type' => 'textfield',
  		'#title' => t('soloArrowLeftHOffset'),
  		'#description' => t('Offset (in pixels) from current horizontal position of of left navigation arrow (Default: 0).'),
  		'#element_validate' => array('_revolution_slider_validate_positive_integer'),
  		'#default_value' => isset($options['soloArrowLeftHOffset']) ? $options['soloArrowLeftHOffset'] : _revolution_slider_optionset_defaults('soloArrowLeftHOffset'),
  		'#size' => 4,
  );
  
  $form['nav_controls']['soloArrowLeftVOffset'] = array(
  		'#type' => 'textfield',
  		'#title' => t('soloArrowLeftVOffset'),
  		'#description' => t('Offset (in pixels) from current vertical position of of left navigation arrow (Default: 0).'),
  		'#element_validate' => array('_revolution_slider_validate_positive_integer'),
  		'#default_value' => isset($options['soloArrowLeftVOffset']) ? $options['soloArrowLeftVOffset'] : _revolution_slider_optionset_defaults('soloArrowLeftVOffset'),
  		'#size' => 4,
  );
  
  $form['nav_controls']['soloArrowRightHAlign'] = array(
  		'#type' => 'select',
  		'#title' => t('soloArrowRightHAlign'),
  		'#description' => t('The horizontal alignment of right navigation arrow. (Default: None).'),
  		'#options' => array(
  				'right'   => t('Left'),
  				'center'  => t('Center'),
  				'right'  => t('Right'),
  				'null'  => t('None'),
  		),
  		'#default_value' => isset($options['soloArrowRightHAlign']) ? $options['soloArrowRightHAlign'] : _revolution_slider_optionset_defaults('soloArrowRightHAlign'),
  );
  
  $form['nav_controls']['soloArrowRightVAlign'] = array(
  		'#type' => 'select',
  		'#title' => t('soloArrowRightVAlign'),
  		'#description' => t('The vertical alignment of the right navigation arrow. (Default: None).'),
  		'#options' => array(
  				'top'   => t('Top'),
  				'center'  => t('Center'),
  				'bottom'  => t('Bottom'),
  				'null'  => t('None'),
  		),
  		'#default_value' => isset($options['soloArrowRightVAlign']) ? $options['soloArrowRightVAlign'] : _revolution_slider_optionset_defaults('soloArrowRightVAlign'),
  );
  
  $form['nav_controls']['soloArrowRightHOffset'] = array(
  		'#type' => 'textfield',
  		'#title' => t('soloArrowRightHOffset'),
  		'#description' => t('Offset (in pixels) from current horizontal position of of right navigation arrow (Default: 0).'),
  		'#element_validate' => array('_revolution_slider_validate_positive_integer'),
  		'#default_value' => isset($options['soloArrowRightHOffset']) ? $options['soloArrowRightHOffset'] : _revolution_slider_optionset_defaults('soloArrowRightHOffset'),
  		'#size' => 4,
  );
  
  $form['nav_controls']['soloArrowRightVOffset'] = array(
  		'#type' => 'textfield',
  		'#title' => t('soloArrowRightVOffset'),
  		'#description' => t('Offset (in pixels) from current vertical position of of right navigation arrow (Default: 0).'),
  		'#element_validate' => array('_revolution_slider_validate_positive_integer'),
  		'#default_value' => isset($options['soloArrowRightVOffset']) ? $options['soloArrowRightVOffset'] : _revolution_slider_optionset_defaults('soloArrowRightVOffset'),
  		'#size' => 4,
  );
  
  $form['nav_controls']['navOffsetHorizontal'] = array(
  		'#type' => 'textfield',
  		'#title' => t('Hide Thumbnails'),
  		'#description' => t('Horizontal offset (in pixels) from center position. Negative values are aloud (Default: 0).'),
  		'#default_value' => isset($options['navOffsetHorizontal']) ? $options['navOffsetHorizontal'] : _revolution_slider_optionset_defaults('navOffsetHorizontal'),
  		'#size' => 4,
  );
  
  $form['nav_controls']['navOffsetVertical'] = array(
  		'#type' => 'textfield',
  		'#title' => t('Hide Thumbnails'),
  		'#description' => t('Vertical offset (in pixels) from bottom position. Negative values are aloud (Default: 0).'),
  		'#default_value' => isset($options['navOffsetVertical']) ? $options['navOffsetVertical'] : _revolution_slider_optionset_defaults('navOffsetVertical'),
  		'#size' => 4,
  );

  return $form;
}

/**
 * Form builder; Form to edit a given option set.
 */
function revolution_slider_form_optionset_edit($form, &$form_state) {

  if (empty($form_state['optionset'])) {
    $optionset = revolution_slider_optionset_create();
  }
  else {
    $optionset = $form_state['optionset'];
  }

  // Title
  $form['title'] = array(
    '#type' => 'textfield',
    '#maxlength' => '255',
    '#title' => t('Title'),
    '#description' => t('A human-readable title for this option set.'),
    '#required' => TRUE,
    '#default_value' => $optionset->title,
  );
  $form['name'] = array(
    '#type' => 'machine_name',
    '#maxlength' => '255',
    '#machine_name' => array(
      'source' => array('title'),
      'exists' => 'revolution_slider_optionset_exists',
    ),
    '#required' => TRUE,
    '#default_value' => $optionset->name,
  );

  // Show select boxes for the various image styles (thumbnail, normal, big)
  $image_style = image_style_options(FALSE);
  
  $form['image_style'] = array(
    '#type' => 'fieldset',
    '#title' => 'Image style',
    '#tree' => TRUE,
  );
  $form['image_style']['normal'] = array(
    '#type' => 'select',
    '#title' => t('Normal image style'),
    '#description' => t('Image style for the main stage images.'),
    '#empty_option' => t('None (original image)'),
    '#options' => $image_style,
    '#default_value' => $optionset->imagestyle_normal,
  );
  $form['image_style']['thumbnail'] = array(
    '#type' => 'select',
    '#title' => t('Thumbnail image style'),
    '#description' => t('Image style for the thumbnail images.'),
    '#empty_option' => t('None (original image)'),
    '#options' => $image_style,
    '#default_value' => $optionset->imagestyle_thumbnail,
    // @todo enable/disable this option based on the type of options selected
    // Ex: Thumbnails should be enabled
  );

  // Options Vertical Tab Group table
  $form['options'] = array(
    '#type' => 'vertical_tabs',
  );

  $default_options = revolution_slider_option_elements($optionset->options);
  // Add the options to the vertical tabs section
  foreach ($default_options as $key => $value) {
    $form['options'][] = $value;
  }

  return $form;
}

/**
 * Validate a form element that should have an integer value.
 */
function _revolution_slider_validate_positive_integer($element, &$form_state) {
  $value = $element['#value'];
  if ($value !== '' && (!is_numeric($value) || intval($value) != $value || $value < 0)) {
    form_error($element, t('%name must be a positive integer.', array('%name' => $element['#title'])));
  }
}

/**
 * Validate a form element that should have a number as value.
 */
function _revolution_slider_validate_number($element, &$form_state) {
  $value = $element['#value'];
  if ($value !== '' && !is_numeric($value)) {
    form_error($element, t('%name must be a number.', array('%name' => $element['#option_name'])));
  }
}

/**
 * Form builder; Form to delete a given option set.
 */
function revolution_slider_optionset_form_delete($form, &$form_state, $optionset) {
  $form_state['optionset'] = &$optionset;

  // Deleting an export in code will revert it.
  $op = ($optionset->export_type & EXPORT_IN_CODE) ? 'Revert' : 'Delete';

  return confirm_form(
    $form,
    t('Are you sure you want to @action the option set %name?', array('@action' => t(drupal_strtolower($op)), '%name' => $optionset->name)),
    'admin/config/media/revolution_slider',
    NULL,
    t($op),  t('Cancel')
  );
}

/**
 * Submit handler for deleting an option set.
 */
function revolution_slider_optionset_form_delete_submit($form, &$form_state) {
  $optionset = &$form_state['optionset'];
  $op = ($optionset->export_type & EXPORT_IN_CODE) ? 'reverted' : 'deleted';

  ctools_include('export');
  ctools_export_crud_delete('revolution_slider_optionset', $optionset);

  drupal_set_message(t('Option set %name was ' . $op . '.', array('%name' => $optionset->name)));
  $form_state['redirect'] = 'admin/config/media/revolution_slider';
}



/**
 * Submit handler for the advanced module settings.
 */
function revolution_slider_form_settings_submit($form, &$form_state) {
  // Do nothing for now
}