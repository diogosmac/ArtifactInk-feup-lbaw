@extends('layouts.admin')

@section('title', ' Admin - Edit ' . $sale->name)

@section('content')
<main class="col-md-9 ml-sm-auto col-lg-10 px-4">
  <div class="container">

    <div class="mb-4 d-flex justify-content-between align-items-center flex-wrap border-bottom mt-2">
      <h1>Edit Sale</h1>
      <button id="submit-sale-button" type="submit" form="sale-form" value="Submit" class="btn button">
        Submit
      </button>
    </div>

    <form action="{{ route('admin.sales.edit', ['id' => $sale->id]) }}" method="POST" id="sale-form">
      @csrf
      @method('PUT')
      <div class="form-row">
        <div class="form-group col-md-4">
          <label for="inputTitle">Title</label>
          <input required name='name' type="text" class="form-control" id="inputTitle" value="{{ $sale->name }}">
        </div>
        <div class="form-group col-md-2">
          <label for="inputStartDate">Type</label>
          <select required name="type" class="form-control" id="questionNumber">
            <option value="fixed" {{ ($sale->type == 'fixed') ? 'selected' : '' }}>Fixed</option>
            <option value="percentage" {{ ($sale->type == 'percentage') ? 'selected' : '' }}>Percentage</option>
          </select>
        </div>
        <div class="form-group col-md-2">
          <label for="inputStartDate">Value</label>
          <input required name='value' type="number" class="form-control" id="inputStartDate" value="{{ ($sale->type == 'fixed') ? $sale->fixed_amount : $sale->percentage_amount }}">
        </div>
        <div class="form-group col-md-2">
          <label for="inputStartDate">Start Date</label>
          <input required name='start' type="date" class="form-control" id="inputStartDate" value="{{ $sale->start }}">
        </div>
        <div class="form-group col-md-2">
          <label for="inputEndDate">End Date</label>
          <input required name='end' type="date" class="form-control" id="inputEndDate" value="{{ $sale->end }}">
        </div>
      </div>
      @foreach($sale->items->pluck('id') as $id_item)
      <input id='item-{{ $id_item }}' type="hidden" name='item[{{ $sale->items[$loop->index]->id }}]' value="{{ $id_item }}">
      @endforeach
      <input type="hidden" name='id' value="{{ $sale->id }}">
    </form>

    <div class="mx-auto mt-2">
      <div class="row">
        <div class="col-md-6 col-sm-12">
          <div class="mt-2">
            <h3>Add Items</h3>
          </div>
          <div class="input-group my-3 mr-sm-2">
            <input class="form-control" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="collapse" data-target="#collapseFilterLeft" aria-expanded="false" aria-controls="collapseFilter">
                Filter
              </button>
            </div>
          </div>

          <div class="collapse" id="collapseFilterLeft">
            <div class="row align-items-center justify-content-around">
              <div class="col-md-6 col-sm-12">
                <label for="categories">Categories</label>
                <div id="categories" class="rounded border p-2 search-box-category">
                  @for ($i = 1; $i < 6; $i++)
                    <div class="custom-control custom-checkbox mb-3">
                      <input type="checkbox" class="custom-control-input" id="category{{ $i }}">
                      <label class="custom-control-label" for="category{{ $i }}">Category {{ $i }}</label>
                    </div>
                  @endfor
                </div>
              </div>
              <div class="col-md-6 col-sm-12">
                <label for="brands">Brands</label>
                <div id="brands" class="rounded border p-2 search-box-category">
                  @for ($i = 1; $i < 6; $i++)
                    <div class="custom-control custom-checkbox mb-3">
                      <input type="checkbox" class="custom-control-input" id="brand{{ $i }}">
                      <label class="custom-control-label" for="brand{{ $i }}">Brand {{ $i }}</label>
                    </div>
                  @endfor
                </div>
              </div>

              <div class="col-3 text-center">
                <div class="custom-control custom-switch my-3">
                  <input type="checkbox" class="custom-control-input" id="stockSwitch">
                  <label class="custom-control-label" for="stockSwitch">In-Stock</label>
                </div>
              </div>

              <div class="col-9">
                <div class="range-slider my-3">
                  <label for="price">Price:
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
                <th scope="col">Photo</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody id='add-item-list'>
              @each('partials.admin.sale_add_product_row', $items, 'product')
            </tbody>
          </table>
        </div>
        <div class="col-md-6 col-sm-12">
          <div class="mt-2">
            <h3>Item List</h3>
          </div>
          <div class="input-group my-3 mr-sm-2">
            <input class="form-control" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="collapse" data-target="#collapseFilterRight" aria-expanded="false" aria-controls="collapseFilter">
                Filter
              </button>
            </div>
          </div>

          <div class="collapse" id="collapseFilterRight">
            <div class="row align-items-center justify-content-around">

              <div class="col-md-6 col-sm-12">
                <label for="categories">Categories</label>
                <div id="categories" class="rounded border p-2 search-box-category">
                  @for ($i = 1; $i < 6; $i++)
                    <div class="custom-control custom-checkbox mb-3">
                      <input type="checkbox" class="custom-control-input" id="category{{ $i }}">
                      <label class="custom-control-label" for="category{{ $i }}">Category {{ $i }}</label>
                    </div>
                  @endfor
                </div>
              </div>

              <div class="col-md-6 col-sm-12">
                <label for="brands">Brands</label>
                <div id="brands" class="rounded border p-2 search-box-category">
                  @for ($i = 1; $i < 6; $i++)
                    <div class="custom-control custom-checkbox mb-3">
                      <input type="checkbox" class="custom-control-input" id="brand{{ $i }}">
                      <label class="custom-control-label" for="brand{{ $i }}">Brand {{ $i }}</label>
                    </div>
                  @endfor
                </div>
              </div>

              <div class="col-3 text-center">
                <div class="custom-control custom-switch my-3">
                  <input type="checkbox" class="custom-control-input" id="stockSwitch">
                  <label class="custom-control-label" for="stockSwitch">In-Stock</label>
                </div>
              </div>

              <div class="col-9">
                <div class="range-slider my-3">
                  <label for="price">Price:
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
                <th scope="col">Photo</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody id='item-list'>
              @each('partials.admin.sale_remove_product_row', $items_sale, 'product')
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>
</main>

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