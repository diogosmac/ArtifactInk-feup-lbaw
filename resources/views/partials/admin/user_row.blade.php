<tr class="user-row" user-id="{{ $user->id }}">
  <th class="align-middle" scope="row">{{ $user->id }}</th>
  <td class="align-middle col-1"><img class="img-fluid img-thumbnail" src="{{ asset('storage/img_user/' . $user->profilePicture->link) }}"></td>
  <td class="align-middle">{{ $user->name }}</td>
  <td class="align-middle">{{ $user->email }}</td>
  <td class="align-middle">{{ $user->phone }}</td>
  <td class="align-middle">{{ $user->date_of_birth }}</td>
  <td class="align-middle">
    <button type="button" class="btn button-secondary" data-toggle="modal" data-target="#viewUser{{ $user->id }}">
      View Billing
    </button>
    <!-- Modal -->
    <div class="modal fade" id="viewUser{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="viewUser{{ $user->id }}Modal" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="viewUser{{ $user->id }}Modal">Billing Information</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <table class="table table-striped text-center">
              <thead>
                <tr>
                  @foreach($user->payment_methods as $payment)
                  @if(!is_null($payment->id_cc))
                  <th scope="col">Credit Card</th>
                  @else
                  <th scope="col">PayPal</th>
                  @endif
                  @endforeach
                  @foreach($user->addresses as $address)
                  <th scope="col">Address</th>
                  @endforeach
                </tr>
              </thead>
              <tbody>
                <tr>
                @foreach($user->payment_methods as $payment)
                  @if(!is_null($payment->id_cc))
                  <td class="align-middle">Name: {{ $payment->credit_card->name }}, Expiration: {{ $payment->credit_card->expiration }}</td>
                  @else
                  <td class="align-middle">{{ $payment->paypal->email }}</td>
                  @endif
                  @endforeach
                  @foreach($user->addresses as $address)
                  <td class="align-middle">{{ $address->street }}, {{ $address->city }} {{ $address->postal_code }}, {{ $address->country->name }}</td>
                  @endforeach
                </tr>
              </tbody>
            </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-link a_link" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  </td>
  <td class="align-middle">
    @if($user->is_banned)
    <button type="button" class="btn btn-link a_link unban-button" user-id="{{ $user->id }}">
      Unban
    </button>
    @else
    <button type="button" class="btn btn-link a_link ban-button" user-id="{{ $user->id }}">
      Ban
    </button>
    @endif
  </td>
</tr>