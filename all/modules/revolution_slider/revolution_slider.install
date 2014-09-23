<?php

/**
 * @file
 * Install, update, and uninstall functions for the revolution_slider module.
 */

/**
 * Implements hook_field_schema().
 *
 * Defines the database schema of the field, using the format used by the
 * Schema API.
 *
 * The data we will store here is just one 7-character element, even
 * though the widget presents the three portions separately.
 *
 * All implementations of hook_field_schema() must be in the module's
 * .install file.
 *
 * @see http://drupal.org/node/146939
 * @see schemaapi
 * @see hook_field_schema()
 * @ingroup revolution_slider
 */
function revolution_slider_field_schema($field) {
	switch($field['type']) {
	    case 'revolution_slider_layer':
	      $columns = array(
	        'layer' => array(
	          'type' => 'varchar',
	          'length' => '128',
	          'not null' => FALSE,
	        ),
	        'animation' => array(
	          'type' => 'varchar',
	          'length' => '128',
	          'not null' => FALSE,
	        ),
	        'easing' => array(
	          'type' => 'varchar',
	          'length' => '128',
	          'not null' => FALSE,
	        ),
	        'data_x' => array(
	          'type' => 'text',
	          'not null' => FALSE,
	        ),
	        'data_y' => array(
	          'type' => 'text',
	          'not null' => FALSE,
	        ),
	        'speed' => array(
	          'type' => 'text',
	          'not null' => FALSE,
	        ),
	        'startafter' => array(
	          'type' => 'text',
	          'not null' => FALSE,
	        ),
	        'endspeed' => array(
	          'type' => 'text',
	          'not null' => FALSE,
	        ),
	        'end' => array(
	          'type' => 'text',
	          'not null' => FALSE,
	        ),
	        'endeasing' => array(
	          'type' => 'text',
	          'not null' => FALSE,
	        ),
			'img' => array(
	        	'type' => 'int',
	        	'not null' => FALSE,
	        	'unsigned' => TRUE,
	      	),
	      	'div' => array(
      			'type' => 'text',
      			'not null' => FALSE,
	      	),
	      	'h1' => array(
      			'type' => 'text',
      			'not null' => FALSE,
	      	),
	      	'h2' => array(
      			'type' => 'text',
      			'not null' => FALSE,
	      	),
	      	'h3' => array(
      			'type' => 'text',
      			'not null' => FALSE,
	      	),
	      	'h4' => array(
      			'type' => 'text',
      			'not null' => FALSE,
	      	),
	      	'h5' => array(
      			'type' => 'text',
      			'not null' => FALSE,
	      	),
	      	'h6' => array(
      			'type' => 'text',
      			'not null' => FALSE,
	      	),
	      	'css' => array(
      			'type' => 'text',
      			'not null' => FALSE,
	      	),
	      );
	      $indexes = array(

	      );
	      break;
	      
	      case 'revolution_slider_slide':
	      
	      $columns = array(
			'transition' => array(
	          'type' => 'varchar',
	          'length' => '128',
	          'not null' => FALSE,
	        ),
       		'masterspeed' => array(
	          'type' => 'text',
	          'not null' => FALSE,
	        ),
       		'slotamount' => array(
	          'type' => 'varchar',
	          'length' => '128',
	          'not null' => FALSE,
	        ),
	        'image' => array(
	        		'type' => 'int',
	        		'not null' => FALSE,
	        		'unsigned' => TRUE,
	        ),
       		'link' => array(
	          'type' => 'text',
	          'not null' => FALSE,
	        ),
       		'target' => array(
	          'type' => 'text',
	          'not null' => FALSE,
	        ),
       		'linktoslide' => array(
	          'type' => 'text',
	          'not null' => FALSE,
	        ),
       		'delay' => array(
	          'type' => 'text',
	          'not null' => FALSE,
	        ),
       		'fsenabled' => array(
	          'type' => 'varchar',
	          'length' => '128',
	          'not null' => FALSE,
	        ),
       		'fstransition' => array(
	          'type' => 'varchar',
	          'length' => '128',
	          'not null' => FALSE,
	        ),
       		'fsmasterspeed' => array(
	          'type' => 'text',
	          'not null' => FALSE,
	        ),
       		'fsslotamount' => array(
	          'type' => 'text',
	          'not null' => FALSE,
	        ),
	      );  
	      $indexes = array(
	      	'transition' => array('transition'),
	      );
	          
	      break;
		}
  return array(
    'columns' => $columns,
    'indexes' => $indexes,
  );
}

