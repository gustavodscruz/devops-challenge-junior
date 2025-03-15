<?php 
/**
 * Arquivo para funções de internacionalização do plugin
 * 
 * @package Devops_Challenge
 */

/**
 * Carrega o arquivo de tradução do plugin
 * 
 * @return void
 */
function apiki_load_textdomain(){
    load_plugin_textdomain( 'devops-challenge', false, dirname(dirname(plugin_basename(__FILE__))) .'/languages');
}
