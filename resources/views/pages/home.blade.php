@extends('layouts.common')

@section('content')

<div id="carouselPreviewCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselPreviewCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselPreviewCaptions" data-slide-to="1"></li>
            <li data-target="#carouselPreviewCaptions" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://www.thetattooshop.com/uk/media/aw_rbslider/slides/Desktop.DynamicInk3for50.UK_1.jpg" class="d-block image-fit" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Lorem, ipsum.
                    </h5>
                    <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://www.thetattooshop.com/uk/media/aw_rbslider/slides/Desktop.DynamicInk3for50.UK_1.jpg" class="d-block image-fit" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Lorem, ipsum.</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://www.thetattooshop.com/uk/media/aw_rbslider/slides/Desktop.DynamicInk3for50.UK_1.jpg" class="d-block image-fit" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Lorem, ipsum dolor.
                    </h5>
                    <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                </div>
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

    <div class="my-4 mx-auto d-flex flex-column justify-content-center" style="max-width: 65em;">
        <div class="mx-3 mx-sm-5 mx-lg-3 d-flex justify-content-between align-items-end">
            <h1 class="my-1">Featured</h1>
            <a class="a_link my-1" href="../pages/search.php">View all</a>
        </div>
        <div class="container justify-content-center">
            <div class="row">
                <div class="p-0 col-12 col-sm-6 col-lg-3 d-flex justify-content-center">@include('partials.item_card', [])</div>
                <div class="p-0 col-12 col-sm-6 col-lg-3 d-flex justify-content-center">@include('partials.item_card', [])</div>
                <div class="p-0 col-12  col-sm-6 col-lg-3 d-flex justify-content-center">@include('partials.item_card', [])</div>
                <div class="p-0 col-12 col-sm-6 col-lg-3 d-flex justify-content-center">@include('partials.item_card', [])</div>
            </div>
        </div>
    </div>

    <div class="my-4 mx-auto d-flex flex-column justify-content-center" style="max-width: 65em;">
        <div class="mx-3 mx-sm-5 mx-lg-3 d-flex justify-content-between align-items-end">
            <h1 class="my-1">Most searched</h1>
            <a class="a_link my-1" href="../pages/search.php">View all</a>
        </div>
        <div class="container justify-content-center">
            <div class="row">
                <div class="p-0 col-12 col-sm-6 col-lg-3 d-flex justify-content-center">@include('partials.item_card', [])</div>
                <div class="p-0 col-12 col-sm-6 col-lg-3 d-flex justify-content-center">@include('partials.item_card', [])</div>
                <div class="p-0 col-12  col-sm-6 col-lg-3 d-flex justify-content-center">@include('partials.item_card', [])</div>
                <div class="p-0 col-12 col-sm-6 col-lg-3 d-flex justify-content-center">@include('partials.item_card', [])</div>
            </div>
        </div>
    </div>

    <div class="my-4 mx-auto d-flex flex-column justify-content-center" style="max-width: 65em;">
        <div class="mx-3 mx-sm-5 mx-lg-3 d-flex justify-content-between align-items-end">
            <h1 class="my-1">Best Deals</h1>
            <a class="a_link my-1" href="../pages/search.php">View all</a>
        </div>
        <div class="container justify-content-center">
            <div class="row">
                <div class="p-0 col-12 col-sm-6 col-lg-3 d-flex justify-content-center">@include('partials.item_card', [])</div>
                <div class="p-0 col-12 col-sm-6 col-lg-3 d-flex justify-content-center">@include('partials.item_card', [])</div>
                <div class="p-0 col-12  col-sm-6 col-lg-3 d-flex justify-content-center">@include('partials.item_card', [])</div>
                <div class="p-0 col-12 col-sm-6 col-lg-3 d-flex justify-content-center">@include('partials.item_card', [])</div>
            </div>
        </div>
    </div>
    
@endsection