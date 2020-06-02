@extends('layouts.admin')

@section('title', ' Admin - Info')

@section('content')
<main class="col-md-9 ml-sm-auto col-lg-10 px-4">
  <div class="container">

    <div class="mb-4 d-flex justify-content-between align-items-center flex-wrap border-bottom mt-2">
      <h1>General Information</h1>
      <button type="submit" form="edit-info" value="Submit" class="btn button">
        Edit Information
      </button>
    </div>

    <form action="{{ route('admin.info') }}" method="POST" id="edit-info">
      @csrf
      @method('PUT')
      <div class="form-row">
        <div class="form-group col-md-3">
          <label for="inputTitle">Country</label>
          <select required name="id_country" class="form-control" id="countryAdd" required>
            @foreach($countries as $country)
              <option {{ ($country->id == $store->address->country->id) ? 'selected' : '' }} value="{{ $country->id }}">{{$country->name}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group col-md-3">
          <label for="inputPrice">City</label>
          <input required name="city" type="text" class="form-control" value="{{ $store->address->city }}">
        </div>
        <div class="form-group col-md-3">
          <label for="inputQuantity">Street</label>
          <input required name="street" type="text" class="form-control" value="{{ $store->address->street }}">
        </div>
        <div class="form-group col-md-3">
          <label for="inputQuantity">Postal Code</label>
          <input required name="postal_code" type="text" class="form-control" value="{{ $store->address->postal_code }}">
        </div>
      </div>

      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputPrice">Email</label>
          <input required name="email" class="form-control" type="email" value="{{ $store->email }}">
        </div>
        <div class="form-group col-md-6">
          <label for="inputQuantity">Phone</label>
          <input required name="phone" class="form-control" type="text" value="{{ $store->phone }}">
        </div>
      </div>

      <div class="form-row">
        <div class="form-group col-md-12">
          <label for="inputAddress">About Us</label>
          <textarea required name="about_us" class="form-control" rows="4">{{ $store->about_us }}</textarea>
        </div>
      </div>

      <div class="form-row">
        <div class="form-group col-md-12">
          <label for="inputAddress">Payments and Shipment</label>
          <textarea required name="payments_shipment" class="form-control" rows="4">{{ $store->payments_shipment }}</textarea>
        </div>
      </div>

      <div class="form-row">
        <div class="form-group col-md-12">
          <label for="inputAddress">Returns and Replacements</label>
          <textarea required name="returns" class="form-control" rows="4">{{ $store->returns }}</textarea>
        </div>
      </div>

      <div class="form-row">
        <div class="form-group col-md-12">
          <label for="inputAddress">Warranty</label>
          <textarea required name="warranty" class="form-control" rows="4">{{ $store->warranty }}</textarea>
        </div>
      </div>

    </form>

  </div>
</main>

{{-- Success Alert --}}
@if(session('status'))
  <div class="alert alert-success alert-dismissible fade show fixed-top mx-auto" style="max-width: 40em;" role="alert">
    {{session('status')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif

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

@endsection