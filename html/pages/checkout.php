<?php

    include_once("../templates/tpl_common.php");
    include_once("../templates/tpl_home.php");
    include_once("../templates/tpl_checkout.php");

    draw_header();
    draw_simple_navbar(true);
    draw_checkout_1(true);
    draw_footer();

?>