<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">

    </div>

    @isset($me)
        <div class="navbar-menu-wrapper d-flex align-items-center">
            <ul class="navbar-nav">
                @if($me->contact)
                    <li class="nav-item font-weight-semibold d-none d-lg-block">
                        Phone : {{$me->contact->phone_number}}
                    </li>
                @endif
            </ul>

            <ul class="navbar-nav ml-auto">
                @include('admin.common.partials.message-menu')
                @include('admin.common.partials.user-menu')
            </ul>

            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">
                <span class="mdi mdi-menu"></span>
            </button>
        </div>
    @endisset
</nav>
