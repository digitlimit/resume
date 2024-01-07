<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{route($me->profile ? 'common.profile.edit' : 'common.profile.create')}}">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        {{--<li class="nav-item">--}}
            {{--<a class="nav-link"--}}
               {{--href="{{route($me->profile ? 'common.profile.edit' : 'common.profile.create')}}">--}}
                {{--<i class="menu-icon typcn typcn-document-text"></i>--}}
                {{--<span class="menu-title">Profile</span>--}}
            {{--</a>--}}
        {{--</li>--}}
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false"
               aria-controls="ui-basic">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Resume</span>
                <i class="menu-arrow"></i>
            </a>

            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link"
                           href="{{route($me->profile && $me->profile->summary ?
                           'resume.summary.edit' : 'resume.summary.create')}}">Summary</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                           href="{{route('resume.work_experience.index')}}">Work Experience</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('resume.education.index')}}">Education</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('resume.skill.index')}}">Skills</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('resume.core_value.index')}}">Core Values</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('resume.social.index')}}">Social</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('resume.portfolio.index')}}">Portfolio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('resume.interest.index')}}">Interest</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                           href="{{route($me->profile && $me->profile->contact ?
                            'resume.contact.edit' : 'resume.contact.create')}}"
                        >Contact</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('common.message.index')}}">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Messages</span>
            </a>
        </li>
        {{--<li class="nav-item">--}}
            {{--<a class="nav-link" href="">--}}
                {{--<i class="menu-icon typcn typcn-document-text"></i>--}}
                {{--<span class="menu-title">Images</span>--}}
            {{--</a>--}}
        {{--</li>--}}
        <li class="nav-item">
            <a class="nav-link" href="{{route('user.index')}}">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Users</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Settings</span>
            </a>
        </li>
    </ul>
</nav>