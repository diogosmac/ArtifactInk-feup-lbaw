@extends('layouts.admin')

@section('title', ' Admin - Home')

@section('content')
<main class="col-md-9 ml-sm-auto col-lg-10 px-4">

  <div class="container">
    <div class="mb-4 border-bottom mt-2">
      <h1 id="notifications">Notifications</h1>
    </div>

    <div class="mx-auto my-2">
      <table class="table table-striped text-center">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Category</th>
            <th scope="col">Description</th>
            <th scope="col">Timestamp</th>
            <th scope="col"></th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($notifications as $notification)
            @include('partials.admin.notification_row', ['notification' => $notification, 'detail' => $detail[$loop->index]])
          @endforeach
        </tbody>
      </table>
    </div>
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
