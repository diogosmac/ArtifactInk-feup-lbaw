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
          <li class="list-group-item d-flex justify-content-between">
            <span>Total (EUR)</span>
            <strong>20€</strong>
          </li>
        </ul>
      </div>



      <div class="col-md-8 order-md-1 checkout-form-steps">
        <form class="needs-validation" novalidate="">
        {{csrf_field()}}
          <div class="row justify-content-between checkout-header">
            <h4 class="mb-3">Shipping Address</h4>
            <nav aria-label="..." class="progress-checkout">
              <ul class="pagination pagination">
                <li class="page-item disabled">
                  <a class="page-link" href="{{ url('/checkout/shipping') }}" tabindex="-1">1</a>
                </li>
                <li class="page-item">
                  <a class="page-link" href="{{ url('/checkout/payment') }}">2</a>
                </li>
                <li class="page-item">
                  <a class="page-link" href="{{ url('/checkout/confirm') }}">3</a>
                </li>
              </ul>
            </nav>
          </div>
          <div class="checkout-addr-field">
            <div class="input-group mb-3" id="addr-selector">
              <select class="custom-select" id="address-input-group">
                @foreach($addresses as $address)
                  <option value="{{ $loop->iteration }}">
                  {{ $address->country->name }} - {{ $address->city }} -  {{ $address->postal_code}} - {{$address->street }}
                  </option>
                @endforeach
              </select>
              <div class="input-group-append">

              </div>
            </div>

            <div class="mb-3">
              <button class="btn button-secondary" id="new_addr_btn" type="button">New Adddress</button>
            </div>

            <div id="new-addr-form">
              
            <div class="mb-3 ">
                <label for="streetAdd">Street</label>
                <input type="text" class="form-control" id="streetAdd" placeholder="Type your Street name - Number - Floor" name="street" value="{{ old('') }}"required>
                <div class="invalid-feedback">
                  Please enter your shipping adddress.
                </div>
              </div>

              <div class="row">
                
              <div class="col-md-5 mb-3">
                  <label for="country">Country:</label>
                  <select class="custom-select d-block w-100" id="country" required>
                    @foreach($countries as $country)
                    <option value="{{ $country->id }}">{{ $country->name}}</option>
                    @endforeach+
                  </select>
                  <div class="invalid-feedback">
                    Please select a valid country.
                  </div>
                </div>

                <div class="col-md-4 mb-3">
                  <label for="cityAdd">City:</label>
                  <input type="text" class="form-control" id="cityAdd" placeholder="Type your city name" name="city" required>
                  <div class="invalid-feedback">
                    Please provide a valid state.
                  </div>
                </div>

                <div class="col-md-3 mb-3">
                  <label for="postalCodeAdd">Postal Code: </label>
                  <input type="text" class="form-control" id="postalCodeAdd" placeholder="Type your Code" pattern="^[0-9]*-[0-9]*$"  required>
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

          <div class="d-block my-3">
            <div class="custom-control custom-radio">
              <input id="standard" name="shippingMethod" type="radio" class="custom-control-input" checked="" required="">
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
          <div class="row justify-content-between" id="move-buttons">
            <div>
              <a class="btn button-secondary" type="submit" href="../pages/shopping_cart.php">Return</a>
            </div>
            <div>
              <a class="btn button" type="submit" href="{{ url('/checkout/payment') }}">Next</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
