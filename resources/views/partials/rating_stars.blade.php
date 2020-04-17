<?php 
for($i = 1; $i <= 5; $i++) {
    if ($rating > $i - 0.25):
        echo '<i class="fas fa-star"></i>';
    elseif ($rating >= $i - 0.75):
        echo '<i class="fas fa-star-half-alt"></i>';
    else:
        echo '<i class="far fa-star"></i>';
    endif;
}   
?>
