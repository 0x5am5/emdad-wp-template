<?php
/**
 * Template part for displaying single posts.
 *
 * @package emdad-portfolio
 */




?>

<div class="content content-wrap<?php if (count(get_field('section')) > 1) { echo ' extended-header'; } ?>" id="top">
	<?php the_content(); ?>
	
	<?php global $current_user;
      		get_currentuserinfo();       		
    if ($current_user->caps) { ?>
		<?php if( have_rows('section') ): ?>
			<?php while( have_rows('section') ): the_row();
				$company = get_sub_field('company');
				$subhead = get_sub_field('sub-head');
				$role = get_sub_field('role');
				$intro = get_sub_field('intro');
			?>
			<div class="content__section main-section" id="<?php echo preg_replace('/[^a-zA-Z0-9]+/', '-', strtolower($company)); ?>">
				<div class="main-section__header">
					<h2><?php echo $company; ?> <span class="sub-head"><?php if ($subhead) { echo $subhead; } else { echo the_title(); } ?></span></h2>

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
								$next_post = get_next_post();
								$previous_post = get_previous_post();

								$emptyLinkNext = '<span><i class="icon icon--chevron chevron--left"></i></span>';
							//$nextLink = previous_post_link('%link', '<i class="icon icon--chevron chevron--left"></i>', TRUE);
								if (is_a( $next_post , 'WP_Post' ) ) {
									next_post_link('%link', '<i class="icon icon--chevron chevron--left"></i>', TRUE);
									$emptyLinkNext = '';
								} 								
								echo $emptyLinkNext;
							?>
						</div>
						<div class="col w-60">
							<?php 
							if (is_a( $previous_post , 'WP_Post' ) ) {
								previous_post_link('%link', '%title', TRUE);
							} else if (is_a( $next_post , 'WP_Post' ) ) {
								next_post_link('%link', '%title', TRUE); 
							}
							?>
						</div>
						<div class="next-nav__navigation--dir col w-20">
							<?php 						

								$emptyLinkPrevious = '<span><i class="icon icon--chevron"></i></span>';

								if (is_a( $previous_post , 'WP_Post' ) ) {
									previous_post_link('%link', '<i class="icon icon--chevron"></i>', TRUE); 
									$emptyLinkPrevious = '';
								} 
								echo $emptyLinkPrevious;
	
							?>
							
						</div>
					</div>
					<div class="col w-25"></div>
				</div>
			</nav>
		</div>
	<?php } ?>
</div>