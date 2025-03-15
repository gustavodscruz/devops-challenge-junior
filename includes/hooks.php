<?php 

/**
 * Arquivo de hooks e filtros do plugin
 * 
 * @package Devops_Challenge
 */

if (!defined("ABSPATH") ) {
    exit;
}
add_action('init', 'apiki_load_textdomain');

add_action('admin_notices', 'devops_challenge');
add_action('admin_head', 'devop_css');



