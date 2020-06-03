@extends('layouts.admin')

@section('title', ' Admin - Reviews')

@section('content')
<main class="col-md-9 ml-sm-auto col-lg-10 px-4">
  <div class="container">

    <div class="mb-4 mt-2">
      <h1>Reviews</h1>
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
