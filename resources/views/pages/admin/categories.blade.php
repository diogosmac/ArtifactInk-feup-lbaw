@extends('layouts.admin')

@section('title', ' Admin - Categories')

@section('content')
<main class="col-md-9 ml-sm-auto col-lg-10 px-4">
  <div class="container">

    <div class="mb-4 mt-2 border-bottom">
      <h1>Categories</h1>
    </div>

    <div class="mx-auto mt-2">
      <div class="row">
        <div class="col-md-6 col-sm-12">
          <div class="d-flex justify-content-between align-items-center flex-wrap my-2">
            <h3>Category</h3>
            <button type="button" class="btn button" data-toggle="modal" data-target="#addCategory">
              New Category
            </button>
            <!-- Modal -->
            <div class="text-left modal fade" id="addCategory" tabindex="-1" role="dialog" aria-labelledby="question0Modal" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="question0Modal">Add Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form action="{{ route('admin.categories') }}" method="POST" id="add-category">
                      @csrf
                      <div class="form-group">
                        <label for="categoryName">Name</label>
                        <input required name="name" type="text" class="form-control" id="categoryName" placeholder="Write name here...">
                      </div>
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-link a_link" data-dismiss="modal">Close</button>
                    <button type="submit" form="add-category" class="btn button">Submit</button>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <table class="table table-striped text-center">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              @each('partials.admin.category_row', $categories, 'category')
            </tbody>
          </table>
        </div>
        <div class="col-md-6 col-sm-12">
          <div class="d-flex justify-content-between align-items-center flex-wrap my-2">
            <h3>Subcategory</h3>
            <button type="button" class="btn button" data-toggle="modal" data-target="#addSubcategory">
              New Subcategory
            </button>
            <!-- Modal -->
            <div class="text-left modal fade" id="addSubcategory" tabindex="-1" role="dialog" aria-labelledby="subcategoryModal" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="subcategoryModal">Add Subcategory</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form action="{{ route('admin.categories') }}" method="POST" id="add-subcategory">
                      @csrf
                      <div class="form-group">
                        <label for="subcategoryName">Name</label>
                        <input required name="name" type="text" class="form-control" id="subcategoryName" placeholder="Write name here...">
                      </div>
                      <div class="form-group">
                        <label for="subcategoryCategory">Parent Category</label>
                        <select required name='id_parent' class="custom-select" id="subcategoryCategory">
                        @foreach($categories as $category)
                          <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                        </select>
                      </div>
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-link a_link" data-dismiss="modal">Close</button>
                    <button type="submit" form="add-subcategory" class="btn button">Submit</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <table class="table table-striped text-center">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              @each('partials.admin.subcategory_row', $subcategories, 'subcategory')
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