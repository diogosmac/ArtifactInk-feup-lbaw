<?php

function draw_item_list()
{ ?>
    <li class="p-3 list-group-item li-item">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <a href="../pages/product.php" class="list-img-link">
                        <img src="https://images-na.ssl-images-amazon.com/images/I/61TBsibBdqL._SX425_.jpg" class="card-img-top" alt="...">
                    </a>
                </div>
                <div class="col-sm-6">
                    <a href="../pages/product.php" class="list-img-link">
                        <h3 class="li-item-name"> Tattoo Machine </h3>
                    </a>

                    <div class="py-2 d-flex flex-row bd-highlight mb-3 li-item-div justify-content-between">
                        <div>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            <a href="#specs" class="px-2 a_link"> (2)</a>
                            
                        </div>
                    </div>
                    <div class="py-1 d-flex flex-row bd-highlight mb-3 li-item-div justify-content-between">
                        <div>
                            <i class="fas fa-circle circle-available"></i>
                            Available
                        </div>
                    </div>
                    <div class="py-1 d-flex flex-row bd-highlight mb-3 li-item-div justify-content-between">
                        <span>  
                            <label for="li-item-qty">Qty.</label>
                            <input class="li-item-qty" type="number" value="1" min="1">
                        </span>
                        <a href="#" class="li-wishlist">
                            <i class="fas fa-heart"></i>
                            Add to Whishlist
                        </a>
                    </div>

                </div>
                <div class="py-2 col-sm-3 d-flex flex-column justify-content-between align-items-end li-price-button">
                    <h3 class="li-item-price" style="color: var(--main-red)">35.95€</h3>
                    <a href="#" class="btn button">Add to Cart</a>
                </div>
            </div>
        </div>
    </li>
<?php }

function draw_card1()
{ ?>
    <div class="my-3 mx-2 card product-card" style="width: 15em;">
        <div class="card-img-overlay d-flex justify-content-end">
            <!--
            <a href="../pages/home.php" class="card-link">
                <span>
                    <i class="fas fa-shopping-cart"></i>
                </span>   
            </a>
            -->
            <a href="#" class="card-link">
                <i class="fas fa-heart"></i>
            </a>
        </div>
        <a href="../pages/product.php" class="card-img-link">
            <img src="https://images-na.ssl-images-amazon.com/images/I/61TBsibBdqL._SX425_.jpg" class="card-img-top" alt="...">
        </a>
        <div class="card-body">
            <span class="detail">
                <h2 class="card-title">Tattoo Machine</h2>
                <h5 class="card-price">39.95 € </h5>
            </span>
            <a href="#" class="dropdown-item btn button">Add to cart</a>
        </div>
    </div>

<?php }

function draw_card2()
{ ?>
    <div class="my-3 mx-2 card product-card" style="width: 15em;">
        <div class="card-img-overlay d-flex justify-content-end">
            <!--
            <a href="../pages/home.php" class="card-link">
                <span>
                    <i class="fas fa-shopping-cart"></i>
                </span>   
            </a>
            -->
            <a href="#" class="card-link">
                <i class="fas fa-heart"></i>
            </a>
        </div>
        <a href="../pages/product.php" class="card-img-link">
            <img src="https://www.inkme.tattoo/wp-content/uploads/2016/10/forearm-tattoo-design-86.jpg" class="card-img-top" alt="...">
        </a>
        <div class="card-body">
            <span class="detail">
                <h4 class="card-title">Awesome Design</h4>
                <h5 class="card-price">10.00 € </h5>
            </span>
            <a href="#" class="dropdown-item btn button">Add to cart</a>
        </div>
    </div>

<?php }

function draw_card_sale1()
{ ?>
    <div class="my-3 mx-2 card product-card" style="width: 15em;">
        <div class="card-img-overlay d-flex justify-content-end">
            <!--
            <a href="../pages/home.php" class="card-link">
                <span>
                    <i class="fas fa-shopping-cart"></i>
                </span>   
            </a>
            -->
            <a href="#" class="card-link">
                <i class="fas fa-heart"></i>
            </a>
        </div>
        <!-- IF ON SALE -->
        <a href="../pages/product.php" class="card-img-link">
            <img src="https://cdn.shopify.com/s/files/1/1314/0625/products/19_Color_Ink_Set_600x600.jpg?v=1498235476" class="card-img-top" alt="...">
        </a>
        <span class="badge badge-primary sale-box">25%</span>
        <div class="card-body">
            <span class="detail">
                <h4 class="card-title">19 Ink Color Set </h4>
                <h5 class="card-price">99.99 € <span class="old-price">149.99 €</span></h5>
            </span>
        </div>
        <a href="#" class="dropdown-item add-to-cart-btn">Add to cart</a>
    </div>

<?php }

function draw_card_sale2()
{ ?>
    <div class="my-3 mx-2 card product-card" style="width: 15em;">
        <div class="card-img-overlay d-flex justify-content-end">
            <!--
            <a href="../pages/home.php" class="card-link">
                <span>
                    <i class="fas fa-shopping-cart"></i>
                </span>   
            </a>
            -->
            <a href="#" class="card-link">
                <i class="fas fa-heart"></i>
            </a>
        </div>
        <!-- IF ON SALE -->
        <a href="../pages/product.php" class="card-img-link">
            <img src="https://li0.rightinthebox.com/images/384x384/201807/lal1530675557629.jpg" class="card-img-top" alt="...">
        </a>
        <span class="badge badge-primary sale-box">50%</span>
        <div class="card-body">
            <span class="detail">
                <h4 class="card-title">Tattoo Begginers Kit </h4>
                <h5 class="card-price">25.00 € <span class="old-price">49.99 €</span></h5>
            </span>
        </div>
        <a href="#" class="dropdown-item add-to-cart-btn">Add to cart</a>
    </div>

<?php } ?>