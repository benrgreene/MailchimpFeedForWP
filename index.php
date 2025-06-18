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
