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
						<label for="mailchimp_campaign_js_sync">Sync Content</label>
					</th>
					<td>
						<input type="text" id="mailchimp_campaign_js_sync" name="mailchimp_campaign_js_sync" class="regular-text ltr" value="<?= get_option('mailchimp_campaign_js_sync') ?>" />
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

	<div style="display: none;" id="newsletter-campaign-list">
		<script language="javascript" type="text/javascript" src="<?= get_option('mailchimp_campaign_js_sync') ?>"></script>
	</div>

	<form onsubmit="saveAllCampaigns(event)">
		<p>
			Sync only needs to be run once to sync all older newsletters.
		</p>
		<?php submit_button('Sync Old Newsletters'); ?>
	</form>
</div>

<script type="text/javascript">
	function saveAllCampaigns (event) {
		event.preventDefault()
		const campaignList = document.querySelectorAll('#newsletter-campaign-list .campaign')
		campaignList.forEach((campaign) => {
			const linkEl = campaign.querySelector('a')
			sendUpdateForCampaign({
				date: campaign.innerText.split(' - ')[0].trim(),
				link: linkEl.getAttribute('href'),
				title: linkEl.getAttribute('title')
			})
		})
	}

	const sendUpdateForCampaign = ({ date, title, link }) => {
		fetch(`${window.wpApiSettings.root}brg-mailchimp/save-historic-campaign`, {
			method: 'POST',
			headers: {
				'Content-Type': 'application/x-www-form-urlencoded',
				'X-WP-Nonce': '<?= wp_create_nonce('wp_rest') ?>'
			},
			body: JSON.stringify({
				date, title, link
			})
		})
	      .then((blob) => blob.json())
	      .then((data) => {
	        console.log(data)
	      })
	}
</script>