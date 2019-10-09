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
    <link rel="stylesheet" href="{{asset('assets/vendors/font-awesome/css/fontawesome.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/css/vendor.bundle.addons.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/shared/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/demo_1/style.css')}}">

    <link rel="stylesheet" href="{{asset('assets/vendors/quill/quill.snow.css')}}">

    <link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}"/>

    <style>
        .ql-container{
            clear: right !important;
            height: 150px;
        }
        .help-block{
            margin-bottom: 0;
        }
        .ion{
            color: white;
            padding: 0 !important;
        }
        table .btn{
            float: right;
            margin-right: 5px;
            padding:5px !important;
            padding-left:8px !important;
        }

        .it .btn-orange
        {
            background-color: blue;
            border-color: #777!important;
            color: #777;
            text-align: left;
            width:100%;
        }
        .it input.form-control
        {

            border:none;
            margin-bottom:0px;
            border-radius: 0px;
            border-bottom: 1px solid #ddd;
            box-shadow: none;
        }
        .it .form-control:focus
        {
            border-color: #ff4d0d;
            box-shadow: none;
            outline: none;
        }
        .fileUpload {
            position: relative;
            overflow: hidden;
        }
        .fileUpload input.upload {
            position: absolute;
            top: 0;
            right: 0;
            margin: 0;
            padding: 0;
            font-size: 20px;
            cursor: pointer;
            opacity: 0;
            filter: alpha(opacity=0);
        }
    </style>

    @stack('header')

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

    @include('alert::modal')
</div>


<script src="{{asset('assets/vendors/js/vendor.bundle.base.js')}}"></script>
<script src="{{asset('assets/vendors/js/vendor.bundle.addons.js')}}"></script>
{{--<script src="{{asset('assets/vendors/font-awesome/js/fontawesome.js')}}"></script>--}}
<script src="{{asset('assets/js/shared/off-canvas.js')}}"></script>
<script src="{{asset('assets/js/shared/misc.js')}}"></script>
<script src="{{asset('assets/js/demo_1/dashboard.js')}}"></script>

<script src="{{asset('assets/vendors/quill/quill.js')}}"></script>
<script src="{{asset('assets/js/shared/common.js')}}"></script>

@stack('footer')

</body>
</html>