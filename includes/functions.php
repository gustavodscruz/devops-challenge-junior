<?php
/**
 * Arquivo de funções do plugin
 * 
 * @package Devops_Challenge
 */

if (!defined("ABSPATH")) {
    exit;
}

global $global_lyrics;


/**
 * Retorna uma linha aleatória da música "Segura o Tchan"
 * 
 * @return string Uma linha aleatória da música "Segura o Tchan"
 */
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


/**
 * Adiciona a mensagem "Segure o Tchan" no admin
 * 
 * @return void
 */
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

/**
 * Adiciona o CSS no admin
 * 
 * @return void
 */
function devop_css(){
    $plugin_url = plugin_dir_url(dirname(__FILE__));

	wp_enqueue_style ("devops_challenge_css", $plugin_url . "assets/css/styles.css");
}

