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

             <!-- Question Tests -->
             {{-- <li class="nav-item {{ request()->is('employer/question*') ? 'active' : '' }}">
                <a class="nav-link" data-toggle="collapse" href="#question-tests" role="button" aria-expanded="false"
                    aria-controls="question-tests">
                    <i class="link-icon" data-feather="cpu"></i>
                    <span class="link-title">Questions</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse {{ request()->is('employer/question*') ? 'show' : '' }}" id="question-tests">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('employer.questions.create') }}"
                                class="nav-link {{ request()->is('employer/questions/create') ? 'active' : '' }}">
                                Create
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('employer.questions.index') }}"
                                class="nav-link {{ request()->is('employer/questions') ? 'active' : '' }}">
                                List
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <!-- Question Tests End -->

            <!-- Option Tests -->
            <li class="nav-item {{ request()->is('employer/option*') ? 'active' : '' }}">
                <a class="nav-link" data-toggle="collapse" href="#option-tests" role="button" aria-expanded="false"
                    aria-controls="option-tests">
                    <i class="link-icon" data-feather="cpu"></i>
                    <span class="link-title">Option</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse {{ request()->is('employer/option*') ? 'show' : '' }}" id="option-tests">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('employer.options.create') }}"
                                class="nav-link {{ request()->is('employer/options/create') ? 'active' : '' }}">
                                Create
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('employer.options.index') }}"
                                class="nav-link {{ request()->is('employer/options') ? 'active' : '' }}">
                                List
                            </a>
                        </li>
                    </ul>
                </div>
            </li> --}}
            <!-- Option Tests End -->

            <!-- Result Tests -->
            <li class="nav-item {{ request()->is('employer/result*') ? 'active' : '' }}">
                <a class="nav-link" data-toggle="collapse" href="#result-tests" role="button" aria-expanded="false"
                    aria-controls="result-tests">
                    <i class="link-icon" data-feather="cpu"></i>
                    <span class="link-title">result</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse {{ request()->is('employer/result*') ? 'show' : '' }}" id="result-tests">
                    <ul class="nav sub-menu">
                        {{-- <li class="nav-item">
                            <a href="{{ route('employer.results.create') }}"
                                class="nav-link {{ request()->is('employer/results/create') ? 'active' : '' }}">
                                Create
                            </a>
                        </li> --}}
                        <li class="nav-item">
                            <a href="{{ route('employer.results.index') }}"
                                class="nav-link {{ request()->is('employer/results') ? 'active' : '' }}">
                                List
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <!-- Result Tests End -->

            <!---Employees--->
            <li class="nav-item {{ request()->is('employer/employee*') ? 'active' : '' }}">
                <a class="nav-link" data-toggle="collapse" href="#employees" role="button" aria-expanded="false"
                    aria-controls="employees">
                    <i class="link-icon" data-feather="cpu"></i>
                    <span class="link-title">Employees</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse {{ request()->is('employer/employee*') ? 'show' : '' }}" id="employees">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('employer.employee.create') }}"
                                class="nav-link {{ request()->is('employer/employee/create') ? 'active' : '' }}">
                                Create
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('employer.employee.index') }}"
                                class="nav-link {{ request()->is('employer/employee') ? 'active' : '' }}">
                                List
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <!----End Employees---->
            <!-- Reports -->
            <li class="nav-item {{ request()->is('employer/reports') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('employer.job.report') }}">
                    <i class="link-icon" data-feather="cpu"></i>
                    <span class="link-title">Reports</span>
                </a>
            </li>
            <!-- Reports End -->

            <!-- Billings And Payments -->
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#billingsAndPayments" role="button" aria-expanded="false"
                    aria-controls="billingsAndPayments">
                    <i class="link-icon" data-feather="cpu"></i>
                    <span class="link-title">Billings And Payments</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="billingsAndPayments">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('employer.addmoney.paymentstripe') }}"
                                class="nav-link {{ request()->is('admin/employers/stripe') ? 'active' : '' }}">
                                Create
                            </a>
                        </li>
                        <li class="nav-item">
                            {{-- <a href="{{ route('employer.employee.index') }}" --}}
                            <a href="/employer/stripe"
                                class="nav-link {{ request()->is('admin/employers') ? 'active' : '' }}">
                                List
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <!-- Billings And Payments End -->


        </ul>
    </div>
</nav>
