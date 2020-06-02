@extends('layouts.admin')

@section('title', ' Admin - Reviews')

@section('content')
<main class="col-md-9 ml-sm-auto col-lg-10 px-4">
  <div class="container">

    <div class="mb-4 border-bottom mt-2">
      <h1>Reviews</h1>
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
          <!-- Item ID -->
          <div class="form-group col-md-1">
            <label for="inputItemID">Item ID</label>
            <input type="number" min=1 class="form-control" id="inputItemID">
          </div>
          <!-- Item Name -->
          <div class="form-group col-md-5">
            <label for="inputItemName">Item Name</label>
            <input type="text" class="form-control" id="inputItemName" placeholder="Item name">
          </div>
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
        </div>
        <!-- Rating -->
        <div class="col-12">
          <div class="range-slider my-3">
            <label for="price">Rating:
              <span class="rangeValues"></span>
            </label>
            <input type="range" class="custom-range price-slider" name="minRating" value="0" min="0" max="5" step="0.1">
            <input type="range" class="custom-range price-slider" name="maxRating" value="5" min="0" max="5" step="0.1">
          </div>
        </div>

      </div>

    </div>

    <table class="table table-striped text-center">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">User</th>
          <th scope="col">Item</th>
          <th scope="col">Timestamp</th>
          <th scope="col">Score</th>
          <th scope="col">Content</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        @each('partials.admin.review_row', $reviews, 'review')
      </tbody>
    </table>

    {{ $reviews->onEachSide(1)->appends(request()->except('page'))->links() }}

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
