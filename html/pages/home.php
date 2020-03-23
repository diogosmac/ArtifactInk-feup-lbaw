<?php 
    include_once("../templates/tpl_common.php");
    include_once("../templates/tpl_home.php");

    draw_header();
    draw_navbar(true);
    draw_preview_carousel();
    draw_product_deals("Best Deals");
?>
<hr>
<?php
    draw_product_deals("Highest Rated");
?>
<hr>
<?php
    draw_product_deals("Last Units");
    //draw_card_carousel('best'); 
    //draw_card_carousel('featured'); 
    //draw_card_carousel('sale'); 
        
    draw_footer();

?>