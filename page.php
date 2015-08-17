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
	<?php
		$id = $_GET['uniqueid'];
		$post = get_post($id);
		echo '<span class="page-id access">'.$post->guid.'</span>';
	?>

	<div class="content content--dark introduction" id="top">
		<div class="content__section">
			<div class="grid">
				<div class="col w-50">
					<?php the_content(); ?>				
				</div>							
			</div>
			<img src="<?php echo bloginfo('template_directory'); ?>/img/portrait.png" alt="" class="pic">						
		</div>
	</div>

	<div class="content">
		<?php if( have_rows('brands') ): ?>
		<!-- Brands -->
		<?php $i = 0; ?>
		<div class="content__section brands" id="brands">			
			<h2>With big brands</h2>				
			<div class="brands__list">
				<ul class="brands__list-row list-inline grid">
					<?php while( have_rows('brands') ): the_row();
						$image = get_sub_field('image');
						$title = $image['alt'];
						$smallImage = get_sub_field('small_image');

						if (!count($title)) {
							$title = $image['title'];
						}
						$i++;
					?>
									
					<li class="col w-33">
						<div class="brands--img-wrap<?php if ($smallImage) { echo ' sml-img'; } ?>">
							<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
						</div>
					</li>
					<?php endwhile; ?>
				</ul>
			</div>
		</div>
		<!-- Brands -->	
		<?php endif; ?>

		<?php if( have_rows('delivering_delight') ): ?>
		<!-- Delivering Delight -->
		<div class="content__section delivering-delight" id="delivering">
			<h2>Delivering Delight</h2>
				<ul class="list-inline grid">
					<?php while( have_rows('delivering_delight') ): the_row();
						$title = get_sub_field('title');
						$text = get_sub_field('text');					
					?>								
					<li class="col w-33">
						<div class="delivering-delight__content pad">
							<h3><?php echo $title; ?></h3>

							<p><?php  echo $text; ?></p>
						</div>
					</li>			
					<?php endwhile; ?>
				</ul>
			</div>
		</div>
		<!-- Delivering Delight -->	
		<?php endif; ?>

		<?php if( have_rows('skills') ) : ?>
		<!-- Skills -->
		<div class="content__section skills" id="skills">
			<h2>Skills</h2>
			<div class="grid">
			<?php while( have_rows('skills') ): the_row(); ?>
				<div class="col w-33">
					<div class="pad">
						<p><?php echo get_sub_field('intro'); ?></p>
					</div>
				</div>
				<div class="col w-33">
					<ul class="grid">
						<?php $i = 1; ?>
						<?php while( have_rows('titles') ): the_row(); ?>
							<li><h3><?php echo get_sub_field('text'); ?></h3></li>
						<?php if ($i == 8) : ?>
							</ul>
						</div>
							<div class="col w-33">
								<ul class="grid">
						<?php endif; ?>
							<?php $i++; ?>
						<?php endwhile; ?>
					</ul>					
				</div>
			<?php endwhile; ?>
			</div>
		</div>
		<!-- Skills -->
		<?php endif; ?>

		<?php if( have_rows('projects') ): ?>
		<!-- Projects -->
		<div class="content__section projects" id="projects">
			<h2>Projects</h2>
			<div class="grid">
			<?php $i = 1; ?>
			<?php while( have_rows('projects') ): the_row(); 
				$post_object = get_sub_field('the_pages');
				$image = get_sub_field('image');				
				$post = $post_object;
				setup_postdata($post); 
			?>
				<div class="project col w-33<?php if ($i % 3 == 1) { echo ' alpha'; } else if ($i % 3 == 0) { echo ' omega'; } ?>">
					<div class="pad">
						<a href="<?php the_permalink(); ?>">
							<h3>
								<?php the_title(); ?>
							</h3>
							<div class="project-hide">
								<img src="<?php echo $image['url']; ?>" alt="" height="150px">
							</div>													
						</a>						
					</div>
				</div>
			<?php $i++; ?>
			<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
			<?php endwhile; ?>
			</div>
		</div>
		<!-- Projects -->	
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
				$quote = get_sub_field('quote');
				?>
				<div class="recommendations__item w-33 col alpha">
					<div class="pad">
						<h3><?php echo $name; ?></h3>
						<?php echo $job; ?>								
						<blockquote cite="https://uk.linkedin.com/pub/emdad-rashid/b/98/100<?php echo $linkedinId; ?>">
							<p>										
								"<?php echo $quote; ?>"
							</p>
							<p class="recommendations__view">
								<a href="https://uk.linkedin.com/pub/emdad-rashid/b/98/100<?php echo $linkedinId; ?>" target="_blank" class="recommendations--person">
									<span>Read on</span> 
									<img src="<?php echo get_template_directory_uri(); ?>/img/linkedin.png" alt="Linked In">
								</a> 
							</p>
						</blockquote>							
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
					$source = '<img src="'.$image['url'].'" alt="'.$image['alt'].'" width="126" height="33">';
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
		</div>
		<!-- contact_details -->	
		<?php endif; ?>
	</div>

	<div class="content footer">
		<?php get_footer(); ?>
	</div>

<?php endwhile; // End of the loop. ?>