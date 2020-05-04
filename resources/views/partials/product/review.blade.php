<div class="container p-0 mb-5 d-none d-md-block">
  <div class="row">
    <div class="col-4 d-flex flex-row justify-content-center">
      <div class="d-flex flex-column align-items-center">
        <img  class="product-review-profile-pic"
              src="{{ asset('/storage/img_user/' . $review->user->profilePicture->link) }}"
              alt="Profile Picture">
        <h6>{{ $review->user->name }}</h6>
      </div>
      <div class="d-flex flex-column align-items-center justify-content-start px-3 border-right border-dark">
        <div class="d-flex flex-row align-items-center py-2">
          {{ $review->score }}/5 &nbsp;<i class="fas fa-star"></i>
        </div>
        {{ date("F jS Y", strtotime($review->date)) }}
        <a href="" class="py-2 text-center a_link">Report Review</a>
      </div>
    </div>
    <div class="col-8">
      <h4>{{ $review->title }}</h4>
      <p>{{ $review->body }}</p>      
    </div>
  </div>
</div>

<div class="d-flex flex-column justify-content-center p-0 pb-2 mb-5 d-md-none border-bottom border-dark">
  <div class="container-fluid d-flex flex-row justify-content-center px-0 pb-4">
    <div class="row" style="width: 100%;">
      <div class="col-6 d-flex flex-column align-items-center">
        <img  class="product-review-profile-pic"
              src="{{ asset('/storage/img_user/' . $review->user->profilePicture->link) }}"
              alt="Profile Picture">
        <h6>{{ $review->user->name }}</h6>
      </div>
      <div class="col-6 d-flex flex-column align-items-center justify-content-center px-3">
        <div class="d-flex flex-row align-items-center py-2">
        {{ $review->score }}/5 &nbsp;<i class="fas fa-star"></i>
        </div>
        {{ date("F jS Y", strtotime($review->date)) }}
        <a href="" class="py-2 text-center a_link">Report Review</a>
      </div>
    </div>
  </div>
  <div class="">
    <h4>{{ $review->title }}</h4>
    <p>{{ $review->body }}</p>      
  </div>
</div>