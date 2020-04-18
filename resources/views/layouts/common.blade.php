<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">


  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <!-- Fontawesome -->
  <link href="{{ asset('fonts/fontawesome-free-5.12.1-web/css/all.css') }}" rel="stylesheet">
  <!--load all styles -->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
  </script>

  <!-- Styles -->
  <link href="{{ asset('css/common.css') }}" rel="stylesheet">
  <link href="{{ asset('css/footer.css') }}" rel="stylesheet">
  <link href="{{ asset('css/navbar.css') }}" rel="stylesheet">
  <link href="{{ asset('css/carousel_card.css') }}" rel="stylesheet">
  <link href="{{ asset('css/checkout.css') }}" rel="stylesheet">
  <link href="{{ asset('css/product.css') }}" rel="stylesheet">
  <link href="{{ asset('css/review.css') }}" rel="stylesheet">
  <link href="{{ asset('css/profile.css') }}" rel="stylesheet">
  <link href="{{ asset('css/item_list.css') }}" rel="stylesheet">
  <link href="{{ asset('css/search.css') }}" rel="stylesheet">

  <!-- todo distribute scripts -->

  <script src="{{ asset('js/product_card.js') }}" defer></script>
  <script src="{{ asset('js/checkout_list.js') }}" defer></script>
  <script src="{{ asset('js/payment.js') }}" defer></script>
  <script src="{{ asset('js/address.js') }}" defer></script>
  <script src="{{ asset('js/mobile_nav.js') }}" defer></script>
  <script type="text/javascript">
    // Fix for Firefox autofocus CSS bug
    // See: http://stackoverflow.com/questions/18943276/html-5-autofocus-messes-up-css-loading/18945951#18945951
  </script>

</head>

