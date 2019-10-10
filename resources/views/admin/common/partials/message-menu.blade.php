<?php $messages = optional($me)->messages; ?>

<li class="nav-item dropdown">

    <a class="nav-link count-indicator" id="notificationDropdown" href="#" data-toggle="dropdown">
        <i class="mdi mdi-email-outline"></i>
        <span class="count bg-success">{{$messages->count()}}</span>
    </a>

    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0"
         aria-labelledby="notificationDropdown">

        @foreach($messages->take(5) as $message)
            <a class="dropdown-item py-3 border-bottom">
                <p class="mb-0 font-weight-medium float-left">{{Str::limit($message->subject, 15)}} </p>
            </a>
        @endforeach

        @if($messages->count() > 5)
            <a class="dropdown-item py-3 border-bottom">
                <p class="mb-0 font-weight-medium float-left">You have more messages </p>
                <span class="badge badge-pill badge-primary float-right">View all</span>
            </a>
        @endif
    </div>
</li>