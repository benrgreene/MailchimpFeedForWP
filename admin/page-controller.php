<?php

add_action('admin_menu', function () {
	$BRG_MC_SETTINGS_PAGE_SLUG  = 'mailchimp-rss-feed-settings-page';
	$BRG_MC_SETTINGS_NONCE_NAME = 'wp_mailchimp_rss_nonce';
	$BRG_MC_SETTINGS_ICON = get_mailchimp_svg_icon();

	add_menu_page('Mailchimp RSS Feed', 'Mailchimp Feed', 'administrator', $BRG_MC_SETTINGS_PAGE_SLUG, '', $BRG_MC_SETTINGS_ICON);

	// Register submenu for plugin settings - default page for the plugin
	add_submenu_page($BRG_MC_SETTINGS_PAGE_SLUG, 'Value Companion Settings', 'Settings', 'administrator', $BRG_MC_SETTINGS_PAGE_SLUG, function () {
		include plugin_dir_path( __DIR__ ) . 'templates/admin/settings.php';
	});
});
	
