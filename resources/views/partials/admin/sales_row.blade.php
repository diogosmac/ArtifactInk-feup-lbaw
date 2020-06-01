<tr>
  <th class="align-middle" scope="row">{{ $sale->id }}</th>
  <td class="align-middle">{{ $sale->name }}</td>
  <td class="align-middle">{{ ucfirst($sale->type) }}</td>
  @if(!is_null($sale->fixed_amount))
  <td class="align-middle">{{ $sale->fixed_amount }}€</td>
  @else
  <td class="align-middle">{{ $sale->percentage_amount }}%</td>
  @endif
  <td class="align-middle">{{ $sale->start }}</td>
  <td class="align-middle">{{ $sale->end }}</td>
  <td class="align-middle">
    <button type="button" class="btn button-secondary" onclick="location.href='{{ url('/admin/sales/' . $sale->id . '/edit') }}'">Edit</button>
    <button type="button" class="btn btn-link a_link">Remove</button>
  </td>
</tr>