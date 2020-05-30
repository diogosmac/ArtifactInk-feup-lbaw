<li class="list-group-item d-flex justify-content-between lh-condensed">
    <div>
        <h6 class="my-0">{{ $cartItem->name}}</h6>
        <small class="text-muted">Brief description</small>
    </div>
    <div>
        <span class="badge badge-secondary badge-pill">{{ $cartItem->pivot->quantity}}</span>
        <span class="text-muted">{{ $cartItem->price}} €</span>
    </div>
    
</li>