<?php

add_action('rest_api_init', function () {
	register_rest_route('mailchimp', 'newsletter-render', array(
		'methods' => 'GET',
		'callback' => function ($data) {		
			echo mailchimp_render_newsletter_list(array(), false);
			exit();
		},
		'permission_callback' => '__return_true'
	));
});

// register the block
add_action('init', function () {
	wp_enqueue_script(
		'mailchimp-newsletter-block-script',
		plugin_dir_url( __DIR__ ) . 'block/script.js',
		array( 'wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor', 'wp-components'),
		null,
		true
	);

	register_block_type('mailchimp/newsletter-list', array(
		'render_callback' => 'mailchimp_render_newsletter_list',
		'title' => 'Newsletter Archive',
		'category' => 'theme',
	));
});


function mailchimp_render_newsletter_list ($attributes, $content) {
	require_once(plugin_dir_path( __DIR__ ) . 'templates/archive-news-campaigns.php');
}
