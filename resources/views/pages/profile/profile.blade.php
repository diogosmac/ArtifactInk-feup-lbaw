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
          <img class="rounded-circle" src="https://www.diretoriodigital.com.br/wp-content/uploads/2013/05/Team-Member-3.jpg" alt="Person" class="img-fluid">
        </div>

        <div class="d-none d-md-block my-4">
          <div class="row justify-content-between align-items-center">
            <div class="col-md-auto" id="profile-photo">
              <img class="rounded-circle" src="https://www.diretoriodigital.com.br/wp-content/uploads/2013/05/Team-Member-3.jpg" alt="Person" class="img-fluid">
            </div>

            <form>
              <div class="form-group">
                <label for="exampleFormControlFile1">Upload new photo</label>
                <input type="file" class="form-control-file" id="exampleFormControlFile1">
              </div>
            </form>

            <div class="col-md-auto d-flex flex-column" id="profile-edit-button">
              <button class="btn button-secondary" type="button">Update Profile</button>
              <button class="btn btn-link a_link" type="button">Delete Account</button>
            </div>
          </div>
        </div>

        <hr>

        <div class="row" id="profile-tag">
          <span>General</span>
        </div>
        <form>
          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="inputFirstName">First Name</label>
              <input type="text" class="form-control" id="inputFirstName" placeholder="First Name" value="John">
            </div>
            <div class="form-group col-md-4">
              <label for="inputLastName">Last Name</label>
              <input type="text" class="form-control" id="inputLastName" placeholder="Last Name" value="Doe">
            </div>
            <div class="form-group col-md-4">
              <label for="inputBirthday">Date of Birth</label>
              <input type="date" class="form-control" id="inputBirthday">
            </div>
          </div>
        </form>

        <hr>

        <div class="row" id="profile-tag">
          <span>Contact</span>
        </div>
        <form>
          <div class="form-row">
            <div class="form-group col-md-8">
              <label for="inputEmail">Email</label>
              <input type="email" class="form-control" id="inputFirstName" placeholder="Email" value="john@doe.co.uk">
            </div>
            <div class="form-group col-md-4">
              <label for="inputPhoneNumber">Phone Number</label>
              <input type="text" class="form-control" id="inputPhoneNumber" placeholder="Phone Number" value="+351 912345678">
            </div>
          </div>
        </form>

        <hr>

        <div class="row" id="profile-tag">
          <span>Change Password</span>
        </div>
        <form>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputNewPassword">New Password</label>
              <input type="password" class="form-control" id="inputNewPassword" placeholder="Password">
            </div>
            <div class="form-group col-md-6">
              <label for="inputRepeatPassword">Repeat Password</label>
              <input type="text" class="form-control" id="inputRepeatPassword" placeholder="Repeat Password">
            </div>
          </div>
        </form>

        <hr>

        <div class="row" id="profile-tag">
          <span>Billing</span>
        </div>
        <div class="col my-2" id="profile-card">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <span class="row profile-field">Credit Card</span>
              <span>MasterCard ending in XXXX</span>
            </div>
            <button class="btn button-secondary">Edit Card</button>
          </div>
        </div>

        <div class="col my-2" id="profile-address">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <span class="row profile-field">Address 1</span>
              <span>Address St., 123 - 6º Esq. Frente</span>
            </div>
            <button class="btn button-secondary">Edit Adress</button>
          </div>
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <span class="row profile-field">Address 2</span>
              <span>Avenida de Sérgio Sobral Nunes, 2020</span>
            </div>
            <button class="btn button-secondary">Edit Adress</button>
          </div>
        </div>

        <div class="row justify-content-center d-md-none my-3">
          <button class="btn button-secondary" type="button">Edit Profile</button>
          <button class="btn btn-link a_link" type="button">Delete Account</button>
        </div>
      </div>
    </section>
  </section>
@endsection
