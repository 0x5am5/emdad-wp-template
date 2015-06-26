 <?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package emdad-portfolio
 */
$linkedinId = "#background-experience";

?><!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'emdad' ); ?></a>

	<header id="masthead" class="site-header mod-header content" role="banner">
		<div class="content__section">
			<div class="header__main-content header__main-content--open">
				<h1>
					<a href="#top">
						<?php bloginfo( 'name' ); ?>
						<span class="sub-head"><?php bloginfo( 'description' ); ?></span>								
					</a>
				</h1>
				<nav role="navigation">
					<ul class="main-nav list-inline">
						<li><a href="#top">Home</a></li>
						<li><a href="#projects"<?php if ($page2) { echo ' class="dropdown"'; } ?> data-menu="projects-menu">Projects</a></li>
						<li><a href="#skills">Skills</a></li>
						<li><a href="#touchpoints">Touchpoints</a></li>
						<li><a href="#contact">Contact</a></li>
					</ul>
				</nav>	
			</div>
		</div><!-- .content__section -->
	</header><!-- #masthead -->