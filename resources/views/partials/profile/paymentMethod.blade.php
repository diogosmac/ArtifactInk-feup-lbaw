<div class="d-flex justify-content-between align-items-center pb-3">
    <div>
        <span class="row profile-field">Payment Method {{$loop}}</span>
        @if($paymentMethod->id_cc != null)
        <span>
            Credit Card
            <br>
            {{'Holder: ' . $paymentMethod->credit_card->name . ' Ending in ' .  substr ($paymentMethod->credit_card->number, -4) }}
            <br>
            {{'Expiring: ' . $paymentMethod->credit_card->expiration }}
        </span>
    </div>

    <button type="button" class="btn button-secondary float-right" id="profile-edit-payment-method-button-{{$loop}}"
        data-toggle="modal" data-target="#modalEditCreditCardForm{{$loop}}">
        <i class="fas fa-pen pr-2"></i>Edit
    </button>

     <!-- MODAL -->
     <div class="modal fade" id="modalEditCreditCardForm{{$loop}}" tabindex="-1" role="dialog"
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
                    {{ method_field('PUT')}}
                    <input type="hidden" id="paymentMethodId" name="id" value="{{$paymentMethod->id_cc}}">
                    <div class="form-group">
                      <label for="ccNameEdit{{$loop}}">Cardholder name: </label>
                      <input type="text" class="form-control" id="ccNameEdit{{$loop}}" name="name" value="{{ old('name',$paymentMethod->credit_card->name) }}" required>
                    </div>

                    <div class="form-group">
                      <label for="ccNumberEdit{{$loop}}">Card Number: </label>
                      <input type="text" class="form-control" id="ccNumberEdit{{$loop}}" name="number" value="{{ old('number') }}" required>
                    </div>

                    <div class="form-group">
                      <label for="ccDateEdit{{$loop}}">Expiry Date: </label>
                      <input type="date" class="form-control" id="ccDateEdit{{$loop}}" name="expiration" value="{{ old('expiration',$paymentMethod->credit_card->expiration) }}" required>
                    </div>

                    <div class="form-group">
                      <label for="ccCVVEdit{{$loop}}">CVC/CCV: </label>
                      <input type="text" class="form-control" id="ccCVVEdit{{$loop}}" name="cvv" value="{{ old('cvv') }}" required>
                    </div>
                    </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-link a_link" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn button">Edit Credit Card Info</button>
                </div>
                </form>
              </div>
            </div>
          </div>

    @else
    <span>PayPayl
        <br>
        {{'Email associated: ' . $paymentMethod->paypal->email}}
    </span>

    </div>

    <button type="button" class="btn button-secondary float-right" id="profile-edit-payment-method-button-{{$loop}}"
        data-toggle="modal" data-target="#modalEditPaypalForm">
        <i class="fas fa-pen pr-2"></i>Edit
    </button>

    <!-- MODAL -->
    <div class="modal fade" id="modalEditPaypalForm" tabindex="-1" role="dialog"
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
                    {{ method_field('PUT')}}
                    <input type="hidden" id="paymentMethodId" name="id" value="{{$paymentMethod->id_pp}}">
                    <div class="form-group">
                      <label for="ppEmailEdit{{$loop}}">Paypal email: </label>
                      <input type="email" class="form-control" id="ppNameEdit{{$loop}}" name="email" value="{{ $paymentMethod->paypal->email }}" required>
                    </div>
                  </div>

                <div class="modal-footer">
                  <button type="button" class="btn btn-link a_link" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn button">Edit Paypal Info</button>
                </div>
                </form>

                

              </div>
            </div>
          </div>

    @endif

</div>