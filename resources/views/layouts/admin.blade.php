<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    {{-- <link href="{{ asset('frontend/admin/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/admin/css/bootstrap5.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/admin/css/custom.css') }}" rel="stylesheet"> --}}

    <!-- Custom fonts for this template-->
    <link href="{{ asset('frontend/admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('frontend/admin/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/admin/css/custom.css') }}" rel="stylesheet">
</head>
<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        {{-- Sidebar --}}
        @include('layouts.incl.sidebar')
        {{-- end of sidebar --}}

        {{-- content wrapper --}}
        <div id="content-wrapper" class="d-flex flex-column">

            {{-- main content --}}
            <div id="content">
                {{-- nav bar --}}
                    @include('layouts.incl.adminnavbar')
                {{-- end of nav bar --}}

                {{-- all content here --}}
                <div class="container-fluid">
                    @yield('content')
                </div>
                {{-- end of all content here --}}
            </div>
            {{-- end of main content --}}

            {{-- footer --}}
            @include('layouts.incl.adminfooter')
            {{-- end of footer --}}

        </div>
        {{-- end of content wrapper --}}
    </div>

    <!-- Scripts -->
    <script src="{{ asset('frontend/admin/js/bootstrap.bundle.min.js') }}" defer></script>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('frontend/admin/vendor/jquery/jquery.min.js') }}" defer></script>
    <script src="{{ asset('frontend/admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}" defer></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('frontend/admin/vendor/jquery-easing/jquery.easing.min.js') }}" defer></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('frontend/admin/js/sb-admin-2.min.js') }}" defer></script>

    <!-- Page level plugins -->
    <script src="{{ asset('frontend/admin/vendor/chart.js/Chart.min.js') }}" defer></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('frontend/admin/js/demo/chart-area-demo.js') }}" defer></script>
    <script src="{{ asset('frontend/admin/js/demo/chart-pie-demo.js') }}" defer></script>

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
</body>
</html>
