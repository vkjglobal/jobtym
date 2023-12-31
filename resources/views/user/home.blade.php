@extends('user.layouts.app')

@section('content')

<!-- /#main-content -->
    <section>
        <div class="container">
            <div class="row">
                <div class="midbar">
                    @if($errors->has('uploadResume'))
                        <div class="alert alert-danger text-center">{{ $errors->first('uploadResume') }}</div>
                    @endif
                    <div class="top-info">Millions of jobs. Find the one that’s right for you.</div>
                    <div class="mid-info row no-gutters">
                        <div class="col-lg-6 col-md-12" data-aos="zoom-in" data-aos-duration="2000">
                            <div class="srch-bx">
                                <h1>Your <u>Dream Job</u>
                                    in one place</h1>
                                <div class="srch-title">Find jobs that match your interests with us.</div>
                                <div class="srch-form">
                                    <form action="{{ route('user.job.find-job') }}">
                                        {{-- @csrf --}}
                                        <div class="form-group row">
                                            <div class="col-lg-4 col-xl-3">
                                                <label for="jobTitle">Title</label>
                                                <select class="form-control job-dropdown" id="jobTitle" name="jobTitle">
                                                    <option disabled selected>Job Title</option>
                                                    @foreach ($title as $jobTitle)
                                                        <option name='{{ $jobTitle->title }}'>{{ $jobTitle->title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-lg-4 col-xl-3">
                                                <label for="jobCategory">Type</label>
                                                <select class="form-control category-dropdown" id="jobCategory" name="jobType">
                                                    <option disabled selected>All Types</option>
                                                    <option name="fullTime" value="fullTime">Full Time</option>
                                                    <option name="partTime" value="partTime">Part Time</option>
                                                    <option name="fresher" value="fresher">Fresher</option>
                                                    <option name="internship" value="internship">Internship</option>
                                                    <option name="contract" value="contract">Contract</option>
                                                    <option name="temporary" value="temporary">Temporary</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-4 col-xl-3">
                                                <label for="jobLocation">Location</label>
                                                <select class="form-control location-dropdown" id="jobLocation" name="country">
                                                    <option disabled selected>Location</option>
                                                    @foreach ($location as $jobLocation)
                                                        <option name={{ $jobLocation->country }}>{{ $jobLocation->country }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-lg-4 col-xl-3">
                                                <input type="submit" class="btn-submit btn-typ1" value="Find Job">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="poplr-srch">Popular Searches: Developer , Designer , Architect , Engineer , PHP
                                    , Banking , Ios , Freelance , Writing , Accountancy... </div>
                            </div>

                        </div>
                        <div class="col-lg-6 col-md-12 d-md-none d-sm-none d-none d-lg-block">
                            <div class="mid-img" data-aos="fade-down" data-aos-duration="2000">
                                <img src="user_assets/images/Lady-img.png" alt="">
                            </div>
                        </div>
                        <div class="achvments" data-aos="fade-up" data-aos-duration="2000">
                            <div class="info-bx info-bx1">
                                <svg width="45" height="45" viewBox="0 0 45 45" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <rect width="45" height="45" fill="#F5F5F5" />
                                    <g clip-path="url(#clip0_0_1)">
                                        <rect width="1920" height="4554" transform="translate(-797 -733)"
                                            fill="#EDF1F7" />
                                        <rect x="-554" y="-452" width="1433" height="474"
                                            rx="40" fill="url(#paint0_linear_0_1)" />
                                        <g filter="url(#filter0_d_0_1)">
                                            <rect x="-17" y="-24" width="270" height="92"
                                                rx="25" fill="white" />
                                        </g>
                                        <mask id="mask0_0_1" style="mask-type:alpha" maskUnits="userSpaceOnUse"
                                            x="0" y="0" width="45" height="45">
                                            <rect width="45" height="45" fill="url(#pattern0)" />
                                        </mask>
                                        <g mask="url(#mask0_0_1)">
                                            <rect x="-6" y="-7" width="56" height="60"
                                                fill="#3CADF8" />
                                        </g>
                                    </g>
                                    <defs>
                                        <filter id="filter0_d_0_1" x="-21" y="-24" width="278"
                                            height="100" filterUnits="userSpaceOnUse"
                                            color-interpolation-filters="sRGB">
                                            <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                            <feColorMatrix in="SourceAlpha" type="matrix"
                                                values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                                            <feOffset dy="4" />
                                            <feGaussianBlur stdDeviation="2" />
                                            <feComposite in2="hardAlpha" operator="out" />
                                            <feColorMatrix type="matrix"
                                                values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0" />
                                            <feBlend mode="normal" in2="BackgroundImageFix"
                                                result="effect1_dropShadow_0_1" />
                                            <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_0_1"
                                                result="shape" />
                                        </filter>
                                        <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1"
                                            height="1">
                                            <use xlink:href="#image0_0_1" transform="scale(0.00195312)" />
                                        </pattern>
                                        <linearGradient id="paint0_linear_0_1" x1="812.2" y1="9.4058"
                                            x2="-199.09" y2="-863.279" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#1D9EF4" />
                                            <stop offset="0.910628" stop-color="#72C5FD" />
                                        </linearGradient>
                                        <clipPath id="clip0_0_1">
                                            <rect width="1920" height="4554" fill="white"
                                                transform="translate(-797 -733)" />
                                        </clipPath>
                                        <image id="image0_0_1" width="512" height="512"
                                            xlink:href="data:image/png;base64,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" />
                                    </defs>
                                </svg>
                                <div class="rit-txt">
                                    <strong>12K+</strong>
                                    <span>Companies Jobs</span>
                                </div>
                            </div>
                            <div class="info-bx info-bx2">
                                <svg width="45" height="45" viewBox="0 0 45 45" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <mask id="mask0_358_54" style="mask-type:alpha" maskUnits="userSpaceOnUse"
                                        x="0" y="0" width="45" height="45">
                                        <rect width="45" height="45" fill="url(#pattern0)" />
                                    </mask>
                                    <g mask="url(#mask0_358_54)">
                                        <rect x="-6" width="51" height="52" fill="#FF8200" />
                                    </g>
                                    <defs>
                                        <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1"
                                            height="1">
                                            <use xlink:href="#image0_358_54" transform="scale(0.00195312)" />
                                        </pattern>
                                        <image id="image0_358_54" width="512" height="512"
                                            xlink:href="data:image/png;base64,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" />
                                    </defs>
                                </svg>
                                <div class="rit-txt">
                                    <strong>3K+</strong>
                                    <span>Jobs Done</span>
                                </div>
                            </div>
                            <div class="info-bx info-bx3">
                                <svg width="45" height="45" viewBox="0 0 45 45" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <mask id="mask0_358_48" style="mask-type:alpha" maskUnits="userSpaceOnUse"
                                        x="0" y="0" width="45" height="45">
                                        <rect width="45" height="45" fill="url(#pattern0)" />
                                    </mask>
                                    <g mask="url(#mask0_358_48)">
                                        <rect x="-7" y="-7" width="60" height="64"
                                            fill="#17C27F" />
                                    </g>
                                    <defs>
                                        <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1"
                                            height="1">
                                            <use xlink:href="#image0_358_48" transform="scale(0.00195312)" />
                                        </pattern>
                                        <image id="image0_358_48" width="512" height="512"
                                            xlink:href="data:image/png;base64,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" />
                                    </defs>
                                </svg>
                                <div class="rit-txt">
                                    <strong>98 +</strong>
                                    <span>Job For Countries</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="jobs-by-categories">
        <div class="container">
            <div class="row no-gutters">
                <div class="cat-sec">
                    <h2 class="hd-typ2" data-aos="fade-up" data-aos-duration="2000">Jobs by Categories</h2>
                    <h3 class="hd-typ3" data-aos="fade-up" data-aos-duration="2000">Choose Your Desire Category</h3>
                    <div class="row">
                        <div class="col-xl-7 col-md-12" data-aos="zoom-in" data-aos-duration="2000">
                            <ul class="cat-list row">
                                @foreach ($categories as $category)
                                <li class="list-item list-item1 slctd-cat">
                                    <a href="{{ route('user.category', $category->name) }}">
                                        <span class="cat-icon"><img src="{{ asset('user_assets/images/bd-icon.svg')}}"
                                                alt=""></span>

                                        {{-- <span class="cat-count">Jobs</span> --}}

                                        {{-- <span class="cat-count">9,185 Jobs</span> --}}

                                        <span class="cat-name">{{ $category->name }}</span>
                                    </a>
                                </li>
                                @endforeach
                                {{-- <li class="list-item list-item2">
                                    <a href="{{ url('user/categories') }}">
                                        <span class="cat-icon"><img src="{{ asset('user_assets/images/pm-icon.svg')}}"
                                                alt=""></span>
                                        <span class="cat-count">9,185 Jobs</span>
                                        <span class="cat-name">Project Management</span>
                                    </a>
                                </li>
                                <li class="list-item list-item3">
                                    <a href="{{ url('user/categories') }}">
                                        <span class="cat-icon"><img src="{{ asset('user_assets/images/cwb-icon.svg')}}"
                                                alt=""></span>
                                        <span class="cat-count">9,185 Jobs</span>
                                        <span class="cat-name">Content Writer &amp; Blogging</span>
                                    </a>
                                </li>
                                <li class="list-item list-item4">
                                    <a href="{{ url('user/categories') }}">
                                        <span class="cat-icon"><img src="{{ asset('user_assets/images/cs-icon.svg')}}"
                                                alt=""></span>
                                        <span class="cat-count">9,185 Jobs</span>
                                        <span class="cat-name">Customer Services</span>
                                    </a>
                                </li>
                                <li class="list-item list-item5">
                                    <a href="{{ url('user/categories') }}">
                                        <span class="cat-icon"><img src="{{ asset('user_assets/images/swd-icon.svg')}}"
                                                alt=""></span>
                                        <span class="cat-count">9,185 Jobs</span>
                                        <span class="cat-name">Senior Web Designer</span>
                                    </a>
                                </li>
                                <li class="list-item list-item6">
                                    <a href="{{ url('user/categories') }}">
                                        <span class="cat-icon"><img src="{{ asset('user_assets/images/ITdm-icon.svg')}}"
                                                alt=""></span>
                                        <span class="cat-count">9,185 Jobs</span>
                                        <span class="cat-name">IT Department Manager</span>
                                    </a>
                                </li>
                                <li class="list-item list-item7">
                                    <a href="{{ url('user/categories') }}">
                                        <span class="cat-icon"><img src="{{ asset('user_assets/images/aps-icon.svg')}}"
                                                alt=""></span>
                                        <span class="cat-count">9,185 Jobs</span>
                                        <span class="cat-name">Art Production Specialist</span>
                                    </a>
                                </li>
                                <li class="list-item list-item8 ">
                                    <a href="{{ url('user/categories') }}">
                                        <span class="cat-icon"><img src="{{ asset('user_assets/images/rf-icon.svg')}}"
                                                alt=""></span>
                                        <span class="cat-count">9,185 Jobs</span>
                                        <span class="cat-name">Recreation
                                            &amp; Fitness</span>
                                    </a>
                                </li> --}}

                            </ul>
                            <a href="{{ route('user.job.find-job') }}" class="all-cat-btn">All Categories</a>
                        </div>
                        <div class="col-xl-5 col-md-12" data-aos="fade-up" data-aos-duration="2000">
                            <div class="cv-upload-sec">
                                <div class="info-top-hd">Explore New Life</div>
                                <div class="info-mid-hd">Don’t just find, be found.<br> Put your CV in front of great
                                    employers.</div>
                                <div class="info-text">We have indeed found this very helpful <br>in finding the right candidate
                                    for our <br>organization...</div>
                                @if (Auth::check())
                                <form method="POST" action="{{ route('user.uploadFile') }}" class="cv-upload" enctype="multipart/form-data">
                                    @csrf
                                    <div class="file-icon">
                                        <img src="{{ asset('user_assets/images/file-upload.svg')}}" alt="">
                                    </div>
                                    <div class="upload-btn-wrapper">
                                        <input type="file" name="uploadResume" id="fileInput"/>
                                        
                                        <button class="btn">Upload a file</button>
                                        
                                    </div>
                                </form>
                                @else
                                <form method="POST" action="{{ route('user.uploadFile') }}" class="cv-upload" enctype="multipart/form-data">
                                    @csrf
                                    <div class="file-icon">
                                        <img src="{{ asset('user_assets/images/file-upload.svg')}}" alt="">
                                    </div>
                                    <div class="upload-btn-wrapper">
                                        
                                        
                                        <button class="btn" type="submit">Upload a file</button>
                                        
                                    </div>
                                </form>
                                @endif
                                <div class="cv-upload-bg d-none d-sm-block">
                                    <img src="{{ asset('user_assets/images/Lady-img2.png')}}" alt="">
                                </div>
                                <script>
                                    // Get the file input element
                                    var fileInput = document.getElementById('fileInput');
                                    // Add a change event listener to the file input element
                                    fileInput.addEventListener('change', function() {
                                        console.log('here');
                                      // When the user selects a file, submit the form
                                      this.form.submit();
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="featured-job-sec">
        <div class="container">
            <h3 class="hd-typ3" data-aos="fade-up" data-aos-duration="2000">Featured Jobs</h3>
            <h2 class="hd-typ2" data-aos="fade-up" data-aos-duration="2000">The #1 Job Board for Hiring Creative
                Professionals</h2>
            <div class="row job-box-wrap" data-aos="zoom-in" data-aos-duration="2000">
                @foreach ($jobs as $job)
                    <a href="{{ url('user/job-detail',base64_encode($job['id'])) }}" class="col-md-6 job-box job-box-type1">
                        <span class="job-title-sec">
                            <strong class="title-icon">D</strong>
                            <span class="job-title">
                                <h4>{{ $job->title }}</h4>
                                <span class="job-info-sec">
                                    <ul class="job-info">
                                        <li class="cmpny-name">{{ $job->employer->company_name }}</li>
                                        <li class="company-location">{{ $job->employer->country }}</li>
                                        <li class="work-duration">{{ ucfirst($job->type) }}</li><br>
                                        <li class="notification">{{ $job->created_at->diffForHumans() }}</li>
                                    </ul>
                                    <span class="pay-dtls">
                                        <strong>${{ $job['salaryFrom'] }} - ${{ $job['salaryTo'] }}</strong> / week
                                    </span>
                                </span>
                            </span>
                        </span>
                        <span class="job-info-text">
                            {{ Str::limit($job->description, 200) }}
                        </span>
                        <span class="req-info-box">
                            <span class="urgent">Urgent</span>
                            {{-- <span class="senior">Senior</span> --}}
                            <span class="full-time">{{ ucfirst($job->type) }}</span>
                        </span>
                    </a>
                @endforeach
                {{-- <a href="job-detail.html" class="job-box job-box-type1">
                    <span class="job-title-sec">
                        <strong class="title-icon">D</strong>
                        <span class="job-title">
                            <h4>Digital marketing Manager</h4>
                            <span class="job-info-sec">
                                <ul class="job-info">
                                    <li class="cmpny-name">AliStudio, Inc</li>
                                    <li class="company-location">New York, NY</li>
                                    <li class="work-duration">Full time</li>
                                    <li class="notification">3mins ago</li>
                                </ul>
                                <span class="pay-dtls">
                                    <strong>$500</strong>/Hour
                                </span>
                            </span>
                        </span>
                    </span>
                    <span class="job-info-text">
                        We want someone who has been doing this for a solid 2=3 yeras. We want someone who can demonstrate a
                        extremely storng portfolio.
                    </span>
                    <span class="req-info-box">
                        <span class="urgent">Urgent</span>
                        <span class="senior">Senior</span>
                        <span class="full-time">Full time</span>
                    </span>
                </a>
                <a href="job-detail.html" class="job-box job-box-type1">
                    <span class="job-title-sec">
                        <strong class="title-icon">D</strong>
                        <span class="job-title">
                            <h4>Digital marketing Manager</h4>
                            <span class="job-info-sec">
                                <ul class="job-info">
                                    <li class="cmpny-name">AliStudio, Inc</li>
                                    <li class="company-location">New York, NY</li>
                                    <li class="work-duration">Full time</li>
                                    <li class="notification">3mins ago</li>
                                </ul>
                                <span class="pay-dtls">
                                    <strong>$500</strong>/Hour
                                </span>
                            </span>
                        </span>
                    </span>
                    <span class="job-info-text">
                        We want someone who has been doing this for a solid 2=3 yeras. We want someone who can demonstrate a
                        extremely storng portfolio.
                    </span>
                    <span class="req-info-box">
                        <span class="urgent">Urgent</span>
                        <span class="senior">Senior</span>
                        <span class="full-time">Full time</span>
                    </span>
                </a>
                <a href="job-detail.html" class="job-box job-box-type1">
                    <span class="job-title-sec">
                        <strong class="title-icon">D</strong>
                        <span class="job-title">
                            <h4>Digital marketing Manager</h4>
                            <span class="job-info-sec">
                                <ul class="job-info">
                                    <li class="cmpny-name">AliStudio, Inc</li>
                                    <li class="company-location">New York, NY</li>
                                    <li class="work-duration">Full time</li>
                                    <li class="notification">3mins ago</li>
                                </ul>
                                <span class="pay-dtls">
                                    <strong>$500</strong>/Hour
                                </span>
                            </span>
                        </span>
                    </span>
                    <span class="job-info-text">
                        We want someone who has been doing this for a solid 2=3 yeras. We want someone who can demonstrate a
                        extremely storng portfolio.
                    </span>
                    <span class="req-info-box">
                        <span class="urgent">Urgent</span>
                        <span class="senior">Senior</span>
                        <span class="full-time">Full time</span>
                    </span>
                </a>
                <a href="job-detail.html" class="job-box job-box-type1">
                    <span class="job-title-sec">
                        <strong class="title-icon">D</strong>
                        <span class="job-title">
                            <h4>Digital marketing Manager</h4>
                            <span class="job-info-sec">
                                <ul class="job-info">
                                    <li class="cmpny-name">AliStudio, Inc</li>
                                    <li class="company-location">New York, NY</li>
                                    <li class="work-duration">Full time</li>
                                    <li class="notification">3mins ago</li>
                                </ul>
                                <span class="pay-dtls">
                                    <strong>$500</strong>/Hour
                                </span>
                            </span>
                        </span>
                    </span>
                    <span class="job-info-text">
                        We want someone who has been doing this for a solid 2=3 yeras. We want someone who can demonstrate a
                        extremely storng portfolio.
                    </span>
                    <span class="req-info-box">
                        <span class="urgent">Urgent</span>
                        <span class="senior">Senior</span>
                        <span class="full-time">Full time</span>
                    </span>
                </a>
                <a href="job-detail.html" class="job-box job-box-type1">
                    <span class="job-title-sec">
                        <strong class="title-icon">D</strong>
                        <span class="job-title">
                            <h4>Digital marketing Manager</h4>
                            <span class="job-info-sec">
                                <ul class="job-info">
                                    <li class="cmpny-name">AliStudio, Inc</li>
                                    <li class="company-location">New York, NY</li>
                                    <li class="work-duration">Full time</li>
                                    <li class="notification">3mins ago</li>
                                </ul>
                                <span class="pay-dtls">
                                    <strong>$500</strong>/Hour
                                </span>
                            </span>
                        </span>
                    </span>
                    <span class="job-info-text">
                        We want someone who has been doing this for a solid 2=3 yeras. We want someone who can demonstrate a
                        extremely storng portfolio.
                    </span>
                    <span class="req-info-box">
                        <span class="urgent">Urgent</span>
                        <span class="senior">Senior</span>
                        <span class="full-time">Full time</span>
                    </span>
                </a> --}}
            </div>
            <a href="{{ url('user/find-job') }}" class="btn-typ1">Browse All Jobs</a>
        </div>
    </section>
    <section class="how-it-works-sec">
        <div class="container">
            <div class="row work-flow-info-box">
                <div class="info-bg">
                    <img src="{{ asset('user_assets/images/Lady-img3.png')}}" alt="">
                </div>
                <div class="info-text-box" data-aos="fade-up" data-aos-duration="2000">
                    <h2 class="hd-typ2">How it works</h2>
                    <h3 class="hd-typ3">Follow our steps we will help you.</h3>
                    <ul class="work-flow">
                        <li class="step1">
                            <strong>1</strong>
                            <div class="work-flow-sec">
                                <div class="work-flow-title">
                                    Register Your Account
                                </div>
                                <div class="work-low-info">
                                    You need to create an account to find the best and preferred job.
                                </div>
                            </div>
                        </li>
                        <li class="step2">
                            <strong>2</strong>
                            <div class="work-flow-sec">
                                <div class="work-flow-title">
                                    Apply For Dream Job
                                </div>
                                <div class="work-low-info">
                                    After creating an account, search for your favorite job.
                                </div>
                            </div>
                        </li>
                        <li class="step3">
                            <strong>3</strong>
                            <div class="work-flow-sec">
                                <div class="work-flow-title">
                                    Upload Your Resume
                                </div>
                                <div class="work-low-info">
                                    Upload your resume after filling all the relevant information.
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    {{-- <section class="top-companies-sec">
        <div class="container">
            <h2 class="hd-typ2" data-aos="fade-up" data-aos-duration="2000">Top Companies</h2>
            <h3 class="hd-typ3" data-aos="fade-up" data-aos-duration="2000">Get hired in top companies</h3>
            <ul class="company-logo-list row" data-aos="fade-up" data-aos-anchor-placement="top-center"
                data-aos-duration="2000">
                <li><img src="{{ asset('user_assets/images/digital-icon.svg')}}" alt=""></li>
                <li><img src="{{ asset('user_assets/images/innovation-icon.svg')}}" alt=""></li>
                <li><img src="{{ asset('user_assets/images/green-power-icon.svg')}}" alt=""></li>
                <li><img src="{{ asset('user_assets/images/energy-icon.svg')}}" alt=""></li>
                <li><img src="{{ asset('user_assets/images/technology-icon.svg')}}" alt=""></li>
            </ul>
        </div>
    </section> --}}
@endsection
