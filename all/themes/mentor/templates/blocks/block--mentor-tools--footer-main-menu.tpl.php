<?php

/**
 * @file
 * Default theme implementation to display a block.
 */
?>
<div id="<?php print $block_html_id; ?>" class="<?php print $classes; ?>" <?php print $attributes; ?>>

		<?php 
		$i = 0;
		$main_menu = theme_get_setting('toggle_main_menu') ? menu_main_menu() : array();
		foreach($main_menu as $item) {
			if($i == 0) {
			print '<a class="first" href="'.$GLOBALS['base_url'].'">'.$item['title'].'</a>';
			} else {
				print '<span>&#124;</span><a href="'.$item['href'].'">'.$item['title'].'</a>';
			}
			$i++;
		}
		?>

</div>
