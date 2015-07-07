<?php
/**
 * Template part for displaying single posts.
 *
 * @package emdad-portfolio
 */




?>

<div class="content content-wrap<?php if (count(get_field('section')) > 1) { echo ' extended-header'; } ?>" id="top">
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
	<?php } else { ?>
		<div class="content__section">
			
				<p>Enter</p>

				<form action="http://www.3dux.co.uk/wp-login.php" method="post">
					<div class="form-row">
						<label for="log">Username</label>
						<input type="text" name="log" id="log" value=""> 			
					</div>
					<div class="form-row">
						<label for="pwd">Password</label>
						<input type="password" name="pwd" id="pwd"> 						
					</div>
					<div class="form-row">
						<input type="submit" name="submit" value="Log In" class="button">						
					</div>
					<div class="form-row">
						<label for="rememberme">Remember me</label>
						<input name="rememberme" id="rememberme" type="checkbox" checked="checked" value="forever">						
					</div>						
					<input type="hidden" name="redirect_to" value="http://<?php echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>">
				</form>

				<h2>Request Password</h2>
				<p>
					Hi!<br>
					Thanks for visitng my portfolio. Due to the confidential nature of some of my work I need to hide it behind a password.
				</p>
				<p>
					Please contact me on the email below or fill out the form to let me know you are so that I can provide you with a password to view my portfolio.
				</p>
				<p>
					Sorry for the inconvenience!
				</p>
				<p>
					<a href="mailto:emdad@3dux.co.uk">emdad@3dux.co.uk</a>
				</p>

				<hr class="or-rule">

				<p>Fill out the form below</p>

				<form name="contact-form" action="http://samgregorydigital.co.uk/mail/emdad/contact-request.php" method="post">
					<div class="form-row">
						<label for="full-name">Name</label>
						<input type="text" id="full-name" name="full-name" required>
					</div>
					<div class="form-row">
						<label for="organisation">Organisation</label>
						<input type="text" id="organisation" name="organisation" required>
					</div>
					<div class="form-row">
						<label for="email">Email</label>
						<input type="text" id="email" name="email" required>
					</div>
					<div class="form-row">
						<button type="submit">Send</button>
					</div>
				</form>
			
		</div>
	<?php } ?>
</div>