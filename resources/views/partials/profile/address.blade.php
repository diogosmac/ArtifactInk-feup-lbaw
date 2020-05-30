<div class="d-flex justify-content-between align-items-center pb-3">
    <div>
        <span class="row profile-field">Address {{$loop}}</span>
        <span>
            {{ $address->country->name . ' - ' . $address->city}}
            <br>
            {{ $address->street . ' - Postal-Code: ' . $address->postal_code}}
        </span>
    </div>

    <div>
        <button type="button" class="btn button-secondary float-right" id="profile-edit-address-button-{{$loop}}"
            data-toggle="modal" data-target="#modalEditAdressFrom{{$loop}}">
            <i class="fas fa-pen pr-2"></i>Edit
        </button>

        <div>
            <button type="button" class="btn btn-link a_link pl-4" id="profile-edit-payment-method-button-{{$loop}}"
                data-toggle="modal" data-target="#modalDeleteAddressForm{{$loop}}">
                Delete
            </button>
        </div>
    </div>

     <!-- MODAL -->
     <div class="modal fade" id="modalDeleteAddressForm{{$loop}}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Are you sure you want to delete Address info?
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>


                <form action="{{route('profile.address')}}" method="post">
                    {{csrf_field()}}
                    {{ method_field('DELETE')}}
                    <input type="hidden" id="addressId" name="id" value="{{$address->id}}">


                    <div class="modal-footer">
                        <button type="button" class="btn btn-link a_link" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn button">Delete Address</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- MODAL -->
    <div class="modal fade edit-address-form" id="modalEditAdressFrom{{$loop}}" tabindex="-1" role="dialog"
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
                    {{csrf_field()}}
                    {{ method_field('PUT')}}
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" id="addressId" name="id" value="{{$address->id}}">
                            <label for="countryAdd">Country</label>
                            <select name="id_country" class="form-control" id="countryAdd" required>
                                @foreach($countries as $country)
                                @if($country->name === $address->country->name)
                                <option value="{{ old('id_country',$country->id) }}" selected> {{$country->name}}
                                </option>
                                @else
                                <option value="{{ old('id_country',$country->id) }}"> {{$country->name}} </option>
                                @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="cityEdit{{serialize($loop)}}">City</label>
                            <input type="text" class="form-control" id="cityEdit{{serialize($loop)}}" name="city"
                                value="{{ old('city',$address->city) }}" placeholder="Type your city name" required>
                        </div>

                        <div class="form-group">
                            <label for="streetEdit{{serialize($loop)}}">Street</label>
                            <input type="text" class="form-control" id="streetEdit{{serialize($loop)}}" name="street"
                                value="{{ old('street',$address->street) }}"
                                placeholder="Type your Street name - Number - Floor " required>
                        </div>

                        <div class="form-group">
                            <label for="postalCodeEdit{{serialize($loop)}}">Postal Code</label>
                            <input type="text" class="form-control" id="postalCodeEdit{{serialize($loop)}}"
                                name="postal_code" value="{{ old('postal_code',$address->postal_code) }}"
                                placeholder="Type your Postal Code" pattern="^[0-9]*-[0-9]*$" required>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link a_link" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn button">Update Address</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>