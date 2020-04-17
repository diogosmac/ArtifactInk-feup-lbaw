<?php
function draw_card_sale1()
{ ?>
    <div class="my-3 mx-2 card product-card rounded-0" style="width: 15em;">
        <div class="card-img-overlay d-flex justify-content-end h-25">
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
        <div class="p-1">
            <a href="../pages/product.php" class="card-img-link">
                <div>
                    <img src="https://cdn.shopify.com/s/files/1/1314/0625/products/19_Color_Ink_Set_600x600.jpg?v=1498235476" class="card-img-top image-fit" alt="...">
                </div>
            </a>
        </div>
        <span class="badge badge-primary sale-box">25%</span>
        <div class="p-1 d-flex flex-column justify-content-center text-center card-body border-top border-dark">
            <span class="detail">
                <h5 class="card-title font-weight-bold">19 Ink Color Set </h5>
                <h5 class="card-price font-weight-bold">99.99 € <span class="old-price">149.99 €</span></h5>
            </span>
        </div>
        <div class="p-1"style="z-index: 200;">
            <a href="#" class="dropdown-item btn button text-center" style="z-index: 200;">Add to cart</a>
        </div>
    </div>

<?php }

function draw_card_sale2()
{ ?>
    <div class="my-3 mx-2 card product-card rounded-0" style="width: 15em;">
        <div class="card-img-overlay d-flex justify-content-end h-25">
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
        <div class="p-1">
            <a href="../pages/product.php" class="card-img-link">
                <div>
                    <img src="https://li0.rightinthebox.com/images/384x384/201807/lal1530675557629.jpg" class="card-img-top image-fit" alt="...">
                </div>
            </a>
        </div>
        <span class="badge badge-primary sale-box">50%</span>
        <div class="p-1 d-flex flex-column justify-content-center text-center card-body border-top border-dark">
            <span class="detail">
                <h5 class="card-title font-weight-bold">Tattoo Begginers Kit </h5>
                <h5 class="card-price font-weight-bold">25.00 € <span class="old-price">49.99 €</span></h5>
            </span>
        </div>
        <div class="p-1">
            <a href="#" class="dropdown-item btn button text-center">Add to cart</a>
        </div>
    </div>

<?php } ?>