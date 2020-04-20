<tr class="checkout-item-list" data-id="{{ $item->id }}">
    <td scope="row">
        <a href="item-page">
            <img src=" {{ asset('storage/img_product/' . $picture->link) }}" alt="">
        </a>
    </td>
    <th colspan="0">
        <a href="item-page">
            {{ $item->name }}
        </a>
    </th>
    <td colspan="0" class="item-price">{{ $item->price }}</td>
    <td colspan="0">
        <button type="button" class="btn btn-link a_link sub-button">
            <i class="fas fa-minus"></i>
        </button>
        <span class="item-quant">{{ $item->pivot->quantity }}</span>
        <button type="button" class="btn btn-link a_link add-button">
            <i class="fas fa-plus"></i>
        </button>
    </td>
    <td colspan="0">
        <button type="button" class="btn btn-link a_link rmv-button">
            <i class="fas fa-trash-alt"></i>
        </button>
    </td>
    <td colspan="0" class="item-value">
    </td>
</tr>