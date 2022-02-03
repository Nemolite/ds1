<?php
/**
 * Блок объявления
 */

/**
 * Информация для Top Section
 */

add_action('init', 'ds1_top_section_info');
function ds1_top_section_info(){

	$labels = array(
		'name'               => 'Объявление', 
		'singular_name'      => 'Объявление', 
		'add_new'            => 'Добавить новое',
		'add_new_item'       => 'Добавить новое объявление',
		'edit_item'          => 'Редактировать объявление',
		'new_item'           => 'Нововое объявление',
		'view_item'          => 'Посмотреть объявление',
		'search_items'       => 'Найти объявление',
		'not_found'          => 'Оъявление не найдено',
		'not_found_in_trash' => 'В корзине объявление не найдено',
		'parent_item_colon'  => '',
		'menu_name'          => 'Объявление'
	  );
	 
	  $args = array(
		'labels' => $labels,
		'public' => true, // 
		'show_ui' => true, 
		'has_archive' => true, 
		'menu_icon' => 'dashicons-media-document', 
		'menu_position' => 20, 
		'supports' => array( 'title', 'editor' )
	);	
	register_post_type('top_section_info', $args  );
}

/**
 * Фронт для объявления
 */

 add_action('ds1_top_info', 'ds1_top_info_output');
 function ds1_top_info_output(){
     ?> 
        <?php             
            $args_info = array(   
                'post_type'    => 'top_section_info',    
                'posts_per_page' => 1,   	
            );
            $query_info = new WP_Query( $args_info ); 
            if( $query_info->have_posts() ){
                while( $query_info->have_posts() ){
                    $query_info->the_post();
                ?>
                    <div class="ds1_top_info">   
                    <h1><?php the_title();?></h1>
                    <p><?php the_content();?></p>
                    </div>    
                <?php
                }
                wp_reset_postdata();
            } 
            ?>
     <?php
 }
?>