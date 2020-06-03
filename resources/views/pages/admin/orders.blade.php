@extends('layouts.admin')

@section('title', ' Admin - Orders')

@section('content')
<main class="col-md-9 ml-sm-auto col-lg-10 px-4">
  <div class="container">

    <div class="mb-4 mt-2 border-bottom">
      <h1>Orders</h1>
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
        @each('partials.admin.order_row', $orders, 'order')
      </tbody>
    </table>

    {{ $orders->onEachSide(1)->appends(request()->except('page'))->links() }}

  </div>
</main>

{{-- Success Alert --}}
@if(session('status'))
  <div class="alert alert-success alert-dismissible fade show fixed-top mx-auto" style="max-width: 40em;" role="alert">
    {{session('status')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif

{{-- Alert --}}
@if ($errors->any())
<div class="alert alert-danger alert-dismissible fade show fixed-top mx-auto" style="max-width: 40em;" role="alert">
    @foreach ($errors->all() as $error)
    <p>{{ $error }}</p>
    @endforeach
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif

@endsection