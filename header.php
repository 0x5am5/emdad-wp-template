 <?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package emdad-portfolio
 */
$linkedinId = "#background-experience";
$blogPage = false;

if ( is_front_page() && is_home() ) {
  // Default homepage
} elseif ( is_front_page() ) {
  // static homepage
} elseif ( is_home() ) {
  // blog page
} else {
  //everything else
	$blogPage = true;
}

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
<div id="page" class="hfeed site<?php if ($blogPage) { ?> template-two<?php } ?>">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'emdad' ); ?></a>

	<header id="masthead" class="site-header mod-header content header--sticky<?php if (!$blogPage) { ?> content--dark<?php } ?>" role="banner">
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
						<li><a href="<?php if ($blogPage) { echo get_settings("home"); } ?>#top"<?php if (!$blogPage) { echo ' class="jump-link"'; } ?>>Home</a></li>
						<li<?php if ($blogPage) { echo ' class="active"'; } ?>><a href="#projects"<?php if ($blogPage) { echo ' class="dropdown"'; } else { echo ' class="jump-link"'; } ?> data-menu="projects-menu">Projects</a></li>
						<li><a href="<?php if ($blogPage) { echo get_settings("home"); } ?>#skills"<?php if (!$blogPage) { echo ' class="jump-link"'; } ?>>Skills</a></li>
						<li><a href="<?php if ($blogPage) { echo get_settings("home"); } ?>#touchpoints"<?php if (!$blogPage) { echo ' class="jump-link"'; } ?>>Touchpoints</a></li>
						<li><a href="<?php if ($blogPage) { echo get_settings("home"); } ?>#contact"<?php if (!$blogPage) { echo ' class="jump-link"'; } ?>>Contact</a></li>
					</ul>
				</nav>	
			</div>
			<?php if ($blogPage) { ?>
			<div class="projects projects-menu drop-menu">
				<?php get_template_part( 'template-parts/content', 'projects' ); ?>
				<!-- <ul class="list-inline grid">
					<li class="col w-33"><a href="#">In-store ordering service</a></li>
					<li class="col w-33"><a href="#">Dashboard design</a></li>
					<li class="col w-33"><a href="#">Mobile purchase scrap book</a></li>
					<li class="col w-33"><a href="#">Site redesign</a></li>
					<li class="col w-33"><a href="#">Browse &amp; search design</a></li>
					<li class="col w-33"><a href="#">My account page design</a></li>
					<li class="col w-33"><a href="#">Checkout design</a></li>
					<li class="col w-33"><a href="#">Game design</a></li>
					<li class="col w-33"><a href="#">Competitor analysis report</a></li>
					<li class="col w-33"><a href="#">Connected life presentation</a></li>
					<li class="col w-33"><a href="#">Contact us page redesign</a></li>
					<li class="col w-33"><a href="#">Home furniture page redesign</a></li>
				</ul> -->
			</div>				
			<?php } ?>	
		</div><!-- .content__section -->
		<?php if ($blogPage) { ?>
		<div class="second-nav">
			<nav>
				<ul class="list-inline content__section sub-menu">
					<li class="active"><a href="#selfridge">Selfridges</a></li>
					<li><a href="#halfords">Halfords</a></li>
					<li><a href="#epoints">ePoints</a></li>
					<li><a href="#alma1938">ALMA1938</a></li>
				</ul>
			</nav>
		</div><!-- .second-nav -->
		<?php } ?>
	</header><!-- #masthead -->