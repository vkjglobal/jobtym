<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <title>{{ config('app.name', 'Jobtym') }} :: Employer</title> --}}
    <title>Jobtym</title>

    <link rel="shortcut icon" href="{{ asset('admin_assets/images/favicon.png') }}" />
    <!-- core:css -->
    <link rel="stylesheet" href="{{ asset('admin_assets/vendors/core/core.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/fonts/feather-font/css/iconfont.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/css/demo_1/style.css') }}">
    <!-- End layout styles -->
    <!-- custom styles -->
    @notifyCss
    @stack('custom_css')

    <style>
        .notify {
            z-index: 999999999 !important;
        }
    </style>

</head>

<body class="sidebar-dark">
    <div class="main-wrapper">

        @if (auth()->guard('employer')->user())
            <!-- partial:partials/_sidebar -->
            @include('employer.layouts.partials.sidebar')
            <!-- partial -->
        @endif

        <div class="page-wrapper">

            @if (auth()->guard('employer')->user())
                <!-- partial:partials/_navbar -->
                @include('employer.layouts.partials.navbar')
                <!-- partial -->
            @endif

            <div class="page-content">
                <!-- Main Content -->
                @yield('content')
                <!-- Main Content Ends -->
            </div>

            @if (auth()->guard('employer')->user())
                <!-- partial:partials/_footer -->
                @include('admin.layouts.partials.footer')
                <!-- partial -->
            @endif

        </div>
    </div>

    <!-- core:js -->
    <script src="{{ asset('admin_assets/vendors/core/core.js') }}"></script>
    <!-- endinject -->
    <!-- plugin js -->
    <script src="{{ asset('admin_assets/vendors/chartjs/Chart.min.js') }}"></script>
    <script src="{{ asset('admin_assets/vendors/jquery.flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('admin_assets/vendors/jquery.flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('admin_assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('admin_assets/vendors/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('admin_assets/vendors/progressbar.js/progressbar.min.js') }}"></script>
    <script src="{{ asset('admin_assets/vendors/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('admin_assets/js/template.js') }}"></script>
    <script src="{{ asset('admin_assets/js/dashboard.js') }}"></script>
    <script src="{{ asset('admin_assets/js/datepicker.js') }}"></script>
    <!-- end custom js -->
    <!-- custom js -->
    @notifyJs
    <x:notify-messages />
    @stack('custom_js')

</body>

</html>
