<div class="page-nav content__section">
	<nav>
		<div class="next-nav grid">
			<div class="col w-25 next-project">Next project:</div>
			<div class="next-nav__navigation col w-50">
				<div class="next-nav__navigation--dir col w-20">
					<?php 
						$next_post = get_next_post(TRUE);
						$previous_post = get_previous_post(TRUE);
						$category = get_the_category()[0]->name;

						// Args used for looping
						$args = array(
							'posts_per_page'   => 1,
							'category_name'    => $category,
							'order'            => 'DESC',
							'post_type'        => 'post',
							'post_status'      => 'publish',
						);					
						$id = get_posts($args)[0]->ID;						

						$emptyLinkPrevious = '<a href="'.get_permalink($id).'"><i class="icon icon--chevron chevron--left"></i></a>';

						if (is_a( $previous_post , 'WP_Post' ) ) {
							previous_post_link('%link', '<i class="icon icon--chevron chevron--left"></i>', TRUE); 
							$emptyLinkPrevious = '';
						}																	
						echo $emptyLinkPrevious;
					?>
				</div>
				<div class="col w-60">
					<?php 

						if (is_a($next_post , 'WP_Post' ) ) {

							next_post_link('%link', '%title', TRUE);

						} else {
							
							// Args used for looping
							$args = array(
								'posts_per_page'   => 1,
								'category_name'    => $category,
								'order'            => 'ASC',
								'post_type'        => 'post',
								'post_status'      => 'publish',
							);

							$id = get_posts($args)[0]->ID;
							
							echo '<a href="'.get_permalink($id).'">'.get_the_title($id).'</a>';
						}
					?>
				</div>
				<div class="next-nav__navigation--dir col w-20">
					<?php 																					

						$emptyLinkNext = '<a href="'.get_permalink($id).'"><i class="icon icon--chevron"></i></a>';
															
						if (is_a($next_post , 'WP_Post' ) ) {
							next_post_link('%link', '<i class="icon icon--chevron"></i>', TRUE);
							$emptyLinkNext = '';
						} 								
						echo $emptyLinkNext;
					?>
				</div>
			</div>
			<div class="col w-25"></div>
		</div>
	</nav>
</div>