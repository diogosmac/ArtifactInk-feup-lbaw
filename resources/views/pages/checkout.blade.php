@extends('layouts.checkout')

@section('title', ' - Checkout Shipping')

@section('content')

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
        @foreach($cartItems as $cartItem)
        @include('partials.checkout.checkoutItem',['cartItem' => $cartItem])
        @endforeach
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <h6 class="my-0">Shipping: </h6>
          </div>
          <span class="text-muted" id="shipping-cost"></span>
        </li>
        <li class="list-group-item d-flex justify-content-between">
          <span>Total (EUR)</span>
          <strong></strong>
        </li>
      </ul>
    </div>



    <div class="col-md-8 order-md-1 checkout-form-steps">
      <form action="{{ route('checkout.home')}}" class="needs-validation" novalidate="" method="post">
        {{csrf_field()}}
        {{ method_field('POST')}}
        <!-- ADDRESS OPTION -->
        <div id="checkout-shipping">

          <div class="row justify-content-between checkout-header">
            <h4 class="mb-3">Shipping Address</h4>
            <nav aria-label="..." class="progress-checkout">
              <ul class="pagination pagination">
                <li class="page-item disabled">
                  <button type="button" class="page-link" tabindex="-1">1</button>
                </li>
                <li class="page-item">
                  <button type="button" class="page-link" id="p2-shipping">2</button>
                </li>
                <li class="page-item">
                  <button type="button" class="page-link" id="p3-shipping">3</button>
                </li>
              </ul>
            </nav>
          </div>

          <div class="checkout-addr-field">

            <div class="input-group mb-3" id="addr-selector">
              <select class="custom-select" id="address-input-group" name="addrOld" required>
                @foreach($addresses as $address)
                <option value="{{ $address->id }}">
                  {{ $address->country->name }} - {{ $address->city }} - {{ $address->postal_code}} -
                  {{$address->street }}
                </option>
                @endforeach
              </select>
            </div>

            <div class="mb-3">
              <button class="btn button-secondary" id="new_addr_btn" type="button">New Adddress</button>
            </div>

            <div id="new-addr-form">
              <div class="mb-3 ">
                <label for="streetAdd">Street</label>
                <input type="text" class="form-control" id="streetAdd"
                  placeholder="Type your Street name - Number - Floor" name="street" value="{{ old('') }}">
                <div class="invalid-feedback">
                  Please enter your shipping adddress.
                </div>
              </div>

              <div class="row">
                <div class="col-md-5 mb-3">
                  <label for="countryAdd">Country:</label>
                  <select class="custom-select d-block w-100" id="countryAdd" name="country">
                    @foreach($countries as $country)
                    <option value="{{ $country->id }}">{{ $country->name}}</option>
                    @endforeach
                  </select>
                  <div class="invalid-feedback">
                    Please select a valid country.
                  </div>
                </div>

                <div class="col-md-4 mb-3">
                  <label for="cityAdd">City:</label>
                  <input type="text" class="form-control" id="cityAdd" placeholder="Type your city name" name="city">
                  <div class="invalid-feedback">
                    Please provide a valid state.
                  </div>
                </div>

                <div class="col-md-3 mb-3">
                  <label for="postalCodeAdd">Postal Code: </label>
                  <input type="text" class="form-control" id="postalCodeAdd" placeholder="Type your Code"
                    pattern="^[0-9]*-[0-9]*$" name="postalCode">
                  <div class="invalid-feedback">
                    Postal code required.
                  </div>
                </div>

              </div>

              <div class="mb-3">
                <button class="btn button-secondary" id="return_addr_btn" type="button">Return</button>
              </div>
            </div>
          </div>

          <hr class="mb-4">

          <div class="d-block my-3" id="shipping-radio">
            <div class="custom-control custom-radio">

              <input name="shippingMethod" type="radio" class="custom-control-input" id="standard-shipping" required>
              <label class="custom-control-label" for="standard-shipping">
                <h6 class="shipping-method">
                  Standard Delivery -
                  <span class="shipping-price">
                    1.99€
                  </span>
                </h6>
                <p id="standard-date"> </p>
              </label>
            </div>
            <div class="custom-control custom-radio">

              <input name="shippingMethod" type="radio" class="custom-control-input" id="express-shipping">
              <label class="custom-control-label" for="express-shipping">
                <h6 class="shipping-method">
                  Express Delivery -
                  <span class="shipping-price">
                    4.99€
                  </span>
                </h6>
                <p id="express-date"> </p>
              </label>
            </div>
          </div>

          <hr class="mb-4">
          <div class="row justify-content-between" id="move-buttons">
            <div>
              <a class="btn button-secondary" href="{{url('/cart')}}">Return</a>
            </div>
            <div>
              <button type="button" class="btn button" id="next-shipping">Next</button>
            </div>
          </div>
        </div>

        <!-- PAYMENT OPTION -->
        <div id="checkout-payment">

          <div class="row justify-content-between checkout-header">
            <h4 class="mb-3">Payment</h4>
            <nav aria-label="..." class="progress-checkout">
              <ul class="pagination pagination">
                <li class="page-item">
                  <button type="button" class="page-link" id="p1-payment" tabindex="-1">1</button>
                </li>
                <li class="page-item disabled">
                  <button type="button" class="page-link">2</button>
                </li>
                <li class="page-item">
                  <button type="button" class="page-link" id="p3-payment">3</button>
                </li>
              </ul>
            </nav>
          </div>


          <div class="checkout-payment-field">
            <div class="input-group mb-3" id="payment-selector">
              <select class="custom-select" id="payment-input-group" name="paymentOld" required>
                @foreach($paymentMethods as $paymentMethod)
                @if($paymentMethod->id_cc != null)
                <option value="{{ $loop->iteration }}">
                  Credit Card ending in {{substr($paymentMethod->credit_card->number, -4)}}
                </option>
                @else
                <option value="{{ $loop->iteration }}">
                  Paypal with email: {{$paymentMethod->paypal->email}}
                </option>
                @endif
                @endforeach
              </select>
              <div class="input-group-append">

              </div>
            </div>

            <div class="mb-3">
              <button class="btn button-secondary" id="new-payment-btn" type="button">New Payment Method</button>
            </div>

            <div id="new-payment-form">

              <div class="d-block my-3">
                <div class="custom-control custom-radio">
                  <input id="cc-add" name="paymentMethod" type="radio" class="custom-control-input" >
                  <label class="custom-control-label" for="cc-add">Credit card </label>
                </div>
                <div class="custom-control custom-radio">
                  <input id="paypal-add" name="paymentMethod" type="radio" class="custom-control-input">
                  <label class="custom-control-label" for="paypal-add">PayPal</label>
                </div>
              </div>
              <div class="mb-3">
                <button class="btn button-secondary" id="return-payment-btn" type="button">Return</button>
              </div>
            </div>
          </div>

          <div class="payment-form">
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="cc-name-add">Name on card</label>
                <input type="text" class="form-control" id="cc-name-add" placeholder="Type the cardholder name" name="ccName">
                <small class="text-muted">Full name as displayed on card</small>
                <div class="invalid-feedback">
                  Name on card is required
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="cc-number-add">Credit card number</label>
                <input type="text" class="form-control" id="cc-number-add" placeholder="Type Your credit Card Number" name="ccNumber">
                <div class="invalid-feedback">
                  Credit card number is required
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3 mb-3">
                <label for="cc-expiration-add">Expiry Date: </label>
                <input type="date" class="form-control" id="cc-expiration-add" placeholder="" cc="ccDate">
                <div class="invalid-feedback">
                  Expiration date required
                </div>
              </div>
              <div class="col-md-3 mb-3">
                <label for="cc-cvv.add">CVV:</label>
                <input type="text" class="form-control" id="cc-cvv-add" placeholder="Type Card CVV" name="ccCVV">
                <div class="invalid-feedback">
                  Security code required
                </div>
              </div>
            </div>
          </div>

          <div class="payment-form2">
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="pp-email">Email:</label>
                <input type="email" class="form-control" id="pp-email" placeholder="Type your Paypal Email" name="ppEmail">
              </div>
            </div>
          </div>


          <hr class="mb-4">
          <div class="row justify-content-between" id="move-buttons">
            <div>
              <button type="button" class="btn button-secondary" id="previous-payment">Previous</button>
            </div>

            <div>
              <button type="button" class="btn button" id="next-payment">Next</button>
            </div>

          </div>

        </div>

        <!-- CONFIRM OPTION -->
        <div id="checkout-confirm">

          <div class="row justify-content-between checkout-header">
            <h4 class="mb-3">Confirm Info</h4>
            <nav aria-label="..." class="progress-checkout">
              <ul class="pagination pagination">
                <li class="page-item">
                  <button type="button" class="page-link" id="p1-confirm" tabindex="-1">1</button>
                </li>
                <li class="page-item">
                  <button type="button" class="page-link" id="p2-confirm">2</button>
                </li>
                <li class="page-item disabled">
                  <button type="button" class="page-link">3</button>
                </li>
              </ul>
            </nav>
          </div>
          <div class=" confirmation-div" id="#confirm_address">
            <h4> Address</h4>
            <h5 id="addr1-confirm"> </h5>
            <h6 id="addr2-confirm"></h6>
          </div>
          <hr class="mb-4">
          <div class=" confirmation-div" id="#confirm_shipping">
            <h4> Shipping Method</h4>
            <h6 id="shipping-confirm"> Standard Shipping - € </h6>
          </div>
          <hr class="mb-4">
          <div class=" confirmation-div" id="#confirm_payment">
            <h4> Payment Method</h4>
            <h5 id="payment1-confirm"></h5>
            <h6 id="payment2-confirm"></h6>
          </div>
          <hr class="mb-4">
          <div class="row justify-content-between" id="move-buttons">
            <div>
              <button type="button" class="btn button-secondary" id="previous-confirm">Previous</button>
            </div>
            <div>
              <button id="confirm-button" class="btn button" type="submit">Confirm</button> <!-- TODO this will be an action -->
            </div>
          </div>

        </div>

        <input type="hidden" id="total" name="total" >
        <input type="hidden" id="payment" name="payment">
        <input type="hidden" id="address" name="address">

      </form>
    </div>
  </div>
</div>
@endsection