<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- ****** faviconit.com favicons ****** -->
  <link rel="shortcut icon" href="{{ asset('images/faviconit/favicon.ico') }}">
  <link rel="icon" sizes="16x16 32x32 64x64" href="{{ asset('images/faviconit/favicon.ico') }}">
  <link rel="icon" type="image/png" sizes="196x196" href="{{ asset('images/faviconit/favicon-192.png') }}">
  <link rel="icon" type="image/png" sizes="160x160" href="{{ asset('images/faviconit/favicon-160.png') }}">
  <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('images/faviconit/favicon-96.png') }}">
  <link rel="icon" type="image/png" sizes="64x64" href="{{ asset('images/faviconit/favicon-64.png') }}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/faviconit/favicon-32.png') }}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/faviconit/favicon-16.png') }}">
  <link rel="apple-touch-icon" href="{{ asset('images/faviconit/favicon-57.png') }}">
  <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('images/faviconit/favicon-114.png') }}">
  <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('images/faviconit/favicon-72.png') }}">
  <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('images/faviconit/favicon-144.png') }}">
  <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('images/faviconit/favicon-60.png') }}">
  <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('images/faviconit/favicon-120.png') }}">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('images/faviconit/favicon-76.png') }}">
  <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('images/faviconit/favicon-152.png') }}">
  <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/faviconit/favicon-180.png') }}">
  <meta name="msapplication-TileColor" content="#FFFFFF">
  <meta name="msapplication-TileImage" content="{{ asset('images/faviconit/favicon-144.png') }}">
  <meta name="msapplication-config" content="{{ asset('images/faviconit/browserconfig.xml') }}">
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
  <link href="{{ asset('css/sign_in.css') }}" rel="stylesheet">

  <script type="text/javascript">
    // Fix for Firefox autofocus CSS bug
    // See: http://stackoverflow.com/questions/18943276/html-5-autofocus-messes-up-css-loading/18945951#18945951
  </script>

</head>

<body>
  <div class="container">
    <div class="row">
      @yield('content')
    </div>
  </div>
</body>

</html>

<!-- Save to use as example on if auth
    <main>
      <header>
        <h1><a href="{{ url('/cards') }}">Thingy!</a></h1>
        @if (Auth::check())
        <a class="button" href="{{ url('/logout') }}"> Logout </a> <span>{{ Auth::user()->name }}</span>
        @endif
      </header>
      <section id="content">
        @yield('content')
      </section>
    </main>
  </body>
</html>

-->