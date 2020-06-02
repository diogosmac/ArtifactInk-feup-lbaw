<tr class="checkout-item-list" data-id="{{ $item->id }}">
    <td scope="row">
        <a href="{{ url('/product/' . $item->id) }}" >
            <img src=" {{ asset('storage/img_product/' . $picture->link) }}" alt="">
        </a>
    </td>
    <th colspan="0">
        <a href="{{ url('/product/' . $item->id) }}">
            {{ $item->name }}
        </a>
    </th>
    <?php
        $sales = $item->sales;
        $currentSale = 0;
        $price = $item->price;
        foreach ($sales as $sale) {
            $new_sale = 0;
            if ($sale->type == 'percentage') {
                $new_sale = 0.01 * $sale->percentage_amount * $price;
            } else if ($sale->type == 'fixed') {
                $new_sale = $sale->fixed_amount;
            }
            if ($new_sale > $currentSale) {
                $currentSale = $new_sale;
            }
        }
        $price = round($price - $currentSale, 2);
    ?>
    
    <?php // PARA MOSTRAR O PREÇO ANTIGO ?>
    @if ($price == $item->price)
        <td colspan="0" class="item-price">{{ $item->price }}</td>
    @else
        <td colspan="0">
            <span class="old-price"> {{ $item->price}} </span>
            <span class="item-price"> {{ $price }} </span>
        </td>
    @endif
    
    <?php // PARA NÃO MOSTRAR O PREÇO ANTIGO ?>
    {{-- <td colspan="0" class="item-price"> {{ $price }} </td> --}}

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