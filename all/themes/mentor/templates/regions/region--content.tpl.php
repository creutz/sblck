<?php

/**
 * @file
 * Default theme implementation to display a region.
 */

$blog = false;

if (arg(0) == 'node' && is_numeric(arg(1))) {
	$node = node_load(arg(1));
	if ($node && $node->type == 'blog_post') {
		$blog = true;
	}
}

?>

<?php if ($content): ?>
<div class="<?php print $classes; ?>">

	<?php if($sidebar !== 'no-spacer') { 
		print '<div class="'.$sidebar.'">'; 
	} ?>
	
	<a id="main-content"></a>
	
	<?php print $messages; ?>
	
	<?php print render($title_prefix); ?>
	<?php if ($title && ($blog == FALSE)): ?>
	<h1 class="title" id="page-title">
		<?php print $title; ?>
	</h1>
	<?php endif; ?>
	<?php print render($title_suffix); ?>

	<?php print render($page['help']); ?>
	<?php if ($action_links): ?>
	<ul class="action-links">
		<?php print render($action_links); ?>
	</ul>
	<?php endif; ?>

	<?php if (current_path() == 'contact'): ?>
	<div class="innerSpacer">
		<div class="row-fluid gmapWrap">
			<div id="map" class="span12 gmap" data-latitude="<?php print theme_get_setting('latitude'); ?>" data-longitude="<?php print theme_get_setting('longitude'); ?>" data-zoom="<?php print theme_get_setting('zoom'); ?>"></div>
		</div>
	</div>
	
	<?php print theme_get_setting('contact-intro'); ?>
	
	<?php endif; ?>
	
	<?php print $content; ?>
	
	<?php if($sidebar !== 'no-spacer') { 
		print '</div>'; 
	} ?>
</div>
<?php endif; ?>
