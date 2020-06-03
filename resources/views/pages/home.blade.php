@extends('layouts.common')

@section('title', ' - Home')

@section('content')

<div id="carouselPreviewCaptions" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselPreviewCaptions" data-slide-to="0" class="active"></li>
        <li data-target="#carouselPreviewCaptions" data-slide-to="1"></li>
        <li data-target="#carouselPreviewCaptions" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset('/assets/carousel1.png') }}" class="d-block image-fit" alt="carousel_1">
            <div class="carousel-caption d-none d-md-block"></div>
        </div>
        <div class="carousel-item">
            <img src="{{ asset('/assets/carousel2.png') }}" class="d-block image-fit" alt="carousel_3">
            <div class="carousel-caption d-none d-md-block"></div>
        </div>
        <div class="carousel-item">
            <img src="{{ asset('/assets/carousel3.png') }}" class="d-block image-fit" alt="carousel_3">
            <div class="carousel-caption d-none d-md-block"></div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselPreviewCaptions" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselPreviewCaptions" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

@include('partials.item_deals', ['data' => $top_rated])
@include('partials.item_deals', ['data' => $featured_deals])
@include('partials.item_deals', ['data' => $best_sellers])

@endsection