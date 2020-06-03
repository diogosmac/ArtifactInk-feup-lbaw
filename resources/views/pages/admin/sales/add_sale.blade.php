@extends('layouts.admin')

@section('title', ' Admin - Add Sale')

@section('content')
<main class="col-md-9 ml-sm-auto col-lg-10 px-4">
  <div class="container">

    <div class="mb-4 d-flex justify-content-between align-items-center flex-wrap border-bottom mt-2">
      <h1>Add Sale</h1>
      <button type="submit" class="btn button" form="sale-form" value="Submit">
        Submit
      </button>
    </div>

    <form action="{{ route('admin.sales.add') }}" method="POST" id="sale-form">
      @csrf
      <div class="form-row">
        <div class="form-group col-md-4">
          <label for="inputTitle">Title</label>
          <input required name="name" type="text" class="form-control" id="inputTitle" placeholder="Write sale title...">
        </div>
        <div class="form-group col-md-2">
          <label for="inputStartDate">Type</label>
          <select required name="type" class="form-control" id="questionNumber">
            <option value="fixed">Fixed</option>
            <option value="percentage">Percentage</option>
          </select>
        </div>
        <div class="form-group col-md-2">
          <label for="inputStartDate">Value</label>
          <input required name='value' type="number" class="form-control" id="inputStartDate">
        </div>
        <div class="form-group col-md-2">
          <label for="inputStartDate">Start Date</label>
          <input required name="start" type="date" class="form-control" id="inputStartDate">
        </div>
        <div class="form-group col-md-2">
          <label for="inputEndDate">End Date</label>
          <input required name="end" type="date" class="form-control" min="0" id="inputEndDate">
        </div>
      </div>
    </form>

    <div class="mx-auto mt-2">
      <div class="row">
        <div class="col-md-6 col-sm-12">
          <div class="mt-2">
            <h3>Add Items</h3>
          </div>

          <table class="table table-striped text-center">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Photo</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody id='add-item-list'>
              @each('partials.admin.sale_add_product_row', $products, 'product')
            </tbody>
          </table>
        </div>
        <div class="col-md-6 col-sm-12">
          <div class="mt-2">
            <h3>Item List</h3>
          </div>
          
          <table class="table table-striped text-center">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Photo</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody id='item-list'>
              @each('partials.admin.sale_remove_product_row', [], 'product')
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>
</main>

{{-- Error Alert --}}
@if ($errors->any())
<div class="alert alert-danger alert-dismissible fade show fixed-top mx-auto" style="max-width: 40em;" role="alert">
  @foreach ($errors->all() as $error)
  {{ $error }}<br>
  @endforeach
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif

@endsection