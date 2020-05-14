<div class="row align-items-center">
  <div class="col-md-3" id="purchase-history-item-picture">
    <img src="{{ asset('storage/img_product/' . $item->images()->get()->first()->link) }}" alt="Ink" class="img-fluid">
  </div>
  <div class="col my-2" id="purchase-history-item-data">
    <div class="row">
      <span>{{$item->name}}</span>
    </div>
    <div class="row">
      <span>{{$item->pivot->price}} €</span>
    </div>
  </div>
  @if (Auth::user()->reviews->where('id_item', '=', $item->id)->count() == 0)
    <div>
      <button type="button" class="btn button-secondary float-right" id="profile-edit-review-button" data-toggle="modal" data-target="#writeReview">
        Write a review
      </button>
    </div>

    @include('partials.pop-ups.write_review')
    
  @endif
</div>
