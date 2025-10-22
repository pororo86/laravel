<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  <link rel="icon" type="image/png" href="{{ asset('bootstrap-5.3.5-dist/img/logo unpam.png') }}">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('bootstrap-5.3.5-dist/css/bootstrap.min.css') }}">
</head>
<div id="loader">
    <div class="loader-content">
        <img src="{{ asset('bootstrap-5.3.5-dist/img/logo unpam.png') }}" alt="Logo" class="logo">
        <div class="spinner"></div>
    </div>
</div>
<body style="font-family: Arial, Helvetica, sans-serif;">
  @include('partials.header')
  <main style="padding: 8em;">
    @yield('content')
  </main>
  @include('partials.footer')

  <script>
    window.addEventListener("load", function () {
        const loader = document.getElementById("loader");
        loader.classList.add("hidden");
    });
  </script>
</body>
</html>
