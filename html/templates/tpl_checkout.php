<?php 

function draw_checkout_cart($shipping,$price){ ?>
<div class="container">
    <div class="row">
        <h2 class="shopping-cart-h">Checkout</h2>
    </div>
    <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Your cart</span>
                <span class="badge badge-secondary badge-pill">3</span>
            </h4>
            <ul class="list-group mb-3" id="checkout-items-list">
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">Product name</h6>
                        <small class="text-muted">Brief description</small>
                    </div>
                    <span class="text-muted">12.00€</span>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">Second product</h6>
                        <small class="text-muted">Brief description</small>
                    </div>
                    <span class="text-muted">8.00€</span>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">Third item</h6>
                        <small class="text-muted">Brief description</small>
                    </div>
                    <span class="text-muted">5.00€</span>
                </li>
                <?php if($shipping != ""){ ?> 
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0"><?= $shipping ?></h6>
                        </div>
                        <span class="text-muted"><?=$price?></span>
                    </li>
               <?php } ?>
                <li class="list-group-item d-flex justify-content-between">
                    <span>Total (EUR)</span>
                    <strong>20€</strong>
                </li>
            </ul>
        </div>
        <?php }

function draw_checkout_1(){
    
    draw_checkout_cart("",0);
    ?>
<div class="col-md-8 order-md-1 checkout-form-steps">
    <hr class="mb-4">
    <h4 class="mb-3">Shipping Adress</h4>
    <form class="needs-validation" novalidate="">
        <div class="checkout-addr-field">
            <div class="input-group mb-3" id="addr-selector">
                <select class="custom-select" id="adress-input-group" >
                    <option value="1">
                        <h5> Main Adress for Delivery, 99, 1st lf </h5>
                        <h6> Portugal, Porto - Porto 4763-384</h6>
                    </option>
                    <option value="2">
                        <h5> Secondary Address for Delivery, 99, 2st lf </h5>
                        <h6> Portugal, Porto - Porto 4763-384</h6>
                    </option>
                </select>
                <div class="input-group-append">
                    <label class="input-group-text" id="change-button" for="adress-input-group" >Change</label>
                </div>
            </div>

            <div class="mb-3">
                <button class="btn" id="new_addr_btn" type="button">New Address</button>
            </div>

            <div id="new-addr-form">
                <div class="mb-3 ">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" placeholder="1234 Main St" required="">
                    <div class="invalid-feedback">
                        Please enter your shipping address.
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5 mb-3">
                        <label for="country">Country</label>
                        <select class="custom-select d-block w-100" id="country" required="">
                            <option value="">Choose...</option>
                            <option>United States</option>
                        </select>
                        <div class="invalid-feedback">
                            Please select a valid country.
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="state">State</label>
                        <select class="custom-select d-block w-100" id="state" required="">
                            <option value="">Choose...</option>
                            <option>California</option>
                        </select>
                        <div class="invalid-feedback">
                            Please provide a valid state.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="zip">Zip</label>
                        <input type="text" class="form-control" id="zip" placeholder="" required="">
                        <div class="invalid-feedback">
                            Zip code required.
                    </div>
                    </div>

                </div>
                <div class="mb-3">
                    <button class="btn" id="return_addr_btn" type="button">Return</button>
                </div>
            </div>
        </div>
        <hr class="mb-4">

        <h4 class="mb-3">Payment</h4>

        <div class="d-block my-3">
            <div class="custom-control custom-radio">
                <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked=""
                    required="">
                <label class="custom-control-label" for="credit">Credit card </label>
            </div>
            <div class="custom-control custom-radio">
                <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required="">
                <label class="custom-control-label" for="debit">Debit card</label>
            </div>
            <div class="custom-control custom-radio">
                <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required="">
                <label class="custom-control-label" for="paypal">PayPal</label>
            </div>
        </div>
        <div class="payment-form">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="cc-name">Name on card</label>
                    <input type="text" class="form-control" id="cc-name" placeholder="" required="">
                    <small class="text-muted">Full name as displayed on card</small>
                    <div class="invalid-feedback">
                        Name on card is required
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="cc-number">Credit card number</label>
                    <input type="text" class="form-control" id="cc-number" placeholder="" required="">
                    <div class="invalid-feedback">
                        Credit card number is required
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label for="cc-expiration">Expiration</label>
                    <input type="text" class="form-control" id="cc-expiration" placeholder="" required="">
                    <div class="invalid-feedback">
                        Expiration date required
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="cc-cvv">CVV</label>
                    <input type="text" class="form-control" id="cc-cvv" placeholder="" required="">
                    <div class="invalid-feedback">
                        Security code required
                    </div>
                </div>
            </div>
        </div>
        <hr class="mb-4">
        <div class="row">
            <div class="col-sm-2">
                <a class="btn btn-primary" type="submit" href="../pages/shopping_cart.php" id="btn-prv">Return</a>
            </div>
            <div class="progress col-sm-8 ">
                <div class="progress-bar w-33 " role="progressbar" style="width: 33%;" aria-valuenow="33" aria-valuemin="0"
                    aria-valuemax="100"> 
                </div>
            </div>
            <div class="col-sm-2">
            <a class="btn btn-primary" type="submit" href="../../pages/checkout.php?p=2" id="btn-next">Next</a>
            </div>
        </div>
    </form>
</div>
</div>
</div>
<?php }

