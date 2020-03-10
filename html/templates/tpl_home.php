<?php 

    function draw_preview_carousel(){ ?>
        <div id="carouselPreviewCaptions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselPreviewCaptions" data-slide-to="0" class="active"></li>
                <li data-target="#carouselPreviewCaptions" data-slide-to="1"></li>
                <li data-target="#carouselPreviewCaptions" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://www.thetattooshop.com/uk/media/aw_rbslider/slides/Desktop.DynamicInk3for50.UK_1.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Lorem, ipsum.
                        </h5>
                        <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://www.thetattooshop.com/uk/media/aw_rbslider/slides/Desktop.DynamicInk3for50.UK_1.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Lorem, ipsum.</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://www.thetattooshop.com/uk/media/aw_rbslider/slides/Desktop.DynamicInk3for50.UK_1.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Lorem, ipsum dolor.
                        </h5>
                        <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselPreviewCaptions" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselPreviewCaptions" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
<?php }

function draw_card_carousel($type){ ?>
<div class="item-carousel-div">
    <span class="item-carousel-title">
        <h1> <?= $type ?> Products</h1>
    </span>
        <div class="d-flex justify-content-center ">
            <div id="carouselCard<?= $type ?>" class="carousel slide itemCarousel d-flex justify-content-center" data-ride="carousel"  data-interval="false">
                    <div class="carousel-inner">
                        <div class="carousel-item active">   
                            <div class="card-deck">
                            <?php   draw_card1(); 
                                    draw_card_sale1();
                                    draw_card2();
                                    draw_card_sale1()?>
                            </div>                   
                        </div>

                        <div class="carousel-item" >   
                            <div class="card-deck">
                            <?php   draw_card1(); 
                                    draw_card2();
                                    draw_card_sale2();
                                    draw_card1(); ?>
                            </div>                   
                        </div>

                        <div class="carousel-item" >   
                            <div class="card-deck">
                            <?php   draw_card2(); 
                                  draw_card_sale1();
                                  draw_card_sale2();
                                    draw_card1(); ?>
                            </div>                   
                        </div>
                    </div>
                    <a class="carousel-control-prev item-carousel-button prv" href="#carouselCard<?= $type ?>" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon custom" aria-hidden="true"> </span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next item-carousel-button nxt" href="#carouselCard<?= $type ?>" role="button" data-slide="next">
                        <span class="carousel-control-next-icon custom" aria-hidden="true"> </span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
<?php } 

function draw_card1(){ ?>
    <div class="card product-card" style="width: 18rem;">      
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
                <h4 class="card-title">Tattoo Machine</h4>
                <h5 class="card-price">39.95 € </h5>
            </span>
        </div>
        <a href="#" class="dropdown-item add-to-cart-btn">Add to cart</a>
    </div>

<?php } 

function draw_card2(){ ?>
    <div class="card product-card" style="width: 18rem;">      
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
            <a href="##" class="card-img-link">
                <img src="https://www.inkme.tattoo/wp-content/uploads/2016/10/forearm-tattoo-design-86.jpg" class="card-img-top" alt="...">
            </a>
        <div class="card-body">
            <span class="detail">
                <h4 class="card-title">Awesome Design</h4>
                <h5 class="card-price">10.00 € </h5>
            </span>
        </div>
        <a href="#" class="dropdown-item add-to-cart-btn">Add to cart</a>
    </div>

<?php } 

function draw_card_sale1(){ ?>
    <div class="card product-card" style="width: 18rem;">      
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

function draw_card_sale2(){ ?>
    <div class="card product-card" style="width: 18rem;">      
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