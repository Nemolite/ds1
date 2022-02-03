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
 * Заведующий
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

/**
 * Блок объявления
 */
require 'inc/top_info.php';

/**
 * Логотип и описание
 */

if ( !function_exists( 'ds1_print_logo_or_title' ) ) {
    function ds1_print_logo_or_title( $echo = true, $is_mobile_menu = false ) {
        // June 2020 => never write the mobile site-title in a h1 heading to avoid multiple h1 detected by SEO analyzers
        // @see https://github.com/presscustomizr/hueman/issues/906
        // option "wrap_in_h_one" should applyg when home is a static page or the blog page
        // When home is a static page, the blog page heading should be set to H1 ( see parts\page-title.php )
        $wrap_in_h_one = hu_is_real_home() && !$is_mobile_menu && hu_booleanize_checkbox_val( hu_get_option('wrap_in_h_one') );
        $logo_or_title = hu_get_logo_title( $is_mobile_menu );
        // => If no logo is set and  !hu_is_checked( 'display-header-title' ), the logo title is empty.
        ob_start();
            do_action( '__before_logo_or_site_title', $logo_or_title );
            if ( !empty( $logo_or_title ) ) {
                // added january 2020 for https://github.com/presscustomizr/hueman/issues/844
                echo $wrap_in_h_one ? '<h1 class="site-title">' : '<p class="site-title">';
                ?>
                  <?php hu_do_render_logo_site_tite( $logo_or_title ) ?>
                <?php
                echo $wrap_in_h_one ? '</h1>' : '</p>';
            }
            do_action( '__after_logo_or_site_title', $logo_or_title );
        $html = ob_get_clean();
        if ( $echo )
          echo apply_filters('hu_logo_title', $html );
        else
          return apply_filters('hu_logo_title', $html );
    }
} 

?>