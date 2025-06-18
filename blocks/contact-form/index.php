<?php

require_once('contact-form-submit.php');

add_action('rest_api_init', function () {
	register_rest_route('mailchimp', 'contact-form-render', array(
		'methods' => 'GET',
		'callback' => function ($data) {
			mailchimp_render_contact_form(array(), false);
			exit();
		},
		'permission_callback' => '__return_true'
	));
});

// register the block
add_action('init', function () {
	wp_enqueue_script(
		'mailchimp-contact-form-block-script',
		plugin_dir_url( __DIR__ ) . 'contact-form/script.js',
		array( 'wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor', 'wp-components'),
		null,
		true
	);

	register_block_type('mailchimp/contact-form', array(
		'render_callback' => 'mailchimp_render_contact_form',
		'title' => 'Mailchimp Contact Form',
		'category' => 'theme',
	));
});

function mailchimp_render_contact_form ($attributes, $content) {
	require_once(plugin_dir_path( __DIR__ ) . '../templates/contact-form.php');
}