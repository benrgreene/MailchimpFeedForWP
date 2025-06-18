<div class="wrap">
	<h1>Mailchimp Campaign RSS Feed</h1>

	<form method="post" action="options.php">
		<?php settings_fields('mailchimp-rss-feed-settings'); ?>
		<?php do_settings_sections('mailchimp-rss-feed-settings'); ?>
		
		<table class="form-table" role="presentation">
			<tbody>
				<tr>
					<th scope="row">
						<label for="mailchimp_rss_feed_base_campaign_url">Campaign Feed URL</label>
					</th>
					<td>
						<input name="mailchimp_rss_feed_base_campaign_url" type="text" id="mailchimp_rss_feed_base_campaign_url" value="<?= get_option('mailchimp_rss_feed_base_campaign_url') ?>" class="regular-text ltr">
					</td>
				</tr>
				<tr>
					<th scope="row">
						<label for="mailchimp_contact_form_email_address">Contact Inbox Address</label>
					</th>
					<td>
						<input name="mailchimp_contact_form_email_address" type="text" id="mailchimp_contact_form_email_address" value="<?= get_option('mailchimp_contact_form_email_address') ?>" class="regular-text ltr">
					</td>
				</tr>
				<tr>
					<th scope="row">
						<label for="mailchimp_api_key">Mailchimp Form Endpoint</label>
					</th>
					<td>
						<input name="mailchimp_api_form_endpoint" type="text" id="mailchimp_api_form_endpoint" value="<?= get_option('mailchimp_api_form_endpoint') ?>" class="regular-text ltr">
					</td>
				</tr>
				<tr>
					<th scope="row">
						<label for="mailchimp_thank_you_title">Thank You Title</label>
					</th>
					<td>
						<input name="mailchimp_thank_you_title" type="text" id="mailchimp_thank_you_title" value="<?= get_option('mailchimp_thank_you_title') ?>" class="regular-text ltr">
					</td>
				</tr>
				<tr>
					<th scope="row">
						<label for="mailchimp_thank_you_content">Thank You Content</label>
					</th>
					<td>
						<input name="mailchimp_thank_you_content" type="text" id="mailchimp_thank_you_content" value="<?= get_option('mailchimp_thank_you_content') ?>" class="regular-text ltr">
					</td>
				</tr>
			</tbody>
		</table>

		<?php submit_button(); ?>
	</form>
</div>