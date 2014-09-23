<?php

/**
 * @file
 * Default theme implementation to display a block.
 */
?>
<div id="<?php print $block_html_id; ?>" class="<?php print $classes; ?> recent-posts"<?php print $attributes; ?>>

  <?php print render($title_prefix); ?>
<?php if ($block->subject): ?>
  <h3<?php print $title_attributes; ?>><?php print $block->subject ?> <a href="<?php print $GLOBALS['base_url']; ?>/blog"><span class="label">Visit The Blog</span></a></h3>
<?php endif;?>
  <?php print render($title_suffix); ?>

  <?php print $content ?>
</div>