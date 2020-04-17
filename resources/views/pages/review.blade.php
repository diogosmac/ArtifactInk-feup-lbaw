@extends('layouts.profile')

@section('info')
<div class="tab-pane fade" id="v-pills-reviews" role="tabpanel" aria-labelledby="v-pills-reviews-tab">
          <section id="reviews">
            @include('partials.productReview')
            @include('partials.productReview')
            @include('partials.productReview')
          </section>
        </div>
@endsection