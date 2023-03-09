<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Dashboard</title>
    <!-- CSS files -->
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
    @yield('css')

  </head>
  <body  class=" layout-fluid">
    <div class="page">
        @include('layouts.header')
        @include('layouts.menu')
        <div class="page-wrapper">
            <div class="page-body">
                <div class="container-xl">
                    <div class="row row-deck row-cards">
                        <h1>@yield('title-content')</h1>
                        @yield('content')
                    </div>
                </div>
            </div>
            @include('layouts.footer')
        </div>
    </div>
    <!-- Libs JS -->
    <script src="{{asset('assets/js/astr.js')}}"></script>
    <script src="{{asset('assets/js/main.js')}}"></script>
    @yield('js')
  </body>
</html>
