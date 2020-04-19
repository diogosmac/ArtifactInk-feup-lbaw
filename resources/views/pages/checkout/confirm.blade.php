@extends('layouts.checkout')

<div class="container">
    <div class="row">
        <div>
            <h2 class="shopping-cart-h">Checkout</h2>
        </div>

    </div>
    <div class="row">
        <div class="col-md-4 order-md-2 mb-4" id="checkout-list">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Your cart</span>
                <span class="badge badge-secondary badge-pill">3</span>
            </h4>
            <ul class="list-group mb-3" id="checkout-items-list">
                @include('partials.checkout.checkoutItem')
                @include('partials.checkout.checkoutItem')
                @include('partials.checkout.checkoutItem')
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">Muito carooooo</h6>
                    </div>
                    <span class="text-muted">30€</span>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <span>Total (EUR)</span>
                    <strong>20€</strong>
                </li>
            </ul>
        </div>
        <div class="col-md-8 order-md-1 checkout-form-steps">
            <form class="needs-validation" novalidate="">
                <div class="row justify-content-between checkout-header">
                    <h4 class="mb-3">Confirm Info</h4>
                    <nav aria-label="..." class="progress-checkout">
                        <ul class="pagination pagination">
                            <li class="page-item">
                                <a class="page-link" href="{{ url('/checkout/shipping') }}" tabindex="-1">1</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="{{ url('/checkout/payment') }}">2</a></li>
                            <li class="page-item disabled"><a class="page-link"
                                    href="{{ url('/checkout/confirm') }}">3</a></li>
                        </ul>
                    </nav>
                </div>
                <div class=" confirmation-div">
                    <div class="col-md-4 order-md-2 mb-4" id="confirm_cart">
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

                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                <div>
                                    <h6 class="my-0">Muito caro</h6>
                                </div>
                                <span class="text-muted">30€</span>
                            </li>

                            <li class="list-group-item d-flex justify-content-between">
                                <span>Total (EUR)</span>
                                <strong>20€</strong>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class=" confirmation-div" id="#confirm_address">
                    <h4> Address</h4>
                    <h5> Main Address for Delivery, 99, 1st lf </h5>
                    <h6> Portugal, Porto - Porto 4763-384</h6>
                </div>
                <hr class="mb-4">
                <div class=" confirmation-div" id="#confirm_shipping">
                    <h4> Shipping Method</h4>
                    <h6> Standard Shipping - 2.00€</h6>
                </div>
                <hr class="mb-4">
                <div class=" confirmation-div" id="#confirm_payment">
                    <h4> Payment Method</h4>
                    <h5> Credit Card </h5>
                    <h6> Matercard - ending 8634 - 11/76</h6>
                </div>
                <hr class="mb-4">
                <div class="row justify-content-between" id="move-buttons">
                    <div>
                        <a class="btn button-secondary" type="submit" href="{{ url('/checkout/payment') }}">Previous</a>
                    </div>

                    <div>
                        <a class="btn button" type="submit" href="#">Confirm</a> <!-- TODO this will be an action -->
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>