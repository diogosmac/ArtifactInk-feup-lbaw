<article id="product-review" >
    <div class="row" id="review-container">
      <div class="col-md-4">
        <a href="/product/{{$review->item->id}}">
          <img src="{{ asset('storage/img_product/' . $review->item->images->first()->link) }}" alt="Ink" class="img-fluid">
        </a>
      </div>
      <div class="col" id="product-review-info">

        <div class="d-flex justify-content-between my-1 align-items-center">
          <span class="review-product-name float-left">
            <a href="/product/{{$review->item->id}}" class="text-reset text-decoration-none">
              {{$review->item->name}}
            </a>
          </span>

          <button type="button" class="btn button-secondary float-right" id="profile-edit-review-button" data-toggle="modal" data-target="#editReview{{$review->id}}">
            <i class="fas fa-pen pr-2"></i>Edit
          </button>
          <!-- MODAL -->
          @include('partials.pop-ups.edit_review', ['review' => $review])

        </div>

        <div class="d-flex justify-content-between my-1 align-items-center">
          <div>
            @include('partials.rating_stars', ['rating' => $review->score])
          </div>
          <button type="button" class="btn btn-link a_link float-right pr-0" id="profile-delete-review-button" data-toggle="modal" data-target="#confirmDeleteReview{{$review->id}}">
            <i class="fas fa-trash pr-2"></i>Delete
          </button>
          <!-- MODAL -->
          @include('partials.pop-ups.confirm_delete_review', ['review' => $review])
        </div>
        <span class="review-title">{{$review->title}}</span>

        <p class="my-1 text-justify">
          {{$review->body}}
        </p>
      </div>
    </div>
</article>