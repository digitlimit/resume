<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Star Admin</title>

    <link rel="stylesheet" href="{{asset('assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/iconfonts/ionicons/css/ionicons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/iconfonts/typicons/src/font/typicons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/css/vendor.bundle.addons.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/shared/style.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/demo_1/style.css')}}">

    <link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}"/>
</head>
<body>
<div class="container-scroller">

    @include('admin.common.partials.navbar')

    <div class="container-fluid page-body-wrapper">

        @include('admin.common.partials.sidebar')

        <div class="main-panel">

            <div class="content-wrapper">

                @yield('content')

            </div>

            @include('admin.common.partials.footer')
        </div>

    </div>

</div>


<script src="{{asset('assets/vendors/js/vendor.bundle.base.js')}}"></script>
<script src="{{asset('assets/vendors/js/vendor.bundle.addons.js')}}"></script>
<script src="{{asset('assets/js/shared/off-canvas.js')}}"></script>
<script src="{{asset('assets/js/shared/misc.js')}}"></script>
<script src="{{asset('assets/js/demo_1/dashboard.js')}}"></script>

</body>
</html>