<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('page-title', 'Employees')</title>
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  {{-- CSS Dependencies --}}
  <link rel="stylesheet" href="{{asset('fontawesome-free-6.4.2-web/css/all.min.css')}}" />
  <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" />
  @vite('resources/scss/app.scss')
  @yield('view-css')
</head>
<body>
  {{-- top navigation bar --}}
  @include('layouts.navbar')
  {{-- top navigation bar --}}

  {{-- offcanvas --}}
  @include('layouts.offcanvas')
  {{-- offcanvas --}}

  {{-- Main --}}
  <main>
    <div class="container-fluid">
      <div class="view-html py-3 px-lg-3">
        @yield('view-html')
      </div>

      {{-- Footer --}}
      @include('layouts.footer')
      {{-- Footer --}}
    </div>
  </main>
  {{-- Main --}}

  {{-- JS Dependencies --}}
  <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
  @stack('view-script')
  @vite('resources/js/app.js')
</body>
</html>
