<header class="header">
    <div class="content text-center">

        @if($profile)
            <h1>{{$profile->title}}</h1>
            <p class="lead">{{$profile->job_title}}</p>
        @endif

        @includeWhen($profile->socials->count(), 'landing.partials.social-icons', [
            'socials' => $profile->socials
        ])
    </div>

    <div class="profile-img"></div>
</header>