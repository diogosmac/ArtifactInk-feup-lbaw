@if(isset($item) && isset($picture) && isset($price))
<div class="my-3 mx-2 card product-card rounded-0" style="width: 15em;">
    <div class="card-img-overlay d-flex justify-content-end h-25">
        <a href="#" class="card-link">
            <i class="fas fa-heart"></i>
        </a>
    </div>
    <div class="p-1">
        <a href="/product/{{ $item->id }}" class="card-img-link">
            <div>
                <img src="{{ asset('storage/img_product/' . $picture->link) }}" class="card-img-top image-fit" alt="...">
            </div>
        </a>
    </div>
    <div class="p-1 d-flex flex-column justify-content-center text-center card-body border-top border-dark">
        <div class="detail">
            <h5 class="card-title font-weight-bold">{{ $item->name }}</h5>
            <h5 class="card-price font-weight-bold">
                @if ($item->status == 'active')
                    @if ($item->price != $price)
                        <span class="pr-2 old-price">{{ $item->price . '€' }}</span>
                    @endif
                    {{ $price }} €
                @else
                    N/A
                @endif
            </h5>
        </div>
    </div>
    <div class="p-1" style="z-index: 200;">
        <button class="dropdown-item btn button text-center add-to-cart-btn" data-product-type="{{ $item->id }}" style="z-index: 200;">Add to cart</button>
    </div>
</div>
@else <?php print('Undefined variable (item/picture)'); ?>
@endif