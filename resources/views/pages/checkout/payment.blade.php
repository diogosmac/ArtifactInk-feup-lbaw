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
                    <h4 class="mb-3">Payment</h4>
                    <nav aria-label="..." class="progress-checkout">
                        <ul class="pagination pagination">
                            <li class="page-item">
                                <a class="page-link" href="{{ url('/checkout/shipping') }}" tabindex="-1">1</a>
                            </li>
                            <li class="page-item disabled"><a class="page-link"
                                    href="{{ url('/checkout/payment') }}">2</a></li>
                            <li class="page-item"><a class="page-link" href="{{ url('/checkout/confirm') }}">3</a></li>
                        </ul>
                    </nav>
                </div>


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
                <div class="row justify-content-between" id="move-buttons">
                    <div>
                        <a class="btn button-secondary" type="submit"
                            href="{{ url('/checkout/shipping') }}">Previous</a>
                    </div>

                    <div>
                        <a class="btn button" type="submit" href="{{ url('/checkout/confirm') }}">Next</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>