@extends('user.layouts.app')

@section('content')
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

    @if($errors->any())
    <section class="popup">
        <div class="popup-inner">
            <div class="popup-content">
                <div class="content alert alert-danger text-center">
                    Something went wrong. Please try again.
                </div>
            </div>
        </div>
    </section>
    @endif
    {{-- @if($errors->has('accept'))
    <section class="popup">
        <div class="popup-inner">
            <div class="popup-content">
                <div class="content alert alert-danger text-center">
                    {{ $errors->first('accept') }}
                </div>
            </div>
        </div>
    </section>
    @endif --}}

</div>
    <section class="main-title-wrp find-job-sec d-flex align-items-center">
        <div class="container featured-job-sec job-search-page">
            <div class="row job-box-wrap">
                <div class="job-box col-lg-8 col-12 job-box-type1">
                    <span class="job-title-sec">
                        <strong class="title-icon blue-bg"><svg width="23" height="33" viewBox="0 0 23 33" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M10.045 26.19C10.7917 26.19 11.6317 26.3183 12.565 26.575C13.4983 26.8317 14.4433 27.1583 15.4 27.555C16.3567 27.975 16.9633 28.22 17.22 28.29C18.3167 28.64 20.0083 28.815 22.295 28.815C22.2017 29.7017 22.05 30.4717 21.84 31.125C21.6533 31.7783 21.3967 32.315 21.07 32.735C19.32 32.6417 17.7683 32.3383 16.415 31.825C16.0417 31.685 15.365 31.3933 14.385 30.95C13.405 30.53 12.5417 30.2033 11.795 29.97C11.0483 29.76 10.3367 29.655 9.66 29.655C9.00667 29.655 8.07333 29.795 6.86 30.075C5.67 30.3783 5.06333 30.53 5.04 30.53C4.2 29.8067 3.78 29.0017 3.78 28.115C5.20333 27.4617 6.41667 26.9717 7.42 26.645C8.44667 26.3417 9.32167 26.19 10.045 26.19ZM11.55 21.71C15.4233 21.71 17.36 18.735 17.36 12.785C17.36 6.835 15.4233 3.86 11.55 3.86C9.87 3.86 8.4 4.11667 7.14 4.63C6.06667 6.87 5.53 9.47167 5.53 12.435C5.53 15.375 5.97333 17.6617 6.86 19.295C7.74667 20.905 9.31 21.71 11.55 21.71ZM11.55 0.0799996C15.4467 0.0799996 18.1883 1.10667 19.775 3.16C21.3617 5.19 22.155 8.305 22.155 12.505C22.155 15.1417 21.8167 17.3933 21.14 19.26C20.4633 21.1267 19.32 22.62 17.71 23.74C16.1 24.86 14.0467 25.42 11.55 25.42C7.74667 25.42 4.98167 24.3583 3.255 22.235C1.55167 20.1117 0.7 17.02 0.7 12.96C0.7 4.37333 4.31667 0.0799996 11.55 0.0799996Z"
                                    fill="white" />
                            </svg>
                        </strong>
                        <span class="job-title">
                            <h4>{{ $job['title'] }}</h4>
                            <span class="featured d-none">Featured</span>
                            {{-- <span class="filled ml-4">Filled</span> --}}
                            <span class="job-info-sec">
                                <ul class="job-info mb-2">
                                    <li class="job-name"><span><svg width="17" height="15" viewBox="0 0 17 15"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M1.15385 5.76928H15V4.61543C15 4.30941 14.8784 4.01593 14.662 3.79954C14.4457 3.58315 14.1522 3.46159 13.8462 3.46159H2.30769C2.00167 3.46159 1.70819 3.58315 1.4918 3.79954C1.27541 4.01593 1.15385 4.30941 1.15385 4.61543V5.76928ZM1.15385 6.92312V12.6924C1.15385 12.9984 1.27541 13.2919 1.4918 13.5082C1.70819 13.7246 2.00167 13.8462 2.30769 13.8462H13.8462C14.1522 13.8462 14.4457 13.7246 14.662 13.5082C14.8784 13.2919 15 12.9984 15 12.6924V6.92312H1.15385ZM2.30769 2.30774H13.8462C14.4582 2.30774 15.0452 2.55087 15.4779 2.98365C15.9107 3.41642 16.1538 4.00339 16.1538 4.61543V12.6924C16.1538 13.3044 15.9107 13.8914 15.4779 14.3241C15.0452 14.7569 14.4582 15 13.8462 15H2.30769C1.69565 15 1.10868 14.7569 0.675907 14.3241C0.243131 13.8914 0 13.3044 0 12.6924V4.61543C0 4.00339 0.243131 3.41642 0.675907 2.98365C1.10868 2.55087 1.69565 2.30774 2.30769 2.30774Z"
                                                    fill="#A0A0A0" />
                                                <path
                                                    d="M5.76908 1.15385V2.30769H10.3845V1.15385H5.76908ZM5.76908 0H10.3845C10.6905 0 10.984 0.121566 11.2004 0.337954C11.4167 0.554342 11.5383 0.847827 11.5383 1.15385V2.30769C11.5383 2.61371 11.4167 2.9072 11.2004 3.12358C10.984 3.33997 10.6905 3.46154 10.3845 3.46154H5.76908C5.46306 3.46154 5.16958 3.33997 4.95319 3.12358C4.7368 2.9072 4.61523 2.61371 4.61523 2.30769V1.15385C4.61523 0.847827 4.7368 0.554342 4.95319 0.337954C5.16958 0.121566 5.46306 0 5.76908 0Z"
                                                    fill="#A0A0A0" />
                                            </svg>
                                        </span>
                                        {{ $job['skills'] }}
                                    </li>
                                    <li class="company-location"><span><svg width="12" height="15"
                                                viewBox="0 0 12 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M5.89287 8.57142C5.3631 8.57142 4.84522 8.41433 4.40473 8.12C3.96424 7.82568 3.62092 7.40734 3.41819 6.9179C3.21546 6.42845 3.16241 5.88988 3.26576 5.37029C3.36912 4.8507 3.62423 4.37342 3.99883 3.99882C4.37344 3.62421 4.85071 3.3691 5.3703 3.26575C5.8899 3.1624 6.42847 3.21544 6.91791 3.41817C7.40736 3.62091 7.82569 3.96423 8.12002 4.40472C8.41434 4.84521 8.57144 5.36308 8.57144 5.89285C8.57059 6.60299 8.28811 7.2838 7.78596 7.78595C7.28382 8.28809 6.60301 8.57057 5.89287 8.57142ZM5.89287 4.28571C5.575 4.28571 5.26428 4.37997 4.99999 4.55656C4.73569 4.73316 4.5297 4.98416 4.40806 5.27782C4.28642 5.57149 4.25459 5.89463 4.3166 6.20639C4.37862 6.51815 4.53168 6.80451 4.75645 7.02927C4.98121 7.25404 5.26757 7.4071 5.57933 7.46911C5.89108 7.53113 6.21423 7.4993 6.50789 7.37766C6.80156 7.25602 7.05256 7.05003 7.22916 6.78573C7.40575 6.52144 7.50001 6.21071 7.50001 5.89285C7.49958 5.46674 7.33012 5.05821 7.02882 4.7569C6.72751 4.45559 6.31898 4.28613 5.89287 4.28571Z"
                                                    fill="#AFAFAF" />
                                                <path
                                                    d="M5.89286 15L1.37358 9.67018C1.31078 9.59015 1.24864 9.50961 1.18715 9.42857C0.415174 8.41167 -0.00186492 7.16958 6.2694e-06 5.89286C6.2694e-06 4.32997 0.620859 2.8311 1.72598 1.72598C2.83111 0.620853 4.32998 0 5.89286 0C7.45575 0 8.95462 0.620853 10.0597 1.72598C11.1649 2.8311 11.7857 4.32997 11.7857 5.89286C11.7876 7.169 11.3707 8.41053 10.5991 9.42696L10.5986 9.42857C10.5986 9.42857 10.4379 9.63964 10.4138 9.66804L5.89286 15ZM2.04215 8.78304C2.04322 8.78304 2.16751 8.94804 2.1959 8.98339L5.89286 13.3436L9.59465 8.9775C9.61822 8.94804 9.74358 8.78196 9.74411 8.78143C10.3747 7.9506 10.7155 6.93591 10.7143 5.89286C10.7143 4.61413 10.2063 3.38779 9.30213 2.48359C8.39793 1.5794 7.17159 1.07143 5.89286 1.07143C4.61414 1.07143 3.38779 1.5794 2.4836 2.48359C1.57941 3.38779 1.07143 4.61413 1.07143 5.89286C1.07031 6.93656 1.41149 7.95183 2.04268 8.78304H2.04215Z"
                                                    fill="#AFAFAF" />
                                            </svg>
                                        </span>
                                        {{ $job['country'] }}
                                    </li>
                                    <li class="work-price"><span><svg width="19" height="15" viewBox="0 0 19 15"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M16.25 0H0V12.5H16.25V0ZM15 11.25H1.25V1.25H15V11.25Z"
                                                    fill="#A0A0A0" />
                                                <path d="M17.5 3.125V13.75H3.125V15H18.75V3.125H17.5Z" fill="#A0A0A0" />
                                                <path
                                                    d="M8.125 9.31484C9.67578 9.31484 10.9375 7.9423 10.9375 6.25523C10.9375 4.56816 9.67578 3.19562 8.125 3.19562C6.57422 3.19562 5.3125 4.56813 5.3125 6.25523C5.3125 7.94234 6.57422 9.31484 8.125 9.31484ZM8.125 4.44562C8.98656 4.44562 9.6875 5.25742 9.6875 6.25523C9.6875 7.25305 8.98656 8.06484 8.125 8.06484C7.26344 8.06484 6.5625 7.25305 6.5625 6.25523C6.5625 5.25742 7.26344 4.44562 8.125 4.44562ZM2.5 2.8125H3.75V9.6875H2.5V2.8125ZM12.5 2.8125H13.75V9.6875H12.5V2.8125Z"
                                                    fill="#A0A0A0" />
                                            </svg>
                                        </span>
                                        ${{ $job['salaryFrom'] }} - ${{ $job['salaryTo'] }} / week
                                    </li>
                                </ul>
                                <span class="req-info-box">
                                    <span class="full-time">{{ ucfirst($job['type']) }}</span>
                                    <span class="urgent ml-2">Urgent</span>
                                </span>
                            </span>
                        </span>
                    </span>
                </div>
                <div class="col-lg-4 col-12 mob-align text-right">
                    <div class="end-date mb-2">Application ends: <span>{{ date("M d, Y", strtotime($job['deadline'])) }}</span></div>
                    <div class="d-flex">
                        <button type="button" class="btn-typ1 mt-0 mr-3" data-toggle="modal" data-target="#ApplyNow" @if ($applyJob > 0) @disabled(true) @endif>
                            @if ($applyJob > 0)
                                Already Applied!
                            @else
                                Apply Now!
                            @endif
                        </button>
                        <input type="hidden" id="authId" value="{{ isset($user['id']) ? $user['id'] : '' }}">
                        <a href="javascript:void(0)" id="saveJobButton" class="boolmark d-flex justify-content-center align-items-center @if (isset($isSavedJob) && $isSavedJob == true) saveBtnClicks @endif">
                            <svg width="16" height="18" viewBox="0 0 16 18" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M1 2.70571V15.1455C1 15.9045 1.91853 16.2857 2.45583 15.7484L7.82285 10.3814L13.1899 15.7484C13.7272 16.2857 14.6457 15.9054 14.6457 15.1455V2.70571C14.6457 2.25333 14.466 1.81947 14.1461 1.49959C13.8262 1.17971 13.3924 1 12.94 1H2.70571C2.25333 1 1.81947 1.17971 1.49959 1.49959C1.17971 1.81947 1 2.25333 1 2.70571Z"
                                    stroke="#189CF4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                    </div>

                    <form method="POST" action="{{ route('user.job.job-apply') }}" class="register-form-modal register-form applynowform" id="applyJob" enctype="multipart/form-data">
                        @csrf
                        <div class="modal fade" id="ApplyNow" tabindex="-1" role="dialog" aria-labelledby="ApplyNow"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalCenterTitle">Apply For Job</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <input type="hidden" name="job_id" id="job_id" value="{{ $job['id'] }}">
                                    <input type="hidden" name="job_title" value="{{ $job['title'] }}">
                                    <input type="hidden" name="employer" value="{{ $job['employer_id'] }}">
                                    <input type="hidden" name="user_id" value="{{ isset($user['id']) ? $user['id'] : ''  }}">
                                    <div class="modal-body row">
                                        <div class="form-group col-md-6">
                                            <label for="FirstName">First Name</label>
                                            <input type="text" class="form-control" name="first_name" id="FirstName" placeholder="">
                                            @if($errors->has('first_name'))
                                                <div class="text-danger">{{ $errors->first('first_name') }}</div>
                                            @endif
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="LastName">Last Name</label>
                                            <input type="text" class="form-control" name="last_name" id="LastName" placeholder="">
                                            @if($errors->has('last_name'))
                                                <div class="text-danger">{{ $errors->first('last_name') }}</div>
                                            @endif
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="eMail">Email</label>
                                            <input type="email" class="form-control" name="email" id="eMail" placeholder="">
                                            @if($errors->has('email'))
                                                <div class="text-danger">{{ $errors->first('email') }}</div>
                                            @endif
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="PhoneNumber">Phone</label>
                                            <input type="text" class="form-control" name="phone" id="PhoneNumber" placeholder="">
                                            @if($errors->has('phone'))
                                                <div class="text-danger">{{ $errors->first('phone') }}</div>
                                            @endif
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="CurrentJobTitle">Current Job Title</label>
                                            <input type="text" class="form-control" name="current_job" id="CurrentJobTitle" placeholder="">
                                            @if($errors->has('current_job'))
                                                <div class="text-danger">{{ $errors->first('current_job') }}</div>
                                            @endif
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="CurrentSalary">Current Salary</label>
                                            <input type="text" class="form-control" name="current_salary" id="CurrentSalary" placeholder="">
                                            @if($errors->has('current_salary'))
                                                <div class="text-danger">{{ $errors->first('current_salary') }}</div>
                                            @endif
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="AcademicLevel">Academic Level*</label>
                                            <input type="text" class="form-control" name="academic" id="AcademicLevel" placeholder="">
                                            @if($errors->has('academic'))
                                                <div class="text-danger">{{ $errors->first('academic') }}</div>
                                            @endif
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="candidateAge">Age*</label>
                                            <input type="text" class="form-control" name="age" id="candidateAge" placeholder="">
                                            @if($errors->has('age'))
                                                <div class="text-danger">{{ $errors->first('age') }}</div>
                                            @endif
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="ExpectedSalary">Salary</label>
                                            <input type="text" class="form-control" name="salary" id="ExpectedSalary" placeholder="">
                                            @if($errors->has('salary'))
                                                <div class="text-danger">{{ $errors->first('salary') }}</div>
                                            @endif
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Gender</label>
                                            <select class="gender-dropdown form-control" name="gender">
                                                <option disabled selected>Select Gender</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                                <option value="other">Other</option>
                                            </select>
                                            @if($errors->has('gender'))
                                                <div class="text-danger">{{ $errors->first('gender') }}</div>
                                            @endif
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="WorkingIndustry">Industry*</label>
                                            <input type="text" class="form-control" name="industry" id="WorkingIndustry" placeholder="">
                                            @if($errors->has('industry'))
                                                <div class="text-danger">{{ $errors->first('industry') }}</div>
                                            @endif
                                        </div>
                                        <div class="form-group col-md-12 file-upload-resume">
                                            <label for="file" class="">Resume</label>
                                            <div class="input-group fileupload-box">
                                                <div class="input-group-btn">
                                                    <span class="upload-icon">
                                                        <svg width="32" height="25" viewBox="0 0 32 25"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M15.9162 0C20.7706 0 24.9148 3.05043 26.5412 7.3402C29.5774 8.14276 31.8182 10.9126 31.8182 14.2045C31.8182 18.1286 28.6399 21.3068 24.7195 21.3068H23.2955C23.1392 21.3068 23.0114 21.179 23.0114 21.0227V18.892C23.0114 18.7358 23.1392 18.608 23.2955 18.608H24.7195C25.2975 18.6095 25.87 18.4963 26.404 18.2751C26.938 18.0538 27.4227 17.7288 27.8303 17.3189C28.6612 16.4879 29.1193 15.38 29.1193 14.2045C29.1193 12.2088 27.7734 10.4581 25.8487 9.93963L24.5064 9.58452L24.0163 8.28835C23.7109 7.48224 23.2848 6.7223 22.7486 6.03693C22.2195 5.35866 21.5945 4.76207 20.8878 4.26491C19.4283 3.23864 17.7095 2.69531 15.9162 2.69531C14.1229 2.69531 12.4041 3.23864 10.9446 4.26491C10.2403 4.76048 9.61318 5.35763 9.08381 6.03693C8.54759 6.7223 8.12145 7.47869 7.81605 8.28835L7.32244 9.58807L5.97656 9.93963C5.05327 10.1847 4.2223 10.7351 3.62926 11.4915C3.05043 12.2337 2.73082 13.1143 2.69886 14.0518C2.6598 15.2521 3.10369 16.4098 3.93821 17.2692C4.77628 18.1321 5.90199 18.608 7.09872 18.608H8.52273C8.67898 18.608 8.80682 18.7358 8.80682 18.892V21.0227C8.80682 21.179 8.67898 21.3068 8.52273 21.3068H7.09872C3.17827 21.3068 0 18.1286 0 14.2045C0 10.9091 2.24787 8.13565 5.29119 7.33665C6.91761 3.04688 11.0618 0 15.9162 0ZM16.0336 10.5376C16.0724 10.5565 16.1064 10.584 16.1329 10.6179L20.1102 15.6534C20.2558 15.8381 20.1244 16.1115 19.8865 16.1115H17.2551V24.7159C17.2551 24.8722 17.1273 25 16.971 25H14.8403C14.6841 25 14.5562 24.8722 14.5562 24.7159V16.108H11.9319C11.8788 16.1081 11.8266 16.0933 11.7815 16.0651C11.7363 16.037 11.7 15.9968 11.6767 15.949C11.6534 15.9012 11.6439 15.8478 11.6495 15.7949C11.6551 15.742 11.6754 15.6918 11.7082 15.6499L15.6855 10.6179C15.7121 10.584 15.746 10.5565 15.7848 10.5376C15.8235 10.5187 15.8661 10.5089 15.9092 10.5089C15.9523 10.5089 15.9949 10.5187 16.0336 10.5376Z"
                                                                fill="#1D9EF4" />
                                                        </svg>
                                                    </span>
                                                    <input type="text" name="fileName" class="form-control file-name" placeholder="" readonly>
                                                    <span class="upload-info-txt">
                                                        <strong>Drop a resume file or click to upload,</strong> To upload file size is <b>(Max 5Mb)</b> and allowed file type are <b>(.doc, docx, pdf)</b>
                                                    </span>
                                                    <div class="divider">
                                                        <hr>
                                                        <span>OR</span>
                                                    </div>
                                                    <div class="btn-typ1 custom-file-uploader">
                                                        <input type="file" name="resumeUpload"/>
                                                        Upload Resume
                                                    </div>
                                                    @if($errors->has('resumeUpload'))
                                                        <div class="text-danger">{{ $errors->first('resumeUpload') }}</div>
                                                    @endif
                                                </div>

                                            </div>
                                        </div>
                                        <div class="form-group col-md-12 upload-cover custom-file-container" data-upload-id="myUniqueUploadId">
                                            <label>Upload File <a href="javascript:void(0)" class="custom-file-container__image-clear d-none" title="Clear Image">&times;</a></label>
                                            @if($errors->has('coverLatter'))
                                                <div class="text-danger">{{ $errors->first('coverLatter') }}</div>
                                            @endif
                                            <div class="custom-file-container__image-preview"></div>
                                            <label class="custom-file-container__custom-file" >
                                                <input type="file" name="coverLatter" class="custom-file-container__custom-file__custom-file-input" accept="*" multiple aria-label="Choose File">
                                                <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                                <span class="custom-file-container__custom-file__custom-file-control">
                                                    <span class="btn-lbl">Upload Cover Letter</span>
                                                </span>
                                                <div class="btn-wrap">
                                                    <span class="btn-typ1">
                                                        <svg width="32" height="25" viewBox="0 0 32 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M15.9162 0C20.7706 0 24.9148 3.05043 26.5412 7.3402C29.5774 8.14276 31.8182 10.9126 31.8182 14.2045C31.8182 18.1286 28.6399 21.3068 24.7195 21.3068H23.2955C23.1392 21.3068 23.0114 21.179 23.0114 21.0227V18.892C23.0114 18.7358 23.1392 18.608 23.2955 18.608H24.7195C25.2975 18.6095 25.87 18.4963 26.404 18.2751C26.938 18.0538 27.4227 17.7288 27.8303 17.3189C28.6612 16.4879 29.1193 15.38 29.1193 14.2045C29.1193 12.2088 27.7734 10.4581 25.8487 9.93963L24.5064 9.58452L24.0163 8.28835C23.7109 7.48224 23.2848 6.7223 22.7486 6.03693C22.2195 5.35866 21.5945 4.76207 20.8878 4.26491C19.4283 3.23864 17.7095 2.69531 15.9162 2.69531C14.1229 2.69531 12.4041 3.23864 10.9446 4.26491C10.2403 4.76048 9.61318 5.35763 9.08381 6.03693C8.54759 6.7223 8.12145 7.47869 7.81605 8.28835L7.32244 9.58807L5.97656 9.93963C5.05327 10.1847 4.2223 10.7351 3.62926 11.4915C3.05043 12.2337 2.73082 13.1143 2.69886 14.0518C2.6598 15.2521 3.10369 16.4098 3.93821 17.2692C4.77628 18.1321 5.90199 18.608 7.09872 18.608H8.52273C8.67898 18.608 8.80682 18.7358 8.80682 18.892V21.0227C8.80682 21.179 8.67898 21.3068 8.52273 21.3068H7.09872C3.17827 21.3068 0 18.1286 0 14.2045C0 10.9091 2.24787 8.13565 5.29119 7.33665C6.91761 3.04688 11.0618 0 15.9162 0ZM16.0336 10.5376C16.0724 10.5565 16.1064 10.584 16.1329 10.6179L20.1102 15.6534C20.2558 15.8381 20.1244 16.1115 19.8865 16.1115H17.2551V24.7159C17.2551 24.8722 17.1273 25 16.971 25H14.8403C14.6841 25 14.5562 24.8722 14.5562 24.7159V16.108H11.9319C11.8788 16.1081 11.8266 16.0933 11.7815 16.0651C11.7363 16.037 11.7 15.9968 11.6767 15.949C11.6534 15.9012 11.6439 15.8478 11.6495 15.7949C11.6551 15.742 11.6754 15.6918 11.7082 15.6499L15.6855 10.6179C15.7121 10.584 15.746 10.5565 15.7848 10.5376C15.8235 10.5187 15.8661 10.5089 15.9092 10.5089C15.9523 10.5089 15.9949 10.5187 16.0336 10.5376Z" fill="#1D9EF4"/>
                                                        </svg>
                                                        Upload Cover Letter
                                                    </span>
                                                    <span class="upload-info-txt">
                                                        To upload file size is <b>(Max 5Mb)</b> and allowed file type are <b>(.doc, docx, pdf)</b>
                                                    </span>
                                                </div>
                                            </label>
                                            
                                        </div>


                                        <div class="form-group col-md-12 chkbx mt-3">
                                            <input type="checkbox" name="accept" id="regChck">
                                            <label for="regChck">
                                                <span class="chk-txt">By clicking checkbox, you agree to our <a
                                                        href="{{ url('user/terms-condition') }}"  target="_blank">Terms and Conditions</a> and <a
                                                        href="{{ url('user/privacy-policy') }}"  target="_blank">Privacy Policy</a></span>
                                            </label>
                                            @if($errors->has('accept'))
                                                <div class="text-danger">{{ $errors->first('accept') }}</div>
                                            @endif
                                        </div>
                                        <div class="form-group col-md-12">
                                            <button type="submit" class="btn-typ1 w-100 rounded-btn5" id="ApplyJob">Apply for job</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </section>
    <section class="featured-job-sec job-search-page">
        <div class="container pt-5 pb-5">
            <div class="row cms-text">
                <div class="col-md-8 pl-md-0 left-txt">
                    <strong class="mb-4">Job Description</strong>
                    <p>{{ $job['description'] }}</p>
                    <strong class="mb-4">Key Responsibilities</strong>
                    <ul class="mb-5">
                        <li>Be involved in every step of the product design cycle from discovery to developer handoff and
                            user acceptance testing.</li>
                        <li>Work with BAs, product managers and tech teams to lead the Product Design</li>
                        <li>Maintain quality of the design process and ensure that when designs are translated into code
                            they accurately reflect the design specifications.</li>
                        <li>Accurately estimate design tickets during planning sessions.</li>
                        <li>Contribute to sketching sessions involving non-designersCreate, iterate and maintain UI
                            deliverables including sketch files, style guides, high fidelity prototypes, micro interaction
                            specifications and pattern libraries.</li>
                        <li>Ensure design choices are data led by identifying assumptions to test each sprint, and work with
                            the analysts in your team to plan moderated usability test sessions.</li>
                        <li>Design pixel perfect responsive UI’s and understand that adopting common interface patterns is
                            better for UX than reinventing the wheel</li>
                        <li>Present your work to the wider business at Show & Tell sessions.</li>
                    </ul>
                    <strong class="mb-4">Skill & Experience</strong>
                    <ul class="mb-5">
                        @php
                            $string = $job['skills'];
                            $array = explode(',', $string);
                        @endphp
                        @foreach ($array as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                    <div class="social-media-left row">
                        <strong class="col-lg-3">Share this post</strong>
                        <div class="col-lg-9 d-flex justify-content-between">
                                                      
                            <a href="#" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(document.URL) + '&t=' + encodeURIComponent(document.title), 'facebook-share-window', 'height=450, width=550'); return false;" class="social-btn fb-btn">
                                <svg width="11" height="20" viewBox="0 0 11 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10.0098 11.25L10.5652 7.63047H7.09219V5.28164C7.09219 4.29141 7.57734 3.32617 9.13281 3.32617H10.7117V0.244531C10.7117 0.244531 9.27891 0 7.90898 0C5.04883 0 3.1793 1.73359 3.1793 4.87187V7.63047H0V11.25H3.1793V20H7.09219V11.25H10.0098Z"
                                        fill="white" />
                                </svg>&nbsp;
                                Facebook
                            </a>
                            <a href="#" onclick="window.open('https://twitter.com/intent/tweet?url=' + encodeURIComponent(document.URL) + '&text=' + encodeURIComponent(document.title), 'twitter-share-window', 'height=450, width=550'); return false;" class="social-btn twtr-btn">
                                <svg width="19" height="15" viewBox="0 0 19 15" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M18.4516 1.77927C17.7731 2.07995 17.0442 2.28311 16.2778 2.37493C17.0685 1.90181 17.6601 1.15718 17.9421 0.279967C17.1992 0.721218 16.3862 1.03181 15.5383 1.19824C14.9682 0.58947 14.213 0.185967 13.39 0.050377C12.567 -0.0852125 11.7223 0.0546982 10.987 0.448387C10.2517 0.842076 9.66689 1.46752 9.32346 2.22761C8.98002 2.9877 8.89714 3.83991 9.08767 4.65193C7.58242 4.57635 6.10988 4.18511 4.76562 3.5036C3.42136 2.82209 2.23542 1.86554 1.28477 0.696035C0.959719 1.25675 0.772814 1.90686 0.772814 2.59922C0.772451 3.22251 0.92594 3.83624 1.21966 4.38598C1.51339 4.93572 1.93826 5.40446 2.45659 5.75061C1.85546 5.73148 1.2676 5.56905 0.741934 5.27684V5.3256C0.741873 6.19978 1.04426 7.04707 1.59778 7.72368C2.15131 8.40029 2.92188 8.86456 3.77874 9.03771C3.2211 9.18863 2.63645 9.21086 2.06896 9.10272C2.31072 9.8549 2.78164 10.5127 3.41579 10.9839C4.04995 11.4551 4.81559 11.7163 5.60554 11.7308C4.26456 12.7835 2.60846 13.3545 0.903647 13.352C0.601658 13.3521 0.299923 13.3344 0 13.2992C1.73048 14.4118 3.74489 15.0023 5.8022 15C12.7665 15 16.5736 9.23193 16.5736 4.22936C16.5736 4.06683 16.5696 3.90268 16.5623 3.74016C17.3028 3.20461 17.942 2.54144 18.45 1.78171L18.4516 1.77927Z"
                                        fill="#35A1F2" />
                                </svg>&nbsp;
                                Twitter
                            </a>
                            <a href="#" onclick="window.open('https://pinterest.com/pin/create/button/?url=' + encodeURIComponent(document.URL) + '&text=' + encodeURIComponent(document.title), 'pinterest-share-window', 'height=450, width=750'); return false;" class="social-btn pntrst-btn">
                                <svg width="16" height="20" viewBox="0 0 16 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M6.39623 13.2274C5.87023 15.9814 5.22923 18.6214 3.32823 20.0004C2.74223 15.8384 4.18923 12.7134 4.86223 9.39543C3.71523 7.46543 5.00023 3.58343 7.41723 4.54043C10.3922 5.71643 4.84123 11.7124 8.56723 12.4624C12.4582 13.2434 14.0462 5.71243 11.6332 3.26343C8.14823 -0.274572 1.48723 3.18043 2.30723 8.24543C2.50623 9.48343 3.78523 9.85843 2.81823 11.5674C0.587231 11.0734 -0.078769 9.31343 0.00723097 6.96743C0.145231 3.12743 3.45623 0.440428 6.77823 0.0674279C10.9792 -0.403572 14.9222 1.61043 15.4672 5.56143C16.0802 10.0224 13.5712 14.8544 9.07823 14.5064C7.86023 14.4114 7.35023 13.8074 6.39623 13.2274Z"
                                        fill="white" />
                                </svg>&nbsp;
                                Pinterest
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="job-overview grey-bg mb-3">
                        <div class="sidebar-title">Job Overview</div>
                        <ul class="list-overview">
                            <li class="post-date">
                                <strong>Date Posted</strong>
                                <span>{{ date_format($job['created_at'],"M d,Y") }}</span>
                            </li>
                            <li class="location">
                                <strong>Location</strong>
                                <span>{{ $job['country'] }}</span>
                            </li>
                            <li class="offered-salary">
                                <strong>Offered Salary:</strong>
                                <span>${{ $job['salaryFrom'] }} - ${{ $job['salaryTo'] }} / week</span>
                            </li>
                            <li class="expiration-date">
                                <strong>Expiration date</strong>
                                <span>{{ date("M d, Y", strtotime($job['deadline'])) }}</span>
                            </li>
                            {{-- <li class="Experience">
                                <strong>experience</strong>
                                <span>3 Year</span>
                            </li> --}}
                            {{-- <li class="gender">
                                <strong>Gender</strong>
                                <span>Male</span>
                            </li> --}}
                            {{-- <li class="qualification">
                                <strong>Qualification</strong>
                                <span>Certificate</span>
                            </li> --}}
                            {{-- <li class="career-level">
                                <strong>Career Level</strong>
                                <span>Manager</span>
                            </li> --}}
                        </ul>
                    </div>
                    <div class="job-location grey-bg">
                        <div class="sidebar-title">Job Location</div>
                        <div class="sidebar-map">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3929.637032435699!2d76.28798331428173!3d9.964126276386063!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3b0872b72eb96457%3A0xf0f993910b89e1d7!2sReubro%20International!5e0!3m2!1sen!2sin!4v1667965144321!5m2!1sen!2sin"
                                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-left mb-3"><strong>Related Jobs</strong></div>
            <div class="row job-box-wrap related-jobs">
                <div class="col-md-8">
                    <div class="row">
                        <a href="{{ url('user/job-detail', base64_encode($relatedJob->id)) }}" class="job-box job-box-type1 col-md-8">
                            <span class="job-title-sec">
                                <strong class="title-icon blue-bg"><svg width="23" height="33"
                                        viewBox="0 0 23 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M10.045 26.19C10.7917 26.19 11.6317 26.3183 12.565 26.575C13.4983 26.8317 14.4433 27.1583 15.4 27.555C16.3567 27.975 16.9633 28.22 17.22 28.29C18.3167 28.64 20.0083 28.815 22.295 28.815C22.2017 29.7017 22.05 30.4717 21.84 31.125C21.6533 31.7783 21.3967 32.315 21.07 32.735C19.32 32.6417 17.7683 32.3383 16.415 31.825C16.0417 31.685 15.365 31.3933 14.385 30.95C13.405 30.53 12.5417 30.2033 11.795 29.97C11.0483 29.76 10.3367 29.655 9.66 29.655C9.00667 29.655 8.07333 29.795 6.86 30.075C5.67 30.3783 5.06333 30.53 5.04 30.53C4.2 29.8067 3.78 29.0017 3.78 28.115C5.20333 27.4617 6.41667 26.9717 7.42 26.645C8.44667 26.3417 9.32167 26.19 10.045 26.19ZM11.55 21.71C15.4233 21.71 17.36 18.735 17.36 12.785C17.36 6.835 15.4233 3.86 11.55 3.86C9.87 3.86 8.4 4.11667 7.14 4.63C6.06667 6.87 5.53 9.47167 5.53 12.435C5.53 15.375 5.97333 17.6617 6.86 19.295C7.74667 20.905 9.31 21.71 11.55 21.71ZM11.55 0.0799996C15.4467 0.0799996 18.1883 1.10667 19.775 3.16C21.3617 5.19 22.155 8.305 22.155 12.505C22.155 15.1417 21.8167 17.3933 21.14 19.26C20.4633 21.1267 19.32 22.62 17.71 23.74C16.1 24.86 14.0467 25.42 11.55 25.42C7.74667 25.42 4.98167 24.3583 3.255 22.235C1.55167 20.1117 0.7 17.02 0.7 12.96C0.7 4.37333 4.31667 0.0799996 11.55 0.0799996Z"
                                            fill="white" />
                                    </svg>
                                </strong>
                                <span class="job-title">
                                    <h4>{{ $relatedJob->title }}</h4>
                                    <span class="featured">Featured</span>
                                    <span class="job-info-sec">
                                        <ul class="job-info mb-2">
                                            <li class="job-name">
                                                <span><svg width="17" height="15" viewBox="0 0 17 15"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M1.15385 5.76928H15V4.61543C15 4.30941 14.8784 4.01593 14.662 3.79954C14.4457 3.58315 14.1522 3.46159 13.8462 3.46159H2.30769C2.00167 3.46159 1.70819 3.58315 1.4918 3.79954C1.27541 4.01593 1.15385 4.30941 1.15385 4.61543V5.76928ZM1.15385 6.92312V12.6924C1.15385 12.9984 1.27541 13.2919 1.4918 13.5082C1.70819 13.7246 2.00167 13.8462 2.30769 13.8462H13.8462C14.1522 13.8462 14.4457 13.7246 14.662 13.5082C14.8784 13.2919 15 12.9984 15 12.6924V6.92312H1.15385ZM2.30769 2.30774H13.8462C14.4582 2.30774 15.0452 2.55087 15.4779 2.98365C15.9107 3.41642 16.1538 4.00339 16.1538 4.61543V12.6924C16.1538 13.3044 15.9107 13.8914 15.4779 14.3241C15.0452 14.7569 14.4582 15 13.8462 15H2.30769C1.69565 15 1.10868 14.7569 0.675907 14.3241C0.243131 13.8914 0 13.3044 0 12.6924V4.61543C0 4.00339 0.243131 3.41642 0.675907 2.98365C1.10868 2.55087 1.69565 2.30774 2.30769 2.30774Z"
                                                            fill="#A0A0A0"></path>
                                                        <path
                                                            d="M5.76908 1.15385V2.30769H10.3845V1.15385H5.76908ZM5.76908 0H10.3845C10.6905 0 10.984 0.121566 11.2004 0.337954C11.4167 0.554342 11.5383 0.847827 11.5383 1.15385V2.30769C11.5383 2.61371 11.4167 2.9072 11.2004 3.12358C10.984 3.33997 10.6905 3.46154 10.3845 3.46154H5.76908C5.46306 3.46154 5.16958 3.33997 4.95319 3.12358C4.7368 2.9072 4.61523 2.61371 4.61523 2.30769V1.15385C4.61523 0.847827 4.7368 0.554342 4.95319 0.337954C5.16958 0.121566 5.46306 0 5.76908 0Z"
                                                            fill="#A0A0A0"></path>
                                                    </svg>
                                                </span>
                                                {{ $relatedJob->skills }}
                                            </li>
                                            <li class="company-location">
                                                <span><svg width="12" height="15" viewBox="0 0 12 15"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M5.89287 8.57142C5.3631 8.57142 4.84522 8.41433 4.40473 8.12C3.96424 7.82568 3.62092 7.40734 3.41819 6.9179C3.21546 6.42845 3.16241 5.88988 3.26576 5.37029C3.36912 4.8507 3.62423 4.37342 3.99883 3.99882C4.37344 3.62421 4.85071 3.3691 5.3703 3.26575C5.8899 3.1624 6.42847 3.21544 6.91791 3.41817C7.40736 3.62091 7.82569 3.96423 8.12002 4.40472C8.41434 4.84521 8.57144 5.36308 8.57144 5.89285C8.57059 6.60299 8.28811 7.2838 7.78596 7.78595C7.28382 8.28809 6.60301 8.57057 5.89287 8.57142ZM5.89287 4.28571C5.575 4.28571 5.26428 4.37997 4.99999 4.55656C4.73569 4.73316 4.5297 4.98416 4.40806 5.27782C4.28642 5.57149 4.25459 5.89463 4.3166 6.20639C4.37862 6.51815 4.53168 6.80451 4.75645 7.02927C4.98121 7.25404 5.26757 7.4071 5.57933 7.46911C5.89108 7.53113 6.21423 7.4993 6.50789 7.37766C6.80156 7.25602 7.05256 7.05003 7.22916 6.78573C7.40575 6.52144 7.50001 6.21071 7.50001 5.89285C7.49958 5.46674 7.33012 5.05821 7.02882 4.7569C6.72751 4.45559 6.31898 4.28613 5.89287 4.28571Z"
                                                            fill="#AFAFAF"></path>
                                                        <path
                                                            d="M5.89286 15L1.37358 9.67018C1.31078 9.59015 1.24864 9.50961 1.18715 9.42857C0.415174 8.41167 -0.00186492 7.16958 6.2694e-06 5.89286C6.2694e-06 4.32997 0.620859 2.8311 1.72598 1.72598C2.83111 0.620853 4.32998 0 5.89286 0C7.45575 0 8.95462 0.620853 10.0597 1.72598C11.1649 2.8311 11.7857 4.32997 11.7857 5.89286C11.7876 7.169 11.3707 8.41053 10.5991 9.42696L10.5986 9.42857C10.5986 9.42857 10.4379 9.63964 10.4138 9.66804L5.89286 15ZM2.04215 8.78304C2.04322 8.78304 2.16751 8.94804 2.1959 8.98339L5.89286 13.3436L9.59465 8.9775C9.61822 8.94804 9.74358 8.78196 9.74411 8.78143C10.3747 7.9506 10.7155 6.93591 10.7143 5.89286C10.7143 4.61413 10.2063 3.38779 9.30213 2.48359C8.39793 1.5794 7.17159 1.07143 5.89286 1.07143C4.61414 1.07143 3.38779 1.5794 2.4836 2.48359C1.57941 3.38779 1.07143 4.61413 1.07143 5.89286C1.07031 6.93656 1.41149 7.95183 2.04268 8.78304H2.04215Z"
                                                            fill="#AFAFAF"></path>
                                                    </svg>
                                                </span>
                                                {{ $relatedJob->country }}
                                            </li>
                                            <li class="work-price">
                                                <span><svg width="19" height="15" viewBox="0 0 19 15"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M16.25 0H0V12.5H16.25V0ZM15 11.25H1.25V1.25H15V11.25Z"
                                                            fill="#A0A0A0"></path>
                                                        <path d="M17.5 3.125V13.75H3.125V15H18.75V3.125H17.5Z"
                                                            fill="#A0A0A0"></path>
                                                        <path
                                                            d="M8.125 9.31484C9.67578 9.31484 10.9375 7.9423 10.9375 6.25523C10.9375 4.56816 9.67578 3.19562 8.125 3.19562C6.57422 3.19562 5.3125 4.56813 5.3125 6.25523C5.3125 7.94234 6.57422 9.31484 8.125 9.31484ZM8.125 4.44562C8.98656 4.44562 9.6875 5.25742 9.6875 6.25523C9.6875 7.25305 8.98656 8.06484 8.125 8.06484C7.26344 8.06484 6.5625 7.25305 6.5625 6.25523C6.5625 5.25742 7.26344 4.44562 8.125 4.44562ZM2.5 2.8125H3.75V9.6875H2.5V2.8125ZM12.5 2.8125H13.75V9.6875H12.5V2.8125Z"
                                                            fill="#A0A0A0"></path>
                                                    </svg>
                                                </span>
                                                ${{ $relatedJob->salaryFrom }} - ${{ $relatedJob->salaryTo }} / week
                                            </li>
                                        </ul>
                                        <span class="req-info-box">
                                            <span class="full-time">{{ ucfirst($relatedJob->type) }}</span>
                                            <span class="urgent ml-2">Urgent</span>
                                        </span>
                                    </span>
                                </span>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
