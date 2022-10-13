<nav class="sidebar">
    <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
            Job<span>tym</span>
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">
            <li class="nav-item nav-category">Main</li>
            <li class="nav-item {{ request()->is('employer') ? 'active' : '' }}">
                <a href="{{ route('employer.home') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item nav-category">Menu</li>

            <!-- Job Post -->
            <li class="nav-item {{ request()->is('employer/job-posts*') ? 'active' : '' }}">
                <a class="nav-link" data-toggle="collapse" href="#job-posts" role="button" aria-expanded="false"
                    aria-controls="job-posts">
                    <i class="link-icon" data-feather="cpu"></i>
                    <span class="link-title">Jobs</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse {{ request()->is('employer/job-posts*') ? 'show' : '' }}" id="job-posts">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('employer.job-posts.create') }}"
                                class="nav-link {{ request()->is('employer/job-posts/create') ? 'active' : '' }}">
                                Create
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('employer.job-posts.index') }}"
                                class="nav-link {{ request()->is('employer/job-posts') ? 'active' : '' }}">
                                List
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <!-- Job Posts End -->


        </ul>
    </div>
</nav>
