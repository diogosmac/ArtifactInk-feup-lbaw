<li class="p-3 list-group-item li-item wishlist-item" data-id="{{ $item->id }}">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <a href="{{ url('/product/' . $item->id) }}" class="list-img-link">
                    <img src="{{ asset('storage/img_product/' . $picture->link) }}" class="card-img-top" alt="...">
                </a>
            </div>
            <div class="col-sm-6">
                <a href="{{ url('/product/' . $item->id) }}" class="list-img-link">
                    <h3 class="font-weight-bold"> {{ $item->name }} </h3>
                </a>
                <div class="py-2 d-flex flex-row bd-highlight justify-content-between">
                    <div>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                        <a href="#specs" class="px-2 a_link"> {{ count($item->reviews) }}</a>
                    </div>
                </div>
                <div class="py-1 d-flex flex-row bd-highlight justify-content-between">
                    <div>
                        @if($item->stock > 0 && $item->status == 'active')
                            <i class="fas fa-circle circle-available"></i>
                            Available
                        @else
                            <i class="fas fa-circle circle-available" style="color:red"></i>
                            Unavailable
                        @endif
                    </div>
                </div>
                <div class="py-1 d-flex flex-row bd-highlight justify-content-between">
                    <span>
                        <label for="li-item-qty">Qty.</label>
                        <input class="li-item-qty" type="number"
                        @if ($item->status == 'active')
                            value="1" min="1"
                        @else
                            value="0" disabled="true"
                    @endif
                        >
                    </span>
                </div>
            </div>
            <div class="py-2 col-sm-3 d-flex flex-column justify-content-between align-items-end li-price-button">
                <div class="row d-flex align-items-center">
                    @if ($item->status == 'active')
                    <?php
                        $sales = $item->sales()->get();
                        $currentSale = 0;
                        $price = $item->price;
                        foreach ($sales as $sale) {
                            if ($sale->type == 'percentage') {
                                $new_sale = 0.01 * $sale->percentage_amount * $price;
                                if ($new_sale > $currentSale) {
                                    $currentSale = $new_sale;
                                }
                            } else if ($sale->type == 'fixed') {
                                if ($amount > $currentSale) {
                                    $currentSale = $amount;
                                    $output = "(-" . $amount . "€) ";
                                }
                            }
                        }
                        $price = round($price - $currentSale, 2);
                        ?>
                        @if ($currentSale > 0)
                            <h3 class="pr-2 old-price">{{ $item->price . '€' }}</h3>
                        @endif
                        <h3 class="font-weight-bold pr-3" style="color: var(--main-red)">{{ $price }}€</h3>
                    @else
                        <h3 class="font-weight-bold pr-3" style="color: var(--main-red)">N/A</h3>
                    @endif
                </div>
                <button class="btn button-secondary remove-wishlist" type="button" data-id="{{ $item->id }}"git >
                    <i class="fas fa-trash"></i>
                    Remove
                </button>
                <button href="#" type="button" class="btn button">Add to Cart</button>
            </div>
        </div>
    </div>
</li>