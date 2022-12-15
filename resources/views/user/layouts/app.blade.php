<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jobtym</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('user_assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('user_assets/css/select2.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('user_assets/css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('user_assets/css/style.css') }}">
</head>

<body>
    <header class="home">
        <div class="container">
            <div class="row">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand logo" href="{{ url('user') }}">Jobtym</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item active">
                                <a class="nav-link" href="{{ url('user') }}">Home <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('user/find-job') }}">Find Jobs</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('user') }}">Upload Your Resume</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('user') }}">Hiring? Post a job for free</a>
                            </li>

                            @auth
                                <li class="user-logo">
                                    <a class="user-img" id="" href="{{ url('/user/dashboard') }}">
                                        <img src="{{ asset('user_assets/images/user_img.jpg')}}" alt="" style="width: 52px;height: 52px;border-radius: 50%;">
                                    </a>    
                                    {{-- <a class="nav-link" id="" data-toggle="tab" href="{{ url('/user/dashboard') }}" role="tab" aria-controls="Profile" aria-selected="false"><img src="" alt=""></a> --}}
                                </li>
                                <li class="user-name">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</li>
                                <li class="user-menu-item">
                                    <span class="user-drop-btn">
                                        <svg width="8" height="5" viewBox="0 0 8 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6.75302 0.631683C6.83489 0.551738 6.94479 0.506982 7.05922 0.506982C7.17367 0.506982 7.28358 0.551755 7.36546 0.631727L7.62888 0.889033L7.49045 0.889033C7.49216 0.904477 7.49302 0.920034 7.49302 0.935635C7.49302 0.992321 7.48166 1.04843 7.45962 1.10066C7.43758 1.15287 7.40534 1.20012 7.36473 1.23966C7.36472 1.23967 7.36469 1.2397 7.36468 1.23971L4.15819 4.36479L4.15818 4.36479L4.05349 4.25737C3.99718 4.31226 3.92165 4.34298 3.84302 4.34298C3.76438 4.34298 3.68886 4.31226 3.63254 4.25737L6.75302 0.631683ZM6.75302 0.631683C6.75301 0.631697 6.75299 0.631712 6.75298 0.631727L3.84303 3.46833M6.75302 0.631683L3.84303 3.46833M3.84303 3.46833L0.933661 0.631727L3.84303 3.46833ZM0.321355 1.23971L3.52784 4.36479L0.828848 0.739032C0.774995 0.686431 0.702702 0.656982 0.627421 0.656982C0.552141 0.656982 0.479847 0.686431 0.425994 0.739032L0.321355 0.631559C0.321297 0.631615 0.32124 0.631671 0.321182 0.631727C0.280647 0.671238 0.248426 0.718459 0.226415 0.770612C0.204372 0.822837 0.193017 0.87895 0.193017 0.935635C0.193017 0.992319 0.204372 1.04843 0.226416 1.10066C0.248447 1.15286 0.28071 1.20012 0.321301 1.23966C0.321319 1.23968 0.321337 1.23969 0.321355 1.23971Z" fill="#8C8C8C" stroke="#8C8C8C" stroke-width="0.3"/>
                                        </svg>
                                    </span>
                                    <ul class="user-drop-menu">
                                        <li class="">
                                            <button class="nav-link">
                                                <span>
                                                    <svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M16.4516 13.6047H14.9802C14.8797 13.6047 14.7856 13.6486 14.7228 13.7261C14.5763 13.904 14.4193 14.0756 14.2539 14.2388C13.5777 14.9158 12.7766 15.4553 11.8951 15.8274C10.9818 16.2132 10.0002 16.4111 9.00882 16.4093C8.00627 16.4093 7.0351 16.2126 6.12255 15.8274C5.24103 15.4553 4.43998 14.9158 3.76371 14.2388C3.08624 13.5642 2.54603 12.7645 2.17302 11.8842C1.78581 10.9716 1.59116 10.0026 1.59116 9.00002C1.59116 7.99746 1.7879 7.02839 2.17302 6.11584C2.54558 5.23467 3.08139 4.44142 3.76371 3.76119C4.44604 3.08096 5.23929 2.54514 6.12255 2.17259C7.0351 1.78747 8.00627 1.59073 9.00882 1.59073C10.0114 1.59073 10.9825 1.78538 11.8951 2.17259C12.7783 2.54514 13.5716 3.08096 14.2539 3.76119C14.4193 3.92654 14.5742 4.09816 14.7228 4.27398C14.7856 4.35142 14.8818 4.39537 14.9802 4.39537H16.4516C16.5835 4.39537 16.6651 4.24886 16.5918 4.13793C14.9865 1.64305 12.1777 -0.00834039 8.9858 3.16855e-05C3.97092 0.0125898 -0.0497669 4.08351 0.000465601 9.09211C0.0506981 14.0212 4.06511 18 9.00882 18C12.1923 18 14.9886 16.3507 16.5918 13.8621C16.663 13.7512 16.5835 13.6047 16.4516 13.6047ZM18.3123 8.86816L15.3423 6.52397C15.2314 6.43607 15.0702 6.5156 15.0702 6.65583V8.24653H8.49813C8.40603 8.24653 8.33068 8.32188 8.33068 8.41397V9.58606C8.33068 9.67815 8.40603 9.7535 8.49813 9.7535H15.0702V11.3442C15.0702 11.4844 15.2335 11.564 15.3423 11.4761L18.3123 9.13188C18.3323 9.11621 18.3485 9.0962 18.3596 9.07335C18.3708 9.05051 18.3765 9.02543 18.3765 9.00002C18.3765 8.9746 18.3708 8.94952 18.3596 8.92668C18.3485 8.90383 18.3323 8.88382 18.3123 8.86816Z" fill="#8599AD"/>
                                                    </svg>
                                                </span> 
                                                <a class="" href="{{ url('user/logout') }}">Logout</a>
                                            </button>
                                        </li>
                                        <li class="">
                                            <button class="nav-link">
                                                <span>
                                                    <svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M16.4516 13.6047H14.9802C14.8797 13.6047 14.7856 13.6486 14.7228 13.7261C14.5763 13.904 14.4193 14.0756 14.2539 14.2388C13.5777 14.9158 12.7766 15.4553 11.8951 15.8274C10.9818 16.2132 10.0002 16.4111 9.00882 16.4093C8.00627 16.4093 7.0351 16.2126 6.12255 15.8274C5.24103 15.4553 4.43998 14.9158 3.76371 14.2388C3.08624 13.5642 2.54603 12.7645 2.17302 11.8842C1.78581 10.9716 1.59116 10.0026 1.59116 9.00002C1.59116 7.99746 1.7879 7.02839 2.17302 6.11584C2.54558 5.23467 3.08139 4.44142 3.76371 3.76119C4.44604 3.08096 5.23929 2.54514 6.12255 2.17259C7.0351 1.78747 8.00627 1.59073 9.00882 1.59073C10.0114 1.59073 10.9825 1.78538 11.8951 2.17259C12.7783 2.54514 13.5716 3.08096 14.2539 3.76119C14.4193 3.92654 14.5742 4.09816 14.7228 4.27398C14.7856 4.35142 14.8818 4.39537 14.9802 4.39537H16.4516C16.5835 4.39537 16.6651 4.24886 16.5918 4.13793C14.9865 1.64305 12.1777 -0.00834039 8.9858 3.16855e-05C3.97092 0.0125898 -0.0497669 4.08351 0.000465601 9.09211C0.0506981 14.0212 4.06511 18 9.00882 18C12.1923 18 14.9886 16.3507 16.5918 13.8621C16.663 13.7512 16.5835 13.6047 16.4516 13.6047ZM18.3123 8.86816L15.3423 6.52397C15.2314 6.43607 15.0702 6.5156 15.0702 6.65583V8.24653H8.49813C8.40603 8.24653 8.33068 8.32188 8.33068 8.41397V9.58606C8.33068 9.67815 8.40603 9.7535 8.49813 9.7535H15.0702V11.3442C15.0702 11.4844 15.2335 11.564 15.3423 11.4761L18.3123 9.13188C18.3323 9.11621 18.3485 9.0962 18.3596 9.07335C18.3708 9.05051 18.3765 9.02543 18.3765 9.00002C18.3765 8.9746 18.3708 8.94952 18.3596 8.92668C18.3485 8.90383 18.3323 8.88382 18.3123 8.86816Z" fill="#8599AD"/>
                                                    </svg>
                                                </span> 
                                                Delete Account
                                            </button>
                                        </li>
                                    </ul>
                                </li>
                            @else
                                <li>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary login" data-toggle="modal"
                                        data-target="#Login">
                                        Login
                                    </button>
                                    <a href="{{ url('user/register') }}" class="btn btn-primary register">Register</a>

                                    <!-- Modal -->
                                    <form class="register-form-modal form-modal" method="POST"  action="{{ route('user.post-login') }}">
                                        @csrf
                                        <div class="modal fade" id="Login" tabindex="-1" role="dialog"
                                            aria-labelledby="login" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalCenterTitle">Login</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body row">
                                                        <div class="form-group col-md-12">
                                                            <label for="e-mail">Email</label>
                                                            <input type="email" name="email" class="form-control"
                                                                id="e-mail" placeholder="">
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label for="pAssword">Password</label>
                                                            <input id="password-field" name="password" type="password"
                                                                class="form-control" name="password">
                                                            <span class="error-msg">Password error</span>
                                                            <span toggle="#password-field"
                                                                class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                                            <div class="frgt-pswd">
                                                                <a href="" data-toggle="modal"
                                                                    data-target="#Forgot-password" data-dismiss="modal"
                                                                    aria-label="Close">Forgot Password?</a>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <button class="btn-typ1">Login</button>
                                                        </div>
                                                        <div class="col-md-12 division">
                                                            <hr>
                                                            <span>OR</span>
                                                        </div>
                                                        <div class="col-md-12 social-btn-wrp">
                                                            <div class="row">
                                                                <a href="" class="social-btn fb-btn"><svg
                                                                        width="11" height="20" viewBox="0 0 11 20"
                                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M10.0098 11.25L10.5652 7.63047H7.09219V5.28164C7.09219 4.29141 7.57734 3.32617 9.13281 3.32617H10.7117V0.244531C10.7117 0.244531 9.27891 0 7.90898 0C5.04883 0 3.1793 1.73359 3.1793 4.87187V7.63047H0V11.25H3.1793V20H7.09219V11.25H10.0098Z"
                                                                            fill="white" />
                                                                    </svg>Facebook</a>
                                                                <a href="" class="social-btn twtr-btn"><svg
                                                                        width="19" height="15" viewBox="0 0 19 15"
                                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M18.4516 1.77927C17.7731 2.07995 17.0442 2.28311 16.2778 2.37493C17.0685 1.90181 17.6601 1.15718 17.9421 0.279967C17.1992 0.721218 16.3862 1.03181 15.5383 1.19824C14.9682 0.58947 14.213 0.185967 13.39 0.050377C12.567 -0.0852125 11.7223 0.0546982 10.987 0.448387C10.2517 0.842076 9.66689 1.46752 9.32346 2.22761C8.98002 2.9877 8.89714 3.83991 9.08767 4.65193C7.58242 4.57635 6.10988 4.18511 4.76562 3.5036C3.42136 2.82209 2.23542 1.86554 1.28477 0.696035C0.959719 1.25675 0.772814 1.90686 0.772814 2.59922C0.772451 3.22251 0.92594 3.83624 1.21966 4.38598C1.51339 4.93572 1.93826 5.40446 2.45659 5.75061C1.85546 5.73148 1.2676 5.56905 0.741934 5.27684V5.3256C0.741873 6.19978 1.04426 7.04707 1.59778 7.72368C2.15131 8.40029 2.92188 8.86456 3.77874 9.03771C3.2211 9.18863 2.63645 9.21086 2.06896 9.10272C2.31072 9.8549 2.78164 10.5127 3.41579 10.9839C4.04995 11.4551 4.81559 11.7163 5.60554 11.7308C4.26456 12.7835 2.60846 13.3545 0.903647 13.352C0.601658 13.3521 0.299923 13.3344 0 13.2992C1.73048 14.4118 3.74489 15.0023 5.8022 15C12.7665 15 16.5736 9.23193 16.5736 4.22936C16.5736 4.06683 16.5696 3.90268 16.5623 3.74016C17.3028 3.20461 17.942 2.54144 18.45 1.78171L18.4516 1.77927Z"
                                                                            fill="#35A1F2" />
                                                                    </svg>Twitter</a>
                                                                <a href="" class="social-btn google-btn"><svg
                                                                        width="15" height="15" viewBox="0 0 15 15"
                                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M14.5564 6.13485H7.49511V9.03713H11.529C11.355 9.97524 10.8274 10.7687 10.0319 11.3003C9.35961 11.7498 8.50163 12.0156 7.49316 12.0156C5.54072 12.0156 3.88925 10.6964 3.29902 8.92378C3.15049 8.47427 3.0645 7.99349 3.0645 7.49902C3.0645 7.00456 3.15049 6.52378 3.29902 6.07427C3.89121 4.30358 5.54267 2.98436 7.49511 2.98436C8.59544 2.98436 9.58241 3.36352 10.3603 4.10619L12.5101 1.9544C11.2104 0.742671 9.51596 0 7.49511 0C4.56547 0 2.03062 1.68078 0.797394 4.1316C0.289251 5.14397 0 6.28925 0 7.50098C0 8.7127 0.289251 9.85603 0.797394 10.8684C2.03062 13.3192 4.56547 15 7.49511 15C9.51987 15 11.2163 14.3277 12.4554 13.1824C13.8723 11.8769 14.6912 9.95375 14.6912 7.66906C14.6912 7.13746 14.6443 6.62736 14.5564 6.13485Z"
                                                                            fill="#D93025" />
                                                                    </svg>Google</a>
                                                                <a href="" class="social-btn lnkdn-btn"><svg
                                                                        width="15" height="15" viewBox="0 0 15 15"
                                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                                            d="M5.57175 5.22675H8.35725V6.61425C8.7585 5.81625 9.7875 5.09925 11.3333 5.09925C14.2965 5.09925 15 6.68775 15 9.60225V15H12V10.266C12 8.60625 11.5988 7.67025 10.5773 7.67025C9.1605 7.67025 8.57175 8.679 8.57175 10.2653V15H5.57175V5.22675ZM0.4275 14.8725H3.4275V5.09925H0.4275V14.8725ZM3.85725 1.9125C3.85736 2.16396 3.80749 2.41293 3.71054 2.64494C3.61359 2.87695 3.47149 3.08738 3.2925 3.264C2.9298 3.62447 2.43886 3.82624 1.9275 3.825C1.41704 3.82466 0.927233 3.6234 0.564 3.26475C0.385659 3.08753 0.244039 2.87687 0.147258 2.64482C0.0504761 2.41278 0.000434349 2.16392 0 1.9125C0 1.40475 0.2025 0.91875 0.56475 0.56025C0.927664 0.201119 1.41768 -0.000224408 1.92825 1.87698e-07C2.43975 1.87698e-07 2.93025 0.20175 3.2925 0.56025C3.654 0.91875 3.85725 1.40475 3.85725 1.9125Z"
                                                                            fill="#0077B5" />
                                                                    </svg>Linkedin</a>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 bottom-link">
                                                            Don't you have an account? <a href="register">Register</a>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <form method="POST" action="{{ route('user.reset-password-submit') }}">
                                        @csrf
                                        <div class="modal fade" id="Forgot-password" tabindex="-1" role="dialog"
                                            aria-labelledby="login" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalCenterTitle">Forgot
                                                            Password?
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body row">
                                                        <div class="form-group col-md-12 mb-3">
                                                            <label for="e-mail">Email</label>
                                                            <input type="email" name="email" class="form-control" id="reset-e-mail"
                                                                placeholder="Enter your email">
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <button type="submit" class="btn-typ1">Submit</button>
                                                        </div>
                                                        <div class="col-md-12 bottom-link">
                                                            Don't you have an account? <a href="/user/register">Register</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </li>
                            @endauth
                        </ul>
                    </div>
                </nav>
            </div>
            <div id="main-content" class="site-main clearfix">

                @if (Session::has('message'))
                <section class="popup">
                    <div class="popup-inner">
                        <div class="popup-content">
                            <div class="content alert alert-success text-center">
                                {{ Session::get('message') }}
                            </div>
                        </div>
                    </div>
                </section>
                @elseif (Session::has('error'))
                <section class="popup">
                    <div class="popup-inner">
                        <div class="popup-content">
                            <div class="content alert alert-danger text-center">
                                {{ Session::get('error') }}
                            </div>
                        </div>
                    </div>
                </section>
                @endif
            
            </div>
        </div>
    </header>

    <div class="page-content">
        <!-- Main Content -->
        @yield('content')
        <!-- Main Content Ends -->
    </div>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="footer-logo">
                        <img src="{{ asset('user_assets/images/logo.svg')}}" alt="Logo">
                    </div>
                    <div class="ctct-no">
                        Call us : <a href="tel:1234567890">1234567890</a>
                    </div>
                    <p class="addrs">
                        328 Queensberry Street, North Melbourne VIC
                        3051, Australia.
                        <a href="mailto:support@jobtym.net">support@jobtym.net</a>
                    </p>
                </div>
                <div class="col-md-2">
                    <ul class="footer-links">
                        <li class="link-title">For Candidates</li>
                        <li class="link-item"><a href="{{ route('user.job.find-job') }}">Browse Jobs</a></li>
                        <li class="link-item"><a href="">Browse Candidates</a></li>
                        <li class="link-item"><a href="{{ route('user.index') }}">Candidate Dashboard</a></li>
                        <li class="link-item"><a href="">Job Alerts</a></li>
                    </ul>
                </div>
                @guest    
                <div class="col-md-2">
                    <ul class="footer-links">
                        <li class="link-title">For Employers</li>
                        <li class="link-item"><a href="">All Employers</a></li>
                        <li class="link-item"><a href="">Employer Dashboard</a></li>
                        <li class="link-item"><a href="">Submit Job</a></li>
                    </ul>
                </div>
                @endguest
                <div class="col-md-2">
                    <ul class="footer-links">
                        <li class="link-title">Quick Links</li>
                        <li class="link-item"><a href="{{ url('user/contactUs') }}">Contact Us</a></li>
                        <li class="link-item"><a href="{{ url('user/aboutUs') }}">About Us</a></li>
                        <li class="link-item"><a href="{{ url('user/terms-condition') }}">Terms</a></li>
                        <li class="link-item"><a href="{{ url('user/faq') }}">FAQ</a></li>
                    </ul>
                </div>
                <div class="col-md-2">
                    <ul class="footer-links">
                        <li class="link-title">Helpful Resources</li>
                        <li class="link-item"><a href="">Site Map</a></li>
                        <li class="link-item"><a href="">Terms of Use</a></li>
                        <li class="link-item"><a href="{{ url('user/privacy-policy') }}">Privacy Policy</a></li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 copy-right">© 2022 jobtym.net. All Right Reserved.</div>
            </div>
        </div>
    </footer>
    <button type="button" class="btn btn-danger btn-floating btn-lg" id="btn-back-to-top">
        <i class="fas fa-arrow-up"></i>
    </button>
    <script src="{{ asset('user_assets/js/jquery-3.2.1.min.js')}}">
    </script>
    <script src="{{ asset('user_assets/js/popper.min.js')}}">
    </script>
    <script src="{{ asset('user_assets/js/bootstrap.min.js')}}">
    </script>
    <script src="{{ asset('user_assets/js/select2.min.js')}}"></script>
    <script src="{{ asset('user_assets/js/aos.js')}}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        AOS.init();

        $(document).ready(function() {
            $(".toggle-password").click(function() {

                $(this).toggleClass("fa-eye fa-eye-slash");
                var input = $($(this).attr("toggle"));
                if (input.attr("type") == "password") {
                    input.attr("type", "text");
                } else {
                    input.attr("type", "password");
                }
            });

            $(".user-drop-btn").click(function() {
                $(this).parent(".user-menu-item").toggleClass("open-dropdown");
            });

            var triggerTabList = [].slice.call(document.querySelectorAll('#myTab a'))
            triggerTabList.forEach(function(triggerEl) {
                var tabTrigger = new bootstrap.Tab(triggerEl)

                triggerEl.addEventListener('click', function(event) {
                    event.preventDefault()
                    tabTrigger.show()
                })
            })

            $('.job-dropdown').select2();
            $('.category-dropdown').select2();
            $('.location-dropdown').select2();


            //Get the button
            let mybutton = document.getElementById("btn-back-to-top");

            // When the user scrolls down 20px from the top of the document, show the button
            window.onscroll = function() {
                scrollFunction();
            };

            function scrollFunction() {
                if (
                    document.body.scrollTop > 20 ||
                    document.documentElement.scrollTop > 20
                ) {
                    mybutton.style.display = "block";
                } else {
                    mybutton.style.display = "none";
                }
            }
            // When the user clicks on the button, scroll to the top of the document
            mybutton.addEventListener("click", backToTop);

            function backToTop() {
                document.body.scrollTop = 0;
                document.documentElement.scrollTop = 0;
            }

            $('#saveJobButton').click(function() {
                var user_id = $('#authId').val();
                if(user_id == ""){
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'You are not logged in. Please login to save the job.!',
                    })
                }else{
                    var job_id = $('#job_id').val();
                    $.ajax({
                        type: "post",
                        dataType: "json",
                        url: '{{ route('user.job.save-job') }}',
                        data: {
                            '_token': '{{ csrf_token() }}',
                            'user_id': user_id,
                            'job_id': job_id
                        },
                        success: function(data) {
                            if (data.success) {
                                $('#saveJobButton').addClass('saveBtnClicks');
                            } else {
                                $('#saveJobButton').removeClass('saveBtnClicks');
                            }
                        }
                    });
                }
            })
        });
    </script>

</body>

</html>
