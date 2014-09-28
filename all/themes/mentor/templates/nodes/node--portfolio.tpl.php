<?php

/**
 * @file
 * Default theme implementation to display a node.
 */
	
	$active = 0;
	$body = $node->body['und'][0]['safe_value'];
	$subtitle = $node->field_subtitle['und'][0]['safe_value'];
	$date = format_date($created, 'custom', 'F jS, Y');
	$content['flippy_pager']['#list'] = $content['flippy_pager']['#list'];
	
	if(!$node->field_icon == NULL) {
		$icon = $node->field_icon['und'][0]['safe_value'];
	} else {
		$icon = '';
	}

?>

	<?php $options = array('absolute' => TRUE); if(!empty($content['flippy_pager']['#list']['prev']) && empty($content['flippy_pager']['#list']['next'])): ?>

	    <div class="project-nav">
		<div class="pull-right">
        	<a href="<?php print url('node/'.$content['flippy_pager']['#list']['prev']['nid'], $options); ?>" class="prev-project pull-left label">
        		<i class="icon-chevron-left icon-white"></i>Prev
        	</a>
            <a href="<?php print url('node/'.$content['flippy_pager']['#list']['first']['nid'], $options); ?>" class="next-project pull-left label">
            	Next <i class="icon-chevron-right icon-white"></i>
            </a>
        </div></div>
     
    <?php elseif(empty($content['flippy_pager']['#list']['prev']) && !empty($content['flippy_pager']['#list']['next'])): ?> 
    
    	<div class="project-nav">
    	<div class="pull-right">
        	<a href="<?php print url('node/'.$content['flippy_pager']['#list']['last']['nid'], $options); ?>" class="prev-project pull-left label">
        		<i class="icon-chevron-left icon-white"></i>Prev
        	</a>
            <a href="<?php print url('node/'.$content['flippy_pager']['#list']['next']['nid'], $options); ?>" class="next-project pull-left label">
            	Next <i class="icon-chevron-right icon-white"></i>
            </a>
        </div>
       </div>
     
    <?php else: ?>
        <div class="project-nav">
    	<div class="pull-right">
        	<a href="<?php print url('node/'.$content['flippy_pager']['#list']['prev']['nid'], $options); ?>" class="prev-project pull-left label">
        		<i class="icon-chevron-left icon-white"></i>Prev
        	</a>
            <a href="<?php print url('node/'.$content['flippy_pager']['#list']['next']['nid'], $options); ?>" class="next-project pull-left label">
            	Next <i class="icon-chevron-right icon-white"></i>
            </a>
        </div></div> 
    
	<?php endif; ?>
	
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix" <?php print $attributes; ?>>

	<?php print render($title_prefix); ?>
	<?php if (!$page): ?>
	<h2 <?php print $title_attributes; ?>>
		<a href="<?php print $node_url; ?>"><?php print $title; ?> </a>
	</h2>
	<?php endif; ?>
	<?php print render($title_suffix); ?>

	<div class="row-fluid project">
		<div class="span9">
			<div class="innerSpacer">
			
			<?php switch($node->field_template['und'][0]['value']): case 'slider': ?>
			
				<!-- Begin Portfolio Template: Slider -->
					<div class="peVolo slideWrap" data-autopause="enabled">
						<?php foreach($node->field_image['und'] as $item) {
							print '<div data-delay="3" class="visible"><img src="'.image_style_url('portfolio-slider', $node->field_image['und'][$active]['uri']).'"/></div>';
							$active++;
						} ?>
						</div>
					</div>
				</div>
				<div class="span3"><div class="item-description">
					<?php if($subtitle !== ''): ?>
						<h3><?php print $subtitle; ?></h3>
					<?php endif; ?>
					<div class="subtitle">
					<?php if(!$icon == NULL): ?>
						<?php print '<span class="'.$icon.'"></span>'; ?>
					<?php endif; ?>
					<?php print '<a href="#">'.format_date($created, 'custom', 'F jS, Y').'</a>'; ?>
					</div>
					<?php print $body; ?>
					<?php if(!empty($node->field_social_media['und'])): ?>
					<div class="share">
					<?php $i = 0; foreach($node->field_social_media['und'] as $item): ?>
						<div class="shareButton">
							<button class="share <?php print $node->field_social_media['und'][$i]['value']; ?>"></button>
						</div>
					<?php $i++; endforeach; ?>
					</div>
					<?php endif; ?>
				</div></div>
				<!-- End Portfolio Template: Slider -->	
				
				<?php break; case 'image': ?>
					
				<!-- Begin Portfolio Template: Image -->
				<?php foreach($node->field_image['und'] as $item){
					print '<div class="portfolioItem">
					<a href="'.image_style_url('portfolio-slider', $node->field_image['und'][$active]['uri']).'"
					class="peOver"
					data-target="flare"
					data-flare-gallery="galPostThumb"
					data-flare-thumb="'.image_style_url('blog-grid-post', $node->field_image['und'][$active]['uri']).'" >
					<img src="'.image_style_url('portfolio-slider', $node->field_image['und'][$active]['uri']).'"/>
					</a></div>';
					$active++;
				} ?>
				
					</div><!-- /.innerSpacer-->
				</div><!-- /.span9 -->
							
				<div class="span3"><div class="item-description">
					<?php if($subtitle !== ''): ?>
						<h3><?php print $subtitle; ?></h3>
					<?php endif; ?>
					<div class="subtitle">
					<?php if(!$icon == NULL): ?>
						<?php print '<span class="'.$icon.'"></span>'; ?>
					<?php endif; ?>
					<?php print '<a href="#">'.format_date($created, 'custom', 'F jS, Y').'</a>'; ?>
					</div>
					<?php print $body; ?>
					<?php if(!empty($node->field_social_media['und'])): ?>
					<div class="share">
					<?php $i = 0; foreach($node->field_social_media['und'] as $item): ?>
						<div class="shareButton">
							<button class="share <?php print $node->field_social_media['und'][$i]['value']; ?>"></button>
						</div>
					<?php $i++; endforeach; ?>
					</div>
					<?php endif; ?>
				</div></div>
				<!-- End Portfolio Template: Image -->	
					
			<?php break; case 'grid': ?>
	
			<!-- Begin Portfolio Template: Grid -->				
				<div class="row-fluid">
					<div class="span12 post">
						<div class="row-fluid post-thumbs">
							<?php foreach($node->field_image['und'] as $item): ?>
								<?php if(($active % 4 == 0) && $active > 0) {
									print ('</div><div class="row-fluid post-thumbs">');
								}  ?>
								
								<div class="span3">
									<a class="peOver" 
									data-target="flare" 
									data-flare-gallery="galPostThumb" 
									data-flare-thumb="<?php print image_style_url('blog-grid-post', $node->field_image['und'][$active]['uri']); ?>" 
									href="<?php print image_style_url('blog-grid-post', $node->field_image['und'][$active]['uri']); ?>">
									<img src="<?php print image_style_url('blog-grid-post', $node->field_image['und'][$active]['uri']); ?>"/></a>
								</div>
								
								<?php $active++; ?>
							<?php endforeach; ?>
							</div><!-- /.row-fluid .post-thumbs -->
						</div><!-- /.span12 .post-image -->
					</div><!-- /.row-fluid -->
				</div><!-- /.innerSpacer -->
			</div><!-- /.span9 -->
			
			<div class="span3"><div class="item-description">
				<?php if($subtitle !== ''): ?>
					<h3><?php print $subtitle; ?></h3>
				<?php endif; ?>
				<div class="subtitle">
				<?php if(!$icon == NULL): ?>
					<?php print '<span class="'.$icon.'"></span>'; ?>
				<?php endif; ?>
				<?php print '<a href="#">'.format_date($created, 'custom', 'F jS, Y').'</a>'; ?>
				</div>
				<?php print $body; ?>
				<?php if(!empty($node->field_social_media['und'])): ?>
				<div class="share">
				<?php $i = 0; foreach($node->field_social_media['und'] as $item): ?>
					<div class="shareButton">
						<button class="share <?php print $node->field_social_media['und'][$i]['value']; ?>"></button>
					</div>
				<?php $i++; endforeach; ?>
				</div>
				<?php endif; ?>
			</div></div>
			<!-- End Portfolio Template: Grid -->	
			
			<?php break; case 'video': ?>
			
					<div class="portfolioItem">
						<a href="<?php print $node->field_video['und'][0]['safe_value']; ?>" class="peVideo"></a>            
		            </div>
				</div><!-- /.innerSpacer-->
			</div><!-- /.span9 -->
						
			<div class="span3"><div class="item-description">
				<?php if($subtitle !== ''): ?>
					<h3><?php print $subtitle; ?></h3>
				<?php endif; ?>
				<div class="subtitle">
				<?php if(!$icon == NULL): ?>
					<?php print '<span class="'.$icon.'"></span>'; ?>
				<?php endif; ?>
				<?php print '<a href="#">'.format_date($created, 'custom', 'F jS, Y').'</a>'; ?>
				</div>
				<?php print $body; ?>
				<?php if(!empty($node->field_social_media['und'])): ?>
				<div class="share">
				<?php $i = 0; foreach($node->field_social_media['und'] as $item): ?>
					<div class="shareButton">
						<button class="share <?php print $node->field_social_media['und'][$i]['value']; ?>"></button>
					</div>
				<?php $i++; endforeach; ?>
				</div>
				<?php endif; ?>
			</div></div>
						
			<?php break; case 'default': ?>
			
				<?php 
					if ($display_submitted) { 
						print '<div class="submitted">'.$submitted.'</div>'; 
					}
					
					// We hide the comments and links now so that we can render them later.
					hide($content['comments']);
					hide($content['links']);
					print render($content); 
				?>
			
				</div><!-- /.innerSpacer -->
			</div><!-- /.span9 -->

			<?php break; endswitch; ?>
		
	</div><!-- /.row-fluid .project -->
	
	<?php print render($content['links']); ?>

	<?php print render($content['comments']); ?>

</div>