/**
 * @file
* Installation actions for revolution_slider
*/

/**
 * Implements hook_schema().
*/
function revolution_slider_schema() {
	$schema = array();

	$schema['revolution_slider_optionset'] = array(
			'description' => 'Store option sets for revolution_slider instances.',
			'export' => array(
					'key' => 'name',
					'identifier' => 'preset',
					'default hook' => 'revolution_slider_default_presets',
					'api' => array(
							'owner' => 'revolution_slider',
							'api' => 'revolution_slider_default_preset',
							'minimum_version' => 1,
							'current_version' => 1,
					),
			),
			'fields' => array(
					'name' => array(
							'description' => 'The machine-readable option set name.',
							'type' => 'varchar',
							'length' => 255,
							'not null' => TRUE,
					),
					'title' => array(
							'description' => 'The human-readable title for this option set.',
							'type' => 'varchar',
							'length' => 255,
							'not null' => TRUE,
					),
					'theme' => array(
							'description' => 'The Revolution Slider theme.',
							'type' => 'varchar',
							'length' => 255,
							'not null' => TRUE,
							'default' => 'classic',
					),
					'imagestyle_normal' => array(
							'description' => 'The image style for normal images.',
							'type' => 'varchar',
							'length' => 255,
							'not null' => TRUE,
							'default' => 'revolution_slider_full',
					),
					'imagestyle_thumbnail' => array(
							'description' => 'The image style for thumbnail images.',
							'type' => 'varchar',
							'length' => 255,
							'not null' => TRUE,
							'default' => 'revolution_slider_thumbnail',
					),
					'options' => array(
							'description' => 'The options array.',
							'type' => 'blob',
							'size' => 'big',
							'serialize' => TRUE,
					),
			),
			'primary key' => array('name'),
	);

	return $schema;
}

/**
 * Implements hook_install().
 *
 * Adds a 'default' option set for fresh installs.
 */
function revolution_slider_install() {
	// Do nothing for now
}

/**
 * Implements hook_uninstall().
 */
function revolution_slider_uninstall() {
	variable_del('revolution_slider_debug');
}


/**
 * Implements hook_update_N().
 *
 * Remove/Update table fields to better suit revolution_slider
 */
function revolution_slider_update_7001(&$sandbox) {
	$field_new = array(
			'description' => 'The image style for normal images.',
			'type' => 'varchar',
			'length' => 255,
			'not null' => TRUE,
			'default' => 'revolution_slider_full',
	);
	// Change the default image style
	db_change_field('revolution_slider_optionset', 'imagestyle_normal', $field_new, array());
	// Drop the unused table column
	db_drop_field('revolution_slider_optionset', 'imagestyle_thumb');
}

/**
 * Implements hook_update_N().
 *
 * Enables the Image module since it is now explicitly listed as a
 * dependency.
 */
function revolution_slider_update_7002(&$sandbox) {
	module_enable(array('image'));
}

function revolution_slider_update_7201(&$sandbox) {
	$field_new = array(
			'description' => 'The image style for thumbnail images.',
			'type' => 'varchar',
			'length' => 255,
			'not null' => TRUE,
			'default' => 'revolution_slider_thumbnail',
	);
	// Change the default image style
	db_add_field('revolution_slider_optionset', 'imagestyle_thumbnail', $field_new, array());
}

