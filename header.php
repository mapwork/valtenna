<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package valtenna
 */

?>
<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header id="header">
	<div class="wrapper row no-gutters flex-row-reverse align-items-end flex-xl-row">
		<?php
		$tag = ( is_home() && is_front_page() ) ? 'h1':'div';
		?>
		<<?php echo $tag; ?> id="site-logo" class="flex-grow-1">
			<a href="<?php echo site_url(); ?>" title="<?php echo get_bloginfo('name'); ?>">
				<img src="<?php echo get_theme_file_uri('assets/images/logo.png'); ?>" srcset="<?php echo get_theme_file_uri('assets/images/logo@2x.png'); ?> 2x" class="img-fluid" alt="<?php echo __('Valtenna Box Factory','valtenna'); ?>"/>
			</a>
		</<?php echo $tag; ?>>
		<div id="toolbar" class="d-flex flex-row-reverse justify-content-end flex-wrap flex-grow-1 flex-xl-row">
			<div class="toolbar-item mr-xl-3">
				<a href="#" title="<?php echo __('Follow us on Instagram','valtenna'); ?>"><i class="fab fa-instagram"></i></a>
			</div>
			<div class="toolbar-item mr-2 mr-xl-0">
				<a href="javascript:;" id="trigger-menu"><i class="fas fa-bars"></i></a>
			</div>
		</div>
	</div>
</header>
<div id="site-navigation">
	<div class="wrapper">
		<button type="button" id="close-navigation"><i class="fas fa-times"></i></button>
		<div class="wrapper-in d-flex flex-column flex-wrap align-items-start">
			<nav id="nav" class="flex-grow-1 d-flex flex-column flex-wrap justify-content-center">
				<ul class="reset-list">
					<li class="current-menu-item">
						<a href="#">Chi siamo</a>
					</li>
					<li>
						<a href="#">Produzione</a>
					</li>
					<li>
						<a href="#">Servizi</a>
					</li>
					<li>
						<a href="#">Prodotti</a>
					</li>
					<li>
						<a href="#">News</a>
					</li>
					<li>
						<a href="#">Contatti</a>
					</li>
				</ul>
			</nav>
			<footer>
				<ul class="reset-list follow-us">
					<li>
						<a href="#" target="_blank"><?php echo sprintf( __('Follow us on <span>%s</span>','valtenna'), '<i class="fab fa-instagram"></i> Instagram' ); ?></a>
					</li>
				</ul>
			</footer>
		</div>
	</div>
</div>
<main id="main">