<body>
  <div class="main-container">
    <div class="fixed-top ">
      <!-- main navbar -->
      <nav id="desktop-main-nav" class="navbar navbar-expand-md navbar-custom-top">
        <a class="navbar-brand" href="{{ url('/home') }}">
          <img class="d-inline-block align-center" src="{{ asset('/assets/artifact_ink_logo_white.png') }}" alt="ArtifactInk"
            height="40">
          <img class="d-inline-block align-center" src="{{ asset('/assets/artifact_ink_letters_white.png') }}" alt="ArtifactInk"
            width="125">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTopSupportedContent"
          aria-controls="navbarTopSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon">
            <i class="fas fa-bars"></i>
          </span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTopSupportedContent">
          <ul class="navbar-nav">
            <li class="nav-item">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Search" aria-describedby="search-button">
                <div class="input-group-append">
                  <button class="btn btn-outline-success" type="button" id="search-button">
                    <a href="/pages/search.php">
                      <i class="fas fa-search"></i>
                    </a>
                  </button>
                </div>
              </div>
            </li>
          </ul>
          <ul class="navbar-nav ml-auto">
            @if (Auth::check())
            <li class="nav-item">
              <a class="nav-link" href="/profile/wishlist">
                <span>
                  <i class="fas fa-heart"></i>
                </span>
              </a>
            </li>
            <li class="nav-item">
              <div class="btn-group">
                <a class="btn" href="#" role="button" id="dropdownMenuCart" data-toggle="dropdown" aria-haspopup="true"
                  aria-expanded="false">
                  <span>
                    <i class="fas fa-shopping-cart"></i>
                  </span>
                </a>
                <div class="dropdown-menu dropdown-cart dropdown-menu-right" aria-labelledby="dropdownMenuCart">
                  <div class="panel-body">
                    <ul class="list-group list-cart">
                      @include('partials.cartListItem')
                      @include('partials.cartListItem')
                      @include('partials.cartListItem')
                    </ul>
                  </div>
                  <div class="d-inline cart-list-total">
                    <div id="total-label" class="d-inline p-2">
                      Total
                    </div>
                    <div id="price-total" class="d-inline p-2">
                      33.33 €
                    </div>
                  </div>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item checkout-button" href="{{ url('/cart') }}">View Cart</a>
                </div>
              </div>
            </li>
            <li class="nav-item">
              <div class="btn-group">
                <a class="btn " href="#" role="button" id="dropdownMenuAccount" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false">
                  <span>
                    <i class="fas fa-user"></i>
                  </span>
                  John Doe
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuAccount">
                  <img class="profile-pic-bubble"
                    src="https://www.diretoriodigital.com.br/wp-content/uploads/2013/05/Team-Member-3.jpg"
                    alt="John Doe">
                  <h5 class="dropdown-header">John Doe</h5>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="/pages/profile.php">My Account</a>
                  <a class="dropdown-item" href="#">My Order</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="{{ url('/logout') }}">Sign Out</a>
                </div>
              </div>
            </li>
            @else
            <li class="nav-item">
              <div class="btn-group">
                <a class="btn" href="#" role="button" id="dropdownMenuCart" data-toggle="dropdown" aria-haspopup="true"
                  aria-expanded="false">
                  <span>
                    <i class="fas fa-shopping-cart"></i>
                  </span>
                </a>
                <div class="dropdown-menu dropdown-cart dropdown-menu-right" aria-labelledby="dropdownMenuCart">
                  <div class="panel-body">
                    <ul class="list-group list-cart">
                      @include('partials.cartListItem')
                      @include('partials.cartListItem')
                      @include('partials.cartListItem')
                    </ul>
                  </div>
                  <div class="d-inline cart-list-total">
                    <div id="total-label" class="d-inline p-2">
                      Total
                    </div>
                    <div id="price-total" class="d-inline p-2">
                      33.33 €
                    </div>
                  </div>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item checkout-button" href="{{ url('/cart') }}">View Cart</a>
                </div>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">Sign In</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('register') }}">Sign Up</a>
            </li>
            @endif
          </ul>
        </div>
      </nav>

      <!-- mobile nav -->
      <nav id="mobile-main-nav" class="navbar navbar-expand-lg navbar-custom-top">
        <div class="container">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarBotSupportedContent"
            aria-controls="navbarBotSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon navbar-toggler-mobile ">
              <i class="fas fa-bars"></i>
            </span>
          </button>
          <a class="navbar-brand" href="{{ url('/home') }}">
            <img class="d-inline-block align-center" src="../images/artifact_ink_logo_white.png" alt="ArtifactInk"
              height="40">
            <img class="d-inline-block align-center" src="../images/artifact_ink_letters_white.png" alt="ArtifactInk"
              width="125">
          </a>
          @if (Auth::check())
          <a class="nav-link" href="#">
            <span>
              <i class="fas fa-heart"></i>
            </span>
          </a>
          <div class="btn-group">
            <a class="btn" href="#" role="button" id="dropdownMenuCart" data-toggle="dropdown" aria-haspopup="true"
              aria-expanded="false">
              <span>
                <i class="fas fa-shopping-cart"></i>
              </span>
            </a>
            <div class="dropdown-menu dropdown-cart dropdown-menu-right" aria-labelledby="dropdownMenuCart">
              <div class="panel-body">
                <ul class="list-group list-cart">
                 @include('partials.cartListItem')
                 @include('partials.cartListItem')
                 @include('partials.cartListItem')
                </ul>
              </div>
              <div class="d-inline cart-list-total">
                <div id="total-label" class="d-inline p-2">
                  Total
                </div>
                <div id="price-total" class="d-inline p-2">
                  33.33 €
                </div>
              </div>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item checkout-button" href="{{ url('/cart') }}">View Cart</a>
            </div>
          </div>
          <div class="btn-group">
            <a class="btn " href="#" role="button" id="dropdownMenuAccount" data-toggle="dropdown" aria-haspopup="true"
              aria-expanded="false">
              <span>
                <i class="fas fa-user"></i>
              </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuAccount">
              <img class="profile-pic-bubble"
                src="https://www.diretoriodigital.com.br/wp-content/uploads/2013/05/Team-Member-3.jpg" alt="John Doe">
              <h5 class="dropdown-header">John Doe</h5>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="/pages/profile.php">My Account</a>
              <a class="dropdown-item" href="#">My Order</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="{{ url('/logout') }}">Sign Out</a>
            </div>
          </div>
          @else
          <div class="btn-group">
            <a class="btn" href="#" role="button" id="dropdownMenuCart" data-toggle="dropdown" aria-haspopup="true"
              aria-expanded="false">
              <span>
                <i class="fas fa-shopping-cart"></i>
              </span>
            </a>
            <div class="dropdown-menu dropdown-cart dropdown-menu-right" aria-labelledby="dropdownMenuCart">
              <div class="panel-body">
                <ul class="list-group list-cart">
                  @include('partials.cartListItem')
                  @include('partials.cartListItem')
                  @include('partials.cartListItem')
                </ul>
              </div>
              <div class="d-inline cart-list-total">
                <div id="total-label" class="d-inline p-2">
                  Total
                </div>
                <div id="price-total" class="d-inline p-2">
                  33.33 €
                </div>
              </div>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item checkout-button" href="{{ url('/cart') }}">View Cart</a>
            </div>

            <a class="nav-link" href="{{ route('login') }}">Sign In</a>
            <!--TODO THINK ABOUT THIS <a class="nav-link" href="{{ route('register') }}">Sign Up</a> -->
            @endif
            </ul>
          </div>
          <div class="collapse navbar-collapse" id="navbarBotSupportedContent">
            <ul class="navbar-nav nav-fill w-100">
              <li class="nav-item ">
                <div class="dropdown dropdownSupplies">
                  <a class="btn btn-secondary secondary-nav-link ml-auto" role="button">
                    Designs
                  </a>
                  <div class="subclass-nav-mobile">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                  </div>
                </div>
              </li>
              <li class="nav-item">
                <div class="dropdown dropdownSupplies">
                  <a class="btn btn-secondary secondary-nav-link" role="button">
                    Machines
                  </a>
                  <div class="subclass-nav-mobile">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                  </div>
                </div>
              </li>
              <li class="nav-item">
                <div class="dropdown dropdownSupplies">
                  <a class="btn btn-secondary secondary-nav-link" role="button">
                    Inks
                  </a>
                  <div class="subclass-nav-mobile">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                  </div>
                </div>
              </li>
              <li class="nav-item">
                <div class="dropdown dropdownSupplies">
                  <a class="btn btn-secondary secondary-nav-link" role="button">
                    Needles and Cartridges
                  </a>
                  <div class="subclass-nav-mobile">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                  </div>
                </div>
              </li>
              <li class="nav-item">
                <div class="dropdown dropdownSupplies">
                  <a class="btn btn-secondary secondary-nav-link" role="button">
                    Grips Tips and Tubes
                  </a>
                  <div class="subclass-nav-mobile">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                  </div>
                </div>
              </li>

              <li class="nav-item">
                <div class="dropdown dropdownSupplies">
                  <a class="btn btn-secondary secondary-nav-link" role="button">
                    Studio Furniture
                  </a>
                  <div class="subclass-nav-mobile">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                  </div>
                </div>
              </li>
              <li class="nav-item">
                <div class="dropdown dropdownSupplies">
                  <a class="btn btn-secondary secondary-nav-link " role="button">
                    Aftercare
                  </a>
                  <div class="subclass-nav-mobile ">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                  </div>
                </div>
              </li>
              <li class="nav-item align-middle">
                <div class="dropdown dropdownSupplies">
                  <a class="btn btn-secondary secondary-nav-link" role="button">
                    Medical Equipment
                  </a>
                  <div class="subclass-nav-mobile">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                  </div>
                </div>
              </li>
              <li class="nav-item">
                <div class="dropdown dropdownSupplies">
                  <a class="btn btn-secondary secondary-nav-link" role="button">
                    Piercings
                  </a>
                  <div class="subclass-nav-mobile">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                  </div>
                </div>
              </li>
            </ul>

          </div>
      </nav>
      <nav id="searchMobile">
        <div class="input-group" id="search-mobile">
          <input type="text" class="form-control" placeholder="Search" aria-describedby="search-button">
          <div class="input-group-append">
            <button class="btn btn-outline-success" type="button" id="search-button">
              <a href="/pages/search.php">
                <i class="fas fa-search"></i>
              </a>
            </button>
          </div>
        </div>
      </nav>

      <!-- Secondary Navbar -->

      <nav id="secondary-navbar" class="navbar navbar-expand-lg navbar-custom-bot ">
        <div class="container">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarBotSupportedContent"
            aria-controls="navbarBotSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon">
              <i class="fas fa-bars  pt-1"></i>
            </span>
          </button>
          <div class="collapse navbar-collapse" id="navbarBotSupportedContent">
            <ul class="navbar-nav nav-fill w-100">
              <li class="nav-item">
                <div class="dropdown dropdownSupplies">
                  <a class="btn btn-secondary one-line" href="../pages/home.php" role="button" aria-haspopup="true"
                    aria-expanded="false">
                    Designs
                  </a>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                  </div>
                </div>
              </li>
              <li class="nav-item">
                <div class="dropdown dropdownSupplies">
                  <a class="btn btn-secondary one-line" href="../pages/home.php" role="button" aria-haspopup="true"
                    aria-expanded="false">
                    Machines
                  </a>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                  </div>
                </div>
              </li>
              <li class="nav-item">
                <div class="dropdown dropdownSupplies">
                  <a class="btn btn-secondary one-line" href="../pages/home.php" role="button" aria-haspopup="true"
                    aria-expanded="false">
                    Inks
                  </a>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                  </div>
                </div>
              </li>
              <li class="nav-item">
                <div class="dropdown dropdownSupplies">
                  <a class="btn btn-secondary " href="../pages/home.php" role="button" aria-haspopup="true"
                    aria-expanded="false">
                    Needles and Cartridges
                  </a>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                  </div>
                </div>
              </li>
              <li class="nav-item">
                <div class="dropdown dropdownSupplies">
                  <a class="btn btn-secondary " href="../pages/home.php" role="button" aria-haspopup="true"
                    aria-expanded="false">
                    Grips Tips and Tubes
                  </a>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                  </div>
                </div>
              </li>
              <li class="nav-item">
                <div class="dropdown dropdownSupplies">
                  <a class="btn btn-secondary " href="../pages/home.php" role="button" aria-haspopup="true"
                    aria-expanded="false">
                    Studio Furniture
                  </a>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                  </div>
                </div>
              </li>
              <li class="nav-item">
                <div class="dropdown dropdownSupplies">
                  <a class="btn btn-secondary one-line" href="../pages/home.php" role="button" aria-haspopup="true"
                    aria-expanded="false">
                    Aftercare
                  </a>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                  </div>
                </div>
              </li>
              <li class="nav-item">
                <div class="dropdown dropdownSupplies">
                  <a class="btn btn-secondary " href="../pages/home.php" role="button" aria-haspopup="true"
                    aria-expanded="false">
                    Medical Equipment
                  </a>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                  </div>
                </div>
              </li>
              <li class="nav-item">
                <div class="dropdown dropdownSupplies ">
                  <a class="btn btn-secondary one-line" href="../pages/home.php" role="button" aria-haspopup="true"
                    aria-expanded="false">
                    Piercings
                  </a>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      </div>

      @yield('content')

      <!-- Footer-->
      <footer class="mt-2">
        <div class="container-expanded border-top  py-2">
          <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-4 border-right">
              <ul class="list-inline">
                <p class="text-uppercase font-weight-light"> Information</p>
                <li>
                  <a href="{{ url('/about_us') }}" class="list-inline-item font-weight-normal  text-dark ">About us</a>
                </li>
                <li>
                  <a href="{{ url('/faq') }}" class="list-inline-item font-weight-normal text-dark ">FAQ</a>
                </li>
                <li>
                  <a href="{{ url('/payments_and_shipment') }}"
                    class="list-inline-item font-weight-normal text-dark ">Payments
                    and Shipment</a>
                </li>
                <li>
                  <a href="{{ url('/returns_and_replacements') }}"
                    class="list-inline-item font-weight-normal text-dark ">Returns and Replacements</a>
                </li>
                <li>
                  <a href="{{ url('/warranty') }}" class="list-inline-item font-weight-normal text-dark ">Warranty</a>
                </li>
                <br>
                <li id="copyright-desktop"> Copyright © ArtifactInk 2020
                <li>

              </ul>
            </div>
            <div class="col-sm-3">
              <ul class="list-inline">
                <p class="text-uppercase"> CONTACTS </p>
                <li>
                  <a href="#" class="list-inline-item font-weight-bold text-dark">Store 1</a>
                </li>
                <li> Lorem ipsum dolor sit amet.</li>
                <li> Lorem ipsum dolor sit amet.</li>
                <li> Lorem ipsum dolor sit amet.
                <li>
              </ul>
            </div>
            <div class="col-sm-3">
              <div class="container-expanded">
                <div class="row py-1">

                </div>
                <div class="row justify-content-start">
                  <div class="social-network-bubble">
                    <a href="../pages/home.php">
                      <i class="fab fa-facebook-f fa-2x circle-icon"></i>
                    </a>
                  </div>
                  <div class="social-network-bubble">
                    <a href="../pages/home.php">
                      <i class="fab fa-instagram fa-2x circle-icon"></i>
                    </a>
                  </div>
                  <div class="social-network-bubble">
                    <a href="../pages/home.php">
                      <i class="fa fa-twitter fa-2x circle-icon"> </i>
                    </a>
                  </div>
                </div>
                <div class="row">
                  <div>
                    <form>
                      <div class="form-group">
                        <label for="newsletter_email" class="col-form-label-sm ">Subscribe to our
                          Newsletter</label>

                        <div class="input-group mb-3">
                          <input type="email" class="form-control-sm" id="newsletter_email" aria-describedby="emailHelp"
                            aria-describedby="button-newsletter">
                          <div class="input-group-append">
                            <button class="btn btn-secondary btn-sm text" type="button"
                              id="button-nwesletter">Subscribe</button>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                  <p id="copyright-mobile"> Copyright © ArtifactInk 2020 </p>
                </div>

              </div>
            </div>
            <div class="col-sm-1"></div>
          </div>
        </div>
      </footer>
    </div>
</body>

</html>
  