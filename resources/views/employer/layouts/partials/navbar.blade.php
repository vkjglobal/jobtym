@if (Auth::guard('employer')->guest())
    <li class="nav-item">
        <a class="nav-link" href="{{ route('employer.login') }}">{{ __('Login') }}</a>
    </li>
    @if (Route::has('employer.register'))
        <li class="nav-item">
            <a class="nav-link" href="{{ route('employer.register') }}">{{ __('Register') }}</a>
        </li>
    @endif
@else
    <nav class="navbar">
        <a href="#" class="sidebar-toggler">
            <i data-feather="menu"></i>
        </a>
        <div class="navbar-content">
            <ul class="navbar-nav">
                <li class="nav-item dropdown nav-profile">
                    <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="https://picsum.photos/30/30?random=1" alt="userr">
                    </a>
                    <div class="dropdown-menu" aria-labelledby="profileDropdown">
                        <div class="dropdown-header d-flex flex-column align-items-center">
                            <div class="figure mb-3">
                                <img src="https://picsum.photos/80/80?random=1" alt="">
                            </div>
                            <div class="info text-center">
                                <p class="name font-weight-bold mb-0">
                                    {{ Auth::guard('employer')->user()->name }}
                                </p>
                                <p class="email text-muted mb-3">
                                    {{ Auth::guard('employer')->user()->email }}
                                </p>
                            </div>
                        </div>
                        <div class="dropdown-body">
                            <ul class="profile-nav p-0 pt-3">
                                <li class="nav-item">
                                    <a href="{{ url('employer/profile',Auth::guard('employer')->user()->id ) }}" class="nav-link">
                                        <i data-feather="user"></i>
                                        <span>Profile</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('employer.logout') }}"
                                        onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                        <i data-feather="log-out"></i>
                                        <span>{{ __('Logout') }}</span>
                                    </a>
                                    <form id="logout-form" action="{{ route('employer.logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
@endguest
