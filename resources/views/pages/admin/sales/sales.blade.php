@extends('layouts.admin')

@section('title', ' Admin - Sales')

@section('content')
<main class="col-md-9 ml-sm-auto col-lg-10 px-4">
  <div class="container">

    <div class="mb-4 border-bottom mt-2">
      <h1>Sales</h1>
    </div>

    <div class="d-flex align-items-center mb-3">
      <div class="input-group mr-sm-2">
        <input class="form-control" placeholder="Search Sale" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="collapse" data-target="#collapseFilter" aria-expanded="false" aria-controls="collapseFilter">
            Filter
          </button>
        </div>
      </div>
      <div class="flex-shrink-0">
        <button type="button" class="btn button" onclick="location.href='{{ url('admin/sales/add') }}'">
          Add Sale
        </button>
      </div>
    </div>

    <div class="collapse" id="collapseFilter">
      <div class="row align-items-center justify-content-around">
        <div class="form-row col-12">
          <!-- Sale ID -->
          <div class="form-group col-md-2">
            <label for="inputUserID">Sale ID</label>
            <input type="number" min=1 class="form-control" id="inputUserID">
          </div>
          <!-- Min Date -->
          <div class="form-group col-md-5">
            <label for="inputMinDate">Minimum Date</label>
            <input type="date" class="form-control" id="inputMinDate">
          </div>
          <!-- Max Date -->
          <div class="form-group col-md-5">
            <label for="inputMaxDate">Maximum Date</label>
            <input type="date" class="form-control" id="inputMaxDate">
          </div>
        </div>
      </div>
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
