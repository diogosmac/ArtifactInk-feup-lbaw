<?php

function draw_wishlist_product() { ?>

<section id="wishlist-product" class="my-4">
    <div class="row">
        <div class="col-md-4">
            <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fi.ebayimg.com%2Fimages%2Fi%2F301761272642-0-1%2Fs-l1000.jpg&f=1&nofb=1"
                alt="Ink" class="img-fluid">
        </div>
        <div class="col" id="wishlist-product-info">
            <div class="row my-1">
                <div class="col">
                    <h2>Black Ink&trade;</h2>
                </div>
                <div class="col-md-4">
                    <button type="button" class="btn float-right btn-outline-danger"><i class="material-icons"
                            style="color: red;">favorite</i></button>
                </div>
            </div>
            <div class="row my-1 align-items-center">
                <div class="col ml-3">
                    <div class="row">
                        <i class="material-icons" style="color: gold;">star</i>
                        <i class="material-icons" style="color: gold;">star</i>
                        <i class="material-icons" style="color: gold;">star</i>
                        <i class="material-icons" style="color: gold;">star_half</i>
                        <i class="material-icons" style="color: gold;">star_outline</i>
                    </div>
                    <div class="row align-items-center">
                        <h4>Available&nbsp;</h4>
                        <i class="material-icons" style="color: green;">fiber_manual_record</i>
                    </div>
                </div>
                <div class="col">
                    <h3 class="align-middle float-right">17.99€</h3>
                </div>
            </div>
            <div class="row my-1">
                <div class="col ml-3">
                    <div class="row">
                        <label class="input-group-text" for="inputGroupSelect01">QTY</label>
                        <input type="number" value="1" min="1" max="30" step="1" />
                    </div>
                </div>
                <div class="col">
                    <input id="add-to-cart-btn" class="btn float-right btn-primary" type="submit" value="ADD TO CART">
                </div>
            </div>
        </div>
    </div>
</section>

<?php }


function draw_product_review() {
?>

<section id="product-review" class="my-4">
    <div class="row">
        <div class="col-md-4">
            <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fi.ebayimg.com%2Fimages%2Fi%2F301761272642-0-1%2Fs-l1000.jpg&f=1&nofb=1"
                alt="Ink" class="img-fluid">
        </div>
        <div class="col" id="product-review-info">
            <div class="row my-1 align-items-center">
                <div class="col">
                    <h2>Black Ink&trade;</h2>
                </div>
                <div class="col-md-4">
                    <button type="button" class="btn float-right"><i class="material-icons">edit</i></button>
                </div>
            </div>
            <div class="row my-1">
                <div class="col-md-auto">
                    <h5>Cor viva, pouco resistente.</h5>
                </div>
                <div class="col-md-4">
                    <div class="row float-right">
                        <i class="material-icons" style="color: gold;">star</i>
                        <i class="material-icons" style="color: gold;">star</i>
                        <i class="material-icons" style="color: gold;">star</i>
                        <i class="material-icons" style="color: gold;">star_half</i>
                        <i class="material-icons" style="color: gold;">star_outline</i>
                    </div>
                </div>
            </div>
            <div class="row my-1">
                "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                deserunt mollit anim id est laborum."
            </div>
        </div>
    </div>
</section>

<?php }
?>