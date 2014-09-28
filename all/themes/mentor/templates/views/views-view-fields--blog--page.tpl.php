<?php

/**
 * @file
 * Default simple view template to all the fields as a row.
 *
 * - $view: The view in use.
 * - $fields: an array of $field objects. Each one contains:
 *   - $field->content: The output of the field.
 *   - $field->raw: The raw data for the field, if it exists. This is NOT output safe.
 *   - $field->class: The safe class id to use.
 *   - $field->handler: The Views field handler object controlling this field. Do not use
 *     var_export to dump this object, as it can't handle the recursion.
 *   - $field->inline: Whether or not the field should be inline.
 *   - $field->inline_html: either div or span based on the above flag.
 *   - $field->wrapper_prefix: A complete wrapper containing the inline_html to use.
 *   - $field->wrapper_suffix: The closing tag for the wrapper.
 *   - $field->separator: an optional separator that may appear before a field.
 *   - $field->label: The wrap label text to use.
 *   - $field->label_html: The full HTML of the label to use including
 *     configured element type.
 * - $row: The raw result object from the query, with all data it fetched.
 *
 * @ingroup views_templates
 */
?>
<?php foreach ($fields as $id => $field): ?>

  	<?php
  	
  	
  		if ($id == 'field_image' && ($fields['field_post_type']->content == 'image_post')) {
			print '<div class="span12 post-image">'.$fields['field_image']->content.'</div>';
  		}
  		
  		if ($id == 'field_image_1') {
  			switch($fields['field_post_type']->content) {
  				case 'gallery_slider': 
  					print '<div class="portfolioItem post-image"><div class="peVolo" data-autopause="enabled">'.$fields['field_image_1']->content.'</div></div>';
  				break;
  				default: break;
  			}
  		}
  		
  		if ($id == 'field_image_2') {
  			switch($fields['field_post_type']->content) {
  				case 'gallery_grid': case 'gallery_fullscreen':
  					print '<div class="portfolioItem galleryCover post-image">'.$fields['field_image']->content;
  					print '<div class="title test"><span> &times;'.$fields['field_image_2']->content.'</span>
  					<span class="arrow"></span>'.$fields['field_gallery_title']->content.'</div></div>';
  				default: break;
  			}
  		}
  		
  		if ($id == 'field_video') {
  			switch($fields['field_post_type']->content) {
  				case 'video_post':
  					print $fields['field_video']->content;
  				break;
  				default: break;
  			}
  		}
  		
  		
  	?>

  	
  	<?php if (($id != 'field_image') && ($id != 'field_image_1') && ($id != 'field_image_2') && ($id != 'field_gallery_title') && ($id != 'nid') && ($id != 'field_post_type') && ($id != 'field_video')): ?>
	  <?php if (!empty($field->separator)): ?>
	    <?php print $field->separator; ?>
	  <?php endif; ?>
	  
	
	  <?php print $field->wrapper_prefix; ?>
	    <?php print $field->label_html; ?>
	    <?php print $field->content; ?>
	  <?php print $field->wrapper_suffix; ?>
	<?php endif; ?>  
	
<?php endforeach; ?>