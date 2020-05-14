@extends('layouts.profile')

@section('title', ' - Reviews')

@section('info')
  <section id="reviews">
    @foreach($reviews as $review)
      @include('partials.profile.productReview', ['review' => $review])
    @endforeach
  </section>
@endsection
