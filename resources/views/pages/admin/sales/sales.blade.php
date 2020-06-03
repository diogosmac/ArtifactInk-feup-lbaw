@extends('layouts.admin')

@section('title', ' Admin - Sales')

@section('content')
<main class="col-md-9 ml-sm-auto col-lg-10 px-4">
  <div class="container">

    <div class="mb-4 d-flex justify-content-between align-items-center flex-wrap border-bottom mt-2">
      <h1>Sales</h1>
      <button type="button" class="btn button" onclick="location.href='{{ url('admin/sales/add') }}'">
        Add Sale
      </button>
    </div>

    <table class="table table-striped text-center">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Type</th>
          <th scope="col">Amount</th>
          <th scope="col">Start Date</th>
          <th scope="col">End Date</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        @each('partials.admin.sales_row', $sales, 'sale')
      </tbody>
    </table>

    {{ $sales->onEachSide(1)->links() }}

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

@endsection