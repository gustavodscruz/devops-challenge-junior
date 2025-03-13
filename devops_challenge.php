<?php

/**
 * @package Devops_challenge_Junior
 * @version 1.0
 */
/*
Plugin Name: Devops challenge Júnior
Plugin URI: https://apiki.com/
Description: Sabe de nada, inocente! Ordinária!! Teste por Gustavo Dias!
Author: Apiki WordPress
Version: 1.0
*/



function apiki_segura_o_tchan($locale)
{

	$global_lyrics = [
		'pt_BR' => "
			Pau que nasce torto nunca se endireita
			Menina que requebra a mãe pega na cabeça
			Pau que nasce torto nunca se endireita
			Menina que requebra a mãe pega na cabeça
			Domingo ela não vai (vai, vai)
			Domingo ela não vai não (vai, vai, vai)
			Olha, domingo ela não vai (vai, vai)
			Domingo ela não vai não (vai, vai, vai)
			O pau que nasce torto nunca se endireita
			Menina que requebra a mãe pega na cabeça
			Pau que nasce torto nunca se endireita
			Menina que requebra a mãe pega na cabeça
			Segure o tchan
			Amarre o tchan
			Segure o tchan tchan tchan tchan
			Depois de nove meses você vê o resultado
			Esse é o Gera Samba arrebentando no pedaço
			Joga ela no meio, mete em cima, mete embaixo
		",
		'en_US' => "
			A crooked tree never straightens
			A girl who shakes, her mother grabs her head
			A crooked tree never straightens
			A girl who shakes, her mother grabs her head
			She won't go on Sunday (go, go)
			She won't go on Sunday (go, go, go)
			Look, she won't go on Sunday (go, go)
			She won't go on Sunday (go, go)
			A crooked tree never straightens
			A girl who shakes, her mother grabs her head
			A crooked tree never straightens
			A girl who shakes, her mother grabs her head
			Hold on to the tchan
			Love the tchan
			Hold on to the tchan tchan tchan tchan
			After nine months you'll see the result
			This is Gera Samba rocking the place
			Throw her in the middle, stick her up, stick her down
		"
	];
	
	$lyrics = $global_lyrics[$locale] ?? $global_lyrics['pt_BR'];

	$lyrics_array = array_filter(array_map('trim', explode("\n", trim($lyrics))));
	// $lyrics_array = explode("\n", trim($global_lyrics[$locale]));

	return wptexturize($lyrics_array[array_rand($lyrics_array)]);
	
}

function devops_challenge()
{
	$lang   = '';
	$locale = 'pt_BR';
	if (substr(get_user_locale(), 0, 3) !== 'pt_') {
		$lang = 'lang="en"';
		$locale = 'en_US';
	}
	$chosen = apiki_segura_o_tchan($locale);

	printf(
		'<p id="devop" class="devop" %s> %s</p>',
		$lang,
		esc_html__('Segure o Tchan, by Apiki WordPress: ', 'devops_challenge') . esc_html($chosen)
	);
}

add_action('admin_notices', 'devops_challenge');

function devop_css()
{
	echo "
	<style type='text/css'>
	#devop {
		float: right;
		padding: 5px 10px;
		margin: 0;
		font-size: 12px;
		line-height: 1.6666;
	}
	.rtl #devop {
		float: left;
	}
	.block-editor-page #devop {
		display: none;
	}
	@media screen and (max-width: 782px) {
		#devop,
		.rtl #devop {
			float: none;
			padding-left: 0;
			padding-right: 0;
		}
	}
	</style>
	";
}

add_action('admin_head', 'devop_css');
