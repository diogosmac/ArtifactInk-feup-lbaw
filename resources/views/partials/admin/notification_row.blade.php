<tr id="notification{{$notification->id}}" class="admin-notification" notification_id="{{ $notification->id }}">
  <th class="align-middle" scope="row">{{ $notification->id }}</th>
  @if($detail instanceof App\OutOfStockNotification)
  <td class="align-middle">Out of Stock</td>
  @else
  <td class="align-middle">Reported Review</td>
  @endif
  <td class="align-middle">{{ $notification->body }}</td>
  <td class="align-middle">{{ date_format(date_create($notification->sent),"Y-m-d H:i:s") }}</td>
  @if($detail instanceof App\OutOfStockNotification)
  <td><button class="btn button-secondary" onclick="location.href='{{ route('admin.products.edit', ['id' => $notification->out_of_stock_notification->id_item]) }}'">View</a></td>
  @else
  <td><button class="btn button-secondary" onclick="location.href='{{ route('admin.reviews') }}'">View</a></td> <!--['id' => $notification->report_notification->id_review]-->
  @endif
  <td><button class="btn btn-link a_link clear-notification-button">Clear</button></td>
</tr>