<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">


  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }} @yield('title', '')</title>

  <!-- ****** faviconit.com favicons ****** -->
  <link rel="shortcut icon" href="{{ asset('assets/faviconit/favicon.ico') }}">
  <link rel="icon" sizes="16x16 32x32 64x64" href="{{ asset('assets/faviconit/favicon.ico') }}">
  <link rel="icon" type="image/png" sizes="196x196" href="{{ asset('assets/faviconit/favicon-192.png') }}">
  <link rel="icon" type="image/png" sizes="160x160" href="{{ asset('assets/faviconit/favicon-160.png') }}">
  <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('assets/faviconit/favicon-96.png') }}">
  <link rel="icon" type="image/png" sizes="64x64" href="{{ asset('assets/faviconit/favicon-64.png') }}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/faviconit/favicon-32.png') }}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/faviconit/favicon-16.png') }}">
  <link rel="apple-touch-icon" href="{{ asset('assets/faviconit/favicon-57.png') }}">
  <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('assets/faviconit/favicon-114.png') }}">
  <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('assets/faviconit/favicon-72.png') }}">
  <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('assets/faviconit/favicon-144.png') }}">
  <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('assets/faviconit/favicon-60.png') }}">
  <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('assets/faviconit/favicon-120.png') }}">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/faviconit/favicon-76.png') }}">
  <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('assets/faviconit/favicon-152.png') }}">
  <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/faviconit/favicon-180.png') }}">
  <meta name="msapplication-TileColor" content="#FFFFFF">
  <meta name="msapplication-TileImage" content="{{ asset('assets/faviconit/favicon-144.png') }}">
  <meta name="msapplication-config" content="{{ asset('assets/faviconit/browserconfig.xml') }}">
  <!-- ****** faviconit.com favicons ****** -->


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
  <link href="{{ asset('css/checkout.css') }}" rel="stylesheet">
  <link href="{{ asset('css/product.css') }}" rel="stylesheet">
  <link href="{{ asset('css/item_list.css') }}" rel="stylesheet">

  <!-- todo distribute scripts -->

  <script src="{{ asset('js/checkout.js') }}" defer></script>
  <script type="text/javascript">
    // Fix for Firefox autofocus CSS bug
    // See: http://stackoverflow.com/questions/18943276/html-5-autofocus-messes-up-css-loading/18945951#18945951
  </script>

</head>

<body>
  <div class="main-container">
    <div class="fixed-top ">
      <nav class="navbar navbar-expand-md navbar-custom-top">
        <a class="navbar-brand" href="{{ url('/') }}">
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
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <div class="btn-group">
                <a class="btn " href="#" role="button" id="dropdownMenuAccount" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false">
                  <span>
                    <i class="fas fa-user"></i>
                  </span>
                  {{ Auth::user()->name}}
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuAccount">
                <img class="profile-pic-bubble"
                    src="{{ asset('storage/img_user/' . Auth::user()->profilePicture()->get()->first()->link) }}"
                    alt="{{ Auth::user()->name}}">
                  <h5 class="dropdown-header">{{ Auth::user()->name}}</h5>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="{{ url('/profile') }}">My Account</a>
                  <a class="dropdown-item" href="#">My Order</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="{{ url('sign_out') }}">Sign Out</a>
                </div>
              </div>
            </li>
          </ul>
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
                <a href="../pages/about_us.php" class="list-inline-item font-weight-normal  text-dark ">About us</a>
              </li>
              <li>
                <a href="../pages/faq.php" class="list-inline-item font-weight-normal text-dark ">FAQ</a>
              </li>
              <li>
                <a href="../pages/payments_and_shipment.php"
                  class="list-inline-item font-weight-normal text-dark ">Payments
                  and Shipment</a>
              </li>
              <li>
                <a href="../pages/returns_and_replacements.php"
                  class="list-inline-item font-weight-normal text-dark ">Returns and Replacements</a>
              </li>
              <li>
                <a href="../pages/warranty.php" class="list-inline-item font-weight-normal text-dark ">Warranty</a>
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


{{-- Success Alert --}}
@if(session('status'))
  <div class="alert alert-success alert-dismissible fade show fixed-top mx-auto " style="max-width: 40em;" role="alert">
    {{session('status')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif

{{-- Error Alert --}}
@if ($errors->any())
<div class="alert alert-danger alert-dismissible fade show fixed-top mx-auto" style="max-width: 40em;" role="alert">
    @foreach ($errors->all() as $error)
    <p>{{ $error }}</p>
    @endforeach
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif

</html>

