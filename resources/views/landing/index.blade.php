<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Emeka</title>
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

    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body id="page-top" data-spy="scroll" data-target=".navbar">

<div id="main-wrapper">

    @include('landing.partials.preloader')

    <div class="columns-block">

        <div class="left-col-block blocks">
            @include('landing.partials.header')
        </div>

        <div class="right-col-block blocks">

            @include('landing.partials.intro')

            @include('landing.partials.expertise')

            @include('landing.partials.skill')

            @include('landing.partials.experience')

            @include('landing.partials.education')

            @include('landing.partials.interest')

            @include('landing.partials.portfolio')

            @include('landing.partials.contact')

            @include('landing.partials.footer')

        </div>
    </div>
</div>

<script src="js/jquery-2.1.4.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/scripts.js"></script>
</body>
</html>