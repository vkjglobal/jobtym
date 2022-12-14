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
            <li class="nav-item {{ request()->is('admin') ? 'active' : '' }}">
                <a href="{{ route('admin.home') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item nav-category">Menu</li>

            <!-- Employers -->
            <li class="nav-item {{ request()->is('admin/employers*') ? 'active' : '' }}">
                <a class="nav-link" data-toggle="collapse" href="#employers" role="button" aria-expanded="false"
                    aria-controls="employers">
                    <i class="link-icon" data-feather="cpu"></i>
                    <span class="link-title">Employers</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse {{ request()->is('admin/employers*') ? 'show' : '' }}" id="employers">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('admin.employers.create') }}"
                                class="nav-link {{ request()->is('admin/employers/create') ? 'active' : '' }}">
                                Create
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.employers.index') }}"
                                class="nav-link {{ request()->is('admin/employers') ? 'active' : '' }}">
                                List
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <!-- Employers End -->

            <!-- Job Seekers / Users -->
            <li class="nav-item {{ request()->is('admin/users*') ? 'active' : '' }}">
                <a class="nav-link" data-toggle="collapse" href="#users" role="button" aria-expanded="false"
                    aria-controls="users">
                    <i class="link-icon" data-feather="user"></i>
                    <span class="link-title">Users</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse {{ request()->is('admin/users*') ? 'show' : '' }}" id="users">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('admin.users.create') }}"
                                class="nav-link {{ request()->is('admin/users/create') ? 'active' : '' }}">
                                Create
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.users.index') }}"
                                class="nav-link {{ request()->is('admin/users') ? 'active' : '' }}">
                                List
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <!-- Job Seekers / Users End -->

            <!-- Packages -->
            <li class="nav-item {{ request()->is('admin/packages*') ? 'active' : '' }}">
                <a class="nav-link" data-toggle="collapse" href="#packages" role="button" aria-expanded="false"
                    aria-controls="packages">
                    <i class="link-icon" data-feather="package"></i>
                    <span class="link-title">Packages</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse {{ request()->is('admin/packages*') ? 'show' : '' }}" id="packages">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('admin.packages.create') }}"
                                class="nav-link {{ request()->is('admin/packages/create') ? 'active' : '' }}">
                                Create
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.packages.index') }}"
                                class="nav-link {{ request()->is('admin/packages') ? 'active' : '' }}">
                                List
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <!-- Packages End -->

            <!-- Reports -->
            <li class="nav-item {{ request()->is('admin/all-job-report*') ? 'active' : '' }}">
                <a class="nav-link" data-toggle="collapse" href="#reports" role="button" aria-expanded="false"
                    aria-controls="reports">
                    <i class="link-icon" data-feather="bookmark"></i>
                    <span class="link-title">Reports</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse {{ request()->is('admin/all-job-report*') ? 'show' : '' }}" id="reports">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('admin.report.allJob') }}"
                                class="nav-link {{ request()->is('admin/all-job-report') ? 'active' : '' }}">
                                All Jobs
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.report.matchedJob') }}" class="nav-link {{ request()->is('admin/packages') ? 'active' : '' }}">
                                Matched Jobs
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <!-- Reports End -->

            <!-- Manage Payments -->
            <li class="nav-item {{ request()->is('admin/manage-payment*') ? 'active' : '' }}">
                <a class="nav-link" data-toggle="collapse" href="#managePayment" role="button" aria-expanded="false"
                    aria-controls="managePayment">
                    <i class="link-icon" data-feather="bookmark"></i>
                    <span class="link-title">Manage Payments</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse {{ request()->is('admin/manage-payment*') ? 'show' : '' }}" id="managePayment">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="#"
                                class="nav-link {{ request()->is('admin/job-post-price') ? 'active' : '' }}">
                                Job Post Pricing
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link {{ request()->is('admin/packages') ? 'active' : '' }}">
                                Manage Cards
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#"
                                class="nav-link {{ request()->is('admin/manage-payment') ? 'active' : '' }}">
                                Windcave payment gateway
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link {{ request()->is('admin/packages') ? 'active' : '' }}">
                                Payment history with invoices
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <!-- Manage Payments End -->

            <li class="nav-item nav-category">Others</li>

            <!-- categories -->
            <li class="nav-item {{ request()->is('admin/categories') ? 'active' : '' }}">
                <a href="{{ route('admin.categories.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Categories</span>
                </a>
            </li>
            <!-- categories End -->

        </ul>
    </div>
</nav>
