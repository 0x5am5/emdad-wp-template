<ul class="list-inline">
	<?php 
		$args = array(
			'orderby'          => 'date',
			'post_type'        => 'post',
			'order'            => 'ASC',
			'posts_per_page'   => 100,
		);
		$posts_array = get_posts( $args );
		foreach ($posts_array as $post) : setup_postdata( $post ); 
		// $title = get_post_meta( $post->ID, 'section_0_sub-head', true);
		$title = get_post_meta( $post->ID); ?>
    		<li><a href="<?php the_permalink(); ?>"><?php echo the_title(); ?></a></li>
    	<?php 
		endforeach;
		wp_reset_postdata();?>
</ul>