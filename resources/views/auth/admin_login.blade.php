@extends('layouts.auth')

@section('title', '- Admin Sign In')

@section('content')
<form class="form-signin" method="POST" action="{{ route($sign_in_route) }}">
  {{ csrf_field() }}
  <a href="{{ asset('/') }}">
    <img class="mb-4" src="{{ asset('/assets/artifact_ink_letters_white.png') }}" alt="ArtifactInk" width="300">
  </a>
  <div class="sign-box">
    <h1 class="h3 mb-3 font-weight-normal">{{ $title }}</h1>

    <div class="form-group email-input">
      <label for="inputAdminUsername">Username</label>
      <input name="username" type="text" class="form-control" id="inputAdminUsername" value="{{ old('username') }}" required autofocus>
      @if ($errors->has('username'))
        <span class="error">
          {{ $errors->first('username') }}
        </span>
      @endif
    </div>

    <div class="form-group password-input">
      <label for="inputAdminPassword">Password</label>
      <input name="password" type="password" class="form-control" id="inputAdminPassword">
      @if ($errors->has('password'))
        <span class="error">
          {{ $errors->first('password') }}
        </span>
      @endif
    </div>

    <button class="btn btn-lg btn-secondary btn-block" type="submit">Sign in</button>
  </div>
</form>
@endsection

{{-- Error Alert --}}
@if(session('error'))
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{session('error')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif

{{-- Success Alert --}}
@if(session('status'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{session('status')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif

