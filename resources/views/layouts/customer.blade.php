<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @yield('title')
    </title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    {{-- <link href="{{ asset('frontend/admin/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/admin/css/bootstrap5.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/admin/css/custom.css') }}" rel="stylesheet"> --}}

    <!-- Custom fonts for this template-->
    {{-- <link href="{{ asset('frontend/admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css"> --}}
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    {{-- <link href="{{ asset('frontend/admin/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/admin/css/custom.css') }}" rel="stylesheet"> --}}
    <style>
        a {
            text-decoration: none !important;
        }
    </style>

    <link href="{{ asset('frontend/css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/bootstrap5.css') }}" rel="stylesheet">
</head>
<body id="page-top">
    @include('layouts.incl.custnavbar')

    {{-- main content --}}
    <div id="content">
        {{-- nav bar --}}
            {{-- @include('layouts.incl.adminnavbar') --}}
        {{-- end of nav bar --}}

        {{-- all content here --}}
        {{-- <div class="container-fluid"> --}}
            @yield('content')
        {{-- </div> --}}
        {{-- end of all content here --}}
    </div>
    {{-- end of main content --}}

    <!-- Scripts -->
    {{-- <script src="{{ asset('frontend/admin/js/bootstrap.bundle.min.js') }}" defer></script> --}}


    {{-- <script src="{{ asset('frontend/admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}" defer></script> --}}

    <!-- Core plugin JavaScript-->
    {{-- <script src="{{ asset('frontend/admin/vendor/jquery-easing/jquery.easing.min.js') }}" defer></script> --}}

    <!-- Custom scripts for all pages-->
    {{-- <script src="{{ asset('js/sb-admin-2.min.js') }}" defer></script> --}}

    <!-- Bootstrap core JavaScript-->
    <script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
    {{-- Bootstrap JS --}}
    <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}" defer></script>
    <script src="{{ asset('frontend/js/custom.js') }}" defer></script>


    {{-- sweet alert --}}
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @if (session('status'))
        <script>
            // swal("","success");
            swal({
                title: "",
                text: "{{ session('status') }}",
                icon: "success",
            });
        </script>
    @endif

    {{-- <script language="JavaScript" type="text/javascript" src="/js/jquery-1.2.6.min.js"></script> --}}
    @yield('scripts')
</body>
</html>
