@extends('layouts.common')

@section('content')
<main>
    <div class="container">
        <section id="profile-page">
            <div class="row">
                <!-- TABS -->
                <div class="d-none d-md-block" id="profile-nav-desktop">
                    <div class="col-md-auto col-xs-12 my-3 px-0 nav flex-column nav-pills" 
                        role="tablist" aria-orientation="vertical">
                        <h5 class="text-center">John Doe</h5>
                        <a class="nav-link active text-center profile-tab" 
                            href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="true">
                            <i class="fas fa-user pr-2"></i>Profile
                        </a>
                        <a class="nav-link text-center profile-tab" id="v-pills-reviews-tab" data-toggle="pill"
                            href="#v-pills-reviews" role="tab" aria-controls="v-pills-reviews" aria-selected="false">
                            <i class="fas fa-pen pr-2"></i>Reviews
                        </a>
                        <a class="nav-link text-center profile-tab" id="v-pills-wishlist-tab" data-toggle="pill"
                            href="#v-pills-wishlist" role="tab" aria-controls="v-pills-wishlist" aria-selected="false">
                            <i class="fas fa-heart pr-2"></i>Wishlist
                        </a>
                        <a class="nav-link text-center profile-tab" id="v-pills-history-tab" data-toggle="pill"
                            href="#v-pills-history" role="tab" aria-controls="v-pills-history" aria-selected="false">
                            <i class="fas fa-shopping-cart pr-2"></i>History
                        </a>
                    </div>
                </div>

                <div class="d-md-none mx-3" id="profile-nav-mobile">
                    <div class="accordion" id="profile-dropdown">
                        <div class="card">
                            <div class="card-header p-0" id="profile-dropdown-header">
                                <h5 class="m-0 text-center">
                                    <button class="btn btn-block" type="button" data-toggle="collapse"
                                        data-target="#profile-dropdown-collapse" aria-expanded="true"
                                        aria-controls="profile-dropdown-collapse">
                                        <h5 class="my-1" id="profile-dropdown-title">
                                            <strong>
                                                <i class="fas fa-bars pr-2"></i>
                                                John Doe
                                            </strong>
                                        </h5>
                                    </button>
                                </h5>
                            </div>
                            <div id="profile-dropdown-collapse" class="collapse hide"
                                aria-labelledby="profile-dropdown-header" data-parent="#profile-dropdown">
                                <div class="card-body p-0">
                                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                        aria-orientation="vertical">
                                        <a class="nav-link active text-center profile-tab" id="v-pills-profile-tab"
                                            data-toggle="pill" href="#v-pills-profile" role="tab"
                                            aria-controls="v-pills-profile" aria-selected="true">
                                            <i class="fas fa-user pr-2"></i>Profile
                                        </a>
                                        <a class="nav-link text-center profile-tab" id="v-pills-reviews-tab"
                                            data-toggle="pill" href="#v-pills-reviews" role="tab"
                                            aria-controls="v-pills-reviews" aria-selected="false">
                                            <i class="fas fa-pen pr-2"></i>Reviews
                                        </a>
                                        <a class="nav-link text-center profile-tab" id="v-pills-wishlist-tab"
                                            data-toggle="pill" href="#v-pills-wishlist" role="tab"
                                            aria-controls="v-pills-wishlist" aria-selected="false">
                                            <i class="fas fa-heart pr-2"></i>Wishlist
                                        </a>
                                        <a class="nav-link text-center profile-tab" id="v-pills-history-tab"
                                            data-toggle="pill" href="#v-pills-history" role="tab"
                                            aria-controls="v-pills-history" aria-selected="false">
                                            <i class="fas fa-shopping-cart pr-2"></i>History
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="container">
                        <!-- CONTENT -->
                        <div class="col tab-content my-3" id="v-pills-tabContent">
                            @yield('info')
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>

@endsection