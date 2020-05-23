@if(isset($item) && isset($picture))
<li class="p-3 list-group-item li-item">
    <div class="container">
        <div class="row">
            <div class="col-sm-3 px-1">
                <a href="/product/{{ $item->id }}" class="list-img-link">
                    <div>
                        <img src="{{ asset('storage/img_product/' . $picture->link) }}" class="card-img-top image-fit" alt="...">
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
                        <a href="/product/{{ $item->id }}#specs" class="px-2 a_link"> (<!--No ratings-->)</a>
                    </div>
                </div>
                <div class="py-1 d-flex flex-row bd-highlight justify-content-between">
                    <div>
                        @if($item->stock > 5)
                        <i class="fas fa-circle circle-available"></i>
                        Available
                        @elseif($item->stock > 0)
                        <i class="fas fa-circle circle-available" style="color:gold"></i>
                        Last Units
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
                <h3 class="font-weight-bold" style="color: var(--main-red)">{{$item->price}} €</h3>
                <a href="#" class="btn button add-to-cart-btn">Add to Cart</a>
            </div>
        </div>
    </div>
</li>
@else <?php print('Undefined variable (item/picture)'); ?>
@endif