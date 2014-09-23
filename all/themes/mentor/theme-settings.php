<?php

/**
 * @file
 * General theme settings elements.
 */

function mentor_form_system_theme_settings_alter(&$form, &$form_state) {
	
	$form['dawn_settings']['#attached']['js'] = array(
			drupal_get_path('theme', 'mentor') . '/js/admin.js',
	);
	
	$form['dawn_settings']['#attached']['css'] = array(
			drupal_get_path('theme', 'mentor') . '/css/admin.css',
	);
	
	$form['mentor_settings'] = array(
			'#type' => 'vertical_tabs',
			'#weight' => -10,
			'#prefix' => t('<h3>Mentor: Theme Settings</h3>'),
	);
	
	$form['mentor_settings']['contact-page'] = array(
			'#type' => 'fieldset',
			'#title' => t('Contact Page'),
			'#weight' => 3,
	);
	
	$form['mentor_settings']['contact-page']['google-maps']= array(
			'#type' => 'fieldset',
			'#title' => t('Google Maps'),
			'#description' => t('Enter the latitude/longitude coordinates of your address. To lookup a set of coordinates, visit
					<a href="http://itouchmap.com/latlong.html" target="_blank">iTouchMap.com</a> and enter the street address.'),
	);
	
	$form['mentor_settings']['contact-page']['google-maps']['latitude'] = array(
			'#type' => 'textfield',
			'#title' => t('Longitude'),
			'#default_value' => theme_get_setting('latitude'),
	);
	
	$form['mentor_settings']['contact-page']['google-maps']['longitude'] = array(
			'#type' => 'textfield',
			'#title' => t('Longitude'),
			'#default_value' => theme_get_setting('longitude'),
	);
	
	$form['mentor_settings']['contact-page']['contact-intro'] = array(
			'#type' => 'textarea',
			'#title' => t('Title / Summary Text:'),
			'#field_prefix' => t('<div>Enter the heading / summary text to be displayed before the form on the contact page. HTML is allowed.<br/><br/></div>'),
			'#default_value' => theme_get_setting('contact-intro'),
	);
	
	$form['mentor_settings']['contact-page']['google-maps']['zoom'] = array(
			'#type' => 'select',
			'#title' => t('Zoom:'),
			'#default_value' => theme_get_setting('zoom'),
			'#options'       => array(
					'1' => t('1'),
					'2' => t('2'),
					'3' => t('3'),
					'4' => t('4'),
					'5' => t('5'),
					'6' => t('6'),
					'7' => t('7'),
					'8' => t('8'),
					'9' => t('9'),
					'10' => t('10'),
					'11' => t('11'),
					'12' => t('12'),
					'13' => t('13'),
					'14' => t('14'),
					'15' => t('15'),
			),
		);
  
	$form['mentor_settings']['regions'] = array(
  		'#type' => 'fieldset',
  		'#title' => t('Region Settings'),
  		'#description' => t('Configure the region settings.'),
		'#weight' => 2,
	);
	
	mentor_settings_global_tab($form);
  
	foreach (system_region_list('mentor') as $region => $title) {
		$form['mentor_settings']['regions'][$region] = array(
				'#type' => 'fieldset',
				'#title' => $title,
				'#description' => t('Configure the ' . $title . ' region settings.'),
				'#collapsible' => TRUE,
				'#collapsed' => TRUE,

		);
		
		$form['mentor_settings']['regions'][$region][$region . '_grid'] = array(
			'#type'          => 'select',
	  		'#title'         => t('Grid Width:'),
	  		'#default_value' => theme_get_setting($region . '_grid'),
	  		'#options'       => array(
				'none' => t('None'),
				'1' => t('span1'),
				'2' => t('span2'),
				'3' => t('span3'),
				'4' => t('span4'),
				'5' => t('span5'),
				'6' => t('span6'),
				'7' => t('span7'),
				'8' => t('span8'),
				'9' => t('span9'),
				'10' => t('span10'),
				'11' => t('span11'),
				'12' => t('span12'),
			),
		);
		
		$form['mentor_settings']['regions'][$region][$region . '_css'] = array(
				'#type'          => 'textfield',
				'#title'         => t('CSS Classes:'),
				'#default_value' => theme_get_setting($region . '_css'),
		);
		
		$form['mentor_settings']['layout'] = array(
				'#type' => 'fieldset',
				'#title' => t('Layout Settings'),
				'#weight' => 2,
		);
		
		$form['mentor_settings']['layout']['color_scheme'] = array(
				'#type'          => 'select',
				'#title'         => t('Color Scheme'),
				'#description'         => t('Select a green, blue, or orange color scheme.'),
				'#default_value' => theme_get_setting('color_scheme'),
				'#options'       => array(
						'green' => t('Green'),
						'blue' => t('Blue'),
						'orange' => t('Orange'),
				),
				'#suffix'=> t('<ul class="mentor-color-scheme"><li><a class="skin_default"></a></li><li><a class="skin_blue"></a></li><li><a class="skin_orange"></a></li>'),
		);
		
		$form['mentor_settings']['layout']['top_button'] = array(
				'#type'          => 'checkbox',
				'#title'         => t('Disable Return to Top?'),
				'#description'         => t('Checking this option will disable the "return to top" button.'),
				'#default_value' => theme_get_setting('top_button'),
		);
		
		$form['mentor_settings']['layout']['newsletter-msg'] = array(
				'#type'          => 'textarea',
				'#title'         => t('Newsletter Outro:'),
				'#description'         => t('Add text to be displayed at the bottom of the Simplenews newsletter block. HTML is allowed.'),
				'#default_value' => theme_get_setting('newsletter-msg'),
		);
		
		
	}
		
}

function mentor_settings_global_tab(&$form) {
	// Toggles
	$form['theme_settings']['toggle_logo']['#default_value'] = theme_get_setting('toggle_logo');
	$form['theme_settings']['toggle_name']['#default_value'] = theme_get_setting('toggle_name');
	$form['theme_settings']['toggle_slogan']['#default_value'] = theme_get_setting('toggle_slogan');
	$form['theme_settings']['toggle_node_user_picture']['#default_value'] = theme_get_setting('toggle_node_user_picture');
	$form['theme_settings']['toggle_comment_user_picture']['#default_value'] = theme_get_setting('toggle_comment_user_picture');
	$form['theme_settings']['toggle_comment_user_verification']['#default_value'] = theme_get_setting('toggle_comment_user_verification');
	$form['theme_settings']['toggle_favicon']['#default_value'] = theme_get_setting('toggle_favicon');
	$form['theme_settings']['toggle_secondary_menu']['#default_value'] = theme_get_setting('toggle_secondary_menu');

	$form['logo']['default_logo']['#default_value'] = theme_get_setting('default_logo');
	$form['logo']['settings']['logo_path']['#default_value'] = theme_get_setting('logo_path');
	$form['favicon']['default_favicon']['#default_value'] = theme_get_setting('default_favicon');
	$form['favicon']['settings']['favicon_path']['#default_value'] = theme_get_setting('favicon_path');

	$form['mentor_settings']['global_settings'] = array(
			'#type' => 'fieldset',
			'#title' => t('Global'),
			'#weight' => 1,
	);
	$form['theme_settings']['#collapsible'] = TRUE;
	$form['theme_settings']['#collapsed'] = TRUE;
	$form['logo']['#collapsible'] = TRUE;
	$form['logo']['#collapsed'] = TRUE;
	$form['favicon']['#collapsible'] = TRUE;
	$form['favicon']['#collapsed'] = TRUE;
	$form['mentor_settings']['global_settings']['theme_settings'] = $form['theme_settings'];
	$form['mentor_settings']['global_settings']['logo'] = $form['logo'];
	$form['mentor_settings']['global_settings']['favicon'] = $form['favicon'];

	unset($form['theme_settings']);
	unset($form['logo']);
	unset($form['favicon']);

	$form['mentor_settings']['mentor_use_default_settings'] = array(
			'#type' => 'hidden',
			'#default_value' => 0,
	);

	global $theme_key;
	$form['mentor_settings']['mentor_current_theme'] = array(
			'#type' => 'hidden',
			'#default_value' => $theme_key,
	);

}