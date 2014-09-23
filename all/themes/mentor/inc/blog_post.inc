<?php
	$images = array();
	$i = -1;
	foreach ($node->field_image['und'] as $image) {
	  $images[$i] = render($image);
	  $i++;
	}
	
	$active = 0;
	$postType = $node->field_post_type;
	
	if ($i == 0 && (!empty($node->field_image))) {
		print '<img src="'.image_style_url('blog-image-post', $node->field_image['und'][0]['uri']).'"/>';
	} else if ($i >= 1 && (!empty($node->field_image))) {
		
		print $node->field_post_type['und'][0]['safe_value'];
// 		switch($postType) {
// 			case 'gallery_grid':
// 				print '<p>Grid</p>';
// 			break;
// 			default:
// 				'test';
// 			break;
// 		print '<div id="slider" class="flexslider"><ul class="slides">';
// 		foreach($node->field_image['und'] as $item){
// 			print '<li><img src="'.image_style_url('blog-image-post', $node->field_image['und'][$active]['uri']).'"/></li>';
// 			$active++;
// 		}
// 		print ' </ul></div>';
// 		}
	}
?>