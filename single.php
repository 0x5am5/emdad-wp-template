<?php
/**
 * The template for displaying all single posts.
 *
 * @package emdad-portfolio
 */

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

	<?php get_template_part( 'template-parts/content', 'single' ); ?>

	<?php// the_post_navigation(); ?>

	<div class="content footer">
		<?php get_footer(); ?>
	</div>
	
<?php endwhile; // End of the loop. ?>


