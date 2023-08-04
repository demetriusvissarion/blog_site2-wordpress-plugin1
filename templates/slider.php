<h1>Slider</h1>

<?php

$args = array(
	'post_type' => 'testimonial',
	'post_status' => 'publish',
	'posts_per_page' => 5,
	'meta_query' => array(
		array(
			'key' => '_demetrius1_testimonial_key',
			'value' => 's:8:"approved";i:1;s:8:"featured";i:1;',
			'compare' => 'LIKE'
		)
	)
);

$query = new WP_Query($args);
?>

<h4>'This is the $query content: ' <?php $query ?></h4>

<?php
if ($query->have_posts()) :
	echo '<ul>';
	while ($query->have_posts()) : $query->the_post();
		echo '<li>' . get_the_title() . '<p>' . get_the_content() . '</p></li>';
	endwhile;
	echo '</ul>';
endif;

wp_reset_postdata();
?>