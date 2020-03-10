<?php

    include_once("../templates/tpl_common.php");
    include_once("../templates/tpl_home.php");
    include_once("../templates/tpl_checkout.php");

    $seqnum = $_GET['p'];

    draw_header();
    draw_simple_navbar(true);
    switch($seqnum){
        case 1: 
            draw_checkout_1(true);
        break;
        case 2: 
            draw_checkout_2(true);
        break; 
        case 3:
            draw_checkout_3(true);
        break; 
    }
    draw_footer();

?>