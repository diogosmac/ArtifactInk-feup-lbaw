<?php

    include_once("../templates/tpl_common.php");
    include_once("../templates/tpl_home.php");
    include_once("../templates/tpl_item_list.php");

    draw_header();
    draw_navbar(true);
    draw_cart_list();
    draw_footer();

?>