@extends('layouts.profile')

@section('title', ' - Edit Profile')

@section('info')
<section id="profile">
  <section id="profile-info">
    <div class="col">
      <form action="{{ route('profile.home')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        {{ method_field('PUT')}}
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
            <div class="form-group">
              <label for="exampleFormControlFile1">Upload new photo</label>
              <input type="file" accept="image/*" class="form-control-file" id="exampleFormControlFile1" name="picture">
            </div>

            <button class="btn button-secondary" type="submit">Update Profile</button>

          </div>
        </div>

        <hr>

        <div class="row" id="profile-tag">
          <span>General</span>
        </div>


        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="inputFirstName">First Name</label>
            <input type="text" class="form-control" id="inputFirstName" placeholder="First Name"
              name="firstName" value="{{ old('firstName',explode(' ', trim($userInfo['name']))[0]) }}">
          </div>
          <div class="form-group col-md-4">
            <label for="inputLastName">Last Name</label>
            <input type="text" class="form-control" id="inputLastName" placeholder="Last Name"
              name="lastName" value="{{ old('lastName',explode(' ', trim($userInfo['name']))[1]) }}">
          </div>
          <div class="form-group col-md-4">
            <label for="inputBirthday">Date of Birth</label>
            <input type="date" class="form-control" id="inputBirthday" name="date_of_birth" value="{{ old('date_of_birth',$userInfo['date_of_birth']) }}">
          </div>
        </div>


        <hr>

        <div class="row" id="profile-tag">
          <span>Contact</span>
        </div>

        <div class="form-row">
          <div class="form-group col-md-8">
            <label for="inputEmail">Email</label>
            <input type="email" class="form-control" id="inputFirstName" placeholder="Email"
              name="email" value="{{ old('email',$userInfo['email']) }}">
          </div>
          <div class="form-group col-md-4">
            <label for="inputPhoneNumber">Phone Number</label>
            <input type="text" class="form-control" id="inputPhoneNumber" placeholder="Phone Number"
              name="phone" value="{{ old('phone', $userInfo['phone']) }}">
          </div>
        </div>


        <hr>

        <div class="row" id="profile-tag">
          <span>Change Password</span>
        </div>


        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputNewPassword">New Password</label>
            <input type="password" class="form-control" id="inputNewPassword" placeholder="Password" name="password" >
          </div>
          <div class="form-group col-md-6">
            <label for="inputRepeatPassword">Repeat Password</label>
            <input type="password" class="form-control" id="inputRepeatPassword" placeholder="Repeat Password"  name="passwordConfirm" >
          </div>
        </div>

      </form>
    </div>
  </section>
</section>
@endsection