<?php

/**
 * @file
 * Default theme implementation to display a region.
 */
?>

<?php if ($content): ?>
  <section class="<?php print $classes; ?>">
  	<div class="container">
    	<?php print $content; ?>
    </div>
  </section>
<?php endif; ?>
