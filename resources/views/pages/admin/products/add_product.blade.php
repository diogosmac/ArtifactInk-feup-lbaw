@extends('layouts.admin')

@section('title', ' Admin - Add Product')

@section('content')
<main class="col-md-9 ml-sm-auto col-lg-10 px-4 mb-5">
  <div class="container">

    <div class="mb-4 d-flex justify-content-between align-items-center flex-wrap border-bottom mt-2">
      <h1>Add Product</h1>
      <button type="submit" form="add-product" value="Submit" class="btn button">
        Submit
      </button>
    </div>

    <form action="{{ route('admin.products.add') }}" method="POST" id="add-product" enctype="multipart/form-data">
      @csrf
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputTitle">Title</label>
          <input required name="title" type="text" class="form-control" id="inputTitle" placeholder="Write product title...">
        </div>
        <div class="form-group col-md-3">
          <label for="inputPrice">Price</label>
          <input required name="price" type="number" step=".01" min="0" class="form-control" id="inputPrice">
        </div>
        <div class="form-group col-md-3">
          <label for="inputQuantity">Stock</label>
          <input required name="stock" type="number" class="form-control" min="0" id="inputQuantity">
        </div>
      </div>

      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputAddress">Description</label>
          <textarea required name="description" class="form-control" id="titleInput" rows="4" placeholder="Write product description..."></textarea>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="inputCategory">Brand</label>
            <input required name="brand" type="text" class="form-control" id="inputTitle" placeholder="Write product brand...">
          </div>
          <div class="form-group">
            <label for="inputCategory">Category</label>
            <select required name="category" class="custom-select" id="inputCategory">
              @foreach ($parent_categories as $parent_category)
              <optgroup label="{{ $parent_category->name }}">
                @foreach ($parent_category->children as $child_category)
                <option value="{{ $child_category->id }}">
                  {{ $child_category->name }}
                </option>
                @endforeach
              </optgroup>
              @endforeach
            </select>
          </div>

        </div>
      </div>

      <div class="panel panel-default">
        <div class="panel-body">

          <!-- Standard Form -->
          <form action="" method="post" enctype="multipart/form-data" id="js-upload-form">
            <label for="">Upload pictures</label>
            <div class="form-inline">
              <div class="form-group">
                <input type="file" accept="image/*" name="pictures[]" id="js-upload-files" multiple>
              </div>
            </div>
          </form>

          <!-- Drop Zone
          <label>Or drag and drop files below</label>
          <div class="upload-drop-zone" id="drop-zone">
            Just drag and drop files here
          </div>
          -->

          <!-- Upload Finished 
          <div class="js-upload-finished">
            <label>Processed Files</label>
            <div class="list-group">
              <a href="#" class="list-group-item list-group-item-success"><span class="badge alert-success pull-right">Success</span>image-01.jpg</a>
              <a href="#" class="list-group-item list-group-item-success"><span class="badge alert-success pull-right">Success</span>image-02.jpg</a>
            </div>
          </div>
          -->
        </div>
      </div>

    </form>
  </div>
</main>
@endsection

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