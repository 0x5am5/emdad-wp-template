<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package emdad-portfolio
 */

?>

<div class="content__section">
	<p>Designed by Emdad Rashid  | <br class="show--sml"> 3DUX Limited  | <br class="show--sml"> Registered in England and Wales No: 08949369  | <br class="show--sml"> VAT Reg No: GB184671577</p>

	<p>© Copyright 3DUX Ltd 2015  | <br class="show--sml"> All rights reserved</p>

	<p><a href="#">Designing this portfolio</a></p>
</div>

<script>
	var html = document.getElementsByTagName('html');
	html[0].className = html[0].className.replace('no-js', 'js');
</script>

<?php wp_footer(); ?>