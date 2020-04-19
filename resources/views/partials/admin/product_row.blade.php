<tr>
  <th class="align-middle" scope="row">{{ $product->id }}</th>
  <td class="align-middle col-1"><img class="img-fluid img-thumbnail" src="{{ asset('storage/img_product/' . $product->img) }}"></td>
  <td class="align-middle">{{ $product->name }}</td>
  <td class="align-middle">{{ $product->price }}</td>
  <td class="align-middle">{{ $product->category }}</td>
  <td class="align-middle">{{ $product->subcategory }}</td>
  <td class="align-middle">{{ $product->stock }}</td>
  <td class="align-middle">
    <button type="button" class="btn button-secondary mx-2" onclick="location.href='{{ url('/admin/products/' . $product->id . '/edit') }}'">Edit</button>
    <button type="button" class="btn btn-link a_link mx-2">Archive</button>
  </td>
</tr>