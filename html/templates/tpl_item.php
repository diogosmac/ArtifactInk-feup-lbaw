<?php 

    function draw_item_list(){?>
        <li class="list-group-item li-item">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <a href="../pages/product.php" class="list-img-link" >
                            <img src="https://images-na.ssl-images-amazon.com/images/I/61TBsibBdqL._SX425_.jpg" class="card-img-top" alt="...">
                        </a>
                    </div>
                    <div class="col-sm-6">
                        <a href="../pages/product.php" class="list-img-link" >
                            <h5 class="li-item-name"> Tattoo Machine </h5>
                        </a>
                       
                        <div class="d-flex flex-row bd-highlight mb-3 li-item-div justify-content-between">
                            <div>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <a href="#specs" class="px-2 a_link"> (2)</a>
                                <a href="#" class="li-wishlist">
                                    <i class="fas fa-heart"></i>
                                    Add to whishlist
                            </a>
                            </div>
                        </div>
                        <div class="d-flex flex-row bd-highlight mb-3 li-item-div justify-content-between">
                            <div>
                                <i class="fas fa-circle circle-available"></i>
                                Available  
                            </div>
                        </div>
                        <div class="d-flex flex-row bd-highlight mb-3 li-item-div justify-content-start">
                            <label for="li-item-qty">Qty.</label>
                            <input class="li-item-qty" type="number" value="1" min="1">
                        </div>
                    </div>
                    <div class="col-sm-3 li-price-button">
                        <h6 class="li-item-price">35.95€</h6>
                        <a href="#" class="dropdown-item add-to-cart-btn li-item">Add to cart</a>
                    </div>
                </div>
            </div>
        </li>
   <?php }

?>