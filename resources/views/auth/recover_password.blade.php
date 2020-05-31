@extends('layouts.auth')

@section('title', ' - Recover Password')

@section('content')
@if(!Session::has('sent_email'))
<form class="form-signin " method="POST" action="/recover_password">
    @csrf
    <a href="{{ url('/') }}">
        <img class="mb-4" src="{{ asset('/assets/artifact_ink_letters_white.png') }}" alt="ArtifactInk" width="300">
    </a>
    <div class="sign-box">
        <h1 class="h3 mb-3 font-weight-normal">Recover Password</h1>
        <div class="form-group email-input">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required autofocus>
        </div>
        <div class="d-flex justify-content-between">
            <button id="recover-button" class="btn btn-lg button btn-block" type="submit">Recover</button>
            <a id="recover-back" href="{{ route('sign_in') }}"> Back</a>
        </div>
    </div>
</form>

@else 
<div class="form-signin">

    <a href="{{ url('/') }}">
        <img class="mb-4" src="{{ asset('/assets/artifact_ink_letters_white.png') }}" alt="ArtifactInk" width="300">
    </a>

    <div class="sign-box ">
        
        <div class="d-flex justify-content-center">
             <h1 class="h3 mb-3 font-weight-normal">Successful Request</h1>
        </div>
    
        <div class="d-flex justify-content-center">
            {{Session::get('status')}}
        </div>

        <div class="d-flex justify-content-between pt-4">
            <a id="recover-button" class="btn btn-lg button btn-block" href="{{ route('sign_in') }}">Sign In</button>
            <a id="recover-back" href="/"> Back to the Website</a>
        </div>
    </div>

</div>
@endif
<div class="row new-user justify-content-center">
    <footer class="copyright"> Copyright © ArtifactInk 2020 </footer>
</div>
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