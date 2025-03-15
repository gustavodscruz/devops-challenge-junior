<?php

/**
 * @package Devops_challenge_Junior
 * @version 1.0
 */
/*
Plugin Name: Devops challenge Júnior
Plugin URI: https://apiki.com/
Description: Sabe de nada, inocente! Ordinária!! Teste Gustavo
Author: Apiki WordPress
Version: 1.0
Text-Domain: devops-challenge
Domain Path: /languages
*/
 
if (!defined("ABSPATH")) {
	exit;
}

require_once plugin_dir_path( __FILE__ ) . 'includes/functions.php';
// require_once plugin_dir_path( __FILE__ ) . 'includes/i18n.php';
// require_once plugin_dir_path( __FILE__ ) . 'includes/hooks.php';

add_action('admin_notices', 'devops_challenge');
add_action('admin_head', 'devop_css');

add_action('init', 'apiki_load_textdomain');

function apiki_load_textdomain(){
    load_plugin_textdomain( 'devops-challenge', false, dirname( plugin_basename( __FILE__ ) ) .'/languages');
}
