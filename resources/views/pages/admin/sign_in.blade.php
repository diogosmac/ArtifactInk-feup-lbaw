@extends('layouts.auth')

@section('content')
<form class="form-signin" method="POST" action="{{ url('/home') }}">
  {{ csrf_field() }}
  <a href="{{ asset('/home') }}">
    <img class="mb-4" src="../images/artifact_ink_letters_white.png" alt="ArtifactInk" width="300">
  </a>
  <div class="sign-box">
    <h1 class="h3 mb-3 font-weight-normal">Admin Sign In</h1>
    <div class="form-group email-input">
      <label for="inputAdminUsername">Admin Username</label>
      <input type="text" class="form-control" id="inputAdminUsername" aria-describedby="emailHelp">
    </div>
    <div class="form-group password-input">
      <label for="inputAdminPassword">Password</label>
      <input type="password" class="form-control" id="inputAdminPassword">
    </div>
    <button class="btn btn-lg btn-secondary btn-block" type="button" onclick="location.href='{{ url('/admin/home') }}'">Sign in</button>
  </div>
</form>
@endsection
