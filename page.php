<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package emdad-portfolio
 */

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

	<div class="content content--dark introduction" id="top">
		<div class="content__section">
			<?php the_content(); ?>
			<img src="<?php echo bloginfo('template_directory'); ?>/img/portrait.png" alt="" class="pic">
		</div>
	</div>

	<div class="content">

		<?php if( have_rows('brands') ): ?>
		<!-- Brands -->
		<?php $i = 0; ?>
			<div class="content__section brands" id="brands">
				<span class="h2">
					<h2 class="inline">Brands</h2> worked with
				</span>
				<div class="brands__list">
					<ul class="brands__list-row list-inline grid">
						<?php while( have_rows('brands') ): the_row();
							$image = get_sub_field('image');
							$title = $image['alt'];
							if (!count($title)) {
								$title = $image['title'];
							}
							$i ++;
						?>
						<li class="col w-25"><div class="brands--img-wrap"><img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>"></div></li>
						
						<?php if ($i == 4) : ?>
							<?php $i = 0; // Creates new row?>
					</ul>
					<ul class="brands__list-row list-inline grid">
						<?php endif; ?>

						<?php endwhile; ?>
					</ul>
				</div>
			</div>
		<!-- Brands -->	
		<?php endif; ?>

		<?php// if( have_rows('projects') ): ?>
		<!-- Projects -->
		<?php //$i = 0; ?>
			<div class="content__section projects" id="projects">
				<h2>Projects</h2>
				<?php get_template_part( 'template-parts/content', 'projects' ); ?>
				<!-- <ul class="list-inline grid"> -->
					<?php //while( have_rows('projects') ): the_row(); 
						//$text = get_sub_field('link_text');
						// $pageJump = get_sub_field('page_jump');
						// $post_object = setup_postdata(get_field('post_object'));
						// $link = get_field('post_objects');	
						// if ($pageJump) {				
						// 	$link = substr($link, 0, -1);
						// 	$link = $link.'#'.$pageJump;
						// }
						// $i++
						?>
							<!-- <li class="col w-33"><a href="<?php echo $link ?>"><?php echo $text; ?></a></li> -->
						<?php// wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
					<?php //endwhile; ?>
				<!-- </ul> -->
			</div>
		<!-- Projects -->	
		<?php// endif; ?>

		<?php if( have_rows('skills') ): ?>
		<!-- Skills -->
			<?php $i = 0; ?>
			<div class="content__section" id="skills">
				<h2>Skills</h2>
				<div class="skills-mod grid">
					<?php while( have_rows('skills') ): the_row(); 
						$text = get_sub_field('text');
						$pageJump = get_sub_field('page_jump');
						$image = get_sub_field('image');
						$post = get_sub_field('page');	
						setup_postdata($post);
						if (!$pageJump) {				
							$pageJump = '';
						} else {
							$pageJump = '#'.$pageJump;
						}
						$i++;
						?>
						<div class="skills-mod__skill col w-16">
							<a href="<?php the_permalink(); echo $pageJump; ?>" class="skills-mod--main-link">
								<div class="skills-mod--title"><?php echo $text; ?></div>
								<div class="skills-mod__img-hide">
									<img src="<?php echo $image['url']; ?>" alt="" height="300px">
								</div>			
								<span class="skills-mod--arrow">
									<i class="arrow"></i>																	
								</span>					
								<span class="skills-mod--view-all">View all</span>
							</a>
						</div>
						<?php if ($i == 6) : ?>
							<?php $i = 0; // Creates new row ?>
				</div>
				<div class="skills-mod grid">
						<?php endif; ?>
						<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
					<?php endwhile; ?>
				</div>
			</div>
		<!-- Skills -->	
		<?php endif; ?>

		<?php if( have_rows('touchpoints') ): ?>
		<!-- Touchpoints -->
			<div class="content__section touchpoints" id="touchpoints">		
				<h2>Touchpoints</h2>
				<ul class="list-inline grid">
					<?php while( have_rows('touchpoints') ): the_row(); 
						$text = get_sub_field('text');
						$image = get_sub_field('image');
						$post = get_sub_field('page');	
						setup_postdata( $post );
						?>
						<li class="col w-25">
							<a href="<?php the_permalink(); ?>">
								<div class="touchpoints__img-wrap">							
									<?php echo $text; ?>
									<img src="<?php echo $image['url'] ?>" alt="">
								</div>
							</a>
						</li>
						<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
					<?php endwhile; ?>
				</ul>
			</div>
		<!-- Touchpoints -->	
		<?php endif; ?>

		<?php if( have_rows('recommendations') ): ?>
		<!-- Recommendations -->
			<div class="content__section recommendations" id="recommendations">
				<h2>Recommendations</h2>
				<div class="grid">
					<?php while( have_rows('recommendations') ): the_row(); 
						$name = get_sub_field('name');
						$job = get_sub_field('job');
						$text = get_sub_field('text');
						$image = get_sub_field('image');
						$quote = get_sub_field('quote');
						?>
						<div class="recommendations__item w-33 col alpha">
							<div class="pad">
								<a href="https://uk.linkedin.com/pub/emdad-rashid/b/98/100<?php echo $linkedinId; ?>" target="_blank" class="recommendations--person">
									<div class="recommendations--profile-pic">
										<img src="<?php echo $image['url']; ?>" alt="">								
									</div>
									<h3><?php echo $name; ?></h3>
									<?php echo $job; ?>								
									<blockquote cite="https://uk.linkedin.com/pub/emdad-rashid/b/98/100<?php echo $linkedinId; ?>">
										<p>										
											"<?php echo $quote; ?>"
										</p>
										<p class="recommendations__view">
											<span>Read on</span>  <img src="<?php echo get_template_directory_uri(); ?>/img/linkedin.png" alt="Linked In">
										</p>
									</blockquote>							
								</a>
							</div>
						</div>
					<?php endwhile; ?>
				</div>
			</div>
		<!-- Recommendations -->	
		<?php endif; ?>

		<?php if( have_rows('contact_details') ): ?>
		<!-- contact_details -->
			<div class="content__section contact" id="contact">
					<h2>Contact</h2>
					<?php while( have_rows('contact_details') ): the_row(); 
						$source = get_sub_field('source_url');
						$link = get_sub_field('link');
						$original = $link;

						if (!$source) {
							$image = get_sub_field('source_image');
							$source = '<img src="'.$image['url'].'" alt="'.$image['alt'].'">';
						} else {
							$source = $source.':';
						}

						if (!preg_match('/http/', $link)) {
							$original = $link;
							$link = 'mailto:'.$link;
						} else {
							$link = $link.$linkedinId;
						}
						?>
						<p><span class="contact--method"><?php echo $source; ?></span> <a href="<?php echo $link; ?>"><?php echo $original; ?></a></p>
					<?php endwhile; ?>
				</ul>
			</div>
		<!-- contact_details -->	
		<?php endif; ?>


	</div>
	<div class="content footer">
		<?php get_footer(); ?>
	</div>

<?php endwhile; // End of the loop. ?>


