@if(isset($item) && isset($picture))
<li class="p-3 list-group-item li-item">
    <div class="container">
        <div class="row">
            <div class="col-sm-3 px-1">
                <a href="/product/{{ $item->id }}" class="list-img-link">
                    <div>
                        <img src="{{ asset('storage/img_product/' . $picture->link) }}" class="card-img-top image-fit" style="max-height:200px;" alt="">
                    </div>
                </a>
            </div>
            <div class="col-sm-6">
                <a href="/product/{{ $item->id }}" class="list-img-link">
                    <h3 class="font-weight-bold">
                        <!---->{{ $item->name }} </h3>
                </a>

                <div class="py-2 d-flex flex-row bd-highlight justify-content-between">
                    <div>
                        @include('partials.rating_stars', ['rating' => $item->rating ] )
                        <a href="/product/{{ $item->id }}#specs" class="px-2 a_link"> {{ count($item->reviews) }} </a>
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
                <div class="py-1 pt-4 d-flex flex-row bd-highlight justify-content-between">
                    <span>
                        <label for="li-item-qty">Qty.</label>
                        <input class="li-item-qty" type="number" value="1" min="1">
                    </span>
                    <a href="#" class="li-wishlist a_link">
                        <i class="fas fa-heart"></i>
                        Add to Whishlist
                    </a>
                </div>

            </div>
            <div class="py-2 col-sm-3 d-flex flex-column justify-content-between align-items-end li-price-button">
                <div class="row d-flex align-items-center">
                    @if ($item->status == 'active')
                        @php 
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
                        @endphp
                            @if ($item->price != $price)
                                <h4 class="pr-2 old-price">{{ $item->price . '€' }}</h4>
                            @endif
                            <h3 class="font-weight-bold pr-3" style="color: var(--main-red)">{{ $price }}€</h3>
                    @else
                        <h3>N/A</h3>
                    @endif
                </div>
                    <button class="dropdown-item btn button text-center add-to-cart-btn" data-product-type="{{ $item->id }}" style="z-index: 200;">Add to cart</button>
            </div>
        </div>
    </div>
</li>
@else
    @php
        print('Undefined variable (item/picture)');
    @endphp
@endif
