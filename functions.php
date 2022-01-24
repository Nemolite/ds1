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

/**
 * Банеры левые
 */
require 'inc/baners.php';

/**
 * Банеры правые
 */
require 'inc/baners2.php';

/**
 * Изменение в коде ,Юлок на новости. Взято с файла functions/init-title
 */
function ds1_hu_blog_title() {
    //$heading    =  wp_kses_post( hu_get_option('blog-heading') );
    //$heading    = $heading ? $heading : get_bloginfo('name');
	$heading ='';
   // $subheading =  wp_kses_post( hu_get_option('blog-subheading') );
    $subheading = $subheading ? $subheading : __('Новости', 'hueman');

    return apply_filters( 'hu_blog_title', sprintf('%1$s <span class="hu-blog-subheading">%2$s</span>',
        $heading,
        $subheading
      )
    );
  }

  /**
 * Заведующая
 * 
 */
require 'inc/chif.php';

/**	
 * Для меню Сведения об ОО
 */
function ds1_register_main_menu_sidebar_widgets(){
	register_sidebar( array(
		'name' => 'Сведения об ОО',
		'id' => 'main-menu-sidebar',
		'description' => 'Сведения об образовательной организации',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h3 class="widget-title"><span class="title-wrapper">',
		'after_title' => '</span></h3>',
	) );
}
add_action( 'widgets_init', 'ds1_register_main_menu_sidebar_widgets' );

/**
 * Банер госуслуги
 */
require 'inc/gosuslugi.php';

/**
 * Яндекс карты
 */
require 'inc/yandexmap.php';

?>