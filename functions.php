<?php
/**
 * Дочерняя тема для темы hueman
 * 
 */

defined( 'ABSPATH' ) || exit;

/**
 * Helper
 */
function show($param){
	echo "<pre>";
	print_r($param);
	echo "</per>";
}

/**
* Подключение скриптов и стилей
*/
function ds1_scripts_style() {

	$theme_version = wp_get_theme()->get( 'Version' );

	wp_enqueue_style( 'ds1-style', get_stylesheet_directory_uri() .'/assets/css/ds1.css' );
	wp_enqueue_script( 'ds1-script', get_stylesheet_directory_uri() . '/assets/js/ds1.js', array(), $theme_version, true );
}
add_action( 'wp_enqueue_scripts', 'ds1_scripts_style' );

/**
* Возврат раздела виджетов в классический вид
*/
add_filter( 'gutenberg_use_widgets_block_editor', '__return_false' );
add_filter( 'use_widgets_block_editor', '__return_false' );

?>