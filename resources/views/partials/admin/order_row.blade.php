<tr>
  <th class="align-middle" scope="row">{{ $order->id }}</th>
  <td class="align-middle">{{ $order->user }}</td>
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
                    <td class="align-middle col-2"><img class="img-fluid img-thumbnail" src="{{ asset('storage/img_product/' . $item->img) }}"></td>
                    <td class="align-middle">{{ $item->name }}</td>
                    <td class="align-middle">{{ $item->price }}€</td>
                    <td class="align-middle">{{ $item->quantity }}</td>
                    <td class="align-middle">{{ $item->totalPrice }}€</td>
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
  <td class="align-middle">{{ $order->timestamp }}</td>
  <td class="align-middle">{{ $order->total }}€</td>
  <td class="align-middle">{{ $order->paymentMethod }}</td>
  <td class="align-middle">
    <select class="custom-select">
      <option {{ ($order->status == 'Processing') ? 'selected' : '' }} value="processing">Processing</option>
      <option {{ ($order->status == 'Shipped') ? 'selected' : '' }} value="shipped">Shipped</option>
      <option {{ ($order->status == 'Arrived') ? 'selected' : '' }} value="arrived">Arrived</option>
    </select>
  </td>
</tr>