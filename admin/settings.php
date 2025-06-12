<?php

add_action('admin_init', function () {
	// Base URL for the campaign feed
	register_setting('mailchimp-rss-feed-settings', 'mailchimp_rss_feed_base_campaign_url');
});