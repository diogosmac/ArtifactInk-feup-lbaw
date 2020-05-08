@if(isset($item) && isset($picture))
<div class="my-3 mx-2 card product-card rounded-0" style="width: 15em;">
    <div class="card-img-overlay d-flex justify-content-end h-25">
        <!--
            <a href="../pages/home.php" class="card-link">
                <span>
                    <i class="fas fa-shopping-cart"></i>
                </span>   
            </a>
            -->
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
        <span class="detail">
            <h5 class="card-title font-weight-bold">{{ $item->name }}</h5>
            <h5 class="card-price font-weight-bold">{{ $item->price }} €</h5>
        </span>
    </div>
    <div class="p-1" style="z-index: 200;">
        <a href="#" class="dropdown-item btn button text-center add-to-cart-btn" style="z-index: 200;">Add to cart</a>
    </div>
</div>
@else <?php print('Undefined variable (item/picture)'); ?>
@endif