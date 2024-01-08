<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{--<meta name="recaptcha-key" content="{{ config('services.recaptcha.key') }}">--}}

    @if(isset($page_tile))
        <title>{{$page_title}}</title>
    @else
        <title>{{optional($profile)->title ? optional($profile)->title : 'Resume'}}</title>
    @endif

    <link href="favicon.png" rel=icon>
    <link href="https://fonts.googleapis.com/css?family=Hind:300,400,500,600,700" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <style>
        .header .profile-img {
            background-image    : url({{asset('img/img-profile.jpg')}});
        }
    </style>

    @stack('header')

    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Start of Async Drift Code -->
    <script>
        "use strict";

        !function() {
            var t = window.driftt = window.drift = window.driftt || [];
            if (!t.init) {
                if (t.invoked) return void (window.console && console.error && console.error("Drift snippet included twice."));
                t.invoked = !0, t.methods = [ "identify", "config", "track", "reset", "debug", "show", "ping", "page", "hide", "off", "on" ],
                        t.factory = function(e) {
                            return function() {
                                var n = Array.prototype.slice.call(arguments);
                                return n.unshift(e), t.push(n), t;
                            };
                        }, t.methods.forEach(function(e) {
                    t[e] = t.factory(e);
                }), t.load = function(t) {
                    var e = 3e5, n = Math.ceil(new Date() / e) * e, o = document.createElement("script");
                    o.type = "text/javascript", o.async = !0, o.crossorigin = "anonymous", o.src = "https://js.driftt.com/include/" + n + "/" + t + ".js";
                    var i = document.getElementsByTagName("script")[0];
                    i.parentNode.insertBefore(o, i);
                };
            }
        }();
        drift.SNIPPET_VERSION = '0.3.1';
        drift.load('8fpbzm7drtaz');
    </script>
    <!-- End of Async Drift Code -->
</head>
<body id="page-top" data-spy="scroll" data-target=".navbar">

<div id="main-wrapper">

    @yield('content')

{{--    @include('alert::modal')--}}

</div>

<script src="js/jquery-2.1.4.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/scripts.js"></script>

@stack('footer')

</body>
</html>
