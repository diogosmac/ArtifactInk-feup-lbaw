@extends('layouts.admin')

@section('title', ' Admin - Home')

@section('content')
<main class="col-md-9 ml-sm-auto col-lg-10 px-4">
  <div class="container">

    <div class="mb-4 border-bottom mt-2">
      <h1>Overview</h1>
    </div>

    <div class="row mx-auto my-2">

      @php
      $overview_cards = array(
        (object) array(
          'title' => "Users",
          'Users Registered' => 675,
          'Users Online' => 12,
          'Site Visitors' => 8694
        ),
        (object) array(
          'title' => "Products",
          'Total Products' => 6,
          'Products On Sale' => 5,
          'Product Views' => 4
        ),
        (object) array(
          'title' => "Orders",
          'Total Orders' => 3,
          'Orders Shipped' => 2,
          'Orders Received' => 1
        ),
        (object) array(
          'title' => "Reviews",
          'Total Reviews' => 123,
          'Average Per Product' => 3.7,
          'Incomplete Reviews' => 27
        )
      );
      @endphp
      @each('partials.admin.overview_card', $overview_cards, 'card')
    
    </div>
  </div>

  <div class="container">
    <div class="mb-4 border-bottom mt-2">
      <h1 id="notifications">Notifications</h1>
    </div>

    <div class="mx-auto my-2">
      <table class="table table-striped text-center">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Category</th>
            <th scope="col">Description</th>
            <th scope="col">Timestamp</th>
          </tr>
        </thead>
        <tbody>
          @foreach($notifications as $notification)
            @include('partials.admin.notification_row', ['notification' => $notification, 'detail' => $detail[$loop->index]])
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</main>
@endsection

{{-- Success Alert --}}
@if(session('status'))
  <div class="alert alert-success alert-dismissible fade show fixed-top mx-auto" style="max-width: 40em;" role="alert">
    {{session('status')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif
