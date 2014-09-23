<?php
/**
 * @file
 * Default output for a revolution_slider object.
*/
?>
<div <?php print drupal_attributes($settings['attributes'])?>>
  <?php print theme('revolution_slider_list', array('items' => $items, 'settings' => $settings)); ?>
  <div class="tp-bannertimer"></div>
</div>
