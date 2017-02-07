<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package hendershot
 */
 
 $image_url = get_the_post_thumbnail_url($post->ID, 'large');

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta property="og:image" content="<?php echo $image_url; // since we don't use a lot of in-line images, lets establish which image gets used for a page previewer?>">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<div id="content" class="site-content">
		<?php wp_nav_menu(array('theme_location' => 'Primary', 'menu' => 'Main Menu')); ?>
		<div class="mobile-menu-trigger header" data-menu="menu-main-menu-container">Menu</div>
		<div class="mobile-menu-trigger footer" data-menu="menu-footer-menu-container">Contact</div>
		<div class="mobile-menu-trigger close">X</div>