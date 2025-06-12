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
			</tbody>
		</table>

		<?php submit_button(); ?>
	</form>
</div>