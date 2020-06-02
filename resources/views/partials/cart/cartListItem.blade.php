<a class="item-link-cart" href="{{ url('/product/' . $cart_item->id) }}">
  <li class="cart-item-list list-group-item d-flex justify-content-between align-items-center">
    <span>
      <img class="cart-item-list-img" src="{{ asset('storage/img_product/' . $cart_picture->link) }}"
        alt="{{ $cart_item->name }}">
    </span>
    <h5 class="cart-item-list-name"> {{ $cart_item->name }} </h5>
    <?php
        $sales = $cart_item->sales;
        $currentSale = 0;
        $price = $cart_item->price;
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
    <h6>
        @if ($price != $cart_item->price)
        <span class="old-price"> {{ $cart_item->price }} </span>
        @endif
        <span class="cart-item-list-price"> {{ $price }} </span>
    </h6>
    <h6 class="badge badge-primary badge-pill cart-item-list-quant">{{ $cart_item->pivot->quantity }} </h6>
  </li>
</a>