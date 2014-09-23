<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
?>

<div class="row-fluid relative related-work">
<?php if (!empty($title)): ?>
	<h1><?php print $title; ?></h1>
<?php endif; ?>
	<div class="carousel-nav">
		<div class="pull-right">
			<a href="#" id="carouselPrev" class="prev-btn pull-left label"><i class="icon-chevron-left icon-white"></i></a>
			<a href="#" id="carouselNext" class="next-btn pull-left label"><i class="icon-chevron-right icon-white"></i></a>
		</div>
	</div>  
</div>

<div class="row-fluid carouselBox" data-height="0,0" data-slidewidth="250">
	<?php foreach ($rows as $id => $row): ?>
	    <?php print $row; ?>
	<?php endforeach; ?>
</div>