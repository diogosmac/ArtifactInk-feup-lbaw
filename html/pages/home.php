<?php 
    include_once("../templates/tpl_common.php");
    include_once("../templates/tpl_home.php");

    draw_header();
    draw_navbar(true);
    draw_preview_carousel(); 
    draw_card_carousel(); 
    draw_footer();

?>