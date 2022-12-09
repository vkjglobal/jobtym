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

            <!-- Aptitude Tests -->
            <li class="nav-item {{ request()->is('employer/aptitude-tests*') ? 'active' : '' }}">
                <a class="nav-link" data-toggle="collapse" href="#aptitude-tests" role="button" aria-expanded="false"
                    aria-controls="aptitude-tests">
                    <i class="link-icon" data-feather="cpu"></i>
                    <span class="link-title">Aptitude Tests</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse {{ request()->is('employer/aptitude-tests*') ? 'show' : '' }}" id="aptitude-tests">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('employer.aptitude-tests.create') }}"
                                class="nav-link {{ request()->is('employer/aptitude-tests/create') ? 'active' : '' }}">
                                Create
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('employer.aptitude-tests.index') }}"
                                class="nav-link {{ request()->is('employer/aptitude-tests') ? 'active' : '' }}">
                                List
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <!-- Aptitude Tests End -->

            <!-- Reports -->
            <li class="nav-item {{ request()->is('employer/reports') ? 'active' : '' }}">
                <a class="nav-link" data-toggle="collapse" href="#" role="button" aria-expanded="false"
                    aria-controls="reports">
                    <i class="link-icon" data-feather="cpu"></i>
                    <span class="link-title">Reports</span>
                </a>
            </li>
            <!-- Reports End -->

            <!-- Billings And Payments -->
            <li class="nav-item {{ request()->is('employer/billing') ? 'active' : '' }}">
                <a class="nav-link" data-toggle="collapse" href="#" role="button" aria-expanded="false"
                    aria-controls="billings">
                    <i class="link-icon" data-feather="cpu"></i>
                    <span class="link-title">Billings And Payments</span>
                </a>
            </li>
            <!-- Billings And Payments End -->


        </ul>
    </div>
</nav>
