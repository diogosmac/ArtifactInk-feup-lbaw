<a class="item-link-cart" href="{{ url('/product/' . $cart_item->id) }}">
  <li class="cart-item-list list-group-item d-flex justify-content-between align-items-center">
    <span>
      <img class="cart-item-list-img" src="{{ asset('storage/img_product/' . $cart_picture->link) }}"
        alt="{{ $cart_item->name }}">
    </span>
    <h5 class="cart-item-list-name"> {{ $cart_item->name }} </h5>
    <h6 class="cart-item-list-price">{{ $cart_item->price }} </h6>
    <h6 class="badge badge-primary badge-pill cart-item-list-quant">{{ $cart_item->pivot->quantity }} </h6>
  </li>
</a>