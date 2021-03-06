<tr class='sale-add-product-row' product-id="{{ $product->id }}">
  <th class="align-middle" scope="row">{{ $product->id }}</th>
  <td class="align-middle col-2"><img class="img-fluid img-thumbnail" src="{{ asset('storage/img_product/' . $product->images->first()->link) }}"></td>
  <td class="align-middle">{{ $product->name }}</td>
  <td class="align-middle">{{ $product->price }}€</td>
  <td class="align-middle">
    <button product-id="{{ $product->id }}" type="button" class="btn button-secondary add-item-button">Add</button>
  </td>
</tr>