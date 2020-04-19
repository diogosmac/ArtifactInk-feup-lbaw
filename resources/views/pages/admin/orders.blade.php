@extends('layouts.admin')

@section('title', ' Admin - Orders')

@section('content')
<main class="col-md-9 ml-sm-auto col-lg-10 px-4">
  <div class="container">

    <div class="mb-4 border-bottom mt-2">
      <h1>Orders</h1>
    </div>

    <div class="input-group my-3 mr-sm-2">
      <input class="form-control" placeholder="Search Client" aria-label="Search">
      <div class="input-group-append">
        <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="collapse" data-target="#collapseFilter" aria-expanded="false" aria-controls="collapseFilter">
          Filter
        </button>
      </div>
    </div>

    <div class="collapse" id="collapseFilter">
      <div class="row align-items-center justify-content-around">
        <div class="form-row col-12">
          <!-- Min Date -->
          <div class="form-group col-md-3">
            <label for="inputMinDate">Minimum Date</label>
            <input type="date" class="form-control" id="inputMinDate">
          </div>
          <!-- Max Date -->
          <div class="form-group col-md-3">
            <label for="inputMaxDate">Maximum Date</label>
            <input type="date" class="form-control" id="inputMaxDate">
          </div>
          <!-- Payment Method -->
          <div class="form-group col-md-3">
            <label for="inputPaymentMethod">Payment Method</label>
            <select id="inputPaymentMethod" class="form-control">
              <option selected>Choose...</option>
              <option>MasterCard</option>
              <option>PayPal</option>
            </select>
          </div>
          <!-- Order Status -->
          <div class="form-group col-md-3">
            <label for="inputStatus">Order Status</label>
            <select id="inputStatus" class="form-control">
              <option selected>Choose...</option>
              <option>Processing</option>
              <option>Shipped</option>
              <option>Arrived</option>
            </select>
          </div>
        </div>

        <div class="col-12">
          <div class="range-slider my-3">
            <label for="price">Total Price:
              <span class="rangeValues"></span>
            </label>
            <input type="range" class="custom-range price-slider" name="minprice" value="0" min="0" max="200" step="1">
            <input type="range" class="custom-range price-slider" name="maxprice" value="200" min="0" max="200" step="1">
          </div>
        </div>

      </div>

    </div>

    <table class="table table-striped text-center">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">User</th>
          <th scope="col">Items</th>
          <th scope="col">Timestamp</th>
          <th scope="col">Total</th>
          <th scope="col">Payment Method</th>
          <th scope="col">Status</th>
        </tr>
      </thead>
      <tbody>
        @php
        $orders = array(
          // order 1
          (object) array(
            "id" => 2,
            "user" => "miguel102@cenas.com",
            "timestamp" => "Sunday, 08-Mar-20 12:34:17",
            "total" => "99.99",
            "paymentMethod" => "MasterCard",
            "status" => "Shipped",
            "items" => array(
              // item purchase 1
              (object) array(
                "id" => 45,
                "img" => "1_mom_love.jpg",
                "name" => "Dynamic Black Ink 100ml",
                "price" => 9.99,
                "quantity" => 1,
                "totalPrice" => 9.99,
              ),
              // item purchase 2
              (object) array(
                "id" => 23,
                "img" => "106_stealth_ii_black.jpg",
                "name" => "MakePain Tattoo Machine #1",
                "price" => 119.99,
                "quantity" => 1,
                "totalPrice" => 119.99,
              )
            )
          ),
          // order 2
          (object) array(
            "id" => 1,
            "user" => "miguel102@outracenas.org",
            "timestamp" => "Sunday, 08-Mar-20 12:34:17",
            "total" => "199.99",
            "paymentMethod" => "PayPal",
            "status" => "Arrived",
            "items" => array(
              // item purchase 1
              (object) array(
                "id" => 45,
                "img" => "1_mom_love.jpg",
                "name" => "Dynamic Black Ink 100ml",
                "price" => 9.99,
                "quantity" => 1,
                "totalPrice" => 9.99,
              )
            )
          )
        );
        @endphp
        @each('partials.admin.order_row', $orders, 'order')
      </tbody>
    </table>

  </div>
</main>
@endsection