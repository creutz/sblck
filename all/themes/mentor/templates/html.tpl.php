<?php

/**
 * @file
 * Default theme implementation to display the basic html structure of a single
 * Drupal page.
 */
global $base_url;

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language; ?>" version="XHTML+RDFa 1.0" dir="<?php print $language->dir; ?>"<?php print $rdf_namespaces; ?>>

<head profile="<?php print $grddl_profile; ?>">
  <?php print $head; ?>
  <title><?php print $head_title; ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php print $styles; ?>
  <?php print $skin; ?>
  <?php print $jquery; ?>
  <?php print $scripts; ?>
    <!--[if lt IE 9]>
    	<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <!--[if IE 7]>
      <link rel="stylesheet" href="<?php print $base_url . '/' . path_to_theme(); ?>/css/font-awesome-ie7.min.css">
    <![endif]-->
</head>
<body class="<?php print $classes; ?>" <?php print $attributes;?>>
  <div id="skip-link">
    <a href="#main-content" class="element-invisible element-focusable"><?php print t('Skip to main content'); ?></a>
  </div>
  <?php print $page_top; ?>
  <?php print $page; ?>
  <?php print $page_bottom; ?>
</body>
</html>