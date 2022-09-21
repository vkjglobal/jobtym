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
                    <i class="link-icon" data-feather="mail"></i>
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

        </ul>
    </div>
</nav>
