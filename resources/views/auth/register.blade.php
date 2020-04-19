@extends('layouts.auth')

@section('content')
<form class="form-signin " method="POST" action="{{ route('register') }}">
  {{ csrf_field() }}

  <a href="{{ url('/home') }}">
    <img class="mb-4" src="{{ asset('/assets/artifact_ink_letters_white.png') }}" alt="ArtifactInk" width="300">
  </a>
  <div class="sign-box">
    <h1 class="h3 mb-3 font-weight-normal">Sign Up</h1>
    <div class="form-group input">
      <label for="exampleInputName">Name</label>
      <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="exampleInputName" aria-describedby="emailHelp" required autofocus>
      @if ($errors->has('name'))
      <span class="error">
        {{ $errors->first('name') }}
      </span>
      @endif

    </div>
    <div class="form-group email-input">
      <label for="exampleInputEmail1">Email address</label>
      <input type="email" name="email" value="{{ old('email') }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
      @if ($errors->has('email'))
      <span class="error">
        {{ $errors->first('email') }}
      </span>
      @endif

      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group password-input">
      <label for="exampleInputPassword1">Password</label>
      <input type="password" name="password" class="form-control" id="exampleInputPassword1" required>
      @if ($errors->has('password'))
      <span class="error">
        {{ $errors->first('password') }}
      </span>
      @endif

    </div>

    <div class="form-group password-input">
      <label for="exampleInputPassword2">Confirm Password</label>
      <input type="password" name="password_confirmation" class="form-control" id="exampleInputPassword2" required>
    </div>

    <div class="form-group date-input"> 
      <label for="inputBirthday">Date of Birth</label>
      <input type="date" name="date_of_birth" class="form-control" id="inputBirthday" required>
    </div>

    <button class="btn btn-lg button btn-block" type="submit">Sign Up</button>
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
  <h6>Already have an account?</h6>
  <a class="btn btn-lg button btn-block" href="{{ route('login') }}">Sign In</a>
  <footer class="copyright"> Copyright © ArtifactInk 2020 </footer>
</div>
@endsection