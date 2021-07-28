<?php
/*
Plugin Name:  WP Never Use Site Health Check
Description:  Disable specific screens and dashboards
Author:       Julien Maury
Author URI:   https://blog.julien-maury.dev
Version:      1.0
*/
defined( "ABSPATH" ) or die( "no");

add_action( 'admin_menu', function() {
    remove_submenu_page( 'tools.php', 'site-health.php' );
} );

add_action( 'wp_dashboard_setup', function() {    
    remove_meta_box( 'dashboard_site_health', 'dashboard', 'normal' );
} );

// ban wp-admin/site-health.php
add_action( 'load-site-health.php', function() {
    wp_die( __( 'Sorry, you are not allowed to access site health information.' ), '', 403 );
} );