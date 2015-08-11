<ul class="list-inline">
	<?php 
		$args = array(
			'orderby'          => 'date',
			'post_type'        => 'post',
			'posts_per_page'   => 100,
			'category_name'    => 'Skills'
		);
		$posts_array = get_posts( $args );
		foreach ($posts_array as $post) : setup_postdata( $post ); 
		$title = get_post_meta( $post->ID, 'Page Title', true ); ?>
    		<li><a href="<?php the_permalink(); ?>"><?php echo $title; ?></a></li>
    	<?php 
		endforeach;
		wp_reset_postdata();?>
</ul>