<?php

add_action('admin_init', function () {
	// Base URL for the campaign feed
	register_setting('mailchimp-rss-feed-settings', 'mailchimp_rss_feed_base_campaign_url');

	// Contact form inbox email address
	register_setting('mailchimp-rss-feed-settings', 'mailchimp_contact_form_email_address');

	// Mailchimp API key, server, and list ID for email signup
	register_setting('mailchimp-rss-feed-settings', 'mailchimp_api_form_endpoint');
	
	// Thank you settings
	register_setting('mailchimp-rss-feed-settings', 'mailchimp_thank_you_title');
	register_setting('mailchimp-rss-feed-settings', 'mailchimp_thank_you_content');
});