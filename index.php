<?php 
/** 
 * @wordpress-plugin 
 * Plugin Name: Mailchimp Campaign RSS Feed
 * Description: Displays a Mailchimp campaign's RSS feed in WordPress
 * Version: 1
 * Author: Ben Greene
 * Author URI: https://benrgreene.com
 * License: GPL v2 or later 
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt 
 */

// core
require_once('icons.php');
require_once('admin/index.php');
require_once('post-type/index.php');

// blocks for the plugin
require_once('blocks/rss-feed/index.php');
require_once('blocks/contact-form/index.php');


// // $client = new MailchimpMarketing\ApiClient();
// // $client->setConfig([
// //     'apiKey' => 'ee3d490f46527b5dbe96dc16dd8184ab-us18',
// //     'server' => 'us18',
// // ]);

// // $response = $client->lists->setListMember("335da173fc", [
// //     "email_address" => "benrgreene+apitest3@gmail.com",
// //     "status_if_new" => "unsubscribed",
// //     "merge_fields" => array(
// //     	'NAME' => 'Benny G',
// //     	'SUBJECT' => 'test',
// //     	'MESSAGE' => 'test message'
// //     )
// // ]);
// // $response = $client->lists->getListSignupForms("335da173fc");

// // error_log(print_r($response,true));

// add_action('init', function(){
// 	$headers = array(
// 		'From' => 'benrgreene@gmail.com',
//     	'Reply-To' => 'benrgreene@gmail.com',
//     	'X-Mailer' => 'PHP/' . phpversion()
// 	);
// 	$test = mail('benrgreene@gmail.com', 'test subject', 'test message', $headers);
// 	error_log($test);
// });