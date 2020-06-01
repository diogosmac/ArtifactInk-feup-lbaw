@extends('layouts.auth')

@section('title', ' - Sign In')

@section('content')

{{-- Error Alert --}}
@if(session('error'))
  <div class="alert alert-danger alert-dismissible fade show sticky-top mx-auto" role="alert">
    {{session('error')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif

<form class="form-signin" method="POST" action="{{ route('sign_in') }}">
    {{ csrf_field() }}

    <a href="{{ url('/') }}">
        <img class="mb-4" src="{{ asset('/assets/artifact_ink_letters_white.png') }}" alt="ArtifactInk" width="300">
    </a>
    <div class="sign-box">
        <h1 class="h3 mb-3 font-weight-normal">Sign In</h1>
        <div class="form-group email-input">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                value="{{ old('email') }}" required autofocus>
            @if ($errors->has('email'))
            <span class="error">
                {{ $errors->first('email') }}
            </span>
            @endif

            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group password-input">
            <label for="exampleInputPassword1">Password</label>
            <a href="{{ url('recover_password') }}"> Forgot your password?</a>
            <input type="password" class="form-control" name="password" id="exampleInputPassword1" required>
            @if ($errors->has('password'))
            <span class="error">
                {{ $errors->first('password') }}
            </span>
            @endif

        </div>
        <div class="form-group form-check">
            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} class="form-check-input"
                id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Remember me</label>
        </div>
        <button class="btn btn-lg button btn-block" type="submit">Sign in</button>

        <p class="sign-divider"> or Sign In with </p>
        <div class="btn-group sign-in-api d-flex justify-content-center" data-toggle="buttons">
            <label class="btn">
                <a class="btn" href="#">
                    <i class="fab fa-google"></i>
                    Google
                </a>
            </label>
            <label class="btn ">
                <a class="btn" href="#">
                    <i class="fab fa-facebook-square"></i>
                    Facebook
                </a>
            </label>
        </div>
    </div>
</form>
<div class="row new-user justify-content-center">
    <h6>Don't have an account yet?</h6>
    <a class="btn btn-lg button btn-block" href="{{ route('sign_up') }}">Sign Up</a>
    <footer class="copyright"> Copyright © ArtifactInk 2020 </footer>
</div>
@endsection

