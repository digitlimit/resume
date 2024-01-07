@php
    $profile = optional($me)->profile
@endphp
@inject('imageHelper', 'App\Helpers\Image')

@if($profile)
    <li class="nav-item dropdown d-none d-xl-inline-block user-dropdown">
        <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown"
           aria-expanded="false">
            @if($image = optional($profile)->image)
                <img class="img-xs rounded-circle"
                     src="{{$imageHelper->profile($image->name)}}" alt="Profile image">
            @endif
        </a>

        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
            <div class="dropdown-header text-center">

                @if($image = optional($profile)->image)
                    <img class="img-md rounded-circle"  src="{{$imageHelper->profile($image->name)}}"
                         alt="Profile image">
                @endif

                <p class="mb-1 mt-3 font-weight-semibold">{{optional($profile)->first_name}}</p>

                <p class="font-weight-light text-muted mb-0">{{optional($me)->email}}</p>
            </div>
            <a href="{{route($me->profile ? 'common.profile.edit' : 'common.profile.create')}}" class="dropdown-item">
                My Profile
                <span class="badge badge-pill badge-danger"></span>
                <i class="dropdown-item-icon ti-dashboard"></i>
            </a>
            <a href="{{route('common.message.index')}}" class="dropdown-item">
                Messages
                <i class="dropdown-item-icon ti-comment-alt"></i>
            </a>
            <a href="{{route('common.profile.signout')}}" class="dropdown-item">
                Sign Out
                <i class="dropdown-item-icon ti-power-off"></i>
            </a>
        </div>
    </li>
@endif