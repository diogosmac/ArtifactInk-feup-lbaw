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
      </fieldset>

      <hr>

      <div class="row d-flex justify-content-between mr-3" id="profile-tag">

        <div>
          <span>Address </span>
        </div>

        <div>
          <button type="button" class="btn button float-right" id="profile-add-address-button" data-toggle="modal"
            data-target="#modalAddAdressFrom">
            <i class="fas fa-home"></i> New
          </button>

          <!-- MODAL -->
          <div class="modal fade" id="modalAddAdressFrom" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle"> Add New Address </h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="{{route('profile.address') }}" method="post">
                  <div class="modal-body">
                    {{csrf_field()}}
                    {{ method_field('POST')}}
                    <div class="form-group">
                      <label for="countryAdd">Country: </label>
                      <select name="id_country" class="form-control" id="countryAdd" required>
                        @foreach($countries as $country)
                          <option value="{{ old('id_country',$country->id) }}">{{$country->name}}</option>
                        @endforeach
                      </select>

                    </div>

                    <div class="form-group">
                      <label for="cityAdd">City: </label>
                      <input type="text" class="form-control" id="cityAdd" name="city" value="{{ old('city') }}"
                        placeholder="Type your city name" required>
                    </div>

                    <div class="form-group">
                      <label for="streetAdd">Street: </label>
                      <input type="text" class="form-control" id="streetAdd" name="street" value="{{ old('street') }}"
                        placeholder="Type your Street name - Number - Floor " required>
                    </div>

                    <div class="form-group">
                      <label for="postalCodeAdd">Postal Code: </label>
                      <input type="text" class="form-control" id="postalCodeAdd" name="postal_code" value="{{ old('postal_code') }}"
                        placeholder="Type your city name"  pattern="^[0-9]*-[0-9]*$" required>
                    </div>

                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-link a_link" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn button">Add New Address</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

      </div>

      <div class="col my-2" id="profile-address">
        @foreach($addresses as $address)
          @include('partials.profile.address', ['address' => $address, 'loop' => $loop->iteration])
        @endforeach
      </div>


      <hr>

      <div class="row d-flex justify-content-between mr-3" id="profile-tag">
        <div>
          <span>Payment Method</span>
        </div>

        <div>

          <button type="button" class="btn button float-right" id="profile-add-payment-method-button"
            data-toggle="modal" data-target="#modalAddPaypalForm">
            <i class="fab fa-paypal"></i> New
          </button>

          <button type="button" class="btn button float-right mr-2" id="profile-add-payment-method-button"
            data-toggle="modal" data-target="#modalAddCreditCardForm">
            <i class="fas fa-credit-card"></i> New
          </button>


          <!-- MODAL -->
          <div class="modal fade" id="modalAddPaypalForm" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Add New Paypal</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  
                <form action="{{route('profile.paypal')}}" method="post">
                    {{csrf_field()}}
                    {{ method_field('POST')}}
                    <div class="form-group">
                      <label for="ppEmail">Paypal email: </label>
                      <input type="email" class="form-control" id="ppName" name="email" value="{{old('email')}}" required>
                    </div>
                    </div>

                <div class="modal-footer">
                  <button type="button" class="btn btn-link a_link" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn button">Add New Paypal Method</button>
                </div>
                </form>

              

              </div>
            </div>
          </div>

          <!-- MODAL -->
          <div class="modal fade" id="modalAddCreditCardForm" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Add New Credit Card</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  
                <form action="{{route('profile.credit_card')}}" method="post">
                    {{csrf_field()}}
                    {{ method_field('POST')}}
                    <div class="form-group">
                      <label for="ccName">Cardholder name: </label>
                      <input type="text" class="form-control" id="ccName" name="name" value="{{old('name')}}" required>
                    </div>

                    <div class="form-group">
                      <label for="ccNumber">Card Number: </label>
                      <input type="text" class="form-control" id="ccNumber" name="number" value="{{old('number')}}" required>
                    </div>

                    <div class="form-group">
                      <label for="ccDate">Expiry Date: </label>
                      <input type="date" class="form-control" id="ccDate"  name="expiration" value="{{old('expiration')}}" required>
                    </div>

                    <div class="form-group">
                      <label for="ccCVV">CVC/CCV: </label>
                      <input type="text" class="form-control" id="ccCVV" name="cvv" value="{{old('cvv')}}" required>
                    </div>

                    </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-link a_link" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn button">Add New Credit Card</button>
                </div>
                </form>

              </div>
            </div>
          </div>


        </div>
      </div>



      <div class="col my-2" id="profile-card">
        @foreach($paymentMethods as $paymentMethod)
        @include('partials.profile.paymentMethod', ['paymentMethod' => $paymentMethod, 'loop' => $loop->iteration])
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