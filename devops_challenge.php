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

global $global_lyrics;

function apiki_segura_o_tchan()
{

	$global_lyrics = __("Pau que nasce torto nunca se endireita\n" .
			"Menina que requebra a mãe pega na cabeça\n" .
			"Pau que nasce torto nunca se endireita\n" .
			"Menina que requebra a mãe pega na cabeça\n" .
			"Domingo ela não vai (vai, vai)\n" .
			"Domingo ela não vai não (vai, vai, vai)\n" .
			"Olha, domingo ela não vai (vai, vai)\n" .
			"Domingo ela não vai não (vai, vai, vai)\n" .
			"O pau que nasce torto nunca se endireita\n" .
			"Menina que requebra a mãe pega na cabeça\n" .
			"Pau que nasce torto nunca se endireita\n" .
			"Menina que requebra a mãe pega na cabeça\n" .
			"Segure o tchan\n" .
			"Amarre o tchan\n" .
			"Segure o tchan tchan tchan tchan\n" .
			"Depois de nove meses você vê o resultado\n" .
			"Esse é o Gera Samba arrebentando no pedaço\n" .
			"Joga ela no meio, mete em cima, mete embaixo", 'devops-challenge');
			
	$lyrics_array = explode("\n", trim($global_lyrics));

	return wptexturize($lyrics_array[mt_rand(0, count( $lyrics_array ) - 1)]);

}

function devops_challenge()
{
	$lang   = '';
	if (substr(get_user_locale(), 0, 3) !== 'pt_') {
		$lang = 'lang="en"';
	}
	$chosen = apiki_segura_o_tchan();

	printf(
		'<p id="devop" class="devop" %s> %s</p>',
		$lang,
		esc_html__('Segure o Tchan, by Apiki WordPress: ', 'devops-challenge') . ' ' . esc_html($chosen, 'devops-challenge')
	);
}

function devop_css(){
	wp_enqueue_style ("devops_challenge_css", plugin_dir_url(__FILE__) . "styles.css");
}

add_action('admin_notices', 'devops_challenge');
add_action('admin_head', 'devop_css');

add_action('init', 'apiki_load_textdomain');

function apiki_load_textdomain(){
    load_plugin_textdomain( 'devops-challenge', false, dirname( plugin_basename( __FILE__ ) ) .'/languages');
}
