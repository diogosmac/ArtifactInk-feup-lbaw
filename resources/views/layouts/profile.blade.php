@extends('layouts.common')

@section('content')
  <main>
    <div class="container">
      <section id="profile-page">
        <div class="row">
          <!-- TABS -->
          <div class="d-none d-md-block" id="profile-nav-desktop">
            <div class="col-md-auto col-xs-12 my-3 px-0 nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
              <h5 class="text-center"> {{ Auth::user()->name}}</h5>

              <a class="nav-link {{ (Route::is('profile.home')) ? 'active' : '' }} text-center profile-tab" href="{{ route('profile.home') }}">
                <i class="fas fa-user pr-2"></i>Profile
              </a>

              <a class="nav-link {{ (Route::is('profile.reviews')) ? 'active' : '' }} text-center profile-tab" href="{{ route('profile.reviews') }}">
                <i class="fas fa-pen pr-2"></i>Reviews
              </a>

              <a class="nav-link {{ (Route::is('profile.wishlist')) ? 'active' : '' }} text-center profile-tab" href="{{ route('profile.wishlist') }}">
                <i class="fas fa-heart pr-2"></i>Wishlist
              </a>

              <a class="nav-link {{ (Route::is('profile.purchased_history')) ? 'active' : '' }} text-center profile-tab" href="{{ route('profile.purchased_history') }}">
                <i class="fas fa-shopping-cart pr-2"></i>History
              </a>

            </div>
          </div>

          <div class="d-md-none mx-3" id="profile-nav-mobile">
            <div class="accordion" id="profile-dropdown">
              <div class="card">
                <div class="card-header p-0" id="profile-dropdown-header">
                  <h5 class="m-0 text-center">
                    <button class="btn btn-block" type="button" data-toggle="collapse" data-target="#profile-dropdown-collapse" aria-expanded="true" aria-controls="profile-dropdown-collapse">
                      <h5 class="my-1" id="profile-dropdown-title">
                        <strong>
                          <i class="fas fa-bars pr-2"></i>
                          {{ Auth::user()->name}}
                        </strong>
                      </h5>
                    </button>
                  </h5>
                </div>
                <div id="profile-dropdown-collapse" class="collapse hide" aria-labelledby="profile-dropdown-header" data-parent="#profile-dropdown">
                  <div class="card-body p-0">
                    <div class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">

                      @if(Request::path() === 'profile')
                      <a class="nav-link active text-center profile-tab" href="{{ url('/profile') }}">
                        <i class="fas fa-user pr-2"></i>Profile
                      </a>
                      @else
                      <a class="nav-link text-center profile-tab" href="{{ url('/profile') }}">
                        <i class="fas fa-user pr-2"></i>Profile
                      </a>
                      @endif

                      @if(Request::path() === 'profile/review')
                      <a class="nav-link active text-center profile-tab" href="{{ url('/profile/review') }}">
                        <i class="fas fa-pen pr-2"></i>Reviews
                      </a>
                      @else
                      <a class="nav-link text-center profile-tab" href="{{ url('/profile/review') }}">
                        <i class="fas fa-pen pr-2"></i>Reviews
                      </a>
                      @endif

                      @if(Request::path() === 'profile/wishlist')
                      <a class="nav-link active text-center profile-tab" href="{{ url('/profile/wishlist') }}">
                        <i class="fas fa-heart pr-2"></i>Wishlist
                      </a>
                      @else
                      <a class="nav-link text-center profile-tab" href="{{ url('/profile/wishlist') }}">
                        <i class="fas fa-heart pr-2"></i>Wishlist
                      </a>
                      @endif

                      @if(Request::path() === 'profile/purchased_history')
                      <a class="nav-link active text-center profile-tab" href="{{ url('/profile/purchased_history') }}">
                        <i class="fas fa-shopping-cart pr-2"></i>History
                      </a>
                      @else
                      <a class="nav-link text-center profile-tab" href="{{ url('/profile/purchased_history') }}">
                        <i class="fas fa-shopping-cart pr-2"></i>History
                      </a>
                      @endif

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col">
            <div class="container">
              <!-- CONTENT -->
              <div class="col tab-content my-3">
                @yield('info')
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </main>
@endsection
