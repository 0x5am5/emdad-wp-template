<?php
/**
 * Template part for displaying single posts.
 *
 * @package emdad-portfolio
 */

?>

<div class="content content-wrap" id="top">
	<?php if( have_rows('section') ): ?>
		<?php while( have_rows('section') ): the_row();
			$company = get_sub_field('company');
			$role = get_sub_field('role');
			$intro = get_sub_field('intro');
			$positioning = strtolower(get_sub_field('positioning'));
			$offPage = strtolower(get_sub_field('off_page'));	

		?>
		<div class="content__section main-section main-section--<?php echo $positioning; ?>" id="<?php echo strtolower($company); ?>">
			<div class="main-section__header">
				<h2><?php echo $company; ?> <span class="sub-head"><?php echo the_title(); ?></span></h2>

				<?php echo $intro; ?>
			</div><!-- .header -->

			<?php if( have_rows('content') ): ?>
				<?php while( have_rows('content') ): the_row();
					$options = get_sub_field('image_options');
					$paragraph = get_sub_field('paragraph');
					$title = get_sub_field('title');
					$offPage = $options[1];
					?>
					
					<?php if ($title) { ?>
						<span class="main-section--title"><?php echo $title; ?></span>
					<?php } ?>
					<?php if ($options[0] && !$options[1]) { 
						$leftRight = get_sub_field('left-right');
						$image = get_sub_field('image');
						?>						
						<p><?php echo $paragraph; ?></p>
						<div class="media main-section--img<?php if ($leftRight) { echo ' media--'.$leftRight.' '; } ?><?php echo $offPage; ?>">					
							<img src="<?php echo $image['url']; ?>" class="media--img" alt="">	
					<?php } else if ($options[0] && $options[1]) { 
						$leftRight = get_sub_field('left-right');
						$image = get_sub_field('image');
						?>						
						<div class="media main-section--img<?php if ($leftRight) { echo ' media--'.$leftRight.' '; } ?><?php echo $offPage; ?>">					
							<img src="<?php echo $image['url']; ?>" class="media--img" alt="">	
						<?php echo $paragraph; ?>
					<?php } else { ?>				

						<p>
							<?php echo $paragraph; ?>
						</p>

					<?php } ?>

					<?php if ($options[0]) { ?></div><!-- .media --><?php } ?>

				<?php endwhile; ?>
			<?php endif; ?>
		</div>

		<?php endwhile; ?>

	<?php endif; ?>
	
	<div class="content__section">
		<nav>
			<div class="next-nav grid">
				<div class="col w-25">Next project</div>
				<div class="next-nav__navigation col w-50">
					<div class="next-nav__navigation--dir col w-20">
						<?php 
							if (get_previous_post()) {
								previous_post_link('%link', '<', TRUE); 
							} else {
								echo '<span><</span>';
							}
						?>
					</div>
					<div class="col w-60">
						<?php 
						if (get_next_post()) {
							next_post_link('%link', '%title', TRUE);
						} else {
							previous_post_link('%link', '%title', TRUE); 
						}
						?>
					</div>
					<div class="next-nav__navigation--dir col w-20">
						<?php 
							if (get_next_post()) {
								next_post_link('%link', '>', TRUE);
							} else {
								echo '<span>></span>';
							} 
						?>
					</div>
				</div>
				<div class="col w-25"></div>
			</div>
		</nav>
	</div>

</div>