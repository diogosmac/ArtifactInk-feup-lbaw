@extends('layouts.admin')

@section('title', ' Admin - Users')

@section('content')
<main class="col-md-9 ml-sm-auto col-lg-10 px-4">
  <div class="container">

    <div class="mb-4 mt-2 border-bottom">
      <h1>Users</h1>
    </div>

    <table class="table table-striped text-center">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Picture</th>
          <th scope="col">Name</th>
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