<?php
/**
 * Яндекс карты
 */
add_action('ds1_yandexmap','ds1_yandexmap_output');
function ds1_yandexmap_output(){
    ?>
    <div class="ds1_yandexmap">
        <h3>Мы на карте</h3>
        <div class="yandexmap">
        <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A36dc45ae6a337a6552e039b10e3f587746f675849f6dc3cf7b632e5eff8e3a9e&amp;width=100%25&amp;height=370&amp;lang=ru_RU&amp;scroll=true"></script>   
        </div>

    </div>
    <?php
}
?>