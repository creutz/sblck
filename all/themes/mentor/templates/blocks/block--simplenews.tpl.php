<?php

/**
 * @file
 * Default theme implementation to display a block.
 */
?>
<div id="<?php print $block_html_id; ?>" class="<?php print $classes; ?>"<?php print $attributes; ?>>

  <?php print render($title_prefix); ?>
<?php if ($block->subject): ?>
  <h3<?php print $title_attributes; ?>><?php print $block->subject ?></h3>
<?php endif;?>
  <?php print render($title_suffix); ?>

  <?php print $content ?>
  
  <?php if(theme_get_setting('newsletter-msg') != ''): ?>
  	<p class="outro"><?php print theme_get_setting('newsletter-msg'); ?></p>
  <?php endif; ?>
</div>