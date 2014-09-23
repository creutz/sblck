<?php

/**
 * @file
 * Default theme implementation to display a node.
 */

?>

<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> row-fluid clearfix" <?php print $attributes; ?>>
	<div class="span12 post full">
		<div class="row-fluid">
			<div class="span12 post-title">
				<h3 <?php print $title_attributes; ?>>
					<?php print $title; ?>
				</h3>
				<div class="post-meta">
					Posted on <?php print format_date($created, 'custom', 'F jS, Y'); ?> by <?php print $name; ?>, in <?php print render($content['field_categories']); ?>
				</div>
			</div>

			<?php
			
			$i = -1;

			if (!empty($node->field_image)) {
				$images = array();
				foreach ($node->field_image['und'] as $image) {
					$images[$i] = render($image);
					$i++;
				}
			}
			
			if(!empty($node->field_post_type['und'][0]['value'])) {
				$postType = $node->field_post_type['und'][0]['value'];
			}
			
			$active = 0;
			$slider = 0;
			$fullscreen = 0;
			$count = 0;

			if ($i == 0 && (!empty($node->field_image))) {
				print '<div class="row-fluid"><div class="span12 post-image"><img src="'.image_style_url('blog-image-post', $node->field_image['und'][0]['uri']).'"/></div></div>';
			} else if ($i >= 1 && (!empty($node->field_image) && ($postType !== 'video_post'))) {

				print '<div class="row-fluid">';
				switch($postType) {
					case 'gallery_grid':
						print '<div class="span12 post-image"><div class="row-fluid post-thumbs">';
						foreach($node->field_image['und'] as $item){
							if(($active % 4 == 0) && $active > 0) {
								print ('</div><div class="row-fluid post-thumbs">');
							}
							print '<div class="span3"><a class="peOver" data-target="flare" data-flare-gallery="galPostThumb" data-flare-thumb="'.image_style_url('blog-grid-post-thumb', $node->field_image['und'][$active]['uri']).'" href="'.image_style_url('blog-grid-post', $node->field_image['und'][$active]['uri']).'">
							<img src="'.image_style_url('blog-grid-post', $node->field_image['und'][$active]['uri']).'" /></a>
							</div>';
							$active++;
						}
						print '</div></div>';
						break;
					case 'gallery_slider':
						print '<div class="portfolioItem"><div class="peVolo" data-autopause="enabled">';
						foreach($node->field_image['und'] as $item){
							print '<div data-delay="3" class="visible"><img src="'.image_style_url('portfolio-slider', $node->field_image['und'][$slider]['uri']).'"/></div>';
							$slider++;
						}
						print '</div></div>';
						break;
					case 'gallery_fullscreen':
						foreach($node->field_image['und'] as $item){
							$count++;
						}
                        print '<div class="portfolioItem galleryCover post-image">
                          <a href="'.file_create_url($node->field_image['und'][0]['uri']).'"
                            data-flare-thumb="'.image_style_url('blog-grid-post-thumb', $node->field_image['und'][0]['uri']).'"
                            data-flare-bw="'.image_style_url('blog-fullscreen-bw', $node->field_image['und'][0]['uri']).'"
                            class="peOver"
                            data-target="flare"
                            data-flare-plugin="shutter"
                            data-flare-gallery="fsGallery"
                            data-flare-scale="fillmax" 
                          >
                            <img src="'.image_style_url('blog-fullscreen', $node->field_image['und'][0]['uri']).'" />
                             <span></span>
                          </a>
                          <div class="title">
                            <span> &times; '.($count).'</span><div class="subtitle">'.$node->field_gallery_title['und'][0]['safe_value'].'</div>
                          </div>';
                        
                          if(!empty($node->body['und'][0]['summary'])) {
                          	print '<p>'.$node->body['und'][0]['summary'].'</p>';
                          }
                          
                        print '</div>';
                        
						print '<div class="hiddenLightboxContent">';
						foreach($node->field_image['und'] as $item){
							
							if ($fullscreen > 0) {
								print '<a href="'.file_create_url($node->field_image['und'][$fullscreen]['uri']).'"
	                            data-flare-thumb="'.image_style_url('blog-grid-post-thumb', $node->field_image['und'][$fullscreen]['uri']).'"
	                            data-flare-bw="'.image_style_url('blog-fullscreen-bw', $node->field_image['und'][$fullscreen]['uri']).'"
	                            class="peOver"
	                            data-target="flare"
	                            data-flare-plugin="shutter"
	                            data-flare-gallery="fsGallery"
	                            data-flare-scale="fillmax"
								></a>';
							}
							
							$fullscreen++;
						}
						print '</div>';
						break;
					default: break;
				}

				print '</div>';
			} else if ($postType == 'video_post') {
				print '<div class="row-fluid"><div class="span12 portfolioItem"><a class="peVideo" href="'.$node->field_video['und'][0]['safe_value'].'"></a></div></div>';
			}
			?>
			

			<?php
			// We hide the comments and links now so that we can render them later.
			hide($content['comments']);
			hide($content['links']);
			hide($content['flippy_pager']);
			print render($content);
			?>
			
			<?php if(!empty($node->field_social_media['und'])): ?>
			<?php $i = 0; foreach($node->field_social_media['und'] as $item): ?>
				<div class="shareButton">
					<button class="share <?php print $node->field_social_media['und'][$i]['value']; ?>"></button>
				</div>
			<?php $i++; endforeach; ?>
			<?php endif; ?>
			<?php print render($content['flippy_pager']); ?>

			<?php print render($content['links']); ?>

			<?php print render($content['comments']); ?>

		</div>
	</div>
</div>
