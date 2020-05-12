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
                    <div class="form-group">
                      <label for="ccName">Cardholder name: </label>
                      <input type="text" class="form-control" id="ccName" value="{{ $paymentMethod->credit_card->name }}">
                    </div>

                    <div class="form-group">
                      <label for="ccNumber">Card Number: </label>
                      <input type="text" class="form-control" id="ccNumber" value="{{ $paymentMethod->credit_card->number }}">
                    </div>

                    <div class="form-group">
                      <label for="ccDate">Expiry Date: </label>
                      <input type="date" class="form-control" id="ccDate" value="{{ $paymentMethod->credit_card->expiration }}">
                    </div>

                    <div class="form-group">
                      <label for="ccCVV">CVC/CCV: </label>
                      <input type="text" class="form-control" id="ccCVV" >
                    </div>

                </form>

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-link a_link" data-dismiss="modal">Close</button>
                  <button type="button" class="btn button">Add New Credit Card</button>
                </div>
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
                  
                <form action="{{route('profile.credit_card')}}" method="post">
                    {{csrf_field()}}
                    {{ method_field('PUT')}}
                    <div class="form-group">
                      <label for="ppEmail">Paypal email: </label>
                      <input type="email" class="form-control" id="ppName" value="{{ $paymentMethod->paypal->email }}">
                    </div>
                </form>

                </div>

                <div class="modal-footer">
                  <button type="button" class="btn btn-link a_link" data-dismiss="modal">Close</button>
                  <button type="button" class="btn button">Add New Paypal Method</button>
                </div>

              </div>
            </div>
          </div>

    @endif

</div>