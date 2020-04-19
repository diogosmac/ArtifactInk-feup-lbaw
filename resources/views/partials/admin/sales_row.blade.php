<tr>
  <th class="align-middle" scope="row">{{ $sale->id }}</th>
  <td class="align-middle">{{ $sale->name }}</td>
  <td class="align-middle">{{ $sale->startTimestamp }}</td>
  <td class="align-middle">{{ $sale->endTimestamp }}</td>
  <td class="align-middle">
    <button type="button" class="btn button-secondary" onclick="location.href='{{ url('/admin/sales/' . $sale->id . '/edit') }}'">Edit</button>
    <button type="button" class="btn btn-link a_link">Remove</button>
  </td>
</tr>