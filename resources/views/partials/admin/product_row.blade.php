<tr class="product-row" product-id="{{ $product->id }}">
  <th class="align-middle" scope="row">{{ $product->id }}</th>
  <td class="align-middle col-1"><img class="img-fluid img-thumbnail" src="{{ asset('storage/img_product/' . $product->images->first()->link) }}"></td>
  <td class="align-middle">{{ $product->name }}</td>
  <td class="align-middle">{{ $product->price }}€</td>
  <td class="align-middle">{{ $product->category->parent->name }}</td>
  <td class="align-middle">{{ $product->category->name }}</td>
  <td class="align-middle">{{ $product->stock }}</td>
  <td class="align-middle">
  {{$product->status}}
    <button type="button" class="btn button-secondary mx-2" onclick="location.href='{{ route('admin.products.edit', ['id' => $product->id]) }}'">Edit</button>
    @if ($product->status == 'active')
    <button type="button" product-id="{{ $product->id }}" class="btn btn-link a_link mx-2 archive-button">Archive</button>
    @else
    <button type="button" product-id="{{ $product->id }}" class="btn btn-link a_link mx-2 unarchive-button">Unarchive</button>
    @endif
  </td>
</tr>