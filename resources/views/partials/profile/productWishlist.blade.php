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
              <a href="#specs" class="px-2 a_link"> (2)</a>

            </div>
          </div>
          <div class="py-1 d-flex flex-row bd-highlight justify-content-between">
            <div>
              <i class="fas fa-circle circle-available"></i>
              Available
            </div>
          </div>
          <div class="py-1 d-flex flex-row bd-highlight justify-content-between">
            <span>
              <label for="li-item-qty">Qty.</label>
              <input class="li-item-qty" type="number" value="1" min="1">
            </span>
          </div>

        </div>
        <div class="py-2 col-sm-3 d-flex flex-column justify-content-between align-items-end li-price-button">
          <h3 class="font-weight-bold" style="color: var(--main-red)">{{ $item->price }} €</h3>
          <button class="btn button-secondary remove-wishlist" type="button" data-id="{{ $item->id }}"git >
            <i class="fas fa-trash"></i>
            Remove
          </button>
          <button href="#" type="button" class="btn button">Add to Cart</button>
        </div>
      </div>
    </div>
  </li>