<ul class="list-inline grid">
	<?php 
		$args = array(
			'orderby'          => 'date',
			'post_type'        => 'post',
			'posts_per_page'   => 10
		);
		$posts_array = get_posts( $args );
		foreach ($posts_array as $post) : setup_postdata( $post ); 
		$description = get_post_meta( $post->ID, 'Description', true ); ?>
    		<li class="col w-33"><a href="<?php the_permalink(); ?>"><?php echo $description; ?></a></li>
    	<?php 
		endforeach;
		wp_reset_postdata();?>
</ul>