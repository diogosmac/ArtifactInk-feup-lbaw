@extends('layouts.auth')

@section('content')
<form class="form-signin " method="POST" action="#">
    <a href="{{ url('/home') }}">
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
            <a id="recover-back" href="{{ route('login') }}"> Back</a>
        </div>

    </div>
</form>
<div class="row new-user justify-content-center">
    <footer class="copyright"> Copyright © ArtifactInk 2020 </footer>
</div>
@endsection