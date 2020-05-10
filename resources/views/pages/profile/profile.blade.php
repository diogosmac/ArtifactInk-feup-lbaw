@extends('layouts.profile')

@section('title', ' - Profile')

@section('info')
<section id="profile">
  <section id="profile-info">
    <div class="col">

      <div class="row" id="profile-tag">
        <span>Photo</span>
      </div>

      <div class="row align-content-center d-md-none">
        <img class="rounded-circle" src="{{ asset('storage/img_user/' . $profilePicture->link) }}" alt="Person"
          class="img-fluid">

      </div>

      <div class="d-none d-md-block my-4">
        <div class="row justify-content-between align-items-center">
          <div class="col-md-auto" id="profile-photo">
            <img class="rounded-circle" src="{{ asset('storage/img_user/' . $profilePicture->link) }}" alt="Person"
              class="img-fluid">
          </div>

          <div class="col-md-auto d-flex flex-column" id="profile-edit-button">
            <a class="btn button-secondary" type="button" href=" {{ route('profile.edit') }} ">Edit Profile</a>
            <button class="btn btn-link a_link" type="button">Delete Account</button>
          </div>
        </div>
      </div>

      <hr>

      <div class="row" id="profile-tag">
        <span>General</span>
      </div>
      <fieldset disabled="disabled">
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="inputFirstName">First Name</label>
            <input type="text" class="form-control" id="inputFirstName" placeholder="First Name"
              value="{{  explode(' ', trim($userInfo['name']))[0] }}">
          </div>
          <div class="form-group col-md-4">
            <label for="inputLastName">Last Name</label>
            <input type="text" class="form-control" id="inputLastName" placeholder="Last Name"
              value="{{ explode(' ', trim($userInfo['name']))[1] }}">
          </div>
          <div class="form-group col-md-4">
            <label for="inputBirthday">Date of Birth</label>
            <input type="date" class="form-control" id="inputBirthday" value="{{ $userInfo['date_of_birth'] }}">
          </div>
        </div>
        <fieldset>

      <hr>

      <div class="row" id="profile-tag">
        <span>Contact</span>
      </div>
        <div class="form-row">
          <div class="form-group col-md-8">
            <label for="inputEmail">Email</label>
            <input type="email" class="form-control" id="inputFirstName" placeholder="Email"
              value="{{ $userInfo['email'] }}">
          </div>
          <div class="form-group col-md-4">
            <label for="inputPhoneNumber">Phone Number</label>
            <input type="text" class="form-control" id="inputPhoneNumber" placeholder="Phone Number" 
              value="{{ $userInfo['phone'] }}">
          </div>
        </div>

      <hr>


      <div class="row" id="profile-tag">
        <span>Billing</span>
      </div>

      <div class="col my-2" id="profile-card">
        @foreach($paymentMethods as $paymentMethod)
          @include('partials.profile.paymentMethod', ['paymentMethod' => $paymentMethod, 'loop' => $loop->iteration])
        @endforeach
      </div>

      <div class="col my-2" id="profile-address">
        @foreach($addresses as $address)
          @include('partials.profile.address', ['address' => $address, 'loop' => $loop->iteration])
        @endforeach
      </div>

      <div class="row justify-content-center d-md-none my-3">
        <a class="btn button-secondary" type="button" href=" {{ route('profile.edit') }} ">Edit Profile</a>
        <button class="btn btn-link a_link" type="button">Delete Account</button>
      </div>
    </div>
  </section>
</section>
@endsection