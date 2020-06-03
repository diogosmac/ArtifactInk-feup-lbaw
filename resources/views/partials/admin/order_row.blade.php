<tr>
  <th class="align-middle" scope="row">{{ $order->id }}</th>
  <td class="align-middle">{{ $order->user->name }}</td>
  <td class="align-middle">
    <button type="button" class="btn button-secondary" data-toggle="modal" data-target="#viewOrder{{ $order->id }}Items">
      View Items
    </button>
    <!-- Modal -->
    <div class="modal fade" id="viewOrder{{ $order->id }}Items" tabindex="-1" role="dialog" aria-labelledby="viewItems{{ $order->id }}Modal" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="viewItems{{ $order->id }}Modal">View Items</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <table class="table table-striped text-center">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Photo</th>
                  <th scope="col">Name</th>
                  <th scope="col">Price</th>
                  <th scope="col">Quantity</th>
                  <th scope="col">Total</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($order->items as $item)
                <tr>
                  <th class="align-middle" scope="row">{{ $item->id }}</th>
                  <td class="align-middle col-2"><img class="img-fluid img-thumbnail" src="{{ asset('storage/img_product/' . $item->images->first()->link) }}"></td>
                  <td class="align-middle">{{ $item->name }}</td>
                  <td class="align-middle">{{ number_format($item->pivot->price, 2, '.', '') }}€</td>
                  <td class="align-middle">{{ $item->pivot->quantity }}</td>
                  <td class="align-middle">{{ number_format($item->pivot->price * $item->pivot->quantity, 2, '.', '') }}€</td>
                </tr>
                @endforeach
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
  <td class="align-middle">{{ $order->date }}</td>
  <td class="align-middle">{{ number_format($order->total, 2, '.', '') }}€</td>
  @if (!is_null($order->payment->id_cc))
  <td class="align-middle">Credit Card: {{ $order->payment->credit_card->name }}</td>
  @else
  <td class="align-middle">PayPal: {{ $order->payment->paypal->email }}</td>
  @endif
  <td class="align-middle">
    <form action="{{ route('admin.orders') }}" method="POST">
      @csrf
      @method('PUT')
      <input type="hidden" name="id" value="{{ $order->id }}">
      <div class="form-row">
        <div class="form-group col-md-7">
          <select required name="status" class="custom-select">
            <option {{ ($order->status == 'processing') ? 'selected' : '' }} value="processing">Processing</option>
            <option {{ ($order->status == 'shipped') ? 'selected' : '' }} value="shipped">Shipped</option>
            <option {{ ($order->status == 'received') ? 'selected' : '' }} value="received">Received</option>
          </select>
        </div>
        <div class="form-group col-md-5">
          <button type="submit" class="btn button-secondary">Update</button>
        </div>
      </div>
    </form>
  </td>
</tr>