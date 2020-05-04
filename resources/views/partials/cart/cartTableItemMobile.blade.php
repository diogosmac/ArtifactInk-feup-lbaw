<li class="p-3 list-group-item li-item">
    <div class="container">
        <div class="row">
            <div class="col-4 col-sm-3">
                <a href="{{ url('/product/' . $item->id) }}" class="list-img-link" >
                    <img src="{{ asset('storage/img_product/' . $picture->link) }}"
                        class="card-img-top" alt="...">
                </a>
            </div>
            <div class="col-6 col-sm-6">
                <a href="{{ url('/product/' . $item->id) }}" class="list-img-link">
                    <h5 class="font-weight-bold"> {{ $item->name }} </h5>
                </a>
             
                <div class="py-1 d-flex flex-row bd-highlight justify-content-between-mobile">
                    <span> Qty.
                        <button type="button" class="btn btn-link a_link sub-button">
                            <i class="fas fa-minus"></i>
                        </button>
                        <span class="item-quant"> {{ $item->pivot->quantity }}</span>
                        <button type="button" class="btn btn-link a_link add-button">
                            <i class="fas fa-plus"></i>
                        </button>
                    </span>
                    
                </div>
               

            </div>
            <div class="py-2  col-2 col-sm-3 col-smd-flex flex-column justify-content-between align-items-end li-price">
                <h5 class="font-weight-bold item-value" style="color: var(--main-red)">{{ $item->price }}</h5>
                <h6 class="font-weight-bold item-price" style="color: var(--main-red)">{{ $item->price }}</h6>
                <div>
                   <button type="button" class="btn btn-link a_link rmv-button">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</li>