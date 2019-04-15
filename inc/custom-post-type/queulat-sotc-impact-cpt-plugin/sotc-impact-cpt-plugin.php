<?php
/**
 * Plugin Name: Impact by numbers Custom Post Type Plugin
 * Plugin URI:
 * Description: 
 * Version: 0.1.0
 * Author:
 * Author URI:
 * License: GPL-3.0-or-later
 */

function register_post_type_impact() {
	require_once __DIR__ .'/class-sotc-impact-post-type.php';
	Sotc_Impact_Post_Type::activate_plugin();
	require_once __DIR__ .'/class-sotc-impact-post-type.php';
	require_once __DIR__ .'/class-sotc-impact-post-query.php';
	require_once __DIR__ .'/class-sotc-impact-post-object.php';
}

add_action('init', 'register_post_type_impact');
