<?php

	require_once dirname(__FILE__) . '/inc/mentor.inc';
	
	function mentor_js_alter(&$javascript) {
		/* Unset old version of jQuery on non-administration pages */
		if (!path_is_admin(current_path()) && (!(arg(0) == 'node' && arg(2) == 'edit'))) {
			unset($javascript['misc/jquery.js']);
		}
	
	}
	
	
	function mentor_css_alter(&$css) {
		// Unset system css files
		unset($css[drupal_get_path('module', 'system') . '/system.menus.css']);
		unset($css[drupal_get_path('module', 'system') . '/system.theme.css']);
	}
	
	function mentor_preprocess_revolution_slider(&$vars) {
		drupal_add_css(path_to_theme() . '/css/slider.css');
	}
	
	/**
	 * Implements hook_form_alter().
	 */
	function mentor_form_alter(&$form, &$form_state, $form_id) {
		$form['actions']['submit']['#attributes']['class'][] = 'btn';
		if ($form_id == 'search_block_form') {
			$form['actions']['#attributes']['class'][] = 'element-invisible';
		}
		if ($form_id == 'simplenews_block_form_1') {
			$form['#submit']['class'][] = 'btn';
		}
		if ($form_id == 'contact_site_form' || 'user_login' || 'comment_node_blog_post' ) {
			$form['actions']['submit']['#attributes']['class'][] = 'btn-success';
		}
	}
	
	function mentor_menu_local_tasks(&$variables) {
	  $output = '';
	
	  if (!empty($variables['primary'])) {
	    $variables['primary']['#prefix'] = '<h2 class="element-invisible">' . t('Primary tabs') . '</h2>';
	    $variables['primary']['#prefix'] .= '<ul class="nav nav-tabs primary">';
	    $variables['primary']['#suffix'] = '</ul>';
	    $output .= drupal_render($variables['primary']);
	  }
	
	  return $output;
	}
	
	function mentor_menu_link(&$vars) {
		$element = &$vars['element'];
		$sub_menu = '';

	
		if ($element['#href'] == '<front>' && drupal_is_front_page()) {
			$element['#attributes']['class'][] = 'active';
		}
		
		if ($element['#href'] == current_path()) {
			$element['#attributes']['class'][] = 'active';
		}
		
		if ($element['#below']) {
			$sub_menu = drupal_render($element['#below']);
		}
		
		$output = l($element['#title'], $element['#href'], $element['#localized_options']);
		return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . "</li>\n";
	}
	
	function mentor_menu_tree(&$variables) {
	 return '<ul class="nav">' . $variables['tree'] . '</ul>';
	}
	
	/**
	 * Implements hook_preprocess_html().
	 */
	function mentor_preprocess_html(&$vars) {
		$vars['jquery'] = '<script type="text/javascript" src="'.$GLOBALS['base_url'].'/'.path_to_theme().'/js/jquery.js"></script>';
		$vars['skin'] = '<link href="'.$GLOBALS['base_url'].'/'.path_to_theme().'/css/skin_'.theme_get_setting('color_scheme').'.css" rel="stylesheet"/>';
		
		if(theme_get_setting('top_button') == '1') {
			$vars['classes_array'][] = 'disable-rtt';
		}
	}
	
	/**
	 * Implements hook_preprocess_page().
	 */
	function mentor_preprocess_page(&$vars) {
		$theme = mentor_get_theme();
		$theme->page = &$vars;
		$sidebar_left = 12 - theme_get_setting('sidebar_first_grid');
		$sidebar_right = 12 - theme_get_setting('sidebar_second_grid');
		$sidebar_both = 12 - (theme_get_setting('sidebar_first_grid') + theme_get_setting('sidebar_second_grid'));
				
		if (!empty($vars['page']['sidebar_first']) && !empty($vars['page']['sidebar_second'])) {
			$vars['content_settings'] = 'span' . $sidebar_both;
			$vars['innerSpacer'] = 'no-spacer';
		} else if (!empty($vars['page']['sidebar_first']) && empty($vars['page']['sidebar_second'])) {
			$vars['content_settings'] = 'span' . $sidebar_left;
			$vars['innerSpacer'] = 'innerSpacer left';
		} else if (empty($vars['page']['sidebar_first']) && !empty($vars['page']['sidebar_second'])) {
			$vars['content_settings'] = 'span' . $sidebar_right;
			$vars['innerSpacer'] = 'innerSpacer';
		} else {
			$vars['content_settings'] = (theme_get_setting('content_grid') !== 'none') ? 'span'. theme_get_setting('content_grid') : 'span12';
			$vars['innerSpacer'] = 'no-spacer';
		}
		
		if (drupal_is_front_page()) {
			unset($vars['page']['content']['system_main']);
		}
	}

	function mentor_preprocess_comment(&$vars) {
	  	$vars['content']['links']['#attributes']['class'] = 'comment-links pull-right';
		$vars['content']['links']['comment']['#links']['comment-delete']['attributes']['class'][] = 'label';
		$vars['content']['links']['comment']['#links']['comment-reply']['attributes']['class'][] = 'label';
	  	$vars['content']['links']['comment']['#links']['comment-edit']['attributes']['class'][] = 'label';
	}

	function mentor_preprocess_region(&$vars) {		
		$theme = mentor_get_theme();
		$span = theme_get_setting($vars['region'] . '_grid');
		$vars['classes_array'] = array(drupal_html_id($vars['region']));
		$css = theme_get_setting($vars['region'] . '_css');
		
		switch ($vars['region']) {
			case 'content': 
				$vars['classes_array'][] = $theme->page['content_settings'];
				$vars['sidebar'] = $theme->page['innerSpacer']; 
			break;
	 		default: if ($span != 'none') { $vars['classes_array'][] = ('span'.$span); } break;
		}
		
		if (($css != 'none')) { $vars['classes_array'][] = $css; } else { die; }
	}

	
	function mentor_process_region(&$vars) {
		$theme = mentor_get_theme();

		$vars['messages'] = $theme->page['messages'];
		$vars['breadcrumb'] = $theme->page['breadcrumb'];
		$vars['title_prefix'] = $theme->page['title_prefix'];
		$vars['title'] = $theme->page['title'];
		$vars['title_suffix'] = $theme->page['title_suffix'];
		$vars['tabs'] = $theme->page['tabs'];
		$vars['action_links'] = $theme->page['action_links'];
		$vars['feed_icons'] = $theme->page['feed_icons'];
	}

	function mentor_preprocess_block(&$vars) {
		$theme = mentor_get_theme();
		$block = $vars['block']->module . '-' . $vars['block']->delta;
		$classes = &$vars['classes_array'];
		$title_classes = &$vars['title_attributes_array']['class'];
	
		switch ($block) {
			case 'system-main-menu':
				$classes[] = 'main-menu';
				$title_classes[] = 'element-invisible';
			break;
		}
	}
?>