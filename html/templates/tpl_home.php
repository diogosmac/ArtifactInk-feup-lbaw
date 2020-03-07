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
    <div id="carouselCardSales" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">   
                    <div class="card-deck">
                    <?php   draw_card(); 
                            draw_card();
                            draw_card();
                            draw_card(); ?>
                    </div>                   
                </div>
                
                <div class="carousel-item">   
                    <div class="card-deck">
                    <?php   draw_card(); 
                            draw_card();
                            draw_card();
                            draw_card(); ?>
                    </div>                   
                </div>

                <div class="carousel-item">   
                    <div class="card-deck">
                    <?php   draw_card(); 
                            draw_card();
                            draw_card();
                            draw_card(); ?>
                    </div>                   
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselCardSales" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"> <--- </span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselCardSales" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"> ---> </span>
                <span class="sr-only">Next</span>
            </a>
        </div>
<?php } 

function draw_card(){ ?>
    <div class="card product-card" style="width: 18rem;">        
        <div class="card-img-overlay d-flex justify-content-begin">
            <a href="#" class="card-link text-danger like">
                <i class="fas fa-heart"></i>
            </a>
        </div>
        <div class="card-img-overlay d-flex justify-content-end">
            <a href="#" class="card-link text-danger like">
                <i class="fas fa-shopping-cart"></i>
            </a>
        </div>

        <img src="https://www.thetattooshop.com/uk/media/catalog/product/cache/e960f294cf534815b24fe57fbd9f1a95/y/e/yellow_carts.jpg" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
    </div>

<?php } ?>