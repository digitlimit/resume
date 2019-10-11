@inject('imageHelper', 'App\Helpers\Image')
<header class="header">
    <div class="content text-center">

        @if($profile)
            <h1>{{$profile->title}}</h1>
            <p class="lead">{{$profile->job_title}}</p>
        @endif

            @includeWhen(optional($profile)->socials, 'landing.partials.social-icons', [
                'socials' => optional($profile)->socials
            ])
    </div>

    @php
        $photo = optional($profile)->image ? optional($profile)->image->name : '';
    @endphp

    <div class="profile-img"
         style="background-image: url({{$imageHelper->profile($photo)}})">
    </div>
</header>