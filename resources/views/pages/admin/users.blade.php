@extends('layouts.admin')

@section('title', ' Admin - Users')

@section('content')
<main class="col-md-9 ml-sm-auto col-lg-10 px-4">
  <div class="container">

    <div class="mb-4 border-bottom mt-2">
      <h1>Users</h1>
    </div>

    <div class="input-group my-3 mr-sm-2">
      <input class="form-control" placeholder="Search User" aria-label="Search User">
      <div class="input-group-append">
        <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="collapse" data-target="#collapseFilter" aria-expanded="false" aria-controls="collapseFilter">
          Filter
        </button>
      </div>
    </div>

    <div class="collapse" id="collapseFilter">
      <div class="row align-items-center justify-content-around">
        <div class="form-row col-12">
          <!-- User ID -->
          <div class="form-group col-md-2">
            <label for="inputUserID">User ID</label>
            <input type="number" min=1 class="form-control" id="inputUserID">
          </div>
          <!-- Email -->
          <div class="form-group col-md-3">
            <label for="inputUserEmail">Email</label>
            <input type="text" class="form-control" id="inputUserEmail" placeholder="Item name">
          </div>
          <!-- Phone Number -->
          <div class="form-group col-md-3">
            <label for="inputUserPhone">Phone Number</label>
            <input type="text" class="form-control" id="inputUserPhone" placeholder="Item name">
          </div>
          <!-- Min Date -->
          <div class="form-group col-md-2">
            <label for="inputMinDate">Minimum Date</label>
            <input type="date" class="form-control" id="inputMinDate">
          </div>
          <!-- Max Date -->
          <div class="form-group col-md-2">
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
          <th scope="col">First Name</th>
          <th scope="col">Last Name</th>
          <th scope="col">Email</th>
          <th scope="col">Phone Number</th>
          <th scope="col">Date Of Birth</th>
          <th scope="col">Billing</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        @each('partials.admin.user_row', $users, 'user')
      </tbody>
    </table>

    {{ $users->onEachSide(1)->links() }}

  </div>
</main>
@endsection