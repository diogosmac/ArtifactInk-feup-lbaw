<?php function draw_profile_info()
{ ?>

    <section id="profile-info">
        <div class="col px-0">
            <div class="row justify-content-center d-md-none">
                <button class="btn btn-primary">Edit Profile</button>
            </div>

            <div class="row" id="profile-tag">
                <span>Photo</span>
            </div>

            <div class="row align-content-center d-md-none">
                <img src="https://i1.rgstatic.net/ii/profile.image/731946594365440-1551521075108_Q512/Manuel_Torres42.jpg" alt="Person" class="img-fluid">
            </div>
    
            <div class="d-none d-md-block my-4">
                <div class="row justify-content-between align-items-center">
                    <div class="col-md-auto" id="profile-photo">
                        <img src="https://i1.rgstatic.net/ii/profile.image/731946594365440-1551521075108_Q512/Manuel_Torres42.jpg" alt="Person" class="img-fluid">
                    </div>
                    <div class="col-md-auto" id="profile-edit-button">
                        <button class="btn btn-primary button my-2">Edit Profile</button>
                    </div>
                </div>
            </div>

            <hr>
    
            <div class="row" id="profile-tag">
                <span>General</span>
            </div>
            <div class="col my-2" id="profile-name">
                <span class="row profile-field">Name</span>
                <span>John Doe</span>
            </div>
            <div class="col my-2" id="profile-dob">
                <span class="row profile-field">Date of Birth</span>
                <span>25-04-1974</span>
            </div>
    
            <hr>
    
            <div class="row" id="profile-tag">
                <span>Contact</span>
            </div>
            <div class="col my-2" id="profile-email">
                <span class="row profile-field">E-mail</span>
                <span>john@doe.co.uk</span>
            </div>
            <div class="col my-2" id="profile-phone">
                <span class="row profile-field">Phone Number</span>
                <span>+351 912345678</span>
            </div>
    
            <hr>
    
            <div class="row" id="profile-tag">
                <span>Billing</span>
            </div>
            <div class="col my-2" id="profile-card">
                <span class="row profile-field">Credit Card</span>
                <span>MasterCard ending in XXXX</span>
            </div>
            <div class="col my-2" id="profile-address">
                <span class="row profile-field">Address 1</span>
                <span>Address St., 123 - 6º Esq. Frente</span>
                <span class="row profile-field">Address 2</span>
                <span>Avenida de Sérgio Sobral Nunes, 2020</span>
            </div>
        </div>
    </section>

<?php } ?>


<?php function draw_product_review()
{ ?>

    <section id="product-review">
        <div class="row" id="review-container">
            <div class="col-md-4">
                <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fi.ebayimg.com%2Fimages%2Fi%2F301761272642-0-1%2Fs-l1000.jpg&f=1&nofb=1" alt="Ink" class="img-fluid">
            </div>
            <div class="col" id="product-review-info">
                <div class="row my-1 align-items-center">
                    <div class="col" id="review-text">
                        <span class="review-product-name float-left">Black Ink</span>
                    </div>
                    <div class="col-md-auto" id="profile-edit-review">
                        <button type="button" class="btn float-right" id="profile-edit-review-button" data-toggle="modal" data-target="#exampleModalCenter">
                            <i class="material-icons">edit</i>
                        </button>

                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Review on Black Ink</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Review Title</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="1">Cor viva, pouco resistente.</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Review</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3">
Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                                </textarea>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row my-1 align-items-center">
                    <div class="col" id="review-text">
                        <span class="review-title">Cor viva, pouco resistente.</span>
                    </div>
                    <div class="col-md-auto" id="profile-review-rating">
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
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                    deserunt mollit anim id est laborum.
                </div>
            </div>
        </div>
    </section>

<?php } ?>


