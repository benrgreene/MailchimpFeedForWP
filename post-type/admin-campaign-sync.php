<?php

add_action('rest_api_init', function () {
    register_rest_route('brg-mailchimp', '/save-historic-campaign', array(
        'methods' => 'POST',
        'callback' => 'brg_mailchimp_save_historic_campaign',
        'permission_callback' => function ($request) {
            return wp_verify_nonce($request->get_header('X-WP-Nonce'), 'wp_rest');
        }
    ));
});

function brg_mailchimp_save_historic_campaign ($request) {
    $body = json_decode($request->get_body());
    $slug = sanitize_title($body->title);
    $campaign = get_posts(array(
        'post_type' => 'news-campaigns',
        'name' => $slug,
        'numberposts' => 1
    ));

    if (count($campaign) === 0) {
        $date_parts = explode('/', $body->date);
        $date = date('Y-m-d', strtotime($body->date));
        $campaign_id = wp_insert_post(array(
            'post_date' => $date,
            'post_title' => $body->title,
            'post_type' => 'news-campaigns',
            'post_status' => 'publish'
        ));
        update_post_meta($campaign_id, 'link', $body->link);
    }
}