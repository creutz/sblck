<?php

/**
 * @file
 * Default theme implementation to display a single Drupal page.
 */
?>


	<header class="navbar navbar-fixed-top" id="top">
		<div class="navbar-inner">
			<div class="container">
			
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="btnTitle">Menu</span>
					<span class="icon-chevron-down icon-white"></span>
				</a>
				
				<?php if ($logo): ?>
				<a class="brand" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>">
					<img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
				</a>
				<?php endif; ?>

				<?php if ($site_name || $site_slogan): ?>
				<div id="name-and-slogan">
					<?php if ($site_name): ?>
					<?php if ($title): ?>
					<div id="site-name">
						<strong> <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?> </span> </a>
						</strong>
					</div>
					<?php else: /* Use h1 when the content title is empty */ ?>
					<h1 id="site-name">
						<a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?> </span> </a>
					</h1>
					<?php endif; ?>
					<?php endif; ?>

					<?php if ($site_slogan): ?>
					<div id="site-slogan">
						<?php print $site_slogan; ?>
					</div>
					<?php endif; ?>
				</div><!-- /#name-and-slogan -->
				<?php endif; ?>

				<div class="nav-collapse">
					<?php print render($page['header']); ?>
	
					<?php if ($main_menu || $secondary_menu): ?>
						<?php $menu_name = variable_get('menu_main_links_source', 'main-menu'); $tree = menu_tree($menu_name); print drupal_render($tree); ?>
						<?php print theme('links__system_secondary_menu', array('links' => $secondary_menu, 'attributes' => array('id' => 'secondary-menu', 'class' => array('links', 'inline', 'clearfix')))); ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</header><!-- /#header -->
	
	<?php if ($page['prescript']): ?>
		<?php print render($page['prescript']); ?>
	<?php endif; ?>

	<section class="container mainContent">
		<div class="row-fluid">
			<?php if ($page['sidebar_first']): ?>
			<?php print render($page['sidebar_first']); ?>
			<?php endif; ?>

			
			<?php print render($page['content']); ?>
			
			
			<?php if ($page['sidebar_second']): ?>
			<?php print render($page['sidebar_second']); ?>
			<?php endif; ?>
		</div><!-- /.row-fluid -->
	</section><!-- /#main -->

	<footer>
		<?php if ($page['postscript']): ?>
		<?php print render($page['postscript']); ?>
		<?php endif; ?>
		<section class="footerMain">
			<div class="container">
				<?php print render($page['footer']); ?>
		</section>
		</div>
		<?php if ($page['footer_lower']): ?>
		<section class="footerLower">
			<div class="container">
				<?php print render($page['footer_lower']); ?>
			</div>
		</section>
		<?php endif; ?>
	</footer>
	<!-- /#footer -->
	
	<a href="#top" id="peBackToTop" class="label btt disabled"><span class="icon-chevron-up icon-white"></span> </a>
	