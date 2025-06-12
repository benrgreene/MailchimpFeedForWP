<?php

class Campaign_Proccesser {

	public static function setup () {
		add_action('init', function () {
			if (!wp_next_scheduled('brg_mailchimp_campaign_cron_hook')) {
				wp_schedule_event(strtotime('today, 12:01 am'), 'daily', 'brg_mailchimp_campaign_cron_hook');
			}
		});

		add_action('brg_mailchimp_campaign_cron_hook', function () {
			self::fetch_updates();
		});
	}

	public static function fetch_updates () {
		$rss_feed = self::fetch_feed();
		$campaigns = self::convert_xml_to_object($rss_feed);
		self::save_new_campaigns($campaigns);
	}

	public static function save_new_campaigns ($campaigns) {
		foreach ($campaigns as $campaign) {
			$title = $campaign->title;
			$slug = sanitize_title($title);
			$campaign_exists = get_page_by_path($slug, OBJECT, 'news-campaigns');
			if (!$campaign_exists) {
				$timestamp = strtotime((string) $campaign->pubDate);
				$campaign_id = wp_insert_post(array(
					'post_title' => $title,
					'post_name' => $slug,
					'post_type' => 'news-campaigns',
					'post_date' => date('Y-m-d H:i:s', $timestamp),
					'post_status' => 'publish'
				));
				update_post_meta($campaign_id, 'link', (string) $campaign->link);
			}
		}
	}

	public static function convert_xml_to_object ($rss) {
		$feed_object = simplexml_load_string($rss);
		$feed = (array) $feed_object->channel;
		if (!is_array($feed['item'])) {
			$item = $feed['item'];
			$feed['item'] = array($feed['item']);
		}
		return $feed['item'];
	}

	public static function fetch_feed () {
		$feed_url = get_option('mailchimp_rss_feed_base_campaign_url');
		$ch = curl_init($feed_url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		$data = curl_exec($ch);
		curl_close($ch);
		return $data;
	}
}


Campaign_Proccesser::setup();