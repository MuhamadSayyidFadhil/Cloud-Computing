<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Dashboard')</title>

  <!-- AdminLTE CSS -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/custom-dashboard.css') }}">

</head>
<body class="hold-transition sidebar-mini">

<div class="wrapper">

  {{-- Navbar --}}
  @include('partials.navbar')

{{-- Sidebar --}}
@auth
    @if(auth()->user()->role === 'guru')
        @include('partials.sidebar-guru')
    @elseif(auth()->user()->role === 'siswa')
        @include('partials.sidebar-siswa')
    @endif
@endauth


  <!-- Content Wrapper -->
  <div class="content-wrapper pt-3 px-3">
    @yield('content')
  </div>

  {{-- Footer --}}
  @include('partials.footer')

</div>

<!-- AdminLTE JS -->
<script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>
</body>
</html>