function draw_checkout_2(){
    
    draw_checkout_cart("",0);
    ?>
<div class="col-md-8 order-md-1 checkout-form-steps">
    <h4 class="mb-3">Shipping Info</h4>
    <form class="needs-validation" novalidate="">
    <div class="d-block my-3">
            <div class="custom-control custom-radio">
                <input id="standard" name="shippingMethod" type="radio" class="custom-control-input" checked=""
                    required="">
                <label class="custom-control-label" for="standard">
                    <h6 class="shipping-method">
                        Standard Delivery - 
                        <span class="shipping-price"> 
                            2.00€
                        </span>
                    </h6> 
                    <p> Expected by 7 March </p>
                </label>
            </div>
            <div class="custom-control custom-radio">
                <input id="express" name="shippingMethod" type="radio" class="custom-control-input" required="">
                <label class="custom-control-label" for="express">
                    <h6 class="shipping-method">
                        Express Delivery - 
                        <span class="shipping-price"> 
                            2.00€
                        </span>
                    </h6> 
                    <p> Expected by 10 March </p>
                </label>
            </div>
        </div>
        <hr class="mb-4">
        <div class="row">
            <div class="col-sm-2">
                <a class="btn btn-primary" type="submit" href="../pages/checkout.php?p=1" id="btn-prv">Previous</a>
            </div>
            <div class="progress col-sm-8 ">
                <div class="progress-bar w-66 " role="progressbar" style="width: 66%;" aria-valuenow="66" aria-valuemin="0"
                    aria-valuemax="100">
                    
                </div>
            </div>
            <div class="col-sm-2">
                <a class="btn btn-primary" type="submit" href="../../pages/checkout.php?p=3" id="btn-next">Next</a>
            </div>
        </div>
    </form>
</div>
</div>
</div>
<?php }


function draw_checkout_3(){
    
    draw_checkout_cart("Standard Shipping","2.00€");
    ?>
<div class="col-md-8 order-md-1 checkout-form-steps">
    <form class="needs-validation" novalidate="">
        <div class=" confirmation-div" id="#confirm_adress">
            <h4> Adress</h4>
            <h5> Main Adress for Delivery, 99, 1st lf </h5>
            <h6> Portugal, Porto - Porto 4763-384</h6>
        </div> 
        <div class=" confirmation-div" id="#confirm_payment">
            <h4> Payment Method</h4>
            <h5> Credit Card </h5>
            <h6> Matercard - ending 8634 - 11/76</h6>
        </div>
        <div class=" confirmation-div"id="#confirm_shipping">
            <h4> Shipping Method</h4>
            <h6> Standard Shipping - 2.00€</h6>
        </div>
        <hr class="mb-4">
        <div class="row">
            <div class="col-sm-2">
                <a class="btn btn-primary" type="submit" href="../pages/checkout.php?p=2" id="btn-prv">Previous</a>
            </div>
            <div class="progress col-sm-8 ">
                <div class="progress-bar w-100 " role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0"
                    aria-valuemax="100">
                    
                </div>
            </div>
            <div class="col-sm-2">
                <a class="btn btn-primary" type="submit" href="#" id="btn-confirm">Confirm</a>
            </div>
        </div>
    </form>
</div>
</div>
</div>
<?php }

?>