<?php function draw_wishlist_prod_info()
{ ?>
    <div class="col-md-4" id="wishlist-product-picture">
        <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fi.ebayimg.com%2Fimages%2Fi%2F301761272642-0-1%2Fs-l1000.jpg&f=1&nofb=1" alt="Ink" class="img-fluid">
    </div>
    <div class="d-flex flex-column col-md-8 justify-content-center" id="wishlist-product-info">
        <div class="d-flex flex-row my-1 justify-content-between align-items-center">
            <div class="col-md-auto">
                <div class="d-flex flex-row">
                    <span id="wishlist-product-name">Black Ink</span>
                </div>
            </div>
            <div class="col-md-auto float-right" id="wishlist-product-remove">
                <button type="button" class="btn float-right btn-outline-danger"><i class="fas fa-trash"></i></button>
            </div>
        </div>
        <div class="d-flex flex-row justify-content-between my-1">
            <div class="col-md-auto" id="wishlist-product-details">
                <div class="d-flex flex-row" id="wishlist-product-rating">
                    <i class="material-icons" style="color: gold;">star</i>
                    <i class="material-icons" style="color: gold;">star</i>
                    <i class="material-icons" style="color: gold;">star</i>
                    <i class="material-icons" style="color: gold;">star_half</i>
                    <i class="material-icons" style="color: gold;">star_outline</i>
                </div>
                <div class="d-flex flex-row align-items-center">
                    <span id="wishlist-product-available">Available&nbsp;</span>
                    <i class="material-icons" style="color: green;">fiber_manual_record</i>
                </div>
            </div>
            <div class="col-md-auto" id="wishlist-product-price">
                <span class="align-middle">17.99€</span>
            </div>
        </div>
    
        <div class="d-none d-md-block">
            <div class="d-flex flex-row justify-content-between my-1">
                <div class="col-md-auto">
                    <div class="d-flex flex-row align-content-stretch">
                        <label class="input-group-text" for="inputGroupSelect01">QTY</label>
                        <input type="number" value="1" min="1" max="30" step="1" />
                    </div>
                </div>
                <div class="col-md-auto">
                    <button class="btn float-right btn-primary button" id="wishlist-add-to-cart">Add to Cart</button>
                </div>
            </div>
        </div>

        <div class="d-md-none">
            <div class="d-flex flex-row justify-content-between my-1">
                <div class="col-md-auto">
                    <div class="d-flex flex-row align-content-stretch">
                        <label class="input-group-text" for="inputGroupSelect01">QTY</label>
                        <input type="number" value="1" min="1" max="30" step="1" />
                    </div>
                </div>
                <div class="col-md-auto">
                    <button class="btn float-right btn-primary" id="wishlist-add-to-cart">
                        <i class="material-icons">add_shopping_cart</i>
                    </button>
                </div>
            </div>
        </div>

    </div>

<?php } ?>

<?php function draw_wishlist_product()
{ ?>

    <section id="wishlist-product">
        <div class="row">
            <?php draw_wishlist_prod_info(); ?>
        </div>
    </section>

<?php } ?>


<?php function draw_purchase_item()
{ ?>

    <div class="row align-items-center">
        <div class="col-md-3" id="purchase-history-item-picture">
            <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fi.ebayimg.com%2Fimages%2Fi%2F301761272642-0-1%2Fs-l1000.jpg&f=1&nofb=1" alt="Ink" class="img-fluid">
        </div>
        <div class="col my-2" id="purchase-history-item-data">
            <div class="row">
                <span>Product Name ABC</span>
            </div>
            <div class="row">
                <span>13.99€</span>
            </div>
        </div>
    </div>

<?php } ?>

<?php function draw_history_item()
{ ?>

    <section id="history-purchase">
        <div class="col" id="review-container">
            <div class="row" id="purchase-address">
                <span>Address St., 123 - 6º Esq. Frente</span>
            </div>
            <div class="row" id="purchase-details">
                <span>27/02/2020</span>
                <span>&nbsp;-&nbsp;</span>
                <span>Shipped</span>
            </div>

            <div class="col my-3" id="purchase-items-container">
                <?php draw_purchase_item() ?>
                <hr>
                <?php draw_purchase_item() ?>
            </div>

            <div class="row" id="purchase-shipping">
                <span>2,02€</span>
            </div>
            <div class="row" id="purchase-total">
                <span>30,00€</span>
            </div>
    </section>

<?php } ?>







<?php function draw_profile_info_mobile()
{ ?>

    <section id="profile-info">
        <div class="mx-5">
            <div class="col">
                <div class="row">
                    <h1 class="display-1"><strong>Photo</strong></h1>
                </div>
                <div class="row align-items-center">
                    <div class="col">
                        <img src="https://i1.rgstatic.net/ii/profile.image/731946594365440-1551521075108_Q512/Manuel_Torres42.jpg" alt="Person" class="img-fluid w-100 p-3">
                    </div>
                    <div class="col-md-auto" id="profile-edit-button">
                        <button class="btn btn-primary">
                            <h1 class="display-1">
                                Edit
                            </h1>
                        </button>
                    </div>
                </div>
            </div>

            <hr>

            <div class="row" id="profile-tag">
                <h1 class="display-1"><strong>General</strong></h1>
            </div>
            <div id="profile-name">
                <h1 class="display-2">Name</h1>
                <h1 class="display-4">John Doe</h1>
            </div>
            <div id="profile-dob">
                <h1 class="display-2">Date of Birth</strong></h1>
                <h1 class="display-4">25-04-1974</h1>
            </div>

            <hr>

            <div class="row" id="profile-tag">
                <h1 class="display-1"><strong>Contact</strong></h1>
            </div>
            <div id="profile-email">
                <h1 class="display-2">E-mail</h1>
                <h1 class="display-4">john@doe.co.uk</h1>
            </div>
            <div id="profile-phone">
                <h1 class="display-2">Phone Number</h1>
                <h1 class="display-4">+351 912345678</h1>
            </div>

            <hr>

            <div class="row" id="profile-tag">
                <h1 class="display-1"><strong>Billing</strong></h1>
            </div>
            <div id="profile-card">
                <h1 class="display-2">Credit Card</h1>
                <h1 class="display-4">MasterCard ending in XXXX</h1>
            </div>
            <div id="profile-address">
                <h1 class="display-2">Address</h1>
                <h1 class="display-4">Address St., 123 - 6º Esq. Frente</h1>
            </div>
        </div>
    </section>

<?php } ?>