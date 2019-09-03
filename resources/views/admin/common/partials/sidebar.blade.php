<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.index')}}">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.profiles.index')}}">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Profile</span>
            </a>
        </li>
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
                        <a class="nav-link" href="{{route('admin.resumes.summaries.index')}}">Summary</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.resumes.work_experiences.index')}}">Work Experience</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.resumes.educations.index')}}">Education</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.resumes.skills.index')}}">Skills</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.resumes.core_values.index')}}">Core Values</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.resumes.socials.index')}}">Social</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.resumes.portfolios.index')}}">Portfolio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.resumes.interests.index')}}">Interest</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.resumes.contacts.index')}}">Contact</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.messages.index')}}">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Messages</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.images.index')}}">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Images</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.users.index')}}">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Users</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.settings.index')}}">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Settings</span>
            </a>
        </li>
    </ul>
</nav>