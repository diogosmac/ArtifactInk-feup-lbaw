<section id="product-review">
    <div class="row" id="review-container">
      <div class="col-md-4">
        <img src="{{ asset('storage/img_product/' . $review->item->images()->get()->first()->link) }}" alt="Ink" class="img-fluid">
      </div>
      <div class="col" id="product-review-info">

        <div class="d-flex justify-content-between my-1 align-items-center">
          <span class="review-product-name float-left">{{$review->item->name}}</span>

          <button type="button" class="btn button-secondary float-right" id="profile-edit-review-button" data-toggle="modal" data-target="#editReview">
            <i class="fas fa-pen pr-2"></i>Edit
          </button>

          <!-- MODAL -->
          @include('partials.pop-ups.edit_review', ['review' => $review])

        </div>

        <div class="d-flex justify-content-between my-1 align-items-center">
          <span class="review-title">{{$review->title}}</span>
          <div>
            @include('partials.rating_stars', ['rating' => $review->score])
          </div>
        </div>

        <p class="my-1 text-justify">
          {{$review->body}}
        </p>
      </div>
    </div>
  </section>