<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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

            @include('alert::form')

            @includeWhen(optional($profile)->summary, 'landing.partials.summary', [
                'summary' => optional($profile)->summary
            ])

            @php $skills = optional($profile)->skills @endphp
            @includeWhen($skills && $skills->count(), 'landing.partials.skill', [
                'skills' => $skills
            ])

            @php $work_experiences = optional($profile)->work_experiences @endphp
            @includeWhen($work_experiences && $work_experiences->count(), 'landing.partials.skill', [
                'work_experiences' => $work_experiences
            ])

            @php $educations = optional($profile)->educations @endphp
            @includeWhen($educations && $educations->count(), 'landing.partials.skill', [
                'educations' => $educations
            ])

            @php $interests = optional($profile)->interests @endphp
            @includeWhen($interests && $interests->count(), 'landing.partials.skill', [
                'interests' => $interests
            ])

            @php $portfolios = optional($profile)->portfolios @endphp
            @includeWhen($portfolios && $portfolios->count(), 'landing.partials.skill', [
                'portfolios' => $portfolios
            ])

            @include('landing.partials.contact')

            @include('landing.partials.footer')

        </div>
    </div>

    @include('alert::modal')

</div>

<script src="js/jquery-2.1.4.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/scripts.js"></script>
</body>
</html>