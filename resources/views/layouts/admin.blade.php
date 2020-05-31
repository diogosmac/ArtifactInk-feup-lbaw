<!DOCTYPE html>
<html lang="en-US">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }} @yield('title', 'Admin')</title>

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

  <!-- bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <!-- custom css -->
  <link rel="stylesheet" href="{{ asset('css/common.css') }}">
  <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
  <link rel="stylesheet" href="{{ asset('css/search.css') }}">
  <!-- custom js -->
  <script src="{{ asset('js/admin.js') }}"></script>
  <script src="{{ asset('js/admin_search.js') }}" defer></script>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>

<body>

  @include('partials.admin.navbar')

  <div class="container-fluid">
    <div class="row">

      @include('partials.admin.sidebar')
      @yield('content')

    </div>
  </div>
</body>

<footer class="footer">
</footer>

</html>