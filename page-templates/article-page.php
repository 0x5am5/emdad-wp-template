<?php
/*
Template Name: Article Page
*/

?>

<div class="content content-wrap" id="top">
	
	<?php if( have_rows('sections') ): ?>
			<?php while( have_rows('sections') ): the_row();
				$topic = get_sub_field('topic');
				$role = get_sub_field('role');
				$intro = get_sub_field('intro');
				$positioning = get_sub_field('positioning');
			?>
			<div class="content__section main-section main-section--<?php echo $topic; ?>" id="<?php echo $positioning; ?>">
				<div class="main-section__header">
					<h2><?php echo $topic; ?> <span class="sub-head"><?php echo $role; ?></span></h2>
				</div>
			</div>

			<?php endwhile; ?>

		<?php endif; ?>

</div>