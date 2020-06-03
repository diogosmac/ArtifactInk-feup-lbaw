@extends('layouts.admin')

@section('title', ' Admin - Make Newsletter')

@section('content')
<main class="col-md-9 ml-sm-auto col-lg-10 px-4">
  <div class="container">

    <div class="mb-4 d-flex justify-content-between align-items-center flex-wrap border-bottom mt-2">
      <h1>Newsletter</h1>
      <button type="submit" form="sale-form" class="btn button">
        Send Newsletter
      </button>
    </div>

    <div class="mx-auto mt-2">
      <form action="{{ route('admin.newsletter') }}" method="POST" id="sale-form">
        @csrf
        <div class="form-group">
          <label for="subjectInput">Subject</label>
          <input required name='subject' type="Text" class="form-control" id="subjectInput" placeholder="Write e-mail subject...">
        </div>
        <div class="form-group">
          <label for="titleInput">Title</label>
          <input required name='title' type="Text" class="form-control" id="titleInput" placeholder="Write e-mail topic...">
        </div>
        <div class="form-group">
          <label for="titleInput">Body</label>
          <textarea required name='body' class="form-control" id="titleInput" rows="5" placeholder="Write e-mail body"></textarea>
        </div>
      </form>


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