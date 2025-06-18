<?php

add_action('rest_api_init', function () {
	register_rest_route('mailchimp', 'contact-submit', array(
		'methods' => 'POST',
		'callback' => function ($data) {
			mailchimp_contact_form_submit($data);
			require_once(plugin_dir_path( __DIR__ ) . '../templates/contact-form-submitted.php');
			exit();
		},
		'permission_callback' => '__return_true'
	));
});

function mailchimp_contact_form_submit ($data) {
	$body = json_decode($data->get_body());

	wp_mail(
		get_option('mailchimp_contact_form_email_address'),
		$body->subject,
		$body->message,
		array('From: <' . $body->email . '>')
	);

	if ($body->subscribe) {
		$url = get_option('mailchimp_api_form_endpoint') . '&EMAIL=' . urlencode($body->email) . '&subscribe=Subscribe';
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		$data = curl_exec($ch);
		$response = json_decode($data);
		curl_close($ch);
	}
}