<li class="mr-1 list-group-item d-flex justify-content-between lh-condensed">
    <div>
        <h6 class="my-0">{{ $cartItem->name}}</h6>
        <small class="text-muted">Brief description</small>
    </div>
    <div class="w-50 d-flex align-items-center justify-content-end" style="height: auto">
        <span class="mx-1 badge badge-secondary badge-pill">{{ $cartItem->pivot->quantity}}</span>
        @php
            $sales = $cartItem->sales;
            $currentSale = 0;
            $price = $cartItem->price;
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
        @endphp
        <span class="ml-1 text-muted">{{ $price }}€</span>
    </div>
    
</li>