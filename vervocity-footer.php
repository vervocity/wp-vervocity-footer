<?php
/*
Plugin Name: Vervocity Footer
Description: A plugin to display the copyright information for the website along with the Vervocity Interactive logo.
Plugin URI: https://github.com/vervocity/wp-vervocity-footer
Author: Vervocity
Author URI: https://vervocity.io
Text Domain: vervocity-footer
Version: 1.0.1
*/

// Include vi-functions.php, use require_once to stop the script if mfp-functions.php is not found

require_once plugin_dir_path(__FILE__) . 'includes/vi-functions.php';
require_once plugin_dir_path(__FILE__) . 'classes/Updater.php';

// Create new GitHub updater with user and repo name
new \Vervocity\Footer\Updater(__FILE__, 'vervocity', 'wp-vervocity-footer');
