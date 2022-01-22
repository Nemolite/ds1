<?php
/**
 * Руководитель
 */
add_action('ds1_chif_block','ds1_chif_block_output');
function ds1_chif_block_output(){
    ?>
     <div class="ds1-chif">
        <h3>Заведующий МБДОУ Д/С №1 "Золотой Ключик"</h3>
            <div class="ds1-chif-img">
                <img src="<?php echo get_stylesheet_directory_uri();?>/assets/img/zav.jpg" alt="Заведующий МБДОУ Д/С №1 Золотой Ключик Варжина Альбина Васильевна">
            </div>
        <h3>Варжина Альбина Васильевна</h3>                
    </div> <!-- .ds4-chif -->
   
    <div class="ds1-main-doc">
    <header class="page-entry-header">
			
        <?php dynamic_sidebar( 'main-menu-sidebar' ); ?>    
    </div>  
    <?
}

?>