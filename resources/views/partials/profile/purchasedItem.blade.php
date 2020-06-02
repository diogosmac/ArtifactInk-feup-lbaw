<div class="row align-items-center">
    <div class="col-md-3" id="purchase-history-item-picture">
        <a href="/product/{{ $item->id }}">
            <img src="{{ asset('storage/img_product/' . $item->images->first()->link) }}" alt="Ink" class="img-fluid">
        </a>
    </div>
    <div class="col my-2" id="purchase-history-item-data">
        <div class="row">
            <a href="/product/{{ $item->id }}" class="text-reset">
                <span> {{ $item->name }} </span>
            </a>
        </div>
        <div class="row d-flex align-items-center">
            <h6 class="mr-2 mb-0 badge badge-primary badge-pill cart-item-list-quant"> {{ $item->pivot->quantity }} </h6>
            <span> {{ $item->pivot->price }}€</span>
        </div>
    </div>
    @if (Auth::user()->reviews->where('id_item', '=', $item->id)->count() == 0)
        <div class="ml-2">
            <button type="button" class="btn button-secondary float-right" id="profile-edit-review-button" data-toggle="modal" data-target="#writeReview{{ $item->id }}">
                Write a Review
            </button>
        </div>
        @include('partials.pop-ups.write_review')
    @endif
</div>
    