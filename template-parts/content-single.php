<?php
/**
 * Template part for displaying single posts.
 *
 * @package emdad-portfolio
 */

?>

<div class="content content-wrap" id="top">
	<?php if( have_rows('sections') ): ?>
		<?php while( have_rows('sections') ): the_row();
			$company = explode('--', get_sub_field('company'));
			$role = get_sub_field('role');
			$intro = get_sub_field('intro');
			$positioning = strtolower(get_sub_field('positioning'));
			$offPage = strtolower(get_sub_field('off_page'));

		?>
		<div class="content__section main-section main-section--<?php echo $positioning; ?>" id="<?php echo strtolower($company[0]); ?>">
			<div class="main-section__header">
				<h2><?php echo $company[0]; ?> <span class="sub-head"><?php echo $company[1]; ?></span></h2>

				<p>
					<?php echo $intro; ?>
				</p>
			</div><!-- .header -->

			<?php if( have_rows('content') ): ?>
				<?php while( have_rows('content') ): the_row();
					$options = get_sub_field('image_options');
					$paragraph = get_sub_field('paragraph');
					$title = get_sub_field('title');				
					?>
					
					<?php if ($title) { ?>
						<span class="main-section--title"><?php echo $title; ?></span>
					<?php } ?>
					<?php if ($options[0]) { 
						$leftRight = get_sub_field('left-right');
						$image = get_sub_field('image');
						?>						
						<div class="media<?php if ($leftRight) { echo ' media--'.$leftRight.' '; } ?><?php echo $offPage; ?>">					
							<img src="<?php echo $image['url']; ?>" class="media--img" alt="">		
					<?php } ?>				

						<p>
							<?php echo $paragraph; ?>
						</p>

					<?php if ($options[0]) { ?></div><!-- .media --><?php } ?>

				<?php endwhile; ?>
			<?php endif; ?>
		</div>

		<?php endwhile; ?>

	<?php endif; ?>

	<?php
		// Previous/next post navigation.
		the_post_navigation( array(
			'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'twentyfifteen' ) . '</span> ' .
				'<span class="screen-reader-text">' . __( 'Next post:', 'twentyfifteen' ) . '</span> ' .
				'<span class="post-title">%title</span>',
			'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'twentyfifteen' ) . '</span> ' .
				'<span class="screen-reader-text">' . __( 'Previous post:', 'twentyfifteen' ) . '</span> ' .
				'<span class="post-title">%title</span>',
		) ); 
	?>

</div>