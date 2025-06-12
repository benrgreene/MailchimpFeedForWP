<?php
	$classes = array_key_exists('className', $attributes) ? $attributes['className'] : '';
	$posts = get_posts(array(
		'post_type' => 'news-campaigns',
		'numberposts' => -1
	));
?>

<ul class="<?= $classes ?>">
	<?php foreach ($posts as $post) { ?>
		<li>
			<a href="<?= get_post_meta($post->ID, 'link', true) ?>" target="_blank">
				<?= $post->post_title ?>
			</a>
		</li>
	<?php } ?>
</ul>