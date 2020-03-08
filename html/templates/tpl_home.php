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
                        <h5>First slide label</h5>
                        <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://www.thetattooshop.com/uk/media/aw_rbslider/slides/Desktop.DynamicInk3for50.UK_1.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Second slide label</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://www.thetattooshop.com/uk/media/aw_rbslider/slides/Desktop.DynamicInk3for50.UK_1.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Third slide label</h5>
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

function draw_card_carousel(){ ?>
<div class="item-carousel-div">
    <span class="item-carousel-title">
        <h1>Featured Products</h1>
    </span>
        <div class="d-flex justify-content-center ">
            <div id="carouselCardSales" class="carousel slide itemCarousel d-flex justify-content-center" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active"  data-interval="0">   
                            <div class="card-deck">
                            <?php   draw_card(); 
                                    draw_card_sale();
                                    draw_card();
                                    draw_card(); ?>
                            </div>                   
                        </div>

                        <div class="carousel-item" data-interval="0">   
                            <div class="card-deck">
                            <?php   draw_card(); 
                                    draw_card();
                                    draw_card();
                                    draw_card(); ?>
                            </div>                   
                        </div>

                        <div class="carousel-item" data-interval="0">   
                            <div class="card-deck">
                            <?php   draw_card(); 
                                    draw_card();
                                    draw_card();
                                    draw_card(); ?>
                            </div>                   
                        </div>
                    </div>
                    <a class="carousel-control-prev item-carousel-button prv" href="#carouselCardSales" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon custom" aria-hidden="true"> </span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next item-carousel-button nxt" href="#carouselCardSales" role="button" data-slide="next">
                        <span class="carousel-control-next-icon custom" aria-hidden="true"> </span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
<?php } 

function draw_card(){ ?>
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
            <img src="https://pbs.twimg.com/profile_images/905183271046193153/q_P1KBUJ_400x400.jpg" class="card-img-top" alt="...">
        <div class="card-body">
            <span class="detail">
                <h4 class="card-title">Nome Do Produto</h4>
                <h5 class="card-price">33.33 EUR </h5>
            </span>
        </div>
        <a href="#" class="dropdown-item add-to-cart-btn">Add to cart</a>
    </div>

<?php } 

function draw_card_sale(){ ?>
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
            <img src="http://www.osmais.com/wallpapers/201503/montanhas-grandes-wallpaper.jpg" class="card-img-top" alt="...">
            <span class="badge badge-primary sale-box">20%</span>
        <div class="card-body">
            <span class="detail">
                <h4 class="card-title">Nome Do Produto Mas muito grande </h4>
                <h5 class="card-price">33.33 EUR <span class="old-price">11.11 EUR</span></h5>
            </span>
            <a href="#" class="dropdown-item add-to-cart-btn">Add to cart</a>
        </div>
        <a href="#" class="dropdown-item add-to-cart-btn">Add to cart</a>
    </div>

<?php } ?>