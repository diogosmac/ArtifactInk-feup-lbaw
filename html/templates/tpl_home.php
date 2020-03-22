<?php

include_once("../templates/tpl_item.php");

function draw_preview_carousel()
{ ?>
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

/*function draw_card_carousel($type)
{ ?>
    <div class="item-carousel-div">
        <span class="item-carousel-title">
            <h1> <?= $type ?> Products</h1>
        </span>
        <div class="d-flex justify-content-center ">
            <div id="carouselCard<?= $type ?>" class="carousel slide itemCarousel d-flex justify-content-center" data-ride="carousel" data-interval="false">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="card-deck">
                            <?php draw_card1();
                            draw_card_sale1();
                            draw_card2();
                            draw_card_sale1() ?>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <div class="card-deck">
                            <?php draw_card1();
                            draw_card2();
                            draw_card_sale2();
                            draw_card1(); ?>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <div class="card-deck">
                            <?php draw_card2();
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
<?php }*/

function draw_product_deals($header)
{ ?>
    <div class="my-4 mx-auto d-flex flex-column justify-content-center" style="max-width: 65em;">
        <div class="mx-3 mx-sm-5 mx-lg-3 d-flex justify-content-between align-items-end">
            <h1 class="my-1"><?= $header ?></h1>
            <a class="a_link my-1" href="../pages/search.php">View all</a>
        </div>
        <div class="container justify-content-center">
            <div class="row">
                <div class="p-0 col-12 col-sm-6 col-lg-3 d-flex justify-content-center"><?php draw_card1(); ?></div>
                <div class="p-0 col-12 col-sm-6 col-lg-3 d-flex justify-content-center"><?php draw_card2(); ?></div>
                <div class="p-0 col-12  col-sm-6 col-lg-3 d-flex justify-content-center"><?php draw_card_sale2(); ?></div>
                <div class="p-0 col-12 col-sm-6 col-lg-3 d-flex justify-content-center"><?php draw_card_sale1(); ?></div>
            </div>
        </div>
    </div>
<?php
}