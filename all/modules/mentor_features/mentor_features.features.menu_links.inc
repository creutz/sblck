<?php
/**
 * @file
 * mentor_features.features.menu_links.inc
 */

/**
 * Implements hook_menu_default_menu_links().
 */
function mentor_features_menu_default_menu_links() {
  $menu_links = array();

  // Exported menu link: main-menu:blog
  $menu_links['main-menu:blog'] = array(
    'menu_name' => 'main-menu',
    'link_path' => 'blog',
    'router_path' => 'blog',
    'link_title' => 'Blog',
    'options' => array(
      'attributes' => array(
        'class' => array(
          0 => 'dropdown',
        ),
      ),
      'item_attributes' => array(
        'id' => '',
        'class' => 'dropdown',
        'style' => '',
      ),
    ),
    'module' => 'menu',
    'hidden' => 0,
    'external' => 0,
    'has_children' => 1,
    'expanded' => 1,
    'weight' => -46,
  );
  // Exported menu link: main-menu:contact
  $menu_links['main-menu:contact'] = array(
    'menu_name' => 'main-menu',
    'link_path' => 'contact',
    'router_path' => 'contact',
    'link_title' => 'Contact',
    'options' => array(
      'attributes' => array(),
    ),
    'module' => 'menu',
    'hidden' => 0,
    'external' => 0,
    'has_children' => 0,
    'expanded' => 0,
    'weight' => -45,
  );
  // Exported menu link: main-menu:node/1
  $menu_links['main-menu:node/1'] = array(
    'menu_name' => 'main-menu',
    'link_path' => 'node/1',
    'router_path' => 'node/%',
    'link_title' => 'Standard Post',
    'options' => array(
      'attributes' => array(),
      'item_attributes' => array(
        'id' => '',
        'class' => '',
        'style' => '',
        'data-badge' => '',
        'data-divider' => 0,
        'data-header' => '',
        'data-color' => '',
        'data-icon' => '',
      ),
    ),
    'module' => 'menu',
    'hidden' => 0,
    'external' => 0,
    'has_children' => 0,
    'expanded' => 0,
    'weight' => -49,
    'parent_path' => 'blog',
  );
  // Exported menu link: main-menu:node/11
  $menu_links['main-menu:node/11'] = array(
    'menu_name' => 'main-menu',
    'link_path' => 'node/11',
    'router_path' => 'node/%',
    'link_title' => 'Image Post',
    'options' => array(
      'attributes' => array(),
      'item_attributes' => array(
        'id' => '',
        'class' => '',
        'style' => '',
        'data-badge' => '',
        'data-divider' => 0,
        'data-header' => '',
        'data-color' => '',
        'data-icon' => '',
      ),
    ),
    'module' => 'menu',
    'hidden' => 0,
    'external' => 0,
    'has_children' => 0,
    'expanded' => 0,
    'weight' => -48,
    'parent_path' => 'blog',
  );
  // Exported menu link: main-menu:node/12
  $menu_links['main-menu:node/12'] = array(
    'menu_name' => 'main-menu',
    'link_path' => 'node/12',
    'router_path' => 'node/%',
    'link_title' => 'Gallery Post',
    'options' => array(
      'attributes' => array(),
      'item_attributes' => array(
        'id' => '',
        'class' => '',
        'style' => '',
        'data-badge' => 'Fullscreen',
        'data-divider' => 0,
        'data-header' => '',
        'data-color' => 'label label-important',
        'data-icon' => '',
      ),
    ),
    'module' => 'menu',
    'hidden' => 0,
    'external' => 0,
    'has_children' => 0,
    'expanded' => 0,
    'weight' => -45,
    'parent_path' => 'blog',
  );
  // Exported menu link: main-menu:node/19
  $menu_links['main-menu:node/19'] = array(
    'menu_name' => 'main-menu',
    'link_path' => 'node/19',
    'router_path' => 'node/%',
    'link_title' => 'Video Post',
    'options' => array(
      'attributes' => array(),
      'item_attributes' => array(
        'id' => '',
        'class' => '',
        'style' => '',
        'data-badge' => '',
        'data-divider' => 0,
        'data-header' => '',
        'data-color' => '',
        'data-icon' => 'icon-facetime-video icon-white',
      ),
    ),
    'module' => 'menu',
    'hidden' => 0,
    'external' => 0,
    'has_children' => 0,
    'expanded' => 0,
    'weight' => 0,
    'parent_path' => 'blog',
  );
  // Exported menu link: main-menu:node/3
  $menu_links['main-menu:node/3'] = array(
    'menu_name' => 'main-menu',
    'link_path' => 'node/3',
    'router_path' => 'node/%',
    'link_title' => 'Gallery Post',
    'options' => array(
      'attributes' => array(),
      'item_attributes' => array(
        'id' => '',
        'class' => '',
        'style' => '',
        'data-badge' => 'Slider',
        'data-divider' => 0,
        'data-header' => '',
        'data-color' => 'label label-warning',
        'data-icon' => '',
      ),
    ),
    'module' => 'menu',
    'hidden' => 0,
    'external' => 0,
    'has_children' => 0,
    'expanded' => 0,
    'weight' => -46,
    'parent_path' => 'blog',
  );
  // Exported menu link: main-menu:node/4
  $menu_links['main-menu:node/4'] = array(
    'menu_name' => 'main-menu',
    'link_path' => 'node/4',
    'router_path' => 'node/%',
    'link_title' => 'Gallery Post',
    'options' => array(
      'attributes' => array(),
      'item_attributes' => array(
        'id' => '',
        'class' => '',
        'style' => '',
        'data-badge' => 'Thumbs',
        'data-divider' => 0,
        'data-header' => '',
        'data-color' => 'label label-info',
        'data-icon' => '',
      ),
    ),
    'module' => 'menu',
    'hidden' => 0,
    'external' => 0,
    'has_children' => 0,
    'expanded' => 0,
    'weight' => -47,
    'parent_path' => 'blog',
  );
  // Exported menu link: main-menu:node/5
  $menu_links['main-menu:node/5'] = array(
    'menu_name' => 'main-menu',
    'link_path' => 'node/5',
    'router_path' => 'node/%',
    'link_title' => 'Project Page',
    'options' => array(
      'attributes' => array(
        'data-badge' => 1,
        'data-color' => 'badge',
      ),
      'item_attributes' => array(
        'id' => '',
        'class' => '',
        'style' => '',
        'data-badge' => 'Images',
        'data-divider' => 1,
        'data-header' => 'Projects',
        'data-color' => 'label label-info',
        'data-icon' => '',
        'badge_color' => '',
      ),
    ),
    'module' => 'menu',
    'hidden' => 0,
    'external' => 0,
    'has_children' => 0,
    'expanded' => 0,
    'weight' => -45,
    'parent_path' => 'portfolio-4col',
  );
  // Exported menu link: main-menu:node/6
  $menu_links['main-menu:node/6'] = array(
    'menu_name' => 'main-menu',
    'link_path' => 'node/6',
    'router_path' => 'node/%',
    'link_title' => 'Project Page',
    'options' => array(
      'attributes' => array(),
      'item_attributes' => array(
        'id' => '',
        'class' => '',
        'style' => '',
        'data-badge' => 'Slider',
        'data-divider' => 0,
        'data-header' => '',
        'data-color' => 'label label-warning',
        'data-icon' => '',
      ),
    ),
    'module' => 'menu',
    'hidden' => 0,
    'external' => 0,
    'has_children' => 0,
    'expanded' => 0,
    'weight' => -44,
    'parent_path' => 'portfolio-4col',
  );
  // Exported menu link: main-menu:node/7
  $menu_links['main-menu:node/7'] = array(
    'menu_name' => 'main-menu',
    'link_path' => 'node/7',
    'router_path' => 'node/%',
    'link_title' => 'Project Page',
    'options' => array(
      'attributes' => array(),
      'item_attributes' => array(
        'id' => '',
        'class' => '',
        'style' => '',
        'data-badge' => 'Grid',
        'data-divider' => 0,
        'data-header' => '',
        'data-color' => 'label',
        'data-icon' => '',
      ),
    ),
    'module' => 'menu',
    'hidden' => 0,
    'external' => 0,
    'has_children' => 0,
    'expanded' => 0,
    'weight' => -43,
    'parent_path' => 'portfolio-4col',
  );
  // Exported menu link: main-menu:node/8
  $menu_links['main-menu:node/8'] = array(
    'menu_name' => 'main-menu',
    'link_path' => 'node/8',
    'router_path' => 'node/%',
    'link_title' => 'Project Page',
    'options' => array(
      'attributes' => array(),
      'item_attributes' => array(
        'id' => '',
        'class' => '',
        'style' => '',
        'data-badge' => 'Video',
        'data-divider' => 0,
        'data-header' => '',
        'data-color' => 'label label-important',
        'data-icon' => '',
      ),
    ),
    'module' => 'menu',
    'hidden' => 0,
    'external' => 0,
    'has_children' => 0,
    'expanded' => 0,
    'weight' => -41,
    'parent_path' => 'portfolio-4col',
  );
  // Exported menu link: main-menu:portfolio-4col
  $menu_links['main-menu:portfolio-4col'] = array(
    'menu_name' => 'main-menu',
    'link_path' => 'portfolio-4col',
    'router_path' => 'portfolio-4col',
    'link_title' => 'Portfolio',
    'options' => array(
      'attributes' => array(
        'tabindex' => 2,
      ),
      'item_attributes' => array(
        'id' => '',
        'class' => 'dropdown',
        'style' => '',
        'data-badge' => '',
        'data-color' => '',
        'badge_color' => '',
      ),
    ),
    'module' => 'menu',
    'hidden' => 0,
    'external' => 0,
    'has_children' => 1,
    'expanded' => 1,
    'weight' => -47,
  );
  // Exported menu link: main-menu:portfolio-6col
  $menu_links['main-menu:portfolio-6col'] = array(
    'menu_name' => 'main-menu',
    'link_path' => 'portfolio-6col',
    'router_path' => 'portfolio-6col',
    'link_title' => 'Thumbs Grid',
    'options' => array(
      'attributes' => array(),
      'item_attributes' => array(
        'id' => '',
        'class' => '',
        'style' => '',
        'data-badge' => '',
        'data-divider' => 0,
        'data-header' => '',
        'data-color' => '',
        'data-icon' => 'icon-th icon-white',
      ),
    ),
    'module' => 'menu',
    'hidden' => 0,
    'external' => 0,
    'has_children' => 0,
    'expanded' => 0,
    'weight' => -46,
    'parent_path' => 'portfolio-4col',
  );
  // Translatables
  // Included for use with string extractors like potx.
  t('Blog');
  t('Contact');
  t('Gallery Post');
  t('Image Post');
  t('Portfolio');
  t('Project Page');
  t('Standard Post');
  t('Thumbs Grid');
  t('Video Post');


  return $menu_links;
}
