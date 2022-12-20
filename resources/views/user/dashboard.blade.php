<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jobtym Dashboard</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('user_assets/css/bootstrap.min.css')}}" >    
    @notifyCss
    <link rel="stylesheet" href="{{ asset('user_assets/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{ asset('user_assets/css/dashboard.css')}}">
    <style>
        .notify {
            z-index: 999999999 !important;
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <div class="row">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand logo" href="{{ url('user') }}">Jobtym</a>
                    <div class="nav-right">
                        <!-- Button trigger modal -->
                        <ul class="user-menu d-md-flex d-none">
                            <li class="user-logo">
                                <a class="nav-link user-img" id="" data-toggle="tab" href="#Profile" role="tab" aria-controls="Profile" aria-selected="false" style="background: #ffffff;">
                                    <img src="{{ asset('user_assets/images/user_img.jpg')}}" alt="" style="width: 52px;height: 52px;border-radius: 50%;">
                                </a>
                            </li>
                            <li class="user-name">{{ $user->first_name }} {{ $user->last_name }} </li>
                            <li class="user-menu-item">
                                <span class="user-drop-btn">
                                    <svg width="8" height="5" viewBox="0 0 8 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M6.75302 0.631683C6.83489 0.551738 6.94479 0.506982 7.05922 0.506982C7.17367 0.506982 7.28358 0.551755 7.36546 0.631727L7.62888 0.889033L7.49045 0.889033C7.49216 0.904477 7.49302 0.920034 7.49302 0.935635C7.49302 0.992321 7.48166 1.04843 7.45962 1.10066C7.43758 1.15287 7.40534 1.20012 7.36473 1.23966C7.36472 1.23967 7.36469 1.2397 7.36468 1.23971L4.15819 4.36479L4.15818 4.36479L4.05349 4.25737C3.99718 4.31226 3.92165 4.34298 3.84302 4.34298C3.76438 4.34298 3.68886 4.31226 3.63254 4.25737L6.75302 0.631683ZM6.75302 0.631683C6.75301 0.631697 6.75299 0.631712 6.75298 0.631727L3.84303 3.46833M6.75302 0.631683L3.84303 3.46833M3.84303 3.46833L0.933661 0.631727L3.84303 3.46833ZM0.321355 1.23971L3.52784 4.36479L0.828848 0.739032C0.774995 0.686431 0.702702 0.656982 0.627421 0.656982C0.552141 0.656982 0.479847 0.686431 0.425994 0.739032L0.321355 0.631559C0.321297 0.631615 0.32124 0.631671 0.321182 0.631727C0.280647 0.671238 0.248426 0.718459 0.226415 0.770612C0.204372 0.822837 0.193017 0.87895 0.193017 0.935635C0.193017 0.992319 0.204372 1.04843 0.226416 1.10066C0.248447 1.15286 0.28071 1.20012 0.321301 1.23966C0.321319 1.23968 0.321337 1.23969 0.321355 1.23971Z" fill="#8C8C8C" stroke="#8C8C8C" stroke-width="0.3"/>
                                    </svg>
                                </span>
                                <ul class="user-drop-menu">
                                    <li class="nav-item">
                                        <button class="nav-link">
                                            <span>
                                                <svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M16.4516 13.6047H14.9802C14.8797 13.6047 14.7856 13.6486 14.7228 13.7261C14.5763 13.904 14.4193 14.0756 14.2539 14.2388C13.5777 14.9158 12.7766 15.4553 11.8951 15.8274C10.9818 16.2132 10.0002 16.4111 9.00882 16.4093C8.00627 16.4093 7.0351 16.2126 6.12255 15.8274C5.24103 15.4553 4.43998 14.9158 3.76371 14.2388C3.08624 13.5642 2.54603 12.7645 2.17302 11.8842C1.78581 10.9716 1.59116 10.0026 1.59116 9.00002C1.59116 7.99746 1.7879 7.02839 2.17302 6.11584C2.54558 5.23467 3.08139 4.44142 3.76371 3.76119C4.44604 3.08096 5.23929 2.54514 6.12255 2.17259C7.0351 1.78747 8.00627 1.59073 9.00882 1.59073C10.0114 1.59073 10.9825 1.78538 11.8951 2.17259C12.7783 2.54514 13.5716 3.08096 14.2539 3.76119C14.4193 3.92654 14.5742 4.09816 14.7228 4.27398C14.7856 4.35142 14.8818 4.39537 14.9802 4.39537H16.4516C16.5835 4.39537 16.6651 4.24886 16.5918 4.13793C14.9865 1.64305 12.1777 -0.00834039 8.9858 3.16855e-05C3.97092 0.0125898 -0.0497669 4.08351 0.000465601 9.09211C0.0506981 14.0212 4.06511 18 9.00882 18C12.1923 18 14.9886 16.3507 16.5918 13.8621C16.663 13.7512 16.5835 13.6047 16.4516 13.6047ZM18.3123 8.86816L15.3423 6.52397C15.2314 6.43607 15.0702 6.5156 15.0702 6.65583V8.24653H8.49813C8.40603 8.24653 8.33068 8.32188 8.33068 8.41397V9.58606C8.33068 9.67815 8.40603 9.7535 8.49813 9.7535H15.0702V11.3442C15.0702 11.4844 15.2335 11.564 15.3423 11.4761L18.3123 9.13188C18.3323 9.11621 18.3485 9.0962 18.3596 9.07335C18.3708 9.05051 18.3765 9.02543 18.3765 9.00002C18.3765 8.9746 18.3708 8.94952 18.3596 8.92668C18.3485 8.90383 18.3323 8.88382 18.3123 8.86816Z" fill="#8599AD"/>
                                                </svg>
                                            </span> 
                                            <a class="" href="{{ url('user/logout') }}">Logout</a>
                                        </button>
                                    </li>
                                    <li class="nav-item">
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
                        </ul>
                        <a href="#" class="btn btn-primary register ">Job Post</a>
                        <div class="message-top ">
                            <a class="message-notification" href="javascript:void(0);">
                                <svg width="23" height="25" viewBox="0 0 23 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M20 14.4825V10C20 5.97875 17.2687 2.59125 13.5687 1.5725C13.2025 0.65 12.3075 0 11.25 0C10.1925 0 9.2975 0.65 8.93125 1.5725C5.23125 2.5925 2.5 5.97875 2.5 10V14.4825L0.366251 16.6162C0.249948 16.7321 0.157713 16.8699 0.0948567 17.0215C0.0320002 17.1732 -0.000236811 17.3358 1.30959e-06 17.5V20C1.30959e-06 20.3315 0.131697 20.6495 0.366118 20.8839C0.600538 21.1183 0.918481 21.25 1.25 21.25H21.25C21.5815 21.25 21.8995 21.1183 22.1339 20.8839C22.3683 20.6495 22.5 20.3315 22.5 20V17.5C22.5002 17.3358 22.468 17.1732 22.4051 17.0215C22.3423 16.8699 22.2501 16.7321 22.1338 16.6162L20 14.4825ZM20 18.75H2.5V18.0175L4.63375 15.8837C4.75005 15.7679 4.84229 15.6301 4.90515 15.4785C4.968 15.3268 5.00024 15.1642 5 15V10C5 6.55375 7.80375 3.75 11.25 3.75C14.6962 3.75 17.5 6.55375 17.5 10V15C17.5 15.3325 17.6312 15.65 17.8662 15.8837L20 18.0175V18.75ZM11.25 25C12.0241 25.001 12.7793 24.7607 13.4106 24.3127C14.0419 23.8647 14.5179 23.2311 14.7725 22.5H7.7275C7.98208 23.2311 8.4581 23.8647 9.08939 24.3127C9.72068 24.7607 10.4759 25.001 11.25 25Z" fill="black"/>
                                </svg>                                
                                <span class="notification"></span>
                            </a>
                        </div>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item active">
                                <a class="nav-link" href="{{ url('user') }}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('user/find-job') }}">Find Jobs</a>
                            </li>                    
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('user') }}">Upload Your Resume</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('user') }}">Hiring?   Post a job for free</a>
                            </li>
                        </ul>                        
                    </div>
                    
                </nav>
            </div>
        </div>
    </header>
    @if (session('error'))
        <div class="alert alert-danger text-center">{{ session('error') }}</div>
    @endif
    <section>
        <!-- START TABS DIV -->
        <div class="dashboard-main-tab-container">
            <div class="resume-builder">
                <div class="resume-top-nav d-flex">
                    <button class="back-btn">
                        <svg width="17" height="15" viewBox="0 0 17 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.5 1L1 7.5L7.5 14M16.1667 7.5H1" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        Resume
                    </button>
                    <form class="dwnld-btn-wrp">
                        <ul>
                            <li class="lng-slct">
                                <section class="lng-slct-drpdwn">
                                    <option selected value="EN">EN</option>
                                    <option value="ES">ES</option>
                                    <option value="DE">DE</option>
                                </section>
                            </li>
                            <li class="resume-import">
                                <button>
                                    <svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M15 1.57895L1 1.57895C0.734784 1.57895 0.48043 1.49577 0.292894 1.34771C0.105357 1.19966 1.22402e-06 0.998853 1.24232e-06 0.789472C1.26063e-06 0.58009 0.105357 0.379284 0.292894 0.231229C0.48043 0.0831743 0.734784 -2.2882e-06 1 -2.26502e-06L15 -1.0411e-06C15.2652 -1.01791e-06 15.5196 0.0831756 15.7071 0.231231C15.8946 0.379286 16 0.580091 16 0.789474C16 0.998855 15.8946 1.19966 15.7071 1.34772C15.5196 1.49577 15.2652 1.57895 15 1.57895ZM7 6.17763L3.757 8.7371L2.343 7.62079L8 3.15474L13.657 7.62079L12.243 8.73711L9 6.17763L9 15L7 15L7 6.17763Z" fill="#3E9FFF"/>
                                    </svg>
                                    Import
                                </button>
                            </li>
                            <li class="resume-download">
                                <button>
                                    <svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M15 1.57895L1 1.57895C0.734784 1.57895 0.48043 1.49577 0.292894 1.34771C0.105357 1.19966 1.22402e-06 0.998853 1.24232e-06 0.789472C1.26063e-06 0.58009 0.105357 0.379284 0.292894 0.231229C0.48043 0.0831743 0.734784 -2.2882e-06 1 -2.26502e-06L15 -1.0411e-06C15.2652 -1.01791e-06 15.5196 0.0831756 15.7071 0.231231C15.8946 0.379286 16 0.580091 16 0.789474C16 0.998855 15.8946 1.19966 15.7071 1.34772C15.5196 1.49577 15.2652 1.57895 15 1.57895ZM7 6.17763L3.757 8.7371L2.343 7.62079L8 3.15474L13.657 7.62079L12.243 8.73711L9 6.17763L9 15L7 15L7 6.17763Z" fill="#3E9FFF"/>
                                    </svg>
                                    Download
                                </button>
                            </li>
                        </ul>
                    </form>
                </div>
                <div class="container white-bg">
                    <form class="row form-dash" name="formval" onsubmit="return false">
                        <div class="form-sec col-12">
                            <div class="form-top-section">
                                <h4>Personal Details</h4>
                                <ul>
                                    <li>
                                        <button>
                                            <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1.414 8.121L5.707 3.828V12.414H7.707V3.828L12 8.121L13.414 6.707L6.707 0L0 6.707L1.414 8.121Z" fill="black"/>
                                            </svg>                                                            
                                        </button>
                                    </li>
                                    <li>
                                        <button>
                                            <svg width="3" height="11" viewBox="0 0 3 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1.25 2.5C0.918479 2.5 0.600537 2.3683 0.366117 2.13388C0.131696 1.89946 0 1.58152 0 1.25C0 0.918479 0.131696 0.600537 0.366117 0.366117C0.600537 0.131696 0.918479 0 1.25 0C1.58152 0 1.89946 0.131696 2.13388 0.366117C2.3683 0.600537 2.5 0.918479 2.5 1.25C2.5 1.58152 2.3683 1.89946 2.13388 2.13388C1.89946 2.3683 1.58152 2.5 1.25 2.5ZM1.25 6.5C0.918479 6.5 0.600537 6.3683 0.366117 6.13388C0.131696 5.89946 0 5.58152 0 5.25C0 4.91848 0.131696 4.60054 0.366117 4.36612C0.600537 4.1317 0.918479 4 1.25 4C1.58152 4 1.89946 4.1317 2.13388 4.36612C2.3683 4.60054 2.5 4.91848 2.5 5.25C2.5 5.58152 2.3683 5.89946 2.13388 6.13388C1.89946 6.3683 1.58152 6.5 1.25 6.5ZM0 9.25C0 9.58152 0.131696 9.89946 0.366117 10.1339C0.600537 10.3683 0.918479 10.5 1.25 10.5C1.58152 10.5 1.89946 10.3683 2.13388 10.1339C2.3683 9.89946 2.5 9.58152 2.5 9.25C2.5 8.91848 2.3683 8.60054 2.13388 8.36612C1.89946 8.1317 1.58152 8 1.25 8C0.918479 8 0.600537 8.1317 0.366117 8.36612C0.131696 8.60054 0 8.91848 0 9.25Z" fill="black"/>
                                            </svg>                                                            
                                        </button>
                                    </li>
                                </ul>
                            </div>
                            <div id="box">
                                <!--  <center><h3 >Enter your data</h3></center> -->
                                <main>
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                            <!-- <label> Upload photo <span style="color:red;">*</span> 
                                            </label>-->
                                            <!-- <input type='file' class="form-control upload-photo" title="Upload photo" onchange="readURL(this);" /> -->
                                            <div class="imageWrapper">
                                                <img class="image" src="{{ asset('user_assets/images/user.png')}}">
                                                <button class="file-upload">            
                                                    <input type="file" class="form-control upload-photo file-input" id="propic-resume" onchange="readURL(this);">
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label>Name <span style="color:red;">*</span>
                                                    </label>
                                                    <input name="pr_amt" type="text" class=" form-control" placeholder="Enter Name" autocomplete="off" required>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label> Position <span style="color:red;">*</span>
                                                    </label>
                                                    <input name="int_rate" type="text" class=" form-control" placeholder="Enter Position" autocomplete="off" required>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Address <span style="color:red;">*</span>
                                                    </label>
                                                    <input name="period" type="text" class=" form-control" placeholder="Enter Adresss" autocomplete="off" required>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group col-md-6">
                                            <label>Email <span style="color:red;">*</span>
                                            </label>
                                            <input name="email" type="text" class=" form-control" placeholder="Enter Email" autocomplete="off" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>LinkedIn <span style="color:red;">*</span>
                                            </label>
                                            <input name="lnkdnid" type="text" class=" form-control" placeholder="Enter Email" autocomplete="off" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Mobile number <span style="color:red;">*</span>
                                            </label>
                                            <input name="mobile" type="text" class=" form-control" placeholder="Enter Mobile number" autocomplete="off" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>skill <span style="color:red;">*</span>
                                            </label>
                                            <textarea name="skill" class=" form-control" name="w3review" rows="4" cols="50" id="skill" placeholder="Enter skill" required></textarea>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Language 1 <span style="color:red;">*</span>
                                            </label>
                                            <input name="lang1" type="text" class=" form-control" placeholder="Enter Language1" autocomplete="off" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Language 2 <span style="color:red;">*</span>
                                            </label>
                                            <input name="lang2" type="text" class=" form-control" placeholder="Enter Language2" autocomplete="off" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Language 3</label>
                                            <input name="lang3" type="text" class=" form-control" placeholder="Enter Language3(optional)" autocomplete="off">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Work experience(if any)</label>
                                            <input name="wd" type="text" class=" form-control" placeholder="Enter Designation" autocomplete="off" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Period</label>
                                            <input name="due" type="text" class=" form-control" placeholder="Enter Period" autocomplete="off" required>
                                        </div>
                                        <br>
                                        <br>
                                        <div class="form-group col-md-6">
                                            <label>Summary</label>
                                            <textarea name="explain" class=" form-control" name="w3review" rows="4" cols="50" id="summary" required></textarea>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label> Qualification <span style="color:red;">*</span>
                                            </label>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Graduation <span style="color:red;">*</span>
                                            </label>
                                            <input name="grad" type="text" class=" form-control" placeholder="Enter College/Institute" autocomplete="off" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Duration <span style="color:red;">*</span>
                                            </label>
                                            <input name="graddur" type="text" class=" form-control" placeholder="Enter Period" autocomplete="off" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Marks (%) <span style="color:red;">*</span>
                                            </label>
                                            <input name="s1" type="text" class=" form-control" placeholder="Enter Marks" autocomplete="off" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>12th <span style="color:red;">*</span>
                                            </label>
                                            <input name="grad2" type="text" class=" form-control" placeholder="Enter School/Board" autocomplete="off" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Duration <span style="color:red;">*</span>
                                            </label>
                                            <input name="graddur2" type="text" class=" form-control" placeholder="Enter Period" autocomplete="off" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Marks (%) <span style="color:red;">*</span>
                                            </label>
                                            <input name="s2" type="text" class=" form-control" placeholder="Enter Marks" autocomplete="off" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>10th <span style="color:red;">*</span>
                                            </label>
                                            <input name="grad3" type="text" class=" form-control" placeholder="Enter School/Board" autocomplete="off" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Duration <span style="color:red;">*</span>
                                            </label>
                                            <input name="graddur3" type="text" class=" form-control" placeholder="Enter Period" autocomplete="off" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Marks (%) <span style="color:red;">*</span>
                                            </label>
                                            <input name="s3" type="text" class=" form-control" placeholder="Enter Marks" autocomplete="off" required>
                                        </div>
                                        <p id="demo" class="col-md-6"></p>
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <button class="btn-typ1" onclick="emires()">RESET</button>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <button class="btn-typ1" onclick="emi()">Generate</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </main>
                            </div>
                        </div>
                        <div class="render-sec col-12">
                            <div id="bexresult" style="width: 100%; display: none;">
                                <!-- Page Container -->
                                <div style="max-width:100%">
                                    <!-- The Grid -->
                                    <div style="display: block;">
                                        <!-- Left Column -->
                                        <div id="target" class="ResumeContainer row" style="width: 100%;">
                                            <div class="ResumeContentLeft col-4">
                                                <div style="width:200px; height:200px; margin: 30px auto; border-radius: 50%; overflow: hidden;"   id="image">
                                                    <img id="blah" src="{{ asset('user_assets/images/user.png')}}" style="height: 100%; margin: 0 auto; display: block;" alt="your image">
                                                </div>
                                                <div class="headerInfo">
                                                    <ul class="contact-info">
                                                        <li>
                                                            <i class="fa fa-envelope fa-fw w3-margin-right w3-large w3-text-teal"></i>
                                                            <p id="email">email</p>
                                                        </li>
                                                        <li>
                                                            <i class="fa fa-phone fa-fw w3-margin-right w3-large w3-text-teal"></i>
                                                            <p id="mb">Contact Number</p>
                                                        </li>
                                                        <li>
                                                            <i class="fa fa-home fa-fw w3-margin-right w3-large w3-text-teal"></i>
                                                            <p id="place">Address</p>
                                                        </li>
                                                        <li>
                                                            <i class="fa-brands fa-linkedin fa-fw w3-margin-right w3-large w3-text-teal"></i>
                                                            <p id="lnkdn">LinkedIn</p>
                                                        </li>
                                                    </ul>
                                                    <hr>
                                                    <p class="w3-large w3-text-theme">
                                                        <b>
                                                            <i class="fa fa-globe fa-fw w3-margin-right w3-text-teal"></i>Languages </b>
                                                    </p>
                                                    <div class="lang">
                                                        <!-- <center><p>Language 1</p></center> -->
                                                        <div>
                                                            <input type="text" id="one">
                                                        </div>
                                                        <!-- <center><p>Language 2</p></center> -->
                                                        <div>
                                                            <input type="text" id="two">
                                                        </div>
                                                        <!-- <center><p>Language 3(optiopnal)</p></center>          -->
                                                        <div>
                                                            <input type="text" id="three">
                                                        </div>
                                                    </div>
                                                    <br>
                                                </div>
                                            </div>
                                            <!-- Right Column -->
                                            <div class="ResumeContentRight col-8 pb-4">
                                                <div class="greybg p-5 mb-5">
                                                    <div class="nameSection" id="name">Name</div>
                                                    <div class="d-flex align-items-baseline">
                                                        <i class="fa fa-briefcase fa-fw w3-margin-right w3-large w3-text-teal"></i>
                                                        <strong id="position">Your Current Position</strong>
                                                    </div>
                                                </div>
                                                <div class="content-box pt-2 p-1">
                                                    <ul>
                                                        <li>
                                                            <strong class="hd-typ1">Summary</strong>
                                                            <p id="Summary">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                                        </li>
                                                        <li class="experience-info">
                                                            <strong class="hd-typ1">Experience</strong>
                                                            <div class="d-flex justify-content-between">
                                                                <h5 class="w3-opacity font-13" id="WE"></h5>
                                                                <span id="duration" class="font-13"></span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <strong class="hd-typ1">Skills</strong>
                                                            <p id="w3review">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                                        </li>
                                                        <li class="education-info">
                                                            <strong class="hd-typ1">Education</strong>
                                                            <ul id="r1">
                                                                <li>
                                                                    <h2 class="font-13">Graduation</h2>
                                                                    <div class="d-flex justify-content-between">
                                                                        <h5 class="font-13" id="cr1"></h5>
                                                                        <h6 class="font-13">
                                                                            <i class="fa fa-calendar fa-fw w3-margin-right"></i>
                                                                            <span id="cd1"></span>
                                                                        </h6>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <h2 class="font-13">12th</h2>
                                                                    <div class="d-flex justify-content-between">
                                                                        <h5 class="font-13" id="cr2"></h5>
                                                                        <h6 class="font-13">
                                                                            <i class="fa fa-calendar fa-fw w3-margin-right"></i>
                                                                            <span id="cd2"></span>
                                                                        </h6>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <h2 class="font-13">10th</h2>
                                                                    <div class="d-flex justify-content-between">
                                                                        <h5 class="font-13" id="cr3"></h5>
                                                                        <h6 class="font-13">
                                                                            <i class="fa fa-calendar fa-fw w3-margin-right"></i>
                                                                            <span id="cd3"></span>
                                                                        </h6>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                            
                                                        </li>
                                                    </ul>
                                                </div>
            
                                                <div class="w3-container w3-card w3-white w3-margin-bottom" id="right">
                                                    <div class="w3-container">
                                                        
                                                        <h6 class="w3-text-teal">
                                                            
                                                        </h6>
                                                        
                                                    </div>
                                                    
                                                    
                                                    <!-- End Right Column -->
                                                </div>
                                                <!-- End Grid -->
                                            </div>
                                        </div>   
                                        <!-- End Page Container -->
                                        <!--   <a href="#"onclick="window.print()">print</a> -->
                                    </div>
                                    <!-- <div class="flex">
                                        <a href="javascript:void(0)" class="btn btn-download">Generate PDF</a>
                                    </div> -->
                                </div>
                                <div class="row justify-content-center mt-5">
                                    <div class="col-4"><button id="cmd" class="btn-typ1">Download PDF</button></div>
                                </div>
                                <div class="form-group col-md-6">
                                    <!-- <a href="#" class="btn btn-primary" onclick="window.print()">Print</a>
                                    <button type="button" class="btn btn-primary">Save</button>
                                    <button onclick="Convert_HTML_To_PDF();">Convert HTML to PDF</button> -->
                                </div>
                            </div>
                        </div>
                        {{-- <div class="d-block d-md-none justify-content-center mt-5">
                            <div class="col-12"><button id="cmd1" class="btn-typ1">Download PDF</button></div>
                        </div> --}}
                    </form>
                </div>
            </div>
            <div class="coverletter-builder">
                <div class="resume-top-nav d-flex">
                    <button class="back-btn">
                        <svg width="17" height="15" viewBox="0 0 17 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.5 1L1 7.5L7.5 14M16.1667 7.5H1" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        Cover Letter
                    </button>
                    <form class="dwnld-btn-wrp">
                        <ul>
                            <li class="lng-slct">
                                <section class="lng-slct-drpdwn">
                                    <option selected value="EN">EN</option>
                                    <option value="ES">ES</option>
                                    <option value="DE">DE</option>
                                </section>
                            </li>
                            <li class="resume-import">
                                <button>
                                    <svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M15 1.57895L1 1.57895C0.734784 1.57895 0.48043 1.49577 0.292894 1.34771C0.105357 1.19966 1.22402e-06 0.998853 1.24232e-06 0.789472C1.26063e-06 0.58009 0.105357 0.379284 0.292894 0.231229C0.48043 0.0831743 0.734784 -2.2882e-06 1 -2.26502e-06L15 -1.0411e-06C15.2652 -1.01791e-06 15.5196 0.0831756 15.7071 0.231231C15.8946 0.379286 16 0.580091 16 0.789474C16 0.998855 15.8946 1.19966 15.7071 1.34772C15.5196 1.49577 15.2652 1.57895 15 1.57895ZM7 6.17763L3.757 8.7371L2.343 7.62079L8 3.15474L13.657 7.62079L12.243 8.73711L9 6.17763L9 15L7 15L7 6.17763Z" fill="#3E9FFF"/>
                                    </svg>
                                    Import
                                </button>
                            </li>
                            <li class="resume-download">
                                <button>
                                    <svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M15 1.57895L1 1.57895C0.734784 1.57895 0.48043 1.49577 0.292894 1.34771C0.105357 1.19966 1.22402e-06 0.998853 1.24232e-06 0.789472C1.26063e-06 0.58009 0.105357 0.379284 0.292894 0.231229C0.48043 0.0831743 0.734784 -2.2882e-06 1 -2.26502e-06L15 -1.0411e-06C15.2652 -1.01791e-06 15.5196 0.0831756 15.7071 0.231231C15.8946 0.379286 16 0.580091 16 0.789474C16 0.998855 15.8946 1.19966 15.7071 1.34772C15.5196 1.49577 15.2652 1.57895 15 1.57895ZM7 6.17763L3.757 8.7371L2.343 7.62079L8 3.15474L13.657 7.62079L12.243 8.73711L9 6.17763L9 15L7 15L7 6.17763Z" fill="#3E9FFF"/>
                                    </svg>
                                    Download
                                </button>
                            </li>
                        </ul>
                    </form>
                </div>
                <!-- covering letter comes here -->
                <div class="container white-bg">
                    <form class="row form-dash" name="formvalcover" onsubmit="return false">
                        <div class="form-sec col-12">
                            <div class="form-top-section">
                                <h4>Personal Details</h4>
                                <ul>
                                    <li>
                                        <button>
                                            <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1.414 8.121L5.707 3.828V12.414H7.707V3.828L12 8.121L13.414 6.707L6.707 0L0 6.707L1.414 8.121Z" fill="black"/>
                                            </svg>                                                            
                                        </button>
                                    </li>
                                    <li>
                                        <button>
                                            <svg width="3" height="11" viewBox="0 0 3 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1.25 2.5C0.918479 2.5 0.600537 2.3683 0.366117 2.13388C0.131696 1.89946 0 1.58152 0 1.25C0 0.918479 0.131696 0.600537 0.366117 0.366117C0.600537 0.131696 0.918479 0 1.25 0C1.58152 0 1.89946 0.131696 2.13388 0.366117C2.3683 0.600537 2.5 0.918479 2.5 1.25C2.5 1.58152 2.3683 1.89946 2.13388 2.13388C1.89946 2.3683 1.58152 2.5 1.25 2.5ZM1.25 6.5C0.918479 6.5 0.600537 6.3683 0.366117 6.13388C0.131696 5.89946 0 5.58152 0 5.25C0 4.91848 0.131696 4.60054 0.366117 4.36612C0.600537 4.1317 0.918479 4 1.25 4C1.58152 4 1.89946 4.1317 2.13388 4.36612C2.3683 4.60054 2.5 4.91848 2.5 5.25C2.5 5.58152 2.3683 5.89946 2.13388 6.13388C1.89946 6.3683 1.58152 6.5 1.25 6.5ZM0 9.25C0 9.58152 0.131696 9.89946 0.366117 10.1339C0.600537 10.3683 0.918479 10.5 1.25 10.5C1.58152 10.5 1.89946 10.3683 2.13388 10.1339C2.3683 9.89946 2.5 9.58152 2.5 9.25C2.5 8.91848 2.3683 8.60054 2.13388 8.36612C1.89946 8.1317 1.58152 8 1.25 8C0.918479 8 0.600537 8.1317 0.366117 8.36612C0.131696 8.60054 0 8.91848 0 9.25Z" fill="black"/>
                                            </svg>                                                            
                                        </button>
                                    </li>
                                </ul>
                            </div>
                            <div id="letterbox">
                                <!--  <center><h3 >Enter your data</h3></center> -->
                                <main>
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                            <!-- <label> Upload photo <span style="color:red;">*</span> 
                                            </label>-->
                                            <div class="imageWrapper">
                                                <img class="image" src="{{ asset('user_assets/images/user.png')}}">
                                                <button class="file-upload">            
                                                    <input type="file" class="form-control upload-photo file-input" id="propic-coverletter" onchange="readURL(this);">file
                                                </button>
                                            </div>
                                            <!-- <input type='file' class="form-control upload-photo file-input" title="Upload photo" onchange="readURL(this);" /> -->
                                        </div>
                                        <div class="col-md-10">
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label>Name <span style="color:red;">*</span>
                                                    </label>
                                                    <input name="per_name" type="text" class=" form-control" placeholder="Enter Name" autocomplete="off" required>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Email <span style="color:red;">*</span>
                                                    </label>
                                                    <input name="per_email" type="text" class=" form-control" placeholder="Enter Email" autocomplete="off" required>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Mobile number <span style="color:red;">*</span>
                                                    </label>
                                                    <input name="per_mobile" type="text" class=" form-control" placeholder="Enter Mobile number" autocomplete="off" required>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group col-md-12">
                                            <label>Address <span style="color:red;">*</span>
                                            </label>
                                            <input name="per_address" type="text" class=" form-control" placeholder="Enter Adresss" autocomplete="off" required>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label> Date <span style="color:red;">*</span>
                                            </label>
                                            <input name="cover_date" type="text" class=" form-control" placeholder="Enter Adresss" autocomplete="off" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Content</label>
                                            <textarea name="cover_letter_content" class=" form-control" name="w3review" rows="4" cols="50" required></textarea>
                                        </div>
                                        <p id="Error-Text" class="col-md-6" style="display: none;"></p>
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <button class="btn-typ1" onclick="emires1()">RESET</button>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <button class="btn-typ1" onclick="emi1()">Generate</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </main>
                            </div>
                        </div>
                        <div class="render-sec col-12">
                            <div id="boxresult" style="width: 100%; display: none;">
                                <!-- Page Container -->
                                <div style="max-width:100%">
                                    <!-- The Grid -->
                                    <div style="display: block;">
                                        <!-- Left Column -->
                                        <div id="target_resume" class="CoverletterContainer row" style="width: 100%;">
                                            
                                            <div class="ResumeContentLeft d-flex align-items-center col-12">
                                                <div style="width:150px; height:150px; min-width: 150px; margin: 15px; border-radius: 50%; overflow: hidden;"   id="image">
                                                    <img id="Pro-Pic" src="{{ asset('user_assets/images/user.png')}}" style="height: 100%; margin: 0 auto; display: block;" alt="your image">
                                                </div>
                                                <div class="headerInfo">
                                                    <div class="nameSection" style="font-size: 40pt; line-height: 60pt;" id="PersonName">Name</div>
                                                    <ul class="contact-info d-flex justify-content-between">
                                                        <li>
                                                            <i class="fa fa-envelope fa-fw w3-margin-right w3-large w3-text-teal"></i>
                                                            <p id="PersonEmail">Email</p>
                                                        </li>
                                                        <li style="margin-left: 50px;">
                                                            <i class="fa fa-phone fa-fw w3-margin-right w3-large w3-text-teal"></i>
                                                            <p id="PersonContact">Contact Number</p>
                                                        </li>
                                                        
                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- Right Column -->
                                            <div class="ResumeContentRight col-12 pb-4">
                                                <div class="content-box pt-2 p-1">
                                                    <ul>
                                                        <li class="d-flex">
                                                            <p id="PersonAddress">Address</p>
                                                        </li>
                                                        <li class="d-flex">
                                                            <p id="LetterDate">Date</p>
                                                        </li>
                                                        <li>
                                                            <p id="CoveringLetterContent">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <!-- End Grid -->
                                            </div>
                                        </div>   
                                        <!-- End Page Container -->
                                        <!--   <a href="#"onclick="window.print()">print</a> -->
                                    </div>
                                    <!-- <div class="flex">
                                        <a href="javascript:void(0)" class="btn btn-download">Generate PDF</a>
                                    </div> -->
                                </div>
                                <div class="row justify-content-center mt-5">
                                    <div class="col-4"><button id="DownloadPDF" class="btn-typ1">Download PDF</button></div>
                                </div>
                                <div class="form-group col-md-6">
                                    <!-- <a href="#" class="btn btn-primary" onclick="window.print()">Print</a>
                                    <button type="button" class="btn btn-primary">Save</button>
                                    <button onclick="Convert_HTML_To_PDF();">Convert HTML to PDF</button> -->
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="floating-sidebar">
                <ul class="user-drop-menu nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item d-block">
                        <ul class="user-menu">
                            <li class="user-logo">
                                <a class="nav-link user-img" id="" data-toggle="tab" href="#Profile" role="tab" aria-controls="Profile" aria-selected="false" style=" background: #ffffff;">
                                    <img src="{{ asset('user_assets/images/user_img.jpg')}}" alt="" style="width: 52px;height: 52px;border-radius: 50%;">
                                </a>
                            </li>
                            <li class="user-name">{{ $user->first_name }} {{ $user->last_name }} 
                                <a class="btn-typ3 rounded-btn100" id="" data-toggle="tab" href="#Profile" role="tab" aria-controls="Profile" aria-selected="false"> View Profile </a>
                            </li>
                            <li class="user-menu-item">
                                <span class="user-drop-btn">
                                    <svg width="8" height="5" viewBox="0 0 8 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M6.75302 0.631683C6.83489 0.551738 6.94479 0.506982 7.05922 0.506982C7.17367 0.506982 7.28358 0.551755 7.36546 0.631727L7.62888 0.889033L7.49045 0.889033C7.49216 0.904477 7.49302 0.920034 7.49302 0.935635C7.49302 0.992321 7.48166 1.04843 7.45962 1.10066C7.43758 1.15287 7.40534 1.20012 7.36473 1.23966C7.36472 1.23967 7.36469 1.2397 7.36468 1.23971L4.15819 4.36479L4.15818 4.36479L4.05349 4.25737C3.99718 4.31226 3.92165 4.34298 3.84302 4.34298C3.76438 4.34298 3.68886 4.31226 3.63254 4.25737L6.75302 0.631683ZM6.75302 0.631683C6.75301 0.631697 6.75299 0.631712 6.75298 0.631727L3.84303 3.46833M6.75302 0.631683L3.84303 3.46833M3.84303 3.46833L0.933661 0.631727L3.84303 3.46833ZM0.321355 1.23971L3.52784 4.36479L0.828848 0.739032C0.774995 0.686431 0.702702 0.656982 0.627421 0.656982C0.552141 0.656982 0.479847 0.686431 0.425994 0.739032L0.321355 0.631559C0.321297 0.631615 0.32124 0.631671 0.321182 0.631727C0.280647 0.671238 0.248426 0.718459 0.226415 0.770612C0.204372 0.822837 0.193017 0.87895 0.193017 0.935635C0.193017 0.992319 0.204372 1.04843 0.226416 1.10066C0.248447 1.15286 0.28071 1.20012 0.321301 1.23966C0.321319 1.23968 0.321337 1.23969 0.321355 1.23971Z" fill="#8C8C8C" stroke="#8C8C8C" stroke-width="0.3"/>
                                    </svg>
                                </span>
                            </li>
                        </ul>
                    </li>
                    {{-- Sidebar Dashboard Start --}}
                    <li class="nav-item">
                        <a class="nav-link active" id="" data-toggle="tab" href="#UserDashboard" role="tab" aria-controls="UserDashboard" aria-selected="true">
                            <span>
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16 2V4H12V2H16ZM6 2V8H2V2H6ZM16 10V16H12V10H16ZM6 14V16H2V14H6ZM18 0H10V6H18V0ZM8 0H0V10H8V0ZM18 8H10V18H18V8ZM8 12H0V18H8V12Z" fill="#8599AD"/>
                                </svg>
                            </span>
                            User Dashboard
                        </a>
                    </li>
                    {{-- Sidebar Dashboard End --}}
                    {{-- Sidebar Profile Start --}}
                    {{-- <li class="nav-item">
                        <a class="nav-link" id="" data-toggle="tab" href="#Profile" role="tab" aria-controls="Profile" aria-selected="false">
                            <span>
                                <svg width="19" height="20" viewBox="0 0 19 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9.1 8.2C11.0882 8.2 12.7 6.58822 12.7 4.6C12.7 2.61177 11.0882 1 9.1 1C7.11177 1 5.5 2.61177 5.5 4.6C5.5 6.58822 7.11177 8.2 9.1 8.2Z" stroke="#8599AD" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M17.2 18.9999C17.2 14.5265 13.5735 10.8999 9.1 10.8999C4.62655 10.8999 1 14.5265 1 18.9999" stroke="#8599AD" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M9.10005 18.9999L10.9 16.7499L9.10005 10.8999L7.30005 16.7499L9.10005 18.9999Z" stroke="#8599AD" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </span>
                            Profile
                        </a>
                    </li> --}}
                    {{-- Sidebar Profile End --}}

                    {{-- Sidebar My Resume Start --}}
                    <li class="nav-item">
                        <a class="nav-link" id="" data-toggle="tab" href="#MyResume" role="tab" aria-controls="MyResume" aria-selected="false">
                            <span>
                                <svg width="15" height="18" viewBox="0 0 15 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.8 0C1.32261 0 0.864773 0.189642 0.527208 0.527208C0.189642 0.864773 0 1.32261 0 1.8V16.2C0 16.6774 0.189642 17.1352 0.527208 17.4728C0.864773 17.8104 1.32261 18 1.8 18H12.6C13.0774 18 13.5352 17.8104 13.8728 17.4728C14.2104 17.1352 14.4 16.6774 14.4 16.2V5.4L9 0H1.8ZM1.8 1.8H8.1V6.3H12.6V16.2H1.8V1.8ZM3.6 9V10.8H10.8V9H3.6ZM3.6 12.6V14.4H8.1V12.6H3.6Z" fill="#8599AD"/>
                                </svg>
                            </span>
                            My Resume
                        </a>
                    </li>
                    {{-- Sidebar My Resume End --}}

                    {{-- Sidebar Cover Letter Start --}}
                    <li class="nav-item">
                        <a class="nav-link" id="" data-toggle="tab" href="#CoverLetter" role="tab" aria-controls="CoverLetter" aria-selected="false">
                            <span>
                                <svg width="15" height="18" viewBox="0 0 15 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.8 0C1.32261 0 0.864773 0.189642 0.527208 0.527208C0.189642 0.864773 0 1.32261 0 1.8V16.2C0 16.6774 0.189642 17.1352 0.527208 17.4728C0.864773 17.8104 1.32261 18 1.8 18H12.6C13.0774 18 13.5352 17.8104 13.8728 17.4728C14.2104 17.1352 14.4 16.6774 14.4 16.2V5.4L9 0H1.8ZM1.8 1.8H8.1V6.3H12.6V16.2H1.8V1.8ZM3.6 9V10.8H10.8V9H3.6ZM3.6 12.6V14.4H8.1V12.6H3.6Z" fill="#8599AD"/>
                                </svg>
                            </span>
                            Cover Letter
                        </a>
                    </li>
                    {{-- Sidebar Cover Letter End --}}

                    {{-- Sidebar My Applied Start --}}
                    {{-- <li class="nav-item">
                        <a class="nav-link" id="" data-toggle="tab" href="#MyApplied" role="tab" aria-controls="MyApplied" aria-selected="false">
                            <span>
                                <svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16 4.97852C16.7956 4.97852 17.5587 5.29459 18.1213 5.85719C18.6839 6.4198 19 7.18287 19 7.97852C19 8.77417 18.6839 9.53723 18.1213 10.0998C17.5587 10.6624 16.7956 10.9785 16 10.9785M8 4.97852V15.9785C8 16.2437 7.89464 16.4981 7.70711 16.6856C7.51957 16.8732 7.26522 16.9785 7 16.9785H6C5.73478 16.9785 5.48043 16.8732 5.29289 16.6856C5.10536 16.4981 5 16.2437 5 15.9785V10.9785" stroke="#8599AD" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M10 4.97846L14.524 1.20846C14.6555 1.09897 14.8154 1.02922 14.9851 1.00737C15.1548 0.985522 15.3271 1.01249 15.482 1.08511C15.6369 1.15774 15.7679 1.27301 15.8597 1.41741C15.9514 1.56182 16.0001 1.72938 16 1.90046V14.0565C16.0001 14.2275 15.9514 14.3951 15.8597 14.5395C15.7679 14.6839 15.6369 14.7992 15.482 14.8718C15.3271 14.9444 15.1548 14.9714 14.9851 14.9496C14.8154 14.9277 14.6555 14.858 14.524 14.7485L10 10.9785H2C1.73478 10.9785 1.48043 10.8731 1.29289 10.6856C1.10536 10.498 1 10.2437 1 9.97846V5.97846C1 5.71325 1.10536 5.45889 1.29289 5.27136C1.48043 5.08382 1.73478 4.97846 2 4.97846H10Z" stroke="#8599AD" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </span>
                            My Applied
                        </a>
                    </li> --}}
                    {{-- Sidebar My Applied End --}}

                    {{-- Sidebar Shortlist Jobs Start --}}
                    <li class="nav-item">
                        <a class="nav-link" id="" data-toggle="tab" href="#ShortlistJobs" role="tab" aria-controls="ShortlistJobs" aria-selected="false">
                            <span>
                                <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 2.70571V15.1455C1 15.9045 1.91853 16.2857 2.45583 15.7484L7.82285 10.3814L13.1899 15.7484C13.7272 16.2857 14.6457 15.9054 14.6457 15.1455V2.70571C14.6457 2.25333 14.466 1.81947 14.1461 1.49959C13.8262 1.17971 13.3924 1 12.94 1H2.70571C2.25333 1 1.81947 1.17971 1.49959 1.49959C1.17971 1.81947 1 2.25333 1 2.70571Z" stroke="#8599AD" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </span>
                            Shortlist Jobs
                        </a>
                    </li>
                    {{-- Sidebar Shortlist Jobs End --}}

                    {{-- Sidebar Saved Jobs Start --}}
                    {{-- <li class="nav-item">
                        <a class="nav-link" id="" data-toggle="tab" href="#SavedJobs" role="tab" aria-controls="SavedJobs" aria-selected="false">
                            <span>
                                <svg width="16" height="20" viewBox="0 0 16 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5 15V13M8 15V11M11 15V9M13 19H3C2.46957 19 1.96086 18.7893 1.58579 18.4142C1.21071 18.0391 1 17.5304 1 17V3C1 2.46957 1.21071 1.96086 1.58579 1.58579C1.96086 1.21071 2.46957 1 3 1H8.586C8.8512 1.00006 9.10551 1.10545 9.293 1.293L14.707 6.707C14.8946 6.89449 14.9999 7.1488 15 7.414V17C15 17.5304 14.7893 18.0391 14.4142 18.4142C14.0391 18.7893 13.5304 19 13 19Z" stroke="#8599AD" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </span>
                            Saved Jobs
                        </a>
                    </li> --}}
                    {{-- Sidebar Saved Jobs End --}}

                    {{-- Sidebar Reports Start --}}
                    <li class="nav-item">
                        <a class="nav-link" id="" data-toggle="tab" href="#Reports" role="tab" aria-controls="Reports" aria-selected="false">
                            <span>
                                <svg width="16" height="20" viewBox="0 0 16 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5 15V13M8 15V11M11 15V9M13 19H3C2.46957 19 1.96086 18.7893 1.58579 18.4142C1.21071 18.0391 1 17.5304 1 17V3C1 2.46957 1.21071 1.96086 1.58579 1.58579C1.96086 1.21071 2.46957 1 3 1H8.586C8.8512 1.00006 9.10551 1.10545 9.293 1.293L14.707 6.707C14.8946 6.89449 14.9999 7.1488 15 7.414V17C15 17.5304 14.7893 18.0391 14.4142 18.4142C14.0391 18.7893 13.5304 19 13 19Z" stroke="#8599AD" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </span>
                            Reports
                        </a>
                    </li>
                    {{-- Sidebar Reports End --}}

                    {{-- Sidebar Messages Start --}}
                    {{-- <li class="nav-item">
                        <a class="nav-link" id="" data-toggle="tab" href="#Messages" role="tab" aria-controls="Messages" aria-selected="false">
                            <span>
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7.33264 8.08925e-06C5.74134 8.08925e-06 4.21522 0.632149 3.09 1.75737C1.96479 2.88258 1.33265 4.40871 1.33265 6.00001V9.20134L0.0473124 12.42C0.00705491 12.5211 -0.00785025 12.6305 0.00389763 12.7387C0.0156455 12.8468 0.0536893 12.9505 0.114709 13.0405C0.175728 13.1306 0.257869 13.2044 0.35396 13.2554C0.450052 13.3065 0.557175 13.3332 0.665979 13.3333H4.66598C4.66598 14.8107 5.85531 16 7.33264 16C8.80997 16 9.99931 14.8107 9.99931 13.3333H13.9993C14.1081 13.3332 14.2152 13.3065 14.3113 13.2554C14.4074 13.2044 14.4896 13.1306 14.5506 13.0405C14.6116 12.9505 14.6496 12.8468 14.6614 12.7387C14.6731 12.6305 14.6582 12.5211 14.618 12.42L13.3326 9.2V6.66667C12.8738 6.66736 12.4198 6.57292 11.9993 6.38934V9.33067C11.9995 9.41519 12.0158 9.4989 12.0473 9.57734L13.0153 12H1.64998L2.61798 9.57734C2.64947 9.4989 2.66576 9.41519 2.66598 9.33067V6.00001C2.66575 5.12969 2.9089 4.27666 3.36796 3.53726C3.82702 2.79787 4.4837 2.20157 5.26381 1.81575C6.04393 1.42992 6.91639 1.26993 7.78265 1.35385C8.6489 1.43778 9.47443 1.76227 10.166 2.29067C10.3086 1.85734 10.538 1.46134 10.834 1.12667C9.81442 0.392193 8.58921 -0.00205929 7.33264 8.08925e-06ZM8.66598 13.3333C8.66598 14.0747 8.07398 14.6667 7.33264 14.6667C6.59131 14.6667 5.99931 14.0747 5.99931 13.3333H8.66598ZM11.8233 2.02134C11.6329 2.23964 11.4923 2.49684 11.4115 2.77502C11.3307 3.05319 11.3115 3.34565 11.3553 3.63201C11.426 4.10562 11.6646 4.53804 12.0276 4.85037C12.3906 5.16269 12.8538 5.33411 13.3326 5.33334C13.6675 5.33337 13.9969 5.24934 14.2909 5.08896C14.5848 4.92857 14.8337 4.69697 15.0149 4.41537C15.196 4.13378 15.3035 3.81122 15.3276 3.47726C15.3517 3.14331 15.2916 2.80865 15.1528 2.50397C15.0139 2.19929 14.8008 1.93435 14.5329 1.73343C14.2651 1.53252 13.9511 1.40206 13.6197 1.35403C13.2884 1.30599 12.9503 1.34192 12.6364 1.45851C12.3225 1.5751 12.043 1.76863 11.8233 2.02134Z" fill="#8599AD"/>
                                </svg>
                            </span>
                            Messages
                        </a>
                    </li> --}}
                    {{-- Sidebar Messages End --}}

                    {{-- Sidebar Logout Start --}}
                    {{-- <li class="nav-item">
                        <button class="nav-link">
                            <span>
                                <svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16.4516 13.6047H14.9802C14.8797 13.6047 14.7856 13.6486 14.7228 13.7261C14.5763 13.904 14.4193 14.0756 14.2539 14.2388C13.5777 14.9158 12.7766 15.4553 11.8951 15.8274C10.9818 16.2132 10.0002 16.4111 9.00882 16.4093C8.00627 16.4093 7.0351 16.2126 6.12255 15.8274C5.24103 15.4553 4.43998 14.9158 3.76371 14.2388C3.08624 13.5642 2.54603 12.7645 2.17302 11.8842C1.78581 10.9716 1.59116 10.0026 1.59116 9.00002C1.59116 7.99746 1.7879 7.02839 2.17302 6.11584C2.54558 5.23467 3.08139 4.44142 3.76371 3.76119C4.44604 3.08096 5.23929 2.54514 6.12255 2.17259C7.0351 1.78747 8.00627 1.59073 9.00882 1.59073C10.0114 1.59073 10.9825 1.78538 11.8951 2.17259C12.7783 2.54514 13.5716 3.08096 14.2539 3.76119C14.4193 3.92654 14.5742 4.09816 14.7228 4.27398C14.7856 4.35142 14.8818 4.39537 14.9802 4.39537H16.4516C16.5835 4.39537 16.6651 4.24886 16.5918 4.13793C14.9865 1.64305 12.1777 -0.00834039 8.9858 3.16855e-05C3.97092 0.0125898 -0.0497669 4.08351 0.000465601 9.09211C0.0506981 14.0212 4.06511 18 9.00882 18C12.1923 18 14.9886 16.3507 16.5918 13.8621C16.663 13.7512 16.5835 13.6047 16.4516 13.6047ZM18.3123 8.86816L15.3423 6.52397C15.2314 6.43607 15.0702 6.5156 15.0702 6.65583V8.24653H8.49813C8.40603 8.24653 8.33068 8.32188 8.33068 8.41397V9.58606C8.33068 9.67815 8.40603 9.7535 8.49813 9.7535H15.0702V11.3442C15.0702 11.4844 15.2335 11.564 15.3423 11.4761L18.3123 9.13188C18.3323 9.11621 18.3485 9.0962 18.3596 9.07335C18.3708 9.05051 18.3765 9.02543 18.3765 9.00002C18.3765 8.9746 18.3708 8.94952 18.3596 8.92668C18.3485 8.90383 18.3323 8.88382 18.3123 8.86816Z" fill="#8599AD"/>
                                </svg>
                            </span> 
                            Logout
                        </button>
                    </li> --}}
                    {{-- Sidebar Logout End --}}

                    {{-- Sidebar Delete Account Start --}}
                    {{-- <li class="nav-item">
                        <button type="button" class="nav-link" data-toggle="modal" data-target="#DeleteAccount">
                            <span>
                                <svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16.4516 13.6047H14.9802C14.8797 13.6047 14.7856 13.6486 14.7228 13.7261C14.5763 13.904 14.4193 14.0756 14.2539 14.2388C13.5777 14.9158 12.7766 15.4553 11.8951 15.8274C10.9818 16.2132 10.0002 16.4111 9.00882 16.4093C8.00627 16.4093 7.0351 16.2126 6.12255 15.8274C5.24103 15.4553 4.43998 14.9158 3.76371 14.2388C3.08624 13.5642 2.54603 12.7645 2.17302 11.8842C1.78581 10.9716 1.59116 10.0026 1.59116 9.00002C1.59116 7.99746 1.7879 7.02839 2.17302 6.11584C2.54558 5.23467 3.08139 4.44142 3.76371 3.76119C4.44604 3.08096 5.23929 2.54514 6.12255 2.17259C7.0351 1.78747 8.00627 1.59073 9.00882 1.59073C10.0114 1.59073 10.9825 1.78538 11.8951 2.17259C12.7783 2.54514 13.5716 3.08096 14.2539 3.76119C14.4193 3.92654 14.5742 4.09816 14.7228 4.27398C14.7856 4.35142 14.8818 4.39537 14.9802 4.39537H16.4516C16.5835 4.39537 16.6651 4.24886 16.5918 4.13793C14.9865 1.64305 12.1777 -0.00834039 8.9858 3.16855e-05C3.97092 0.0125898 -0.0497669 4.08351 0.000465601 9.09211C0.0506981 14.0212 4.06511 18 9.00882 18C12.1923 18 14.9886 16.3507 16.5918 13.8621C16.663 13.7512 16.5835 13.6047 16.4516 13.6047ZM18.3123 8.86816L15.3423 6.52397C15.2314 6.43607 15.0702 6.5156 15.0702 6.65583V8.24653H8.49813C8.40603 8.24653 8.33068 8.32188 8.33068 8.41397V9.58606C8.33068 9.67815 8.40603 9.7535 8.49813 9.7535H15.0702V11.3442C15.0702 11.4844 15.2335 11.564 15.3423 11.4761L18.3123 9.13188C18.3323 9.11621 18.3485 9.0962 18.3596 9.07335C18.3708 9.05051 18.3765 9.02543 18.3765 9.00002C18.3765 8.9746 18.3708 8.94952 18.3596 8.92668C18.3485 8.90383 18.3323 8.88382 18.3123 8.86816Z" fill="#8599AD"/>
                                </svg>
                            </span> 
                            Delete Account
                        </button>
                    </li> --}}
                    {{-- Sidebar Delete Account End --}}

                    <li class="skill-info d-none">
                        <div><strong>Skills Percentage: <span class="value">8%</span></strong></div> 
                        <p>Put value for resume, profile fields to increase your skill up to "92%"</p>
                    </li>
                </ul>
                <!-- Modal -->
                <div class="confirm-popup">
                    <div class="modal fade" id="DeleteAccount" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="true">
                        <div class="modal-dialog modal-confirm">
                            <div class="modal-content">
                                <div class="modal-header flex-column">
                                    <div class="icon-box">
                                        <span class="material-icons"></span>
                                    </div>						
                                    <h4 class="modal-title w-100">Are you sure?</h4>	
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <p>Do you really want to delete this account? This process cannot be undone.</p>
                                </div>
                                <div class="modal-footer justify-content-center">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="UserDashboard" role="tabpanel" aria-labelledby="first-tab">
                        <div class="d-flex flex-xl-row flex-column justify-content-between ">
                            <div class="overview-info-box applied">
                                <span class="overview-icon">
                                    <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11.3793 0C10.8414 0 10.2828 0.186207 9.88966 0.57931C9.49655 0.972414 9.31034 1.53103 9.31034 2.06897V3.10345H0V23.7931H11.5862C11.4517 23.131 11.3793 22.4379 11.3793 21.7241H2.06897V14.9379C2.67931 15.2897 3.38276 15.5172 4.13793 15.5172H13.4586C14.0379 14.731 14.7414 14.0276 15.5276 13.4483H4.13793C2.9069 13.4483 2.06897 12.6103 2.06897 11.3793V5.17241H24.8276V11.3793C24.8276 11.5448 24.8172 11.7 24.7862 11.8448C25.531 12.0724 26.2345 12.3828 26.8966 12.7655V3.10345H17.5862V2.06897C17.5862 1.53103 17.4 0.972414 17.0069 0.57931C16.6138 0.186207 16.0552 0 15.5172 0H11.3793ZM11.3793 2.06897H15.5172V3.10345H11.3793V2.06897ZM6.2069 9.31034V12.4138H8.27586V9.31034H6.2069ZM18.6207 9.31034V11.8552C19.2943 11.6446 19.9875 11.5025 20.6897 11.431V9.31034H18.6207ZM21.7241 13.4483C17.1621 13.4483 13.4483 17.1621 13.4483 21.7241C13.4483 26.2862 17.1621 30 21.7241 30C26.2862 30 30 26.2862 30 21.7241C30 17.1621 26.2862 13.4483 21.7241 13.4483ZM21.7241 15.5172C25.1586 15.5172 27.931 18.2897 27.931 21.7241C27.931 25.1586 25.1586 27.931 21.7241 27.931C18.2897 27.931 15.5172 25.1586 15.5172 21.7241C15.5172 18.2897 18.2897 15.5172 21.7241 15.5172ZM20.6897 16.5517V22.7586H25.8621V20.6897H22.7586V16.5517H20.6897Z" fill="#0369CF"/>
                                    </svg>                                        
                                </span>
                                <div class="overview">
                                    <span class="count">{{ count($appliedJob) }}</span>
                                    <span class="label">Applied Jobs</span>
                                </div>
                            </div>
                            {{-- <div class="overview-info-box review">
                                <span class="overview-icon">
                                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M19.3333 21V24.3333C19.3333 24.7754 19.1577 25.1993 18.8452 25.5118C18.5326 25.8244 18.1087 26 17.6667 26H6L1 31V14.3333C1 13.8913 1.17559 13.4674 1.48816 13.1548C1.80072 12.8423 2.22464 12.6667 2.66667 12.6667H6M31 19.3333L26 14.3333H14.3333C13.8913 14.3333 13.4674 14.1577 13.1548 13.8452C12.8423 13.5326 12.6667 13.1087 12.6667 12.6667V2.66667C12.6667 2.22464 12.8423 1.80072 13.1548 1.48816C13.4674 1.17559 13.8913 1 14.3333 1H29.3333C29.7754 1 30.1993 1.17559 30.5118 1.48816C30.8244 1.80072 31 2.22464 31 2.66667V19.3333Z" stroke="#FF6C07" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>                                        
                                </span>
                                <div class="overview">
                                    <span class="count">1</span>
                                    <span class="label">Review</span>
                                </div>
                            </div> --}}
                            <div class="overview-info-box shortlisted">
                                <span class="overview-icon">
                                    <svg width="16" height="18" viewBox="0 0 16 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 2.70571V15.1455C1 15.9045 1.91853 16.2857 2.45583 15.7484L7.82285 10.3814L13.1899 15.7484C13.7272 16.2857 14.6457 15.9054 14.6457 15.1455V2.70571C14.6457 2.25333 14.466 1.81947 14.1461 1.49959C13.8262 1.17971 13.3924 1 12.94 1H2.70571C2.25333 1 1.81947 1.17971 1.49959 1.49959C1.17971 1.81947 1 2.25333 1 2.70571Z" stroke="#189CF4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>                                       
                                </span>
                                <div class="overview">
                                    <span class="count">{{ count($getSaveJob) }}</span>
                                    <span class="label">Shortlisted</span>
                                </div>
                            </div>
                            <div class="overview-info-box view">
                                <span class="overview-icon">
                                    <svg width="37" height="25" viewBox="0 0 37 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M36.3636 12.5C36.3636 12.5 29.5455 0 18.1818 0C6.81818 0 0 12.5 0 12.5C0 12.5 6.81818 25 18.1818 25C29.5455 25 36.3636 12.5 36.3636 12.5ZM2.66591 12.5C3.76481 10.8298 5.02873 9.27429 6.43864 7.85682C9.36364 4.92727 13.3636 2.27273 18.1818 2.27273C23 2.27273 26.9977 4.92727 29.9273 7.85682C31.3372 9.27429 32.6011 10.8298 33.7 12.5C33.5682 12.6977 33.4227 12.9159 33.2568 13.1545C32.4955 14.2455 31.3705 15.7 29.9273 17.1432C26.9977 20.0727 22.9977 22.7273 18.1818 22.7273C13.3636 22.7273 9.36591 20.0727 6.43636 17.1432C5.02647 15.7257 3.76255 14.1702 2.66364 12.5H2.66591Z" fill="#DC1E2A"/>
                                        <path d="M18.1816 6.81814C16.6747 6.81814 15.2295 7.41676 14.1639 8.4823C13.0984 9.54785 12.4998 10.993 12.4998 12.5C12.4998 14.0069 13.0984 15.4521 14.1639 16.5176C15.2295 17.5832 16.6747 18.1818 18.1816 18.1818C19.6885 18.1818 21.1337 17.5832 22.1992 16.5176C23.2648 15.4521 23.8634 14.0069 23.8634 12.5C23.8634 10.993 23.2648 9.54785 22.1992 8.4823C21.1337 7.41676 19.6885 6.81814 18.1816 6.81814ZM10.2271 12.5C10.2271 10.3903 11.0651 8.36701 12.5569 6.87524C14.0487 5.38348 16.0719 4.54541 18.1816 4.54541C20.2913 4.54541 22.3145 5.38348 23.8063 6.87524C25.2981 8.36701 26.1361 10.3903 26.1361 12.5C26.1361 14.6096 25.2981 16.6329 23.8063 18.1247C22.3145 19.6164 20.2913 20.4545 18.1816 20.4545C16.0719 20.4545 14.0487 19.6164 12.5569 18.1247C11.0651 16.6329 10.2271 14.6096 10.2271 12.5Z" fill="#DC1E2A"/>
                                    </svg>                                        
                                </span>
                                <div class="overview">
                                    <span class="count">20</span>
                                    <span class="label">View</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="Profile" role="tabpanel" aria-labelledby="second-tab">
                        <h5 class="card-title">Edit Profile</h5>
                        <form method="POST" action="{{ route('user.profile.update',$user->id) }}" class="form-dash">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <input type="hidden" name="id" value="{{ $user->id }}">
                                <div class="form-group col-md-6">
                                    <label for="FirstName">First Name</label>
                                    <input type="text" name="first_name" class="form-control" id="FirstName" placeholder="" value="{{ $user->first_name }}">
                                    @if($errors->has('first_name'))
                                        <div class="text-danger">{{ $errors->first('first_name') }}</div>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="LastName">Last Name</label>
                                    <input type="text" name="last_name" class="form-control" id="LastName" value="{{ $user->last_name }}" placeholder="">
                                    @if($errors->has('last_name'))
                                        <div class="text-danger">{{ $errors->first('last_name') }}</div>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="eMail">Email</label>
                                    <input type="email" name="email" class="form-control" id="eMail" value="{{ $user->email }}" placeholder="">
                                    @if($errors->has('email'))
                                        <div class="text-danger">{{ $errors->first('email') }}</div>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Gender</label>
                                    <select class="gender-dropdown form-control" name="gender">
                                        <option disabled selected>Select Gender</option>
                                        <option <?php if($user->gender == "male") { echo "selected='selected'"; } ?> value="male">Male</option>
                                        <option <?php if($user->gender == "female") { echo "selected='selected'"; } ?> value="female">Female</option>
                                        <option  <?php if($user->gender == "other") { echo "selected='selected'"; } ?> value="other">Other</option>
                                    </select>
                                    @if($errors->has('gender'))
                                        <div class="text-danger">{{ $errors->first('gender') }}</div>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="PhoneNumber">Phone</label>
                                    <input type="text" name="phone" class="form-control" id="PhoneNumber" value="{{ $user->phone }}" placeholder="">
                                    @if($errors->has('phone'))
                                        <div class="text-danger">{{ $errors->first('phone') }}</div>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="SecondaryPhone">Secondary Phone</label>
                                    <input type="text" name="secondary_phone" class="form-control" id="SecondaryPhone" value="{{ $user->secondary_phone }}" placeholder="">
                                    @if($errors->has('secondary_phone'))
                                        <div class="text-danger">{{ $errors->first('secondary_phone') }}</div>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="BirthDate">Date of birth</label>
                                    <input type="date" name="date_of_birth" class="form-control" id="BirthDate" value="{{ $user->date_of_birth }}" placeholder="">
                                    @if($errors->has('date_of_birth'))
                                        <div class="text-danger">{{ $errors->first('date_of_birth') }}</div>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Resident</label>
                                    <select class="resident-dropdown form-control" name="isResident">
                                        <option <?php if($user->isResident == 'yes') { echo "selected='selected'"; } ?>  value="yes">Yes</option>
                                        <option <?php if($user->isResident == 'no') { echo "selected='selected'"; } ?> value="no">No</option>
                                    </select>
                                    @if($errors->has('isResident'))
                                        <div class="text-danger">{{ $errors->first('isResident') }}</div>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="CountryName">Country</label>
                                    <input type="text" name="country" class="form-control" id="CountryName" value="{{ $user->country }}" placeholder="">
                                    @if($errors->has('country'))
                                        <div class="text-danger">{{ $errors->first('country') }}</div>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="StreetName">Street</label>
                                    <input type="text" name="street" class="form-control" id="StreetName" value="{{ $user->street }}" placeholder="">
                                    @if($errors->has('street'))
                                        <div class="text-danger">{{ $errors->first('street') }}</div>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="CityName">City</label>
                                    <input type="text" name="city" class="form-control" id="CityName" value="{{ $user->city }}" placeholder="">
                                    @if($errors->has('city'))
                                        <div class="text-danger">{{ $errors->first('city') }}</div>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="TownName">Town</label>
                                    <input type="text" name="town" class="form-control" id="TownName" value="{{ $user->town }}" placeholder="">
                                    @if($errors->has('town'))
                                        <div class="text-danger">{{ $errors->first('town') }}</div>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="DivisionName">Division</label>
                                    <input type="text" name="division" class="form-control" id="DivisionName" value="{{ $user->division }}" placeholder="">
                                    @if($errors->has('division'))
                                        <div class="text-danger">{{ $errors->first('division') }}</div>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="PostalCode">Postal Code</label>
                                    <input type="text" name="postal_address" class="form-control" id="PostalCode" value="{{ $user->postal_address }}" placeholder="">
                                    @if($errors->has('postal_address'))
                                        <div class="text-danger">{{ $errors->first('postal_address') }}</div>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="TINnumber">TIN</label>
                                    <input type="text" name="tin" class="form-control" id="TINnumber" value="{{ $user->tin }}" placeholder="">
                                    @if($errors->has('tin'))
                                        <div class="text-danger">{{ $errors->first('tin') }}</div>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="VaccRefNum">Vaccination Reference Number</label>
                                    <input type="text" name="vaccination_ref_number" class="form-control" id="VaccRefNum" value="{{ $user->vaccination_ref_number }}" placeholder="">
                                    @if($errors->has('vaccination_ref_number'))
                                        <div class="text-danger">{{ $errors->first('vaccination_ref_number') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group col-md-12 text-center">
                                <input type="submit" class="btn-typ1 w-100 rounded-btn5 col-md-4" placeholder="Save Profile" value="Save Profile">
                            </div>
                        </form>
                        {{-- <form action="" class="form-dash mt-3"> --}}
                        <form method="POST" action="{{ route('user.changePassword',$user->id) }}" class="form-dash mt-3">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <h5 class="card-title">Change Password</h5>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control" id="password" placeholder="">
                                    @if($errors->has('password'))
                                        <div class="text-danger">{{ $errors->first('password') }}</div>
                                    @endif
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="confirm_pass">Confirm Password</label>
                                    <input type="password" name="password_confirmation" class="form-control" id="confirm_pass" placeholder="">
                                    @if($errors->has('password_confirmation'))
                                        <div class="text-danger">{{ $errors->first('password_confirmation') }}</div>
                                    @endif
                                </div>
                                {{-- <div class="form-group col-md-12">
                                    <label for="maps">Maps Location</label>
                                    <input type="text" class="form-control" id="maps" placeholder="">
                                </div> --}}
                                <div class="form-group col-md-12">
                                    <div class="sidebar-map">
                                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3929.637032435699!2d76.28798331428173!3d9.964126276386063!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3b0872b72eb96457%3A0xf0f993910b89e1d7!2sReubro%20International!5e0!3m2!1sen!2sin!4v1667965144321!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                    </div>
                                </div>
                                
                                <div class="form-group col-md-12 text-center">
                                    <input type="submit" class="btn-typ1 w-100 rounded-btn5 col-md-4" placeholder="Change Password" value="Change Password">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="MyResume" role="tabpanel" aria-labelledby="third-tab">
                        <h5 class="card-title">My Resume</h5>
                        <form action="" class="form-dash create-resume">
                            <h6>Resume</h6>
                            <div class="create-new-resum create-resume-btn">
                                <span class="mb-4">Create New Resume</span>
                                <span>
                                    <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M14.9998 0C14.6698 0 14.3435 0.01125 14.0191 0.031875L14.1391 1.90313C14.7123 1.86608 15.2872 1.86608 15.8604 1.90313L15.9804 0.031875C15.6539 0.0107086 15.3269 7.80225e-05 14.9998 0V0ZM12.0748 0.285C11.426 0.414375 10.7923 0.585 10.1773 0.79125L10.7791 2.56875C11.3173 2.385 11.8704 2.23688 12.4366 2.12438L12.0748 0.286875V0.285ZM19.8223 0.793125C19.2022 0.582906 18.569 0.41379 17.9266 0.286875L17.5629 2.12438C18.1291 2.23688 18.6823 2.38688 19.2204 2.56875L19.8223 0.793125ZM23.3341 2.5275C22.7899 2.16327 22.2225 1.83507 21.6354 1.545L20.8048 3.225C21.3204 3.48 21.8173 3.76875 22.2916 4.08563L23.3341 2.5275ZM8.36227 1.545C7.77352 1.83563 7.20727 2.16375 6.66539 2.5275L7.70789 4.08375C8.18444 3.76567 8.6811 3.47882 9.19477 3.225L8.36227 1.545ZM5.10914 3.72188C4.61789 4.15313 4.15289 4.61812 3.72164 5.10938L5.13164 6.34688C5.51039 5.91563 5.91539 5.51063 6.34664 5.13188L5.10914 3.72188ZM26.2779 5.10938C25.8459 4.6173 25.3825 4.15382 24.8904 3.72188L23.6529 5.13188C24.0841 5.51063 24.491 5.91563 24.8679 6.34688L26.2779 5.10938ZM28.4548 8.3625C28.1647 7.776 27.8365 7.20916 27.4723 6.66563L25.916 7.70813C26.2329 8.1825 26.5198 8.67938 26.7748 9.195L28.4548 8.36438V8.3625ZM2.52727 6.66563C2.16352 7.2075 1.83352 7.77375 1.54477 8.36438L3.22477 9.195C3.47977 8.67938 3.76852 8.1825 4.08539 7.70813L2.52727 6.66563ZM0.792891 10.1775C0.582667 10.7976 0.41355 11.4308 0.286641 12.0731L2.12414 12.4369C2.23664 11.8706 2.38664 11.3175 2.56852 10.7794L0.792891 10.1775ZM29.7148 12.075C29.5879 11.4321 29.4188 10.7982 29.2085 10.1775L27.431 10.7794C27.6148 11.3175 27.7629 11.8706 27.8754 12.4369L29.7129 12.0731L29.7148 12.075ZM0.0316406 14.0194C-0.0105469 14.6724 -0.0105469 15.3276 0.0316406 15.9806L1.90289 15.8606C1.86585 15.2875 1.86585 14.7125 1.90289 14.1394L0.0316406 14.0194ZM29.9998 15C29.9997 14.6729 29.9891 14.3458 29.9679 14.0194L28.0966 14.1394C28.1337 14.7125 28.1337 15.2875 28.0966 15.8606L29.9679 15.9806C29.9891 15.6542 29.9997 15.3271 29.9998 15ZM0.284766 17.925C0.414141 18.5738 0.584766 19.2075 0.791016 19.8225L2.56852 19.2206C2.3841 18.6785 2.23566 18.1248 2.12414 17.5631L0.286641 17.9269L0.284766 17.925ZM29.2066 19.8225C29.4166 19.2075 29.5854 18.5738 29.7129 17.9269L27.8754 17.5631C27.7629 18.1294 27.6129 18.6825 27.431 19.2206L29.2066 19.8225ZM1.54477 21.6375C1.83491 22.2239 2.16311 22.7908 2.52727 23.3344L4.08352 22.2919C3.76511 21.8155 3.47825 21.3188 3.22477 20.805L1.54477 21.6356V21.6375ZM27.4723 23.3344C27.836 22.7925 28.166 22.2262 28.4548 21.6356L26.7748 20.805C26.5198 21.3206 26.231 21.8175 25.9141 22.2919L27.4723 23.3344ZM3.72164 24.8906C4.15289 25.3819 4.61789 25.8469 5.10914 26.2781L6.34664 24.8681C5.91571 24.4899 5.50985 24.0841 5.13164 23.6531L3.72164 24.8906ZM24.8904 26.2781C25.3816 25.8469 25.8466 25.3819 26.2779 24.8906L24.8679 23.6531C24.491 24.0844 24.0841 24.4913 23.6529 24.8681L24.8904 26.2781ZM21.6373 28.455C22.226 28.1644 22.7923 27.8363 23.3341 27.4725L22.2916 25.9163C21.8151 26.2343 21.3184 26.5212 20.8048 26.775L21.6354 28.455H21.6373ZM6.66539 27.4725C7.20727 27.8363 7.77352 28.1663 8.36414 28.455L9.19477 26.775C8.68087 26.5209 8.18418 26.2334 7.70789 25.9144L6.66539 27.4725ZM10.1773 29.2069C10.7923 29.4169 11.426 29.5856 12.0729 29.7131L12.4366 27.8756C11.875 27.7641 11.3213 27.6156 10.7791 27.4313L10.1773 29.2069ZM17.9248 29.715C18.5677 29.5882 19.2016 29.4191 19.8223 29.2088L19.2204 27.4313C18.6782 27.6156 18.1245 27.7641 17.5629 27.8756L17.9266 29.7131L17.9248 29.715ZM14.0191 29.9681C14.6722 30.0104 15.3273 30.0104 15.9804 29.9681L15.8604 28.0969C15.2872 28.134 14.7123 28.134 14.1391 28.0969L14.0191 29.9681ZM15.9373 8.4375C15.9373 8.18886 15.8385 7.9504 15.6627 7.77459C15.4869 7.59877 15.2484 7.5 14.9998 7.5C14.7511 7.5 14.5127 7.59877 14.3369 7.77459C14.161 7.9504 14.0623 8.18886 14.0623 8.4375V14.0625H8.43727C8.18863 14.0625 7.95017 14.1613 7.77435 14.3371C7.59854 14.5129 7.49977 14.7514 7.49977 15C7.49977 15.2486 7.59854 15.4871 7.77435 15.6629C7.95017 15.8387 8.18863 15.9375 8.43727 15.9375H14.0623V21.5625C14.0623 21.8111 14.161 22.0496 14.3369 22.2254C14.5127 22.4012 14.7511 22.5 14.9998 22.5C15.2484 22.5 15.4869 22.4012 15.6627 22.2254C15.8385 22.0496 15.9373 21.8111 15.9373 21.5625V15.9375H21.5623C21.8109 15.9375 22.0494 15.8387 22.2252 15.6629C22.401 15.4871 22.4998 15.2486 22.4998 15C22.4998 14.7514 22.401 14.5129 22.2252 14.3371C22.0494 14.1613 21.8109 14.0625 21.5623 14.0625H15.9373V8.4375Z" fill="black"/>
                                    </svg>                                        
                                </span>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="CoverLetter" role="tabpanel" aria-labelledby="fourth-tab">
                        <h5 class="card-title">Create Cover Letter</h5>
                        <form action="" class="form-dash create-resume">
                            <h6>Cover Letter</h6>
                            <div class="create-new-resum cover-letter-btn">
                                <span class="mb-4">Create New Cover Letter</span>
                                <span>
                                    <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M14.9998 0C14.6698 0 14.3435 0.01125 14.0191 0.031875L14.1391 1.90313C14.7123 1.86608 15.2872 1.86608 15.8604 1.90313L15.9804 0.031875C15.6539 0.0107086 15.3269 7.80225e-05 14.9998 0V0ZM12.0748 0.285C11.426 0.414375 10.7923 0.585 10.1773 0.79125L10.7791 2.56875C11.3173 2.385 11.8704 2.23688 12.4366 2.12438L12.0748 0.286875V0.285ZM19.8223 0.793125C19.2022 0.582906 18.569 0.41379 17.9266 0.286875L17.5629 2.12438C18.1291 2.23688 18.6823 2.38688 19.2204 2.56875L19.8223 0.793125ZM23.3341 2.5275C22.7899 2.16327 22.2225 1.83507 21.6354 1.545L20.8048 3.225C21.3204 3.48 21.8173 3.76875 22.2916 4.08563L23.3341 2.5275ZM8.36227 1.545C7.77352 1.83563 7.20727 2.16375 6.66539 2.5275L7.70789 4.08375C8.18444 3.76567 8.6811 3.47882 9.19477 3.225L8.36227 1.545ZM5.10914 3.72188C4.61789 4.15313 4.15289 4.61812 3.72164 5.10938L5.13164 6.34688C5.51039 5.91563 5.91539 5.51063 6.34664 5.13188L5.10914 3.72188ZM26.2779 5.10938C25.8459 4.6173 25.3825 4.15382 24.8904 3.72188L23.6529 5.13188C24.0841 5.51063 24.491 5.91563 24.8679 6.34688L26.2779 5.10938ZM28.4548 8.3625C28.1647 7.776 27.8365 7.20916 27.4723 6.66563L25.916 7.70813C26.2329 8.1825 26.5198 8.67938 26.7748 9.195L28.4548 8.36438V8.3625ZM2.52727 6.66563C2.16352 7.2075 1.83352 7.77375 1.54477 8.36438L3.22477 9.195C3.47977 8.67938 3.76852 8.1825 4.08539 7.70813L2.52727 6.66563ZM0.792891 10.1775C0.582667 10.7976 0.41355 11.4308 0.286641 12.0731L2.12414 12.4369C2.23664 11.8706 2.38664 11.3175 2.56852 10.7794L0.792891 10.1775ZM29.7148 12.075C29.5879 11.4321 29.4188 10.7982 29.2085 10.1775L27.431 10.7794C27.6148 11.3175 27.7629 11.8706 27.8754 12.4369L29.7129 12.0731L29.7148 12.075ZM0.0316406 14.0194C-0.0105469 14.6724 -0.0105469 15.3276 0.0316406 15.9806L1.90289 15.8606C1.86585 15.2875 1.86585 14.7125 1.90289 14.1394L0.0316406 14.0194ZM29.9998 15C29.9997 14.6729 29.9891 14.3458 29.9679 14.0194L28.0966 14.1394C28.1337 14.7125 28.1337 15.2875 28.0966 15.8606L29.9679 15.9806C29.9891 15.6542 29.9997 15.3271 29.9998 15ZM0.284766 17.925C0.414141 18.5738 0.584766 19.2075 0.791016 19.8225L2.56852 19.2206C2.3841 18.6785 2.23566 18.1248 2.12414 17.5631L0.286641 17.9269L0.284766 17.925ZM29.2066 19.8225C29.4166 19.2075 29.5854 18.5738 29.7129 17.9269L27.8754 17.5631C27.7629 18.1294 27.6129 18.6825 27.431 19.2206L29.2066 19.8225ZM1.54477 21.6375C1.83491 22.2239 2.16311 22.7908 2.52727 23.3344L4.08352 22.2919C3.76511 21.8155 3.47825 21.3188 3.22477 20.805L1.54477 21.6356V21.6375ZM27.4723 23.3344C27.836 22.7925 28.166 22.2262 28.4548 21.6356L26.7748 20.805C26.5198 21.3206 26.231 21.8175 25.9141 22.2919L27.4723 23.3344ZM3.72164 24.8906C4.15289 25.3819 4.61789 25.8469 5.10914 26.2781L6.34664 24.8681C5.91571 24.4899 5.50985 24.0841 5.13164 23.6531L3.72164 24.8906ZM24.8904 26.2781C25.3816 25.8469 25.8466 25.3819 26.2779 24.8906L24.8679 23.6531C24.491 24.0844 24.0841 24.4913 23.6529 24.8681L24.8904 26.2781ZM21.6373 28.455C22.226 28.1644 22.7923 27.8363 23.3341 27.4725L22.2916 25.9163C21.8151 26.2343 21.3184 26.5212 20.8048 26.775L21.6354 28.455H21.6373ZM6.66539 27.4725C7.20727 27.8363 7.77352 28.1663 8.36414 28.455L9.19477 26.775C8.68087 26.5209 8.18418 26.2334 7.70789 25.9144L6.66539 27.4725ZM10.1773 29.2069C10.7923 29.4169 11.426 29.5856 12.0729 29.7131L12.4366 27.8756C11.875 27.7641 11.3213 27.6156 10.7791 27.4313L10.1773 29.2069ZM17.9248 29.715C18.5677 29.5882 19.2016 29.4191 19.8223 29.2088L19.2204 27.4313C18.6782 27.6156 18.1245 27.7641 17.5629 27.8756L17.9266 29.7131L17.9248 29.715ZM14.0191 29.9681C14.6722 30.0104 15.3273 30.0104 15.9804 29.9681L15.8604 28.0969C15.2872 28.134 14.7123 28.134 14.1391 28.0969L14.0191 29.9681ZM15.9373 8.4375C15.9373 8.18886 15.8385 7.9504 15.6627 7.77459C15.4869 7.59877 15.2484 7.5 14.9998 7.5C14.7511 7.5 14.5127 7.59877 14.3369 7.77459C14.161 7.9504 14.0623 8.18886 14.0623 8.4375V14.0625H8.43727C8.18863 14.0625 7.95017 14.1613 7.77435 14.3371C7.59854 14.5129 7.49977 14.7514 7.49977 15C7.49977 15.2486 7.59854 15.4871 7.77435 15.6629C7.95017 15.8387 8.18863 15.9375 8.43727 15.9375H14.0623V21.5625C14.0623 21.8111 14.161 22.0496 14.3369 22.2254C14.5127 22.4012 14.7511 22.5 14.9998 22.5C15.2484 22.5 15.4869 22.4012 15.6627 22.2254C15.8385 22.0496 15.9373 21.8111 15.9373 21.5625V15.9375H21.5623C21.8109 15.9375 22.0494 15.8387 22.2252 15.6629C22.401 15.4871 22.4998 15.2486 22.4998 15C22.4998 14.7514 22.401 14.5129 22.2252 14.3371C22.0494 14.1613 21.8109 14.0625 21.5623 14.0625H15.9373V8.4375Z" fill="black"/>
                                    </svg>                                        
                                </span>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="MyApplied" role="tabpanel" aria-labelledby="fifth-tab">
                        <h5 class="card-title">Applied Jobs</h5>
                        <form class="form-dash">
                            <div class="d-flex flex-lg-row flex-column justify-content-lg-between justify-content-sm-start align-items-lg-center align-items-sm-start mb-3">
                                <input type="text" class="pos-rel search-field-top dash-job-search" placeholder="">
                                <div class="form-group dash-filter-top d-flex align-items-center justify-content-md-between">
                                    <label for="">Sort by:</label>
                                    <select class="filter-dropdown" name="states[]">
                                        <option disabled selected>Newest</option>
                                        <option>New</option>
                                        <option>Old</option>
                                    </select>
                                </div>
                            </div>
                            
                            <table class="table">
                                <thead>
                                    <th class="job-title">Job Title</th>
                                    <th class="job-applied-date">Date Applied</th>
                                    <th class="job-status">Status</th>
                                    <th class="job-action">Action</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="job-title" data-label="Job Title">
                                            <div class="row">
                                                <div class="job-box job-box-type1">
                                                    <span class="job-title-sec">
                                                        <strong class="title-icon blue-bg"><svg width="23" height="33" viewBox="0 0 23 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M10.045 26.19C10.7917 26.19 11.6317 26.3183 12.565 26.575C13.4983 26.8317 14.4433 27.1583 15.4 27.555C16.3567 27.975 16.9633 28.22 17.22 28.29C18.3167 28.64 20.0083 28.815 22.295 28.815C22.2017 29.7017 22.05 30.4717 21.84 31.125C21.6533 31.7783 21.3967 32.315 21.07 32.735C19.32 32.6417 17.7683 32.3383 16.415 31.825C16.0417 31.685 15.365 31.3933 14.385 30.95C13.405 30.53 12.5417 30.2033 11.795 29.97C11.0483 29.76 10.3367 29.655 9.66 29.655C9.00667 29.655 8.07333 29.795 6.86 30.075C5.67 30.3783 5.06333 30.53 5.04 30.53C4.2 29.8067 3.78 29.0017 3.78 28.115C5.20333 27.4617 6.41667 26.9717 7.42 26.645C8.44667 26.3417 9.32167 26.19 10.045 26.19ZM11.55 21.71C15.4233 21.71 17.36 18.735 17.36 12.785C17.36 6.835 15.4233 3.86 11.55 3.86C9.87 3.86 8.4 4.11667 7.14 4.63C6.06667 6.87 5.53 9.47167 5.53 12.435C5.53 15.375 5.97333 17.6617 6.86 19.295C7.74667 20.905 9.31 21.71 11.55 21.71ZM11.55 0.0799996C15.4467 0.0799996 18.1883 1.10667 19.775 3.16C21.3617 5.19 22.155 8.305 22.155 12.505C22.155 15.1417 21.8167 17.3933 21.14 19.26C20.4633 21.1267 19.32 22.62 17.71 23.74C16.1 24.86 14.0467 25.42 11.55 25.42C7.74667 25.42 4.98167 24.3583 3.255 22.235C1.55167 20.1117 0.7 17.02 0.7 12.96C0.7 4.37333 4.31667 0.0799996 11.55 0.0799996Z" fill="white"/>
                                                            </svg>
                                                        </strong>
                                                        <span class="job-title">
                                                            <h4>Junior Graphic Designer (Web)</h4>
                                                            <span class="featured">Featured</span>
                                                            <span class="job-info-sec">
                                                                <ul class="job-info">
                                                                    <li class="job-name">
                                                                        <span><svg width="17" height="15" viewBox="0 0 17 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M1.15385 5.76928H15V4.61543C15 4.30941 14.8784 4.01593 14.662 3.79954C14.4457 3.58315 14.1522 3.46159 13.8462 3.46159H2.30769C2.00167 3.46159 1.70819 3.58315 1.4918 3.79954C1.27541 4.01593 1.15385 4.30941 1.15385 4.61543V5.76928ZM1.15385 6.92312V12.6924C1.15385 12.9984 1.27541 13.2919 1.4918 13.5082C1.70819 13.7246 2.00167 13.8462 2.30769 13.8462H13.8462C14.1522 13.8462 14.4457 13.7246 14.662 13.5082C14.8784 13.2919 15 12.9984 15 12.6924V6.92312H1.15385ZM2.30769 2.30774H13.8462C14.4582 2.30774 15.0452 2.55087 15.4779 2.98365C15.9107 3.41642 16.1538 4.00339 16.1538 4.61543V12.6924C16.1538 13.3044 15.9107 13.8914 15.4779 14.3241C15.0452 14.7569 14.4582 15 13.8462 15H2.30769C1.69565 15 1.10868 14.7569 0.675907 14.3241C0.243131 13.8914 0 13.3044 0 12.6924V4.61543C0 4.00339 0.243131 3.41642 0.675907 2.98365C1.10868 2.55087 1.69565 2.30774 2.30769 2.30774Z" fill="#A0A0A0"></path>
                                                                            <path d="M5.76908 1.15385V2.30769H10.3845V1.15385H5.76908ZM5.76908 0H10.3845C10.6905 0 10.984 0.121566 11.2004 0.337954C11.4167 0.554342 11.5383 0.847827 11.5383 1.15385V2.30769C11.5383 2.61371 11.4167 2.9072 11.2004 3.12358C10.984 3.33997 10.6905 3.46154 10.3845 3.46154H5.76908C5.46306 3.46154 5.16958 3.33997 4.95319 3.12358C4.7368 2.9072 4.61523 2.61371 4.61523 2.30769V1.15385C4.61523 0.847827 4.7368 0.554342 4.95319 0.337954C5.16958 0.121566 5.46306 0 5.76908 0Z" fill="#A0A0A0"></path>
                                                                            </svg>
                                                                        </span>
                                                                        Design, Development
                                                                    </li>
                                                                    <li class="company-location">
                                                                        <span><svg width="12" height="15" viewBox="0 0 12 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M5.89287 8.57142C5.3631 8.57142 4.84522 8.41433 4.40473 8.12C3.96424 7.82568 3.62092 7.40734 3.41819 6.9179C3.21546 6.42845 3.16241 5.88988 3.26576 5.37029C3.36912 4.8507 3.62423 4.37342 3.99883 3.99882C4.37344 3.62421 4.85071 3.3691 5.3703 3.26575C5.8899 3.1624 6.42847 3.21544 6.91791 3.41817C7.40736 3.62091 7.82569 3.96423 8.12002 4.40472C8.41434 4.84521 8.57144 5.36308 8.57144 5.89285C8.57059 6.60299 8.28811 7.2838 7.78596 7.78595C7.28382 8.28809 6.60301 8.57057 5.89287 8.57142ZM5.89287 4.28571C5.575 4.28571 5.26428 4.37997 4.99999 4.55656C4.73569 4.73316 4.5297 4.98416 4.40806 5.27782C4.28642 5.57149 4.25459 5.89463 4.3166 6.20639C4.37862 6.51815 4.53168 6.80451 4.75645 7.02927C4.98121 7.25404 5.26757 7.4071 5.57933 7.46911C5.89108 7.53113 6.21423 7.4993 6.50789 7.37766C6.80156 7.25602 7.05256 7.05003 7.22916 6.78573C7.40575 6.52144 7.50001 6.21071 7.50001 5.89285C7.49958 5.46674 7.33012 5.05821 7.02882 4.7569C6.72751 4.45559 6.31898 4.28613 5.89287 4.28571Z" fill="#AFAFAF"></path>
                                                                            <path d="M5.89286 15L1.37358 9.67018C1.31078 9.59015 1.24864 9.50961 1.18715 9.42857C0.415174 8.41167 -0.00186492 7.16958 6.2694e-06 5.89286C6.2694e-06 4.32997 0.620859 2.8311 1.72598 1.72598C2.83111 0.620853 4.32998 0 5.89286 0C7.45575 0 8.95462 0.620853 10.0597 1.72598C11.1649 2.8311 11.7857 4.32997 11.7857 5.89286C11.7876 7.169 11.3707 8.41053 10.5991 9.42696L10.5986 9.42857C10.5986 9.42857 10.4379 9.63964 10.4138 9.66804L5.89286 15ZM2.04215 8.78304C2.04322 8.78304 2.16751 8.94804 2.1959 8.98339L5.89286 13.3436L9.59465 8.9775C9.61822 8.94804 9.74358 8.78196 9.74411 8.78143C10.3747 7.9506 10.7155 6.93591 10.7143 5.89286C10.7143 4.61413 10.2063 3.38779 9.30213 2.48359C8.39793 1.5794 7.17159 1.07143 5.89286 1.07143C4.61414 1.07143 3.38779 1.5794 2.4836 2.48359C1.57941 3.38779 1.07143 4.61413 1.07143 5.89286C1.07031 6.93656 1.41149 7.95183 2.04268 8.78304H2.04215Z" fill="#AFAFAF"></path>
                                                                            </svg>
                                                                        </span>
                                                                        New York
                                                                    </li>
                                                                </ul>
                                                            </span>
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="job-applied-date" data-label="Date Applied"><span>July 20,2022</span></td>
                                        <td class="job-status" data-label="Status"><span>Pending</span></td>
                                        <td class="job-action" data-label="Action">
                                            <div class="">
                                                <button class="remove-btn">
                                                    <svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M4.558 5.442L0 10L0.884 10.884L5.442 6.326L10 10.884L10.884 10L6.326 5.442L10.884 0.884L10 0L5.442 4.558L0.884 0L0 0.884L4.558 5.442Z" fill="black"/>
                                                    </svg>                                                        
                                                </button>
                                                <a href="job-detail.html" class="view-btn">
                                                    <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M14.0065 7.30436C12.6023 4.70853 10.1398 3.1377 7.41484 3.1377C4.68984 3.1377 2.22318 4.70853 0.83151 7.30436L0.714844 7.5002L0.823177 7.70019C2.22734 10.296 4.68984 11.8669 7.41484 11.8669C10.1398 11.8669 12.6065 10.3169 14.0065 7.70019L14.1148 7.5002L14.0065 7.30436ZM7.41484 11.0127C5.06901 11.0127 2.91484 9.70436 1.66484 7.5002C2.91484 5.29603 5.06901 3.9877 7.41484 3.9877C9.76068 3.9877 11.8898 5.30019 13.1607 7.5002C11.8898 9.70436 9.75651 11.0127 7.41484 11.0127Z" fill="black"/>
                                                        <path d="M7.53997 10.371C9.11859 10.371 10.3983 9.09124 10.3983 7.51263C10.3983 5.93402 9.11859 4.6543 7.53997 4.6543C5.96136 4.6543 4.68164 5.93402 4.68164 7.51263C4.68164 9.09124 5.96136 10.371 7.53997 10.371Z" fill="black"/>
                                                    </svg>                                                        
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="job-title" data-label="Job Title">
                                            <div class="row">
                                                <div class="job-box job-box-type1">
                                                    <span class="job-title-sec">
                                                        <strong class="title-icon blue-bg"><svg width="23" height="33" viewBox="0 0 23 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M10.045 26.19C10.7917 26.19 11.6317 26.3183 12.565 26.575C13.4983 26.8317 14.4433 27.1583 15.4 27.555C16.3567 27.975 16.9633 28.22 17.22 28.29C18.3167 28.64 20.0083 28.815 22.295 28.815C22.2017 29.7017 22.05 30.4717 21.84 31.125C21.6533 31.7783 21.3967 32.315 21.07 32.735C19.32 32.6417 17.7683 32.3383 16.415 31.825C16.0417 31.685 15.365 31.3933 14.385 30.95C13.405 30.53 12.5417 30.2033 11.795 29.97C11.0483 29.76 10.3367 29.655 9.66 29.655C9.00667 29.655 8.07333 29.795 6.86 30.075C5.67 30.3783 5.06333 30.53 5.04 30.53C4.2 29.8067 3.78 29.0017 3.78 28.115C5.20333 27.4617 6.41667 26.9717 7.42 26.645C8.44667 26.3417 9.32167 26.19 10.045 26.19ZM11.55 21.71C15.4233 21.71 17.36 18.735 17.36 12.785C17.36 6.835 15.4233 3.86 11.55 3.86C9.87 3.86 8.4 4.11667 7.14 4.63C6.06667 6.87 5.53 9.47167 5.53 12.435C5.53 15.375 5.97333 17.6617 6.86 19.295C7.74667 20.905 9.31 21.71 11.55 21.71ZM11.55 0.0799996C15.4467 0.0799996 18.1883 1.10667 19.775 3.16C21.3617 5.19 22.155 8.305 22.155 12.505C22.155 15.1417 21.8167 17.3933 21.14 19.26C20.4633 21.1267 19.32 22.62 17.71 23.74C16.1 24.86 14.0467 25.42 11.55 25.42C7.74667 25.42 4.98167 24.3583 3.255 22.235C1.55167 20.1117 0.7 17.02 0.7 12.96C0.7 4.37333 4.31667 0.0799996 11.55 0.0799996Z" fill="white"/>
                                                            </svg>
                                                        </strong>
                                                        <span class="job-title">
                                                            <h4>Junior Graphic Designer (Web)</h4>
                                                            <span class="featured">Featured</span>
                                                            <span class="job-info-sec">
                                                                <ul class="job-info">
                                                                    <li class="job-name">
                                                                        <span><svg width="17" height="15" viewBox="0 0 17 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M1.15385 5.76928H15V4.61543C15 4.30941 14.8784 4.01593 14.662 3.79954C14.4457 3.58315 14.1522 3.46159 13.8462 3.46159H2.30769C2.00167 3.46159 1.70819 3.58315 1.4918 3.79954C1.27541 4.01593 1.15385 4.30941 1.15385 4.61543V5.76928ZM1.15385 6.92312V12.6924C1.15385 12.9984 1.27541 13.2919 1.4918 13.5082C1.70819 13.7246 2.00167 13.8462 2.30769 13.8462H13.8462C14.1522 13.8462 14.4457 13.7246 14.662 13.5082C14.8784 13.2919 15 12.9984 15 12.6924V6.92312H1.15385ZM2.30769 2.30774H13.8462C14.4582 2.30774 15.0452 2.55087 15.4779 2.98365C15.9107 3.41642 16.1538 4.00339 16.1538 4.61543V12.6924C16.1538 13.3044 15.9107 13.8914 15.4779 14.3241C15.0452 14.7569 14.4582 15 13.8462 15H2.30769C1.69565 15 1.10868 14.7569 0.675907 14.3241C0.243131 13.8914 0 13.3044 0 12.6924V4.61543C0 4.00339 0.243131 3.41642 0.675907 2.98365C1.10868 2.55087 1.69565 2.30774 2.30769 2.30774Z" fill="#A0A0A0"></path>
                                                                            <path d="M5.76908 1.15385V2.30769H10.3845V1.15385H5.76908ZM5.76908 0H10.3845C10.6905 0 10.984 0.121566 11.2004 0.337954C11.4167 0.554342 11.5383 0.847827 11.5383 1.15385V2.30769C11.5383 2.61371 11.4167 2.9072 11.2004 3.12358C10.984 3.33997 10.6905 3.46154 10.3845 3.46154H5.76908C5.46306 3.46154 5.16958 3.33997 4.95319 3.12358C4.7368 2.9072 4.61523 2.61371 4.61523 2.30769V1.15385C4.61523 0.847827 4.7368 0.554342 4.95319 0.337954C5.16958 0.121566 5.46306 0 5.76908 0Z" fill="#A0A0A0"></path>
                                                                            </svg>
                                                                        </span>
                                                                        Design, Development
                                                                    </li>
                                                                    <li class="company-location">
                                                                        <span><svg width="12" height="15" viewBox="0 0 12 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M5.89287 8.57142C5.3631 8.57142 4.84522 8.41433 4.40473 8.12C3.96424 7.82568 3.62092 7.40734 3.41819 6.9179C3.21546 6.42845 3.16241 5.88988 3.26576 5.37029C3.36912 4.8507 3.62423 4.37342 3.99883 3.99882C4.37344 3.62421 4.85071 3.3691 5.3703 3.26575C5.8899 3.1624 6.42847 3.21544 6.91791 3.41817C7.40736 3.62091 7.82569 3.96423 8.12002 4.40472C8.41434 4.84521 8.57144 5.36308 8.57144 5.89285C8.57059 6.60299 8.28811 7.2838 7.78596 7.78595C7.28382 8.28809 6.60301 8.57057 5.89287 8.57142ZM5.89287 4.28571C5.575 4.28571 5.26428 4.37997 4.99999 4.55656C4.73569 4.73316 4.5297 4.98416 4.40806 5.27782C4.28642 5.57149 4.25459 5.89463 4.3166 6.20639C4.37862 6.51815 4.53168 6.80451 4.75645 7.02927C4.98121 7.25404 5.26757 7.4071 5.57933 7.46911C5.89108 7.53113 6.21423 7.4993 6.50789 7.37766C6.80156 7.25602 7.05256 7.05003 7.22916 6.78573C7.40575 6.52144 7.50001 6.21071 7.50001 5.89285C7.49958 5.46674 7.33012 5.05821 7.02882 4.7569C6.72751 4.45559 6.31898 4.28613 5.89287 4.28571Z" fill="#AFAFAF"></path>
                                                                            <path d="M5.89286 15L1.37358 9.67018C1.31078 9.59015 1.24864 9.50961 1.18715 9.42857C0.415174 8.41167 -0.00186492 7.16958 6.2694e-06 5.89286C6.2694e-06 4.32997 0.620859 2.8311 1.72598 1.72598C2.83111 0.620853 4.32998 0 5.89286 0C7.45575 0 8.95462 0.620853 10.0597 1.72598C11.1649 2.8311 11.7857 4.32997 11.7857 5.89286C11.7876 7.169 11.3707 8.41053 10.5991 9.42696L10.5986 9.42857C10.5986 9.42857 10.4379 9.63964 10.4138 9.66804L5.89286 15ZM2.04215 8.78304C2.04322 8.78304 2.16751 8.94804 2.1959 8.98339L5.89286 13.3436L9.59465 8.9775C9.61822 8.94804 9.74358 8.78196 9.74411 8.78143C10.3747 7.9506 10.7155 6.93591 10.7143 5.89286C10.7143 4.61413 10.2063 3.38779 9.30213 2.48359C8.39793 1.5794 7.17159 1.07143 5.89286 1.07143C4.61414 1.07143 3.38779 1.5794 2.4836 2.48359C1.57941 3.38779 1.07143 4.61413 1.07143 5.89286C1.07031 6.93656 1.41149 7.95183 2.04268 8.78304H2.04215Z" fill="#AFAFAF"></path>
                                                                            </svg>
                                                                        </span>
                                                                        New York
                                                                    </li>
                                                                </ul>
                                                            </span>
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="job-applied-date" data-label="Date Applied"><span>July 20,2022</span></td>
                                        <td class="job-status" data-label="Status"><span>Pending</span></td>
                                        <td class="job-action" data-label="Action">
                                            <div class="">
                                                <button class="remove-btn">
                                                    <svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M4.558 5.442L0 10L0.884 10.884L5.442 6.326L10 10.884L10.884 10L6.326 5.442L10.884 0.884L10 0L5.442 4.558L0.884 0L0 0.884L4.558 5.442Z" fill="black"/>
                                                    </svg>                                                        
                                                </button>
                                                <a href="job-detail.html" class="view-btn">
                                                    <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M14.0065 7.30436C12.6023 4.70853 10.1398 3.1377 7.41484 3.1377C4.68984 3.1377 2.22318 4.70853 0.83151 7.30436L0.714844 7.5002L0.823177 7.70019C2.22734 10.296 4.68984 11.8669 7.41484 11.8669C10.1398 11.8669 12.6065 10.3169 14.0065 7.70019L14.1148 7.5002L14.0065 7.30436ZM7.41484 11.0127C5.06901 11.0127 2.91484 9.70436 1.66484 7.5002C2.91484 5.29603 5.06901 3.9877 7.41484 3.9877C9.76068 3.9877 11.8898 5.30019 13.1607 7.5002C11.8898 9.70436 9.75651 11.0127 7.41484 11.0127Z" fill="black"/>
                                                        <path d="M7.53997 10.371C9.11859 10.371 10.3983 9.09124 10.3983 7.51263C10.3983 5.93402 9.11859 4.6543 7.53997 4.6543C5.96136 4.6543 4.68164 5.93402 4.68164 7.51263C4.68164 9.09124 5.96136 10.371 7.53997 10.371Z" fill="black"/>
                                                    </svg>                                                        
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="ShortlistJobs" role="tabpanel" aria-labelledby="sixth-tab">
                        <h5 class="card-title">Jobs Shortlist</h5>
                        <form class="form-dash">
                            <div class="d-flex flex-lg-row flex-column justify-content-lg-between justify-content-sm-start align-items-lg-center align-items-sm-start mb-3">
                                <input type="text" class="pos-rel search-field-top dash-job-search" placeholder="">
                                <div class="form-group dash-filter-top d-flex align-items-center justify-content-md-between">
                                    <label for="">Sort by:</label>
                                    <select class="filter-dropdown" name="states[]">
                                        <option disabled selected>Newest</option>
                                        <option>New</option>
                                        <option>Old</option>
                                    </select>
                                </div>
                            </div>
                            @if ($getSaveJob)
                            <table class="table">
                                <thead>
                                    <th class="job-title">Job Title</th>
                                    <th class="posted-Date">Posted Date</th>
                                    <th class="job-action">Action</th>
                                </thead>
                                <tbody>
                                    @foreach ($getSaveJob as $saveJob)
                                        @foreach ($saveJob as $getJob )
                                            <tr>
                                                <td class="job-title" data-label="Job Title">
                                                    <div class="row">
                                                        <div class="job-box job-box-type1">
                                                            <span class="job-title-sec">
                                                                <strong class="title-icon blue-bg"><svg width="23" height="33" viewBox="0 0 23 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M10.045 26.19C10.7917 26.19 11.6317 26.3183 12.565 26.575C13.4983 26.8317 14.4433 27.1583 15.4 27.555C16.3567 27.975 16.9633 28.22 17.22 28.29C18.3167 28.64 20.0083 28.815 22.295 28.815C22.2017 29.7017 22.05 30.4717 21.84 31.125C21.6533 31.7783 21.3967 32.315 21.07 32.735C19.32 32.6417 17.7683 32.3383 16.415 31.825C16.0417 31.685 15.365 31.3933 14.385 30.95C13.405 30.53 12.5417 30.2033 11.795 29.97C11.0483 29.76 10.3367 29.655 9.66 29.655C9.00667 29.655 8.07333 29.795 6.86 30.075C5.67 30.3783 5.06333 30.53 5.04 30.53C4.2 29.8067 3.78 29.0017 3.78 28.115C5.20333 27.4617 6.41667 26.9717 7.42 26.645C8.44667 26.3417 9.32167 26.19 10.045 26.19ZM11.55 21.71C15.4233 21.71 17.36 18.735 17.36 12.785C17.36 6.835 15.4233 3.86 11.55 3.86C9.87 3.86 8.4 4.11667 7.14 4.63C6.06667 6.87 5.53 9.47167 5.53 12.435C5.53 15.375 5.97333 17.6617 6.86 19.295C7.74667 20.905 9.31 21.71 11.55 21.71ZM11.55 0.0799996C15.4467 0.0799996 18.1883 1.10667 19.775 3.16C21.3617 5.19 22.155 8.305 22.155 12.505C22.155 15.1417 21.8167 17.3933 21.14 19.26C20.4633 21.1267 19.32 22.62 17.71 23.74C16.1 24.86 14.0467 25.42 11.55 25.42C7.74667 25.42 4.98167 24.3583 3.255 22.235C1.55167 20.1117 0.7 17.02 0.7 12.96C0.7 4.37333 4.31667 0.0799996 11.55 0.0799996Z" fill="white"/>
                                                                    </svg>
                                                                </strong>
                                                                <span class="job-title">
                                                                    <h4>{{ $getJob->title }}</h4>
                                                                    <span class="job-info-sec">
                                                                        <ul class="job-info">
                                                                            <li class="job-name">
                                                                                <span><svg width="17" height="15" viewBox="0 0 17 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                    <path d="M1.15385 5.76928H15V4.61543C15 4.30941 14.8784 4.01593 14.662 3.79954C14.4457 3.58315 14.1522 3.46159 13.8462 3.46159H2.30769C2.00167 3.46159 1.70819 3.58315 1.4918 3.79954C1.27541 4.01593 1.15385 4.30941 1.15385 4.61543V5.76928ZM1.15385 6.92312V12.6924C1.15385 12.9984 1.27541 13.2919 1.4918 13.5082C1.70819 13.7246 2.00167 13.8462 2.30769 13.8462H13.8462C14.1522 13.8462 14.4457 13.7246 14.662 13.5082C14.8784 13.2919 15 12.9984 15 12.6924V6.92312H1.15385ZM2.30769 2.30774H13.8462C14.4582 2.30774 15.0452 2.55087 15.4779 2.98365C15.9107 3.41642 16.1538 4.00339 16.1538 4.61543V12.6924C16.1538 13.3044 15.9107 13.8914 15.4779 14.3241C15.0452 14.7569 14.4582 15 13.8462 15H2.30769C1.69565 15 1.10868 14.7569 0.675907 14.3241C0.243131 13.8914 0 13.3044 0 12.6924V4.61543C0 4.00339 0.243131 3.41642 0.675907 2.98365C1.10868 2.55087 1.69565 2.30774 2.30769 2.30774Z" fill="#A0A0A0"></path>
                                                                                    <path d="M5.76908 1.15385V2.30769H10.3845V1.15385H5.76908ZM5.76908 0H10.3845C10.6905 0 10.984 0.121566 11.2004 0.337954C11.4167 0.554342 11.5383 0.847827 11.5383 1.15385V2.30769C11.5383 2.61371 11.4167 2.9072 11.2004 3.12358C10.984 3.33997 10.6905 3.46154 10.3845 3.46154H5.76908C5.46306 3.46154 5.16958 3.33997 4.95319 3.12358C4.7368 2.9072 4.61523 2.61371 4.61523 2.30769V1.15385C4.61523 0.847827 4.7368 0.554342 4.95319 0.337954C5.16958 0.121566 5.46306 0 5.76908 0Z" fill="#A0A0A0"></path>
                                                                                    </svg>
                                                                                </span>
                                                                                {{ $getJob->skills }}
                                                                            </li>
                                                                            <li class="company-location">
                                                                                <span><svg width="12" height="15" viewBox="0 0 12 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                    <path d="M5.89287 8.57142C5.3631 8.57142 4.84522 8.41433 4.40473 8.12C3.96424 7.82568 3.62092 7.40734 3.41819 6.9179C3.21546 6.42845 3.16241 5.88988 3.26576 5.37029C3.36912 4.8507 3.62423 4.37342 3.99883 3.99882C4.37344 3.62421 4.85071 3.3691 5.3703 3.26575C5.8899 3.1624 6.42847 3.21544 6.91791 3.41817C7.40736 3.62091 7.82569 3.96423 8.12002 4.40472C8.41434 4.84521 8.57144 5.36308 8.57144 5.89285C8.57059 6.60299 8.28811 7.2838 7.78596 7.78595C7.28382 8.28809 6.60301 8.57057 5.89287 8.57142ZM5.89287 4.28571C5.575 4.28571 5.26428 4.37997 4.99999 4.55656C4.73569 4.73316 4.5297 4.98416 4.40806 5.27782C4.28642 5.57149 4.25459 5.89463 4.3166 6.20639C4.37862 6.51815 4.53168 6.80451 4.75645 7.02927C4.98121 7.25404 5.26757 7.4071 5.57933 7.46911C5.89108 7.53113 6.21423 7.4993 6.50789 7.37766C6.80156 7.25602 7.05256 7.05003 7.22916 6.78573C7.40575 6.52144 7.50001 6.21071 7.50001 5.89285C7.49958 5.46674 7.33012 5.05821 7.02882 4.7569C6.72751 4.45559 6.31898 4.28613 5.89287 4.28571Z" fill="#AFAFAF"></path>
                                                                                    <path d="M5.89286 15L1.37358 9.67018C1.31078 9.59015 1.24864 9.50961 1.18715 9.42857C0.415174 8.41167 -0.00186492 7.16958 6.2694e-06 5.89286C6.2694e-06 4.32997 0.620859 2.8311 1.72598 1.72598C2.83111 0.620853 4.32998 0 5.89286 0C7.45575 0 8.95462 0.620853 10.0597 1.72598C11.1649 2.8311 11.7857 4.32997 11.7857 5.89286C11.7876 7.169 11.3707 8.41053 10.5991 9.42696L10.5986 9.42857C10.5986 9.42857 10.4379 9.63964 10.4138 9.66804L5.89286 15ZM2.04215 8.78304C2.04322 8.78304 2.16751 8.94804 2.1959 8.98339L5.89286 13.3436L9.59465 8.9775C9.61822 8.94804 9.74358 8.78196 9.74411 8.78143C10.3747 7.9506 10.7155 6.93591 10.7143 5.89286C10.7143 4.61413 10.2063 3.38779 9.30213 2.48359C8.39793 1.5794 7.17159 1.07143 5.89286 1.07143C4.61414 1.07143 3.38779 1.5794 2.4836 2.48359C1.57941 3.38779 1.07143 4.61413 1.07143 5.89286C1.07031 6.93656 1.41149 7.95183 2.04268 8.78304H2.04215Z" fill="#AFAFAF"></path>
                                                                                    </svg>
                                                                                </span>
                                                                                {{ $getJob->country }}
                                                                            </li>
                                                                        </ul>
                                                                    </span>
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="posted-Date" data-label="Posted Date"><span>{{ $getJob->created_at }}</span></td>
                                                <td class="job-action" data-label="Action">
                                                    <div class="">
                                                        <a id="removeSaveJob" href="{{ url('user/delete-saveJob',base64_encode($getJob->id)) }}" class="remove-btn">
                                                            <svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M4.558 5.442L0 10L0.884 10.884L5.442 6.326L10 10.884L10.884 10L6.326 5.442L10.884 0.884L10 0L5.442 4.558L0.884 0L0 0.884L4.558 5.442Z" fill="black"/>
                                                            </svg>                                                        
                                                        </a>
                                                        <a id="ViewJob" href="{{ url('user/job-detail',base64_encode($getJob->id)) }}" class="view-btn">
                                                            <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M14.0065 7.30436C12.6023 4.70853 10.1398 3.1377 7.41484 3.1377C4.68984 3.1377 2.22318 4.70853 0.83151 7.30436L0.714844 7.5002L0.823177 7.70019C2.22734 10.296 4.68984 11.8669 7.41484 11.8669C10.1398 11.8669 12.6065 10.3169 14.0065 7.70019L14.1148 7.5002L14.0065 7.30436ZM7.41484 11.0127C5.06901 11.0127 2.91484 9.70436 1.66484 7.5002C2.91484 5.29603 5.06901 3.9877 7.41484 3.9877C9.76068 3.9877 11.8898 5.30019 13.1607 7.5002C11.8898 9.70436 9.75651 11.0127 7.41484 11.0127Z" fill="black"/>
                                                                <path d="M7.53997 10.371C9.11859 10.371 10.3983 9.09124 10.3983 7.51263C10.3983 5.93402 9.11859 4.6543 7.53997 4.6543C5.96136 4.6543 4.68164 5.93402 4.68164 7.51263C4.68164 9.09124 5.96136 10.371 7.53997 10.371Z" fill="black"/>
                                                            </svg>                                                        
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                    {{-- <tr>
                                        <td class="job-title" data-label="Job Title">
                                            <div class="row">
                                                <div class="job-box job-box-type1">
                                                    <span class="job-title-sec">
                                                        <strong class="title-icon blue-bg"><svg width="23" height="33" viewBox="0 0 23 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M10.045 26.19C10.7917 26.19 11.6317 26.3183 12.565 26.575C13.4983 26.8317 14.4433 27.1583 15.4 27.555C16.3567 27.975 16.9633 28.22 17.22 28.29C18.3167 28.64 20.0083 28.815 22.295 28.815C22.2017 29.7017 22.05 30.4717 21.84 31.125C21.6533 31.7783 21.3967 32.315 21.07 32.735C19.32 32.6417 17.7683 32.3383 16.415 31.825C16.0417 31.685 15.365 31.3933 14.385 30.95C13.405 30.53 12.5417 30.2033 11.795 29.97C11.0483 29.76 10.3367 29.655 9.66 29.655C9.00667 29.655 8.07333 29.795 6.86 30.075C5.67 30.3783 5.06333 30.53 5.04 30.53C4.2 29.8067 3.78 29.0017 3.78 28.115C5.20333 27.4617 6.41667 26.9717 7.42 26.645C8.44667 26.3417 9.32167 26.19 10.045 26.19ZM11.55 21.71C15.4233 21.71 17.36 18.735 17.36 12.785C17.36 6.835 15.4233 3.86 11.55 3.86C9.87 3.86 8.4 4.11667 7.14 4.63C6.06667 6.87 5.53 9.47167 5.53 12.435C5.53 15.375 5.97333 17.6617 6.86 19.295C7.74667 20.905 9.31 21.71 11.55 21.71ZM11.55 0.0799996C15.4467 0.0799996 18.1883 1.10667 19.775 3.16C21.3617 5.19 22.155 8.305 22.155 12.505C22.155 15.1417 21.8167 17.3933 21.14 19.26C20.4633 21.1267 19.32 22.62 17.71 23.74C16.1 24.86 14.0467 25.42 11.55 25.42C7.74667 25.42 4.98167 24.3583 3.255 22.235C1.55167 20.1117 0.7 17.02 0.7 12.96C0.7 4.37333 4.31667 0.0799996 11.55 0.0799996Z" fill="white"/>
                                                            </svg>
                                                        </strong>
                                                        <span class="job-title">
                                                            <h4>Junior Graphic Designer (Web)</h4>
                                                            <span class="job-info-sec">
                                                                <ul class="job-info">
                                                                    <li class="job-name">
                                                                        <span><svg width="17" height="15" viewBox="0 0 17 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M1.15385 5.76928H15V4.61543C15 4.30941 14.8784 4.01593 14.662 3.79954C14.4457 3.58315 14.1522 3.46159 13.8462 3.46159H2.30769C2.00167 3.46159 1.70819 3.58315 1.4918 3.79954C1.27541 4.01593 1.15385 4.30941 1.15385 4.61543V5.76928ZM1.15385 6.92312V12.6924C1.15385 12.9984 1.27541 13.2919 1.4918 13.5082C1.70819 13.7246 2.00167 13.8462 2.30769 13.8462H13.8462C14.1522 13.8462 14.4457 13.7246 14.662 13.5082C14.8784 13.2919 15 12.9984 15 12.6924V6.92312H1.15385ZM2.30769 2.30774H13.8462C14.4582 2.30774 15.0452 2.55087 15.4779 2.98365C15.9107 3.41642 16.1538 4.00339 16.1538 4.61543V12.6924C16.1538 13.3044 15.9107 13.8914 15.4779 14.3241C15.0452 14.7569 14.4582 15 13.8462 15H2.30769C1.69565 15 1.10868 14.7569 0.675907 14.3241C0.243131 13.8914 0 13.3044 0 12.6924V4.61543C0 4.00339 0.243131 3.41642 0.675907 2.98365C1.10868 2.55087 1.69565 2.30774 2.30769 2.30774Z" fill="#A0A0A0"></path>
                                                                            <path d="M5.76908 1.15385V2.30769H10.3845V1.15385H5.76908ZM5.76908 0H10.3845C10.6905 0 10.984 0.121566 11.2004 0.337954C11.4167 0.554342 11.5383 0.847827 11.5383 1.15385V2.30769C11.5383 2.61371 11.4167 2.9072 11.2004 3.12358C10.984 3.33997 10.6905 3.46154 10.3845 3.46154H5.76908C5.46306 3.46154 5.16958 3.33997 4.95319 3.12358C4.7368 2.9072 4.61523 2.61371 4.61523 2.30769V1.15385C4.61523 0.847827 4.7368 0.554342 4.95319 0.337954C5.16958 0.121566 5.46306 0 5.76908 0Z" fill="#A0A0A0"></path>
                                                                            </svg>
                                                                        </span>
                                                                        Design, Development
                                                                    </li>
                                                                    <li class="company-location">
                                                                        <span><svg width="12" height="15" viewBox="0 0 12 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M5.89287 8.57142C5.3631 8.57142 4.84522 8.41433 4.40473 8.12C3.96424 7.82568 3.62092 7.40734 3.41819 6.9179C3.21546 6.42845 3.16241 5.88988 3.26576 5.37029C3.36912 4.8507 3.62423 4.37342 3.99883 3.99882C4.37344 3.62421 4.85071 3.3691 5.3703 3.26575C5.8899 3.1624 6.42847 3.21544 6.91791 3.41817C7.40736 3.62091 7.82569 3.96423 8.12002 4.40472C8.41434 4.84521 8.57144 5.36308 8.57144 5.89285C8.57059 6.60299 8.28811 7.2838 7.78596 7.78595C7.28382 8.28809 6.60301 8.57057 5.89287 8.57142ZM5.89287 4.28571C5.575 4.28571 5.26428 4.37997 4.99999 4.55656C4.73569 4.73316 4.5297 4.98416 4.40806 5.27782C4.28642 5.57149 4.25459 5.89463 4.3166 6.20639C4.37862 6.51815 4.53168 6.80451 4.75645 7.02927C4.98121 7.25404 5.26757 7.4071 5.57933 7.46911C5.89108 7.53113 6.21423 7.4993 6.50789 7.37766C6.80156 7.25602 7.05256 7.05003 7.22916 6.78573C7.40575 6.52144 7.50001 6.21071 7.50001 5.89285C7.49958 5.46674 7.33012 5.05821 7.02882 4.7569C6.72751 4.45559 6.31898 4.28613 5.89287 4.28571Z" fill="#AFAFAF"></path>
                                                                            <path d="M5.89286 15L1.37358 9.67018C1.31078 9.59015 1.24864 9.50961 1.18715 9.42857C0.415174 8.41167 -0.00186492 7.16958 6.2694e-06 5.89286C6.2694e-06 4.32997 0.620859 2.8311 1.72598 1.72598C2.83111 0.620853 4.32998 0 5.89286 0C7.45575 0 8.95462 0.620853 10.0597 1.72598C11.1649 2.8311 11.7857 4.32997 11.7857 5.89286C11.7876 7.169 11.3707 8.41053 10.5991 9.42696L10.5986 9.42857C10.5986 9.42857 10.4379 9.63964 10.4138 9.66804L5.89286 15ZM2.04215 8.78304C2.04322 8.78304 2.16751 8.94804 2.1959 8.98339L5.89286 13.3436L9.59465 8.9775C9.61822 8.94804 9.74358 8.78196 9.74411 8.78143C10.3747 7.9506 10.7155 6.93591 10.7143 5.89286C10.7143 4.61413 10.2063 3.38779 9.30213 2.48359C8.39793 1.5794 7.17159 1.07143 5.89286 1.07143C4.61414 1.07143 3.38779 1.5794 2.4836 2.48359C1.57941 3.38779 1.07143 4.61413 1.07143 5.89286C1.07031 6.93656 1.41149 7.95183 2.04268 8.78304H2.04215Z" fill="#AFAFAF"></path>
                                                                            </svg>
                                                                        </span>
                                                                        New York
                                                                    </li>
                                                                </ul>
                                                            </span>
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="posted-Date" data-label="Posted Date"><span>July 20,2022</span></td>
                                        <td class="job-action" data-label="Action">
                                            <div class="">
                                                <button class="remove-btn">
                                                    <svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M4.558 5.442L0 10L0.884 10.884L5.442 6.326L10 10.884L10.884 10L6.326 5.442L10.884 0.884L10 0L5.442 4.558L0.884 0L0 0.884L4.558 5.442Z" fill="black"/>
                                                    </svg>                                                        
                                                </button>
                                                <a href="job-detail.html" class="view-btn">
                                                    <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M14.0065 7.30436C12.6023 4.70853 10.1398 3.1377 7.41484 3.1377C4.68984 3.1377 2.22318 4.70853 0.83151 7.30436L0.714844 7.5002L0.823177 7.70019C2.22734 10.296 4.68984 11.8669 7.41484 11.8669C10.1398 11.8669 12.6065 10.3169 14.0065 7.70019L14.1148 7.5002L14.0065 7.30436ZM7.41484 11.0127C5.06901 11.0127 2.91484 9.70436 1.66484 7.5002C2.91484 5.29603 5.06901 3.9877 7.41484 3.9877C9.76068 3.9877 11.8898 5.30019 13.1607 7.5002C11.8898 9.70436 9.75651 11.0127 7.41484 11.0127Z" fill="black"/>
                                                        <path d="M7.53997 10.371C9.11859 10.371 10.3983 9.09124 10.3983 7.51263C10.3983 5.93402 9.11859 4.6543 7.53997 4.6543C5.96136 4.6543 4.68164 5.93402 4.68164 7.51263C4.68164 9.09124 5.96136 10.371 7.53997 10.371Z" fill="black"/>
                                                    </svg>                                                        
                                                </a>
                                            </div>
                                        </td>
                                    </tr> --}}
                                </tbody>
                            </table>
                            @else
                                <tr> There are no saved job available </tr>
                            @endif
                        </form>
                    </div>
                    <div class="tab-pane fade" id="SavedJobs" role="tabpanel" aria-labelledby="seventh-tab">
                        <h5 class="card-title">Saved Jobs</h5>
                        <form class="form-dash">
                            <div class="d-flex flex-lg-row flex-column justify-content-lg-between justify-content-sm-start align-items-lg-center align-items-sm-start mb-3">
                                <input type="text" class="pos-rel search-field-top dash-job-search" placeholder="">
                                <div class="form-group dash-filter-top d-flex align-items-center justify-content-md-between">
                                    <label for="">Sort by:</label>
                                    <select class="filter-dropdown" name="states[]">
                                        <option disabled selected>Newest</option>
                                        <option>New</option>
                                        <option>Old</option>
                                    </select>
                                </div>
                            </div>
                            
                            <table class="table">
                                <thead>
                                    <th class="job-title">Job Title</th>
                                    <th class="posted-Date">Posted Date</th>
                                    <th class="job-action">Action</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="job-title" data-label="Job Title">
                                            <div class="row">
                                                <div class="job-box job-box-type1">
                                                    <span class="job-title-sec">
                                                        <strong class="title-icon blue-bg"><svg width="23" height="33" viewBox="0 0 23 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M10.045 26.19C10.7917 26.19 11.6317 26.3183 12.565 26.575C13.4983 26.8317 14.4433 27.1583 15.4 27.555C16.3567 27.975 16.9633 28.22 17.22 28.29C18.3167 28.64 20.0083 28.815 22.295 28.815C22.2017 29.7017 22.05 30.4717 21.84 31.125C21.6533 31.7783 21.3967 32.315 21.07 32.735C19.32 32.6417 17.7683 32.3383 16.415 31.825C16.0417 31.685 15.365 31.3933 14.385 30.95C13.405 30.53 12.5417 30.2033 11.795 29.97C11.0483 29.76 10.3367 29.655 9.66 29.655C9.00667 29.655 8.07333 29.795 6.86 30.075C5.67 30.3783 5.06333 30.53 5.04 30.53C4.2 29.8067 3.78 29.0017 3.78 28.115C5.20333 27.4617 6.41667 26.9717 7.42 26.645C8.44667 26.3417 9.32167 26.19 10.045 26.19ZM11.55 21.71C15.4233 21.71 17.36 18.735 17.36 12.785C17.36 6.835 15.4233 3.86 11.55 3.86C9.87 3.86 8.4 4.11667 7.14 4.63C6.06667 6.87 5.53 9.47167 5.53 12.435C5.53 15.375 5.97333 17.6617 6.86 19.295C7.74667 20.905 9.31 21.71 11.55 21.71ZM11.55 0.0799996C15.4467 0.0799996 18.1883 1.10667 19.775 3.16C21.3617 5.19 22.155 8.305 22.155 12.505C22.155 15.1417 21.8167 17.3933 21.14 19.26C20.4633 21.1267 19.32 22.62 17.71 23.74C16.1 24.86 14.0467 25.42 11.55 25.42C7.74667 25.42 4.98167 24.3583 3.255 22.235C1.55167 20.1117 0.7 17.02 0.7 12.96C0.7 4.37333 4.31667 0.0799996 11.55 0.0799996Z" fill="white"/>
                                                            </svg>
                                                        </strong>
                                                        <span class="job-title">
                                                            <h4>Junior Graphic Designer (Web)</h4>
                                                            <span class="job-info-sec">
                                                                <ul class="job-info">
                                                                    <li class="job-name">
                                                                        <span><svg width="17" height="15" viewBox="0 0 17 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M1.15385 5.76928H15V4.61543C15 4.30941 14.8784 4.01593 14.662 3.79954C14.4457 3.58315 14.1522 3.46159 13.8462 3.46159H2.30769C2.00167 3.46159 1.70819 3.58315 1.4918 3.79954C1.27541 4.01593 1.15385 4.30941 1.15385 4.61543V5.76928ZM1.15385 6.92312V12.6924C1.15385 12.9984 1.27541 13.2919 1.4918 13.5082C1.70819 13.7246 2.00167 13.8462 2.30769 13.8462H13.8462C14.1522 13.8462 14.4457 13.7246 14.662 13.5082C14.8784 13.2919 15 12.9984 15 12.6924V6.92312H1.15385ZM2.30769 2.30774H13.8462C14.4582 2.30774 15.0452 2.55087 15.4779 2.98365C15.9107 3.41642 16.1538 4.00339 16.1538 4.61543V12.6924C16.1538 13.3044 15.9107 13.8914 15.4779 14.3241C15.0452 14.7569 14.4582 15 13.8462 15H2.30769C1.69565 15 1.10868 14.7569 0.675907 14.3241C0.243131 13.8914 0 13.3044 0 12.6924V4.61543C0 4.00339 0.243131 3.41642 0.675907 2.98365C1.10868 2.55087 1.69565 2.30774 2.30769 2.30774Z" fill="#A0A0A0"></path>
                                                                            <path d="M5.76908 1.15385V2.30769H10.3845V1.15385H5.76908ZM5.76908 0H10.3845C10.6905 0 10.984 0.121566 11.2004 0.337954C11.4167 0.554342 11.5383 0.847827 11.5383 1.15385V2.30769C11.5383 2.61371 11.4167 2.9072 11.2004 3.12358C10.984 3.33997 10.6905 3.46154 10.3845 3.46154H5.76908C5.46306 3.46154 5.16958 3.33997 4.95319 3.12358C4.7368 2.9072 4.61523 2.61371 4.61523 2.30769V1.15385C4.61523 0.847827 4.7368 0.554342 4.95319 0.337954C5.16958 0.121566 5.46306 0 5.76908 0Z" fill="#A0A0A0"></path>
                                                                            </svg>
                                                                        </span>
                                                                        Design, Development
                                                                    </li>
                                                                    <li class="company-location">
                                                                        <span><svg width="12" height="15" viewBox="0 0 12 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M5.89287 8.57142C5.3631 8.57142 4.84522 8.41433 4.40473 8.12C3.96424 7.82568 3.62092 7.40734 3.41819 6.9179C3.21546 6.42845 3.16241 5.88988 3.26576 5.37029C3.36912 4.8507 3.62423 4.37342 3.99883 3.99882C4.37344 3.62421 4.85071 3.3691 5.3703 3.26575C5.8899 3.1624 6.42847 3.21544 6.91791 3.41817C7.40736 3.62091 7.82569 3.96423 8.12002 4.40472C8.41434 4.84521 8.57144 5.36308 8.57144 5.89285C8.57059 6.60299 8.28811 7.2838 7.78596 7.78595C7.28382 8.28809 6.60301 8.57057 5.89287 8.57142ZM5.89287 4.28571C5.575 4.28571 5.26428 4.37997 4.99999 4.55656C4.73569 4.73316 4.5297 4.98416 4.40806 5.27782C4.28642 5.57149 4.25459 5.89463 4.3166 6.20639C4.37862 6.51815 4.53168 6.80451 4.75645 7.02927C4.98121 7.25404 5.26757 7.4071 5.57933 7.46911C5.89108 7.53113 6.21423 7.4993 6.50789 7.37766C6.80156 7.25602 7.05256 7.05003 7.22916 6.78573C7.40575 6.52144 7.50001 6.21071 7.50001 5.89285C7.49958 5.46674 7.33012 5.05821 7.02882 4.7569C6.72751 4.45559 6.31898 4.28613 5.89287 4.28571Z" fill="#AFAFAF"></path>
                                                                            <path d="M5.89286 15L1.37358 9.67018C1.31078 9.59015 1.24864 9.50961 1.18715 9.42857C0.415174 8.41167 -0.00186492 7.16958 6.2694e-06 5.89286C6.2694e-06 4.32997 0.620859 2.8311 1.72598 1.72598C2.83111 0.620853 4.32998 0 5.89286 0C7.45575 0 8.95462 0.620853 10.0597 1.72598C11.1649 2.8311 11.7857 4.32997 11.7857 5.89286C11.7876 7.169 11.3707 8.41053 10.5991 9.42696L10.5986 9.42857C10.5986 9.42857 10.4379 9.63964 10.4138 9.66804L5.89286 15ZM2.04215 8.78304C2.04322 8.78304 2.16751 8.94804 2.1959 8.98339L5.89286 13.3436L9.59465 8.9775C9.61822 8.94804 9.74358 8.78196 9.74411 8.78143C10.3747 7.9506 10.7155 6.93591 10.7143 5.89286C10.7143 4.61413 10.2063 3.38779 9.30213 2.48359C8.39793 1.5794 7.17159 1.07143 5.89286 1.07143C4.61414 1.07143 3.38779 1.5794 2.4836 2.48359C1.57941 3.38779 1.07143 4.61413 1.07143 5.89286C1.07031 6.93656 1.41149 7.95183 2.04268 8.78304H2.04215Z" fill="#AFAFAF"></path>
                                                                            </svg>
                                                                        </span>
                                                                        New York
                                                                    </li>
                                                                </ul>
                                                            </span>
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="posted-Date" data-label="Posted Date">
                                            <span>Posted 5 days ago</span>
                                            <span class="star-icon">
                                                <svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M15.2 5.28193L10.4911 4.59758L8.38613 0.330127C8.32864 0.213287 8.23405 0.118702 8.11721 0.0612089C7.82419 -0.0834504 7.4681 0.037099 7.32159 0.330127L5.21661 4.59758L0.507762 5.28193C0.37794 5.30047 0.259245 5.36167 0.168369 5.45441C0.0585056 5.56733 -0.00203433 5.71924 5.21996e-05 5.87678C0.00213873 6.03431 0.066681 6.18457 0.179497 6.29454L3.58641 9.61614L2.78151 14.3064C2.76263 14.4156 2.77471 14.5278 2.81636 14.6304C2.85802 14.733 2.92758 14.8218 3.01717 14.8869C3.10676 14.952 3.21279 14.9906 3.32324 14.9985C3.43369 15.0064 3.54413 14.9831 3.64205 14.9314L7.85386 12.717L12.0657 14.9314C12.1807 14.9926 12.3142 15.013 12.4422 14.9908C12.7649 14.9352 12.9818 14.6291 12.9262 14.3064L12.1213 9.61614L15.5282 6.29454C15.621 6.20367 15.6822 6.08497 15.7007 5.95515C15.7508 5.63059 15.5245 5.33015 15.2 5.28193Z" fill="#3E9FFF"/>
                                                </svg>                                                    
                                            </span>
                                        </td>
                                        <td class="job-action" data-label="Action">
                                            <div class="">
                                                <button class="remove-btn">
                                                    <svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M4.558 5.442L0 10L0.884 10.884L5.442 6.326L10 10.884L10.884 10L6.326 5.442L10.884 0.884L10 0L5.442 4.558L0.884 0L0 0.884L4.558 5.442Z" fill="black"/>
                                                    </svg>                                                        
                                                </button>
                                                <a href="job-detail.html" class="view-btn">
                                                    <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M14.0065 7.30436C12.6023 4.70853 10.1398 3.1377 7.41484 3.1377C4.68984 3.1377 2.22318 4.70853 0.83151 7.30436L0.714844 7.5002L0.823177 7.70019C2.22734 10.296 4.68984 11.8669 7.41484 11.8669C10.1398 11.8669 12.6065 10.3169 14.0065 7.70019L14.1148 7.5002L14.0065 7.30436ZM7.41484 11.0127C5.06901 11.0127 2.91484 9.70436 1.66484 7.5002C2.91484 5.29603 5.06901 3.9877 7.41484 3.9877C9.76068 3.9877 11.8898 5.30019 13.1607 7.5002C11.8898 9.70436 9.75651 11.0127 7.41484 11.0127Z" fill="black"/>
                                                        <path d="M7.53997 10.371C9.11859 10.371 10.3983 9.09124 10.3983 7.51263C10.3983 5.93402 9.11859 4.6543 7.53997 4.6543C5.96136 4.6543 4.68164 5.93402 4.68164 7.51263C4.68164 9.09124 5.96136 10.371 7.53997 10.371Z" fill="black"/>
                                                    </svg>                                                        
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="job-title" data-label="Job Title">
                                            <div class="row">
                                                <div class="job-box job-box-type1">
                                                    <span class="job-title-sec">
                                                        <strong class="title-icon blue-bg"><svg width="23" height="33" viewBox="0 0 23 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M10.045 26.19C10.7917 26.19 11.6317 26.3183 12.565 26.575C13.4983 26.8317 14.4433 27.1583 15.4 27.555C16.3567 27.975 16.9633 28.22 17.22 28.29C18.3167 28.64 20.0083 28.815 22.295 28.815C22.2017 29.7017 22.05 30.4717 21.84 31.125C21.6533 31.7783 21.3967 32.315 21.07 32.735C19.32 32.6417 17.7683 32.3383 16.415 31.825C16.0417 31.685 15.365 31.3933 14.385 30.95C13.405 30.53 12.5417 30.2033 11.795 29.97C11.0483 29.76 10.3367 29.655 9.66 29.655C9.00667 29.655 8.07333 29.795 6.86 30.075C5.67 30.3783 5.06333 30.53 5.04 30.53C4.2 29.8067 3.78 29.0017 3.78 28.115C5.20333 27.4617 6.41667 26.9717 7.42 26.645C8.44667 26.3417 9.32167 26.19 10.045 26.19ZM11.55 21.71C15.4233 21.71 17.36 18.735 17.36 12.785C17.36 6.835 15.4233 3.86 11.55 3.86C9.87 3.86 8.4 4.11667 7.14 4.63C6.06667 6.87 5.53 9.47167 5.53 12.435C5.53 15.375 5.97333 17.6617 6.86 19.295C7.74667 20.905 9.31 21.71 11.55 21.71ZM11.55 0.0799996C15.4467 0.0799996 18.1883 1.10667 19.775 3.16C21.3617 5.19 22.155 8.305 22.155 12.505C22.155 15.1417 21.8167 17.3933 21.14 19.26C20.4633 21.1267 19.32 22.62 17.71 23.74C16.1 24.86 14.0467 25.42 11.55 25.42C7.74667 25.42 4.98167 24.3583 3.255 22.235C1.55167 20.1117 0.7 17.02 0.7 12.96C0.7 4.37333 4.31667 0.0799996 11.55 0.0799996Z" fill="white"/>
                                                            </svg>
                                                        </strong>
                                                        <span class="job-title">
                                                            <h4>Junior Graphic Designer (Web)</h4>
                                                            <span class="job-info-sec">
                                                                <ul class="job-info">
                                                                    <li class="job-name">
                                                                        <span><svg width="17" height="15" viewBox="0 0 17 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M1.15385 5.76928H15V4.61543C15 4.30941 14.8784 4.01593 14.662 3.79954C14.4457 3.58315 14.1522 3.46159 13.8462 3.46159H2.30769C2.00167 3.46159 1.70819 3.58315 1.4918 3.79954C1.27541 4.01593 1.15385 4.30941 1.15385 4.61543V5.76928ZM1.15385 6.92312V12.6924C1.15385 12.9984 1.27541 13.2919 1.4918 13.5082C1.70819 13.7246 2.00167 13.8462 2.30769 13.8462H13.8462C14.1522 13.8462 14.4457 13.7246 14.662 13.5082C14.8784 13.2919 15 12.9984 15 12.6924V6.92312H1.15385ZM2.30769 2.30774H13.8462C14.4582 2.30774 15.0452 2.55087 15.4779 2.98365C15.9107 3.41642 16.1538 4.00339 16.1538 4.61543V12.6924C16.1538 13.3044 15.9107 13.8914 15.4779 14.3241C15.0452 14.7569 14.4582 15 13.8462 15H2.30769C1.69565 15 1.10868 14.7569 0.675907 14.3241C0.243131 13.8914 0 13.3044 0 12.6924V4.61543C0 4.00339 0.243131 3.41642 0.675907 2.98365C1.10868 2.55087 1.69565 2.30774 2.30769 2.30774Z" fill="#A0A0A0"></path>
                                                                            <path d="M5.76908 1.15385V2.30769H10.3845V1.15385H5.76908ZM5.76908 0H10.3845C10.6905 0 10.984 0.121566 11.2004 0.337954C11.4167 0.554342 11.5383 0.847827 11.5383 1.15385V2.30769C11.5383 2.61371 11.4167 2.9072 11.2004 3.12358C10.984 3.33997 10.6905 3.46154 10.3845 3.46154H5.76908C5.46306 3.46154 5.16958 3.33997 4.95319 3.12358C4.7368 2.9072 4.61523 2.61371 4.61523 2.30769V1.15385C4.61523 0.847827 4.7368 0.554342 4.95319 0.337954C5.16958 0.121566 5.46306 0 5.76908 0Z" fill="#A0A0A0"></path>
                                                                            </svg>
                                                                        </span>
                                                                        Design, Development
                                                                    </li>
                                                                    <li class="company-location">
                                                                        <span><svg width="12" height="15" viewBox="0 0 12 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M5.89287 8.57142C5.3631 8.57142 4.84522 8.41433 4.40473 8.12C3.96424 7.82568 3.62092 7.40734 3.41819 6.9179C3.21546 6.42845 3.16241 5.88988 3.26576 5.37029C3.36912 4.8507 3.62423 4.37342 3.99883 3.99882C4.37344 3.62421 4.85071 3.3691 5.3703 3.26575C5.8899 3.1624 6.42847 3.21544 6.91791 3.41817C7.40736 3.62091 7.82569 3.96423 8.12002 4.40472C8.41434 4.84521 8.57144 5.36308 8.57144 5.89285C8.57059 6.60299 8.28811 7.2838 7.78596 7.78595C7.28382 8.28809 6.60301 8.57057 5.89287 8.57142ZM5.89287 4.28571C5.575 4.28571 5.26428 4.37997 4.99999 4.55656C4.73569 4.73316 4.5297 4.98416 4.40806 5.27782C4.28642 5.57149 4.25459 5.89463 4.3166 6.20639C4.37862 6.51815 4.53168 6.80451 4.75645 7.02927C4.98121 7.25404 5.26757 7.4071 5.57933 7.46911C5.89108 7.53113 6.21423 7.4993 6.50789 7.37766C6.80156 7.25602 7.05256 7.05003 7.22916 6.78573C7.40575 6.52144 7.50001 6.21071 7.50001 5.89285C7.49958 5.46674 7.33012 5.05821 7.02882 4.7569C6.72751 4.45559 6.31898 4.28613 5.89287 4.28571Z" fill="#AFAFAF"></path>
                                                                            <path d="M5.89286 15L1.37358 9.67018C1.31078 9.59015 1.24864 9.50961 1.18715 9.42857C0.415174 8.41167 -0.00186492 7.16958 6.2694e-06 5.89286C6.2694e-06 4.32997 0.620859 2.8311 1.72598 1.72598C2.83111 0.620853 4.32998 0 5.89286 0C7.45575 0 8.95462 0.620853 10.0597 1.72598C11.1649 2.8311 11.7857 4.32997 11.7857 5.89286C11.7876 7.169 11.3707 8.41053 10.5991 9.42696L10.5986 9.42857C10.5986 9.42857 10.4379 9.63964 10.4138 9.66804L5.89286 15ZM2.04215 8.78304C2.04322 8.78304 2.16751 8.94804 2.1959 8.98339L5.89286 13.3436L9.59465 8.9775C9.61822 8.94804 9.74358 8.78196 9.74411 8.78143C10.3747 7.9506 10.7155 6.93591 10.7143 5.89286C10.7143 4.61413 10.2063 3.38779 9.30213 2.48359C8.39793 1.5794 7.17159 1.07143 5.89286 1.07143C4.61414 1.07143 3.38779 1.5794 2.4836 2.48359C1.57941 3.38779 1.07143 4.61413 1.07143 5.89286C1.07031 6.93656 1.41149 7.95183 2.04268 8.78304H2.04215Z" fill="#AFAFAF"></path>
                                                                            </svg>
                                                                        </span>
                                                                        New York
                                                                    </li>
                                                                </ul>
                                                            </span>
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="posted-Date" data-label="Posted Date">
                                            <span>Posted one Month ago</span>
                                            <span class="star-icon">
                                                <svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M15.2 5.28193L10.4911 4.59758L8.38613 0.330127C8.32864 0.213287 8.23405 0.118702 8.11721 0.0612089C7.82419 -0.0834504 7.4681 0.037099 7.32159 0.330127L5.21661 4.59758L0.507762 5.28193C0.37794 5.30047 0.259245 5.36167 0.168369 5.45441C0.0585056 5.56733 -0.00203433 5.71924 5.21996e-05 5.87678C0.00213873 6.03431 0.066681 6.18457 0.179497 6.29454L3.58641 9.61614L2.78151 14.3064C2.76263 14.4156 2.77471 14.5278 2.81636 14.6304C2.85802 14.733 2.92758 14.8218 3.01717 14.8869C3.10676 14.952 3.21279 14.9906 3.32324 14.9985C3.43369 15.0064 3.54413 14.9831 3.64205 14.9314L7.85386 12.717L12.0657 14.9314C12.1807 14.9926 12.3142 15.013 12.4422 14.9908C12.7649 14.9352 12.9818 14.6291 12.9262 14.3064L12.1213 9.61614L15.5282 6.29454C15.621 6.20367 15.6822 6.08497 15.7007 5.95515C15.7508 5.63059 15.5245 5.33015 15.2 5.28193Z" fill="#3E9FFF"/>
                                                </svg>                                                    
                                            </span>
                                        </td>
                                        <td class="job-action" data-label="Action">
                                            <div class="">
                                                <button class="remove-btn">
                                                    <svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M4.558 5.442L0 10L0.884 10.884L5.442 6.326L10 10.884L10.884 10L6.326 5.442L10.884 0.884L10 0L5.442 4.558L0.884 0L0 0.884L4.558 5.442Z" fill="black"/>
                                                    </svg>                                                        
                                                </button>
                                                <a href="job-detail.html" class="view-btn">
                                                    <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M14.0065 7.30436C12.6023 4.70853 10.1398 3.1377 7.41484 3.1377C4.68984 3.1377 2.22318 4.70853 0.83151 7.30436L0.714844 7.5002L0.823177 7.70019C2.22734 10.296 4.68984 11.8669 7.41484 11.8669C10.1398 11.8669 12.6065 10.3169 14.0065 7.70019L14.1148 7.5002L14.0065 7.30436ZM7.41484 11.0127C5.06901 11.0127 2.91484 9.70436 1.66484 7.5002C2.91484 5.29603 5.06901 3.9877 7.41484 3.9877C9.76068 3.9877 11.8898 5.30019 13.1607 7.5002C11.8898 9.70436 9.75651 11.0127 7.41484 11.0127Z" fill="black"/>
                                                        <path d="M7.53997 10.371C9.11859 10.371 10.3983 9.09124 10.3983 7.51263C10.3983 5.93402 9.11859 4.6543 7.53997 4.6543C5.96136 4.6543 4.68164 5.93402 4.68164 7.51263C4.68164 9.09124 5.96136 10.371 7.53997 10.371Z" fill="black"/>
                                                    </svg>                                                        
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="Reports" role="tabpanel" aria-labelledby="eighth-tab">
                        <div class="d-flex justify-content-between">
                            <h5 class="card-title">Reports</h5>
                            <ul class="print-btn-wrp d-flex align-items-center">
                                <li><button class="dwnld-btn">
                                    <svg width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10 12L14 7H11V0H9V7H6L10 12Z" fill="black"/>
                                        <path d="M18 14H2V7H0V14C0 15.103 0.897 16 2 16H18C19.103 16 20 15.103 20 14V7H18V14Z" fill="black"/>
                                        </svg>                                        
                                    </button>
                                </li>
                                <li><button class="print-btn">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M3.33333 0V4.66667H2C0.903333 4.66667 0 5.57 0 6.66667V13.3333H3.33333V16H12.6667V13.3333H16V6.66667C16 5.57 15.0967 4.66667 14 4.66667H12.6667V0H3.33333ZM4.66667 1.33333H11.3333V4.66667H4.66667V1.33333ZM2 6H14C14.3773 6 14.6667 6.28933 14.6667 6.66667V12H12.6667V9.33333H3.33333V12H1.33333V6.66667C1.33333 6.28933 1.62267 6 2 6ZM2.66667 6.66667C2.3 6.66667 2 6.96667 2 7.33333C2 7.7 2.3 8 2.66667 8C3.03333 8 3.33333 7.7 3.33333 7.33333C3.33333 6.96667 3.03333 6.66667 2.66667 6.66667ZM4.66667 10.6667H11.3333V14.6667H4.66667V10.6667Z" fill="white"/>
                                    </svg>                                        
                                    </button>
                                </li>
                            </ul>
                        </div>
                        
                        <form class="form-dash">
                            
                            <table class="table reports-table">
                                <thead>
                                    <th class="applied-date">Date Applied</th>
                                    <th class="job-title">Job Title</th>
                                    <th class="employer">Employer</th>
                                    <th class="shortlisted">Shortlisted</th>
                                    <th class="interview-attended">Interview Attended</th>
                                    <th class="aptitude">Aptitude</th>
                                </thead>
                                <tbody>
                                    @foreach ($appliedJob as $applyJob)
                                        
                                    
                                    <tr>
                                        <td class="applied-date" data-label="Date Applied">
                                            <span>{{ $applyJob->created_at }}</span>
                                        </td>
                                        <td class="job-title" data-label="Job Title">
                                            {{ $applyJob->job_title }} 
                                        </td>
                                        <td class="employer" data-label="Employer">
                                            {{ $applyJob->employer }}
                                        </td>
                                        <td class="shortlisted" data-label="Shortlisted">
                                            {{ $applyJob->shortlist }}
                                        </td>
                                        <td class="interview-attended" data-label="Interview Attended">
                                            {{ $applyJob->attend_interview }}
                                        </td>
                                        <td class="aptitude" data-label="Aptitude">
                                            <a href="{{ url('user/test', $applyJob->job_id) }}" class="btn btn-primary text-white">Join Exam</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    {{-- <tr>
                                        <td class="applied-date" data-label="Date Applied">
                                            <span>10-03-2022</span>
                                        </td>
                                        <td class="job-title" data-label="Job Title">
                                            Finance Manager &amp; Health 
                                        </td>
                                        <td class="employer" data-label="Employer">
                                            Naveen Jose
                                        </td>
                                        <td class="shortlisted" data-label="Shortlisted">
                                            Yes
                                        </td>
                                        <td class="interview-attended" data-label="Interview Attended">
                                            Yes
                                        </td>
                                        <td class="aptitude" data-label="Aptitude">
                                            Low
                                        </td>
                                    </tr> --}}
                                </tbody>
                            </table>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="Messages" role="tabpanel" aria-labelledby="ninth-tab">
                        <h5 class="card-title">Tab header</h5>
                        <p class="card-text">Proin ornare purus vitae magna viverra suscipit. Etiam rutrum lorem cursus libero scelerisque lacinia. Praesent bibendum risus id aliquam finibus. Donec sed orci sodales, viverra dolor a, dignissim mi. Pellentesque nec lectus enim. Suspendisse eu ligula ac tortor mollis lobortis. Nulla a laoreet neque, sit amet luctus dolor. Nam facilisis at odio ac commodo. Nullam vehicula blandit dui, vel suscipit orci.</p>
                    </div>
                </div>
                <!-- END TABS DIV -->
            </div>
        </div>
    </section>



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
                        <li class="link-item"><a href="privacy-policy.html">Privacy Policy</a></li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 copy-right">© 2022 jobtym.net. All Right Reserved.</div>
            </div>
        </div>
    </footer>
    <script src="{{ asset('user_assets/js/jquery-3.3.1.slim.min.js')}}"></script>
    <script src="{{ asset('user_assets/js/popper.min.js')}}"></script>
    <script src="{{ asset('user_assets/js/bootstrap.min.js')}}"></script> 
    <script src="{{ asset('user_assets/js/select2.min.js')}}"></script>
    {{-- <script src="{{ asset('user_assets/js/html2canvas.min.js')}}"></script> --}}
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
    <script src="{{ asset('user_assets/js/jspdf.min.js')}}"></script>
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".user-drop-btn").click(function() {
                $(this).parent(".user-menu-item").toggleClass("open-dropdown");
            });
            
            $(".nav-item.d-block .user-menu").click(function() {
                if($(window).width() < 767){
                    $(this).parents(".user-drop-menu").toggleClass("open-dropdown");
                };
            });
            $(".nav-item > .nav-link").click(function() {
                if($(window).width() < 767){
                    $(this).parents(".user-drop-menu").removeClass("open-dropdown");
                };
            });

            $('.category-dropdown').select2();
            $('.gender-dropdown').select2();
            $('.filter-dropdown').select2();
            $('.lng-slct-drpdwn').select2();

            $( '.nav-item' ).on( 'click', function() {
                $('.nav-link').removeClass( 'active' ).eq( $(this).index() ).removeClass( 'active' );
            });
            
            $(".create-resume-btn").click(function() {
                $(this).parents(".dashboard-main-tab-container").addClass("open-resume-maker");
            });
            $(".resume-builder .back-btn").click(function() {
                $(this).parents(".dashboard-main-tab-container").removeClass("open-resume-maker");
            });
            
            $(".cover-letter-btn").click(function() {
                $(this).parents(".dashboard-main-tab-container").addClass("open-coverletter-maker");
            });
            $(".coverletter-builder .back-btn").click(function() {
                $(this).parents(".dashboard-main-tab-container").removeClass("open-coverletter-maker");
            });

        });
        /*******************Resume Builder*******************/
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#blah').attr('src', e.target.result).width().height();
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        function emi() {
            var P = document.formval.pr_amt.value;
            var rate = document.formval.int_rate.value;
            var n = document.formval.period.value;
            var em = document.formval.email.value;
            var lid = document.formval.lnkdnid.value;
            var ph = document.formval.mobile.value;
            var sk = document.formval.skill.value;
            var l1 = document.formval.lang1.value;
            var l2 = document.formval.lang2.value;
            var l3 = document.formval.lang3.value;
            var w = document.formval.wd.value;
            var d = document.formval.due.value;
            var w1 = document.formval.explain.value;
            var qualification = document.formval.grad.value;
            var qualid = document.formval.graddur.value;
            var summary1 = document.formval.s1.value;
            var qualification2 = document.formval.grad2.value;
            var qualid2 = document.formval.graddur2.value;
            var summary2 = document.formval.s2.value;
            var qualification3 = document.formval.grad3.value;
            var qualid3 = document.formval.graddur3.value;
            var summary3 = document.formval.s3.value;
            /*operation*/
            document.getElementById("name").innerHTML = P;
            document.getElementById("position").innerHTML = rate;
            document.getElementById("place").innerHTML = n;
            document.getElementById("email").innerHTML = em;
            document.getElementById("lnkdn").innerHTML = lid;
            document.getElementById("mb").innerHTML = ph;
            document.getElementById("w3review").innerHTML = sk;
            document.getElementById("one").value = l1;
            document.getElementById("two").value = l2;
            document.getElementById("three").value = l3;
            document.getElementById("WE").innerHTML = w;
            document.getElementById("duration").innerHTML = d;
            document.getElementById("Summary").innerHTML = w1;
            // course1
            document.getElementById("cr1").innerHTML = qualification;
            document.getElementById("cd1").innerHTML = qualid;
            //document.getElementById("sum1").innerHTML = summary1;
            // course2
            document.getElementById("cr2").innerHTML = qualification2;
            document.getElementById("cd2").innerHTML = qualid2;
            // document.getElementById("sum2").innerHTML = summary2;
            // // course2
            document.getElementById("cr3").innerHTML = qualification3;
            document.getElementById("cd3").innerHTML = qualid3;
            // document.getElementById("sum3").innerHTML = summary3;
            if (P == "" && rate == "" && n == "") {
                document.getElementById("demo").innerHTML = "Must fill valid data";
            } else {
                document.getElementById("demo").innerHTML = "";
                document.getElementById("bexresult").style.display = "block";
                document.getElementById("box").style.display = "none";
            }
        }

        function emires() {
            document.getElementById("bexresult").style.display = "none";
            document.formval.pr_amt.value = "";
            document.formval.int_rate.value = "";
            document.formval.period.value = "";
            document.formval.field1.value = "";
            document.formval.field2.value = "";
            document.formval.field3.value = "";
            document.formval.field4.value = "";
            document.getElementById("demo").innerHTML = "";
        }
        
        $('#cmd').click(function(){
            var doc = new jsPDF("p", "mm", "a4");
            html2canvas(document.querySelector('#target')).then(function(canvas){
                var imgData = canvas.toDataURL('image/png');
                var pageHeight = 297;  
                var imgWidth =  210 ; 
                var imgHeight = canvas.height * imgWidth / canvas.width;
                var heightLeft = imgHeight;
                var position = 0;

                doc.addImage(imgData, 'PNG', 0, position, imgWidth, imgHeight);
                heightLeft -= pageHeight;

                while (heightLeft >= 0) {
                    position = heightLeft - imgHeight;
                    doc.addPage();
                    doc.addImage(imgData, 'PNG', 0, position, imgWidth, imgHeight);
                    heightLeft -= pageHeight; 
                }
                // doc.output('dataurlnewwindow');
                doc.save('new-resume.pdf');
            });
        });

        $('#propic-resume').change(function(){
            var curElement = $('#box .image');
            console.log(curElement);
            var reader = new FileReader();

            reader.onload = function (e) {
                // get loaded data and render thumbnail.
                curElement.attr('src', e.target.result);
            };

            // read the image file as a data URL.
            reader.readAsDataURL(this.files[0]);
        });
        /*********************************************************/
        /*******************Coverletter Builder*******************/

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#Pro-Pic').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        function emi1() {
            var pn = document.formvalcover.per_name.value;
            var pe = document.formvalcover.per_email.value;
            var pm = document.formvalcover.per_mobile.value;
            var pa = document.formvalcover.per_address.value;
            var cd = document.formvalcover.cover_date.value;
            var clc = document.formvalcover.cover_letter_content.value;
            /*operation*/
            document.getElementById("PersonName").innerHTML = pn;
            document.getElementById("PersonEmail").innerHTML = pe;
            document.getElementById("PersonContact").innerHTML = pm;
            document.getElementById("PersonAddress").innerHTML = pa;
            document.getElementById("LetterDate").innerHTML = cd;
            document.getElementById("CoveringLetterContent").innerHTML = clc;
            if (pn == "" && pe == "" && pm == "") {
                document.getElementById("Error-Text").innerHTML = "Must fill valid data";
            } else {
                document.getElementById("Error-Text").innerHTML = "";
                document.getElementById("boxresult").style.display = "block";
                document.getElementById("letterbox").style.display = "none";
            }
        }

        function emires1() {
            document.getElementById("boxresult").style.display = "none";
            document.formvalcover.per_name.value = "";
            document.formvalcover.per_email.value = "";
            document.formvalcover.per_mobile.value = "";
            document.formvalcover.per_address.value = "";
            document.formvalcover.cover_date.value = "";
            document.formvalcover.cover_letter_content.value = "";
            document.getElementById("Error-Text").innerHTML = "";
        }
        
        $('#DownloadPDF').click(function(){
            var doc = new jsPDF("p", "mm", "a4");
            html2canvas(document.querySelector('#target_resume')).then(function(canvas){
                var imgData = canvas.toDataURL('image/png');
                var pageHeight = 297;  
                var imgWidth =  210 ; 
                var imgHeight = canvas.height * imgWidth / canvas.width;
                var heightLeft = imgHeight;
                var position = 0;

                doc.addImage(imgData, 'PNG', 0, position, imgWidth, imgHeight);
                heightLeft -= pageHeight;

                while (heightLeft >= 0) {
                    position = heightLeft - imgHeight;
                    doc.addPage();
                    doc.addImage(imgData, 'PNG', 0, position, imgWidth, imgHeight);
                    heightLeft -= pageHeight; 
                }
                // doc.output('dataurlnewwindow');
                doc.save('new-coverletter.pdf');
            });
        });
        $('#propic-coverletter').change(function(){
            var curElement = $('#letterbox .image');
            console.log(curElement);
            var reader = new FileReader();

            reader.onload = function (e) {
                // get loaded data and render thumbnail.
                curElement.attr('src', e.target.result);
            };

            // read the image file as a data URL.
            reader.readAsDataURL(this.files[0]);
        });
        /*********************************************************/

    </script> 
    @notifyJs
    <x:notify-messages />
</body>
</html>