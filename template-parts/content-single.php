<?php
/**
 * Template part for displaying single posts.
 *
 * @package emdad-portfolio
 */
?>
<div class="content content-wrap<?php if (count(get_field('section')) > 1) { echo ' extended-header'; } ?>" id="top">

	<?php 
	global $current_user;
	get_currentuserinfo();  

    if ($current_user->caps) : ?>
		<?php if( have_rows('section') ): ?>
			<?php while( have_rows('section') ): the_row(); 
					$company = get_sub_field('company');
					$subhead = get_sub_field('sub-head');				
					$intro = get_sub_field('intro');
				?>

				<div class="content__section" id="<?php echo preg_replace('/[^a-zA-Z0-9]+/', '-', strtolower($company)); ?>">
					<div class="content__section-header">
						<h2>
							<?php echo $company; ?> 
							<span class="sub-head">
								<?php echo $subhead; ?>
							</span>
						</h2>

						<p><?php echo $intro; ?></p>
					</div><!-- .header -->
						<?php if( have_rows('content') ): ?>
							<?php while( have_rows('content') ): the_row();				
									$columnOptions = get_sub_field('column'); ?>

								<div class="content__section-body<?php if ($columnOptions[0]) echo ' content__section-body--two-col'; ?>">
								

									<?php if ($columnOptions[0] == '2 Column') :
										while( have_rows('2_column_row') ): the_row();
											$left = get_sub_field('left_column')[0];
											$right = get_sub_field('right_column')[0]; 
										?>

											<div class="grid">
												<div class="col w-50 alpha">
													<div class="pad">
														<?php
															if ($left['image']) :
																echo '<img src="'.$left['image']['url'].'" alt="">';
															endif;
															if ($left['paragraph']) :
																echo '<p>'.$left['paragraph'].'</p>';
															endif;
														?>
													</div>
												</div>
												<div class="col w-50 omega">
													<div class="pad">
													<?php
															if ($right['image']) :
																echo '<img src="'.$right['image']['url'].'" alt="">';
															endif;
															if ($right['paragraph']) :
																echo '<p>'.$right['paragraph'].'</p>';
															endif;
														?>								
													</div>
												</div>
											</div>																	
									<?php
									endwhile;
									else :

										$image = get_sub_field('image');
										$paragraph = get_sub_field('paragraph');
										$largeText = get_sub_field('large_text');

										echo '<div class="content__section-item">';
										if ($image) :
											echo '<img src="'.$image['url'].'" alt="">';
										endif;

										if ($paragraph) :
											echo '<p class="sub">'.$paragraph.'</p>';
										endif;

										if ($largeText) :
											echo '<p class="large-text">'.$largeText.'</p>';
										endif;
										echo '</div>';

									endif;
								?>
								</div><!--  .content__section-body -->
							<?php endwhile; ?>
						<?php endif; ?>					
				</div><!-- .content__section -->
			<?php endwhile; ?>
			

		<?php endif; ?>

		<?php get_template_part( 'template-parts/content', 'post-nav' ); ?>

	<?php else : ?>
		
		<?php get_template_part( 'template-parts/content', 'login' ); ?>
		
	<?php endif; ?>
</div>
