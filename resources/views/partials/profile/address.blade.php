<div class="d-flex justify-content-between align-items-center pb-3">
    <div>
        <span class="row profile-field">Address {{$loop}}</span>
        <span>
            {{ $address->country->name . ' - ' . $address->city}}
            <br>
            {{ $address->street . ' - Postal-Code: ' . $address->postal_code}}
        </span>
    </div>

    <button type="button" class="btn button-secondary float-right" id="profile-edit-address-button-{{$loop}}"
        data-toggle="modal" data-target="#modalEditAdressFrom{{$loop}}">
        <i class="fas fa-pen pr-2"></i>Edit
    </button>

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
                            <label for="countryAdd">Country</label>
                            <select name="country" class="form-control" id="countryAdd" >
                                @foreach($countries as $country)
                                    @if($country->name === $address->country->name)
                                        <option value="{{$country->id}}" selected> {{$country->name}}</option>
                                    @else 
                                        <option value="{{$country->id}}"> {{$country->name}} </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="cityAdd">City</label>
                            <input type="text" class="form-control" id="cityAdd" name="city" value="{{ $address->city }}"
                                placeholder="Type your city name">
                        </div>

                        <div class="form-group">
                            <label for="streetAdd">Street</label>
                            <input type="text" class="form-control" id="streetAdd" name="street" value="{{ $address->street }}"
                                placeholder="Type your Street name - Number - Floor ">
                        </div>

                        <div class="form-group">
                            <label for="postalCodeAdd">Postal Code</label>
                            <input type="text" class="form-control" id="postalCodeAdd" name="postal_code" value="{{ $address->postal_code }}"
                                placeholder="Type your city name" pattern="^[0-9]*-[0-9]*$">
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