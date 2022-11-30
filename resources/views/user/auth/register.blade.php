@extends('user.layouts.app')

@section('content')
    <section class="register-page">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4">
                    <!--<img src="images/registerpage-info-img.svg" alt="">-->
                    <svg width="283" height="219" viewBox="0 0 283 219" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M25.9847 200.939C29.8001 204.437 35.5231 207.961 37.9078 209.286H53.8052C55.7924 204.781 59.7667 195.137 59.7667 192.593C59.7667 189.414 59.3693 185.439 58.5744 183.055C57.7796 180.67 54.6001 176.298 51.818 171.927C49.036 167.555 50.2283 169.145 50.2283 165.568C50.2283 161.991 50.2283 161.196 48.2411 153.645C46.2539 146.093 43.8693 147.286 39.1001 143.311C34.3309 139.337 31.9462 138.542 29.1642 135.362C26.3821 132.183 27.5744 128.209 26.7796 121.452C25.9847 114.696 25.9847 115.093 20.4206 112.709C14.8565 110.324 6.51034 107.939 4.92059 111.516C3.33084 115.093 2.13854 115.888 0.548797 120.657C-1.04095 125.427 0.946233 127.414 4.92059 132.58C8.89495 137.747 11.677 143.311 11.677 144.504C11.677 145.696 10.4847 149.273 9.29238 153.645C8.10007 158.016 8.89495 157.221 9.29238 161.196C9.68982 165.17 11.2796 163.978 15.6514 167.555C20.0231 171.132 20.4206 174.709 23.2026 177.491C25.9847 180.273 22.8052 179.875 22.0103 183.055C21.2155 186.234 20.4206 187.427 20.4206 191.401C20.4206 195.375 21.2155 196.568 25.9847 200.939Z"
                            fill="#CDE7FC" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M16.6922 131.154L38.9486 187.59L39.8788 187.223L27.7282 156.412L28.6152 156.59L30.9998 144.667L30.0192 144.471L27.6636 156.249L17.6224 130.787L16.6922 131.154ZM15.8973 158.974L30.205 166.923L29.7193 167.797L15.4116 159.849L15.8973 158.974Z"
                            fill="#6C97ED" />
                        <path
                            d="M54.9783 112.574L58.8205 109.692L61.881 112.635L88.6282 112.872V207.5H72.7308V131.551H68.7564L64.5 207.5H38L43.718 112.474L54.9783 112.574Z"
                            fill="white" />
                        <path
                            d="M47.6923 118.038L58.8205 109.692L69.1539 119.628L67.5641 121.218L63.9872 118.833L68.7564 124L66.3718 125.59L62.3975 120.423L66.3718 126.385L64.7821 127.577L60.0129 122.41L63.9872 127.974L62 129.962L57.6282 124.397L61.2052 130.756L59.218 131.551L48.0898 118.038H47.6923ZM88.6282 112.872L43.718 112.474L38 207.5H64.5L68.7564 131.551H72.7308V207.5H88.6282V112.872Z"
                            stroke="#BACEFC" />
                        <path d="M37 219L47.5 208H61V219H37Z" fill="#1C69B5" />
                        <path d="M80 218.5V209.5V208H92V218.5H80Z" fill="#1C69B5" />
                        <path d="M37 219L47.5 208H61V219H37Z" stroke="#3E9FFF" />
                        <path d="M80 218.5V209.5V208H92V218.5H80Z" stroke="#3E9FFF" />
                        <path
                            d="M82.2692 20.2692C81.6333 22.4949 79.6197 24.3761 78.6923 25.0385C78.0299 25.3034 76.1487 25.9128 73.923 26.2308C71.1408 26.6282 67.564 23.4487 66.7691 22.6538C66.1332 22.018 65.1794 19.4744 64.782 18.2821H63.9871C63.5897 18.2821 63.1923 17.4872 62 16.6923C60.8077 15.8974 61.6026 15.1026 61.6026 13.9103C61.6026 12.7179 62.3974 11.9231 63.1923 11.5256C63.9872 11.1282 64.3846 11.1282 65.1795 11.1282C65.9744 11.1282 66.7692 11.5256 66.7692 11.1282C66.7692 10.7308 67.1667 10.7308 69.5513 9.14103C71.9359 7.55128 74.3205 7.55128 76.7051 7.94872C79.0897 8.34615 80.6795 10.7308 81.8718 12.7179C83.0641 14.7051 83.0641 17.4872 82.2692 20.2692Z"
                            fill="white" stroke="#BACEFC" />
                        <path
                            d="M60.0129 108.897L46.1026 119.231C43.8505 117.376 38.7899 113.031 36.5642 110.487C33.7822 107.308 28.6154 102.141 25.0385 93C21.4616 83.859 23.4488 73.9231 25.0385 65.9743C26.6283 58.0256 36.5642 45.7051 43.3206 40.9359C48.7257 37.1205 59.3505 34.047 63.9872 32.9872C64.1197 33.5171 64.5436 34.8949 65.1795 36.1667C65.9744 37.7564 68.359 38.1538 70.3462 38.9487C72.3334 39.7436 74.718 37.7564 75.9103 36.1667C77.1026 34.5769 77.5001 32.5897 77.5001 32.5897C77.5001 32.5897 90.2181 34.1795 97.7693 38.1538C103.81 41.3333 109.56 50.6068 111.68 54.4487H88.6283V112.474H64.3847C63.1924 110.355 59.7744 105.162 55.6411 101.346C50.4744 96.5769 46.1026 88.2308 44.1154 82.6667C42.5257 78.2154 43.453 71.8034 44.1154 69.1538C43.1881 70.4786 41.3334 74.082 41.3334 77.8974C41.3334 82.6667 42.1283 84.6538 44.1154 89.4231C45.7052 93.2385 55.3761 103.996 60.0129 108.897Z"
                            fill="#3E9FFF" />
                        <path
                            d="M65.5771 20.2692L64.7822 22.6538L62.0001 19.8718C60.4103 18.2821 59.6155 14.3077 60.0129 11.1282C60.4103 7.94872 61.6027 5.96154 64.7822 3.57692C67.9617 1.19231 71.936 0 76.3078 0C80.6796 0 83.0642 1.98718 83.0642 3.17949C83.0642 4.37179 83.0642 5.96154 81.8719 7.94872C80.918 9.53847 80.6796 10.7308 80.6796 11.1282C80.0172 10.3333 78.2155 8.58462 76.3078 7.94872C73.9232 7.15385 72.7308 7.55128 70.3462 8.34616C68.4385 8.98205 67.1667 10.7308 66.7693 11.5256C66.6368 11.5256 66.1334 11.4462 65.1796 11.1282C63.9873 10.7308 63.1925 11.1282 62.3976 11.9231C61.6027 12.718 61.2053 13.9103 61.6027 15.5C62.0002 17.0897 64.7822 17.8846 64.7822 18.6795C64.7822 19.3154 65.3121 20.0043 65.5771 20.2692Z"
                            fill="#3E9FFF" />
                        <path
                            d="M68.7563 38.5513C65.8948 37.9154 64.3845 34.8419 63.9871 33.3846L64.3845 20.2692C64.6495 20.4017 65.4178 20.9846 66.3717 22.2564C67.564 23.8462 69.5512 24.641 71.9358 25.5849C73.8435 26.3401 76.705 25.8996 77.8973 25.5849V32.9872C77.8973 34.1795 76.705 35.3718 74.7178 37.7564C72.7306 40.141 72.3332 39.3462 68.7563 38.5513Z"
                            fill="#F9F9F9" stroke="#BACEFC" />
                        <rect x="89.0256" y="54.0513" width="168.513" height="159.769" fill="#CDE8FC" />
                        <rect x="112.077" y="84.2564" width="121.615" height="19.8718" fill="white" />
                        <rect x="112.077" y="109.692" width="121.615" height="19.8718" fill="white" />
                        <rect x="112.077" y="139.103" width="121.615" height="19.8718" fill="white" />
                        <path d="M269.461 217.41H228.923L223.359 181.244H274.231L269.461 217.41Z" fill="#3E9FFF"
                            stroke="#267FD8" />
                        <path
                            d="M243.628 156.205C240.131 149.846 232.368 148.786 228.923 149.051V153.423C228.923 156.205 230.91 158.987 236.872 165.346C241.641 170.433 247.603 171.705 249.987 171.705C250.517 171.44 252.451 170.354 255.949 168.128C260.321 165.346 264.295 162.564 267.474 157C270.018 152.549 269.329 150.111 268.667 149.449C265.885 150.376 259.128 153.185 254.359 157C249.59 160.815 248.927 165.214 249.192 166.936C248.795 166.009 247.126 162.564 243.628 156.205Z"
                            fill="#3E9FFF" />
                        <line x1="233.251" y1="153.467" x2="246.764" y2="166.98" stroke="white" />
                        <line x1="250.059" y1="166.954" x2="266.752" y2="152.646" stroke="white" />
                        <g filter="url(#filter0_d_295_971)">
                            <rect x="219.385" y="171.308" width="59.6154" height="10.3333" fill="white" />
                            <rect x="219.885" y="171.808" width="58.6154" height="9.33333" stroke="#C4D8E8" />
                        </g>
                        <rect x="136.718" y="170.103" width="73.9231" height="20.6667" fill="#3E9FFF" />
                        <defs>
                            <filter id="filter0_d_295_971" x="215.385" y="171.308" width="67.6155"
                                height="18.3333" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                <feColorMatrix in="SourceAlpha" type="matrix"
                                    values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                                <feOffset dy="4" />
                                <feGaussianBlur stdDeviation="2" />
                                <feComposite in2="hardAlpha" operator="out" />
                                <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0" />
                                <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_295_971" />
                                <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_295_971"
                                    result="shape" />
                            </filter>
                        </defs>
                    </svg>
                    <div class="txt-bx-left">
                        <strong>On registering, you can</strong>
                        <ul>
                            <li>Build your profile and let
                                recruiters find you</li>
                            <li>Get job postings delivered
                                right to your email</li>
                            <li>Find a job and grow your
                                career</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-8">
                    <form method="POST" action="{{ route('user.register.save') }}" class="register-form register-form-modal" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body row">
                            <div class="register-tab col-12" id="Register1">
                                <div class="">
                                    <div class="card-header">
                                        <ul class="nav row" role="tablist" data-background-color="orange">
                                            <li class="form-group col-md-6 slct-cnddt">
                                                <a class="btn-typ1 active" data-toggle="tab" href="#cAndidate"
                                                    role="tab"><svg width="12" height="18"
                                                        viewBox="0 0 12 18" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M10 4C10 5.06087 9.57857 6.07828 8.82843 6.82843C8.07828 7.57857 7.06087 8 6 8C4.93913 8 3.92172 7.57857 3.17157 6.82843C2.42143 6.07828 2 5.06087 2 4C2 2.93913 2.42143 1.92172 3.17157 1.17157C3.92172 0.421427 4.93913 0 6 0C7.06087 0 8.07828 0.421427 8.82843 1.17157C9.57857 1.92172 10 2.93913 10 4ZM8 4C8 4.53043 7.78929 5.03914 7.41421 5.41421C7.03914 5.78929 6.53043 6 6 6C5.46957 6 4.96086 5.78929 4.58579 5.41421C4.21071 5.03914 4 4.53043 4 4C4 3.46957 4.21071 2.96086 4.58579 2.58579C4.96086 2.21071 5.46957 2 6 2C6.53043 2 7.03914 2.21071 7.41421 2.58579C7.78929 2.96086 8 3.46957 8 4Z"
                                                            fill="white" />
                                                        <path
                                                            d="M10 12C10 11.7348 9.89464 11.4804 9.70711 11.2929C9.51957 11.1054 9.26522 11 9 11H3C2.73478 11 2.48043 11.1054 2.29289 11.2929C2.10536 11.4804 2 11.7348 2 12V18H0V12C0 11.2044 0.316071 10.4413 0.87868 9.87868C1.44129 9.31607 2.20435 9 3 9H9C9.79565 9 10.5587 9.31607 11.1213 9.87868C11.6839 10.4413 12 11.2044 12 12V18H10V12Z"
                                                            fill="white" />
                                                    </svg>&nbsp;&nbsp;Job seeker</a>
                                            </li>
                                            <li class="form-group col-md-6 slct-emplyr">
                                                <a class="btn-typ1" data-toggle="tab" href="#eMployer"
                                                    role="tab"><svg width="18" height="16"
                                                        viewBox="0 0 18 16" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M16 3.55556H12.4444V1.77778L10.6667 0H7.11111L5.33333 1.77778V3.55556H1.77778C0.8 3.55556 0 4.35556 0 5.33333V9.77778C0 10.4444 0.355556 11.0044 0.888889 11.3156V14.2222C0.888889 15.2089 1.68 16 2.66667 16H15.1111C16.0978 16 16.8889 15.2089 16.8889 14.2222V11.3067C17.4133 10.9956 17.7778 10.4267 17.7778 9.77778V5.33333C17.7778 4.35556 16.9778 3.55556 16 3.55556ZM7.11111 1.77778H10.6667V3.55556H7.11111V1.77778ZM1.77778 5.33333H16V9.77778H11.5556V7.11111H6.22222V9.77778H1.77778V5.33333ZM9.77778 10.6667H8V8.88889H9.77778V10.6667ZM15.1111 14.2222H2.66667V11.5556H6.22222V12.4444H11.5556V11.5556H15.1111V14.2222Z"
                                                            fill="#3E9FFF" />
                                                    </svg>&nbsp;&nbsp;Employer</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="cAndidate" role="tabpanel">
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label for="FirstName">First Name</label>
                                                    <input type="text" name="firstName" class="form-control" id="FirstName"
                                                        placeholder="">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="LastName">Last Name</label>
                                                    <input type="text" name="lastName" class="form-control" id="LastName"
                                                        placeholder="">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="eMail">Email</label>
                                                    <input type="email" name="email" class="form-control" id="eMail"
                                                        placeholder="">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="newPassword">Password</label>
                                                    <input id="newPassword" name="newPassword" type="password" class="form-control">
                                                    <span class="error-msg">Password error</span>
                                                    <span toggle="#newPassword"
                                                        class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Gender</label>
                                                    <select class="gender-dropdown form-control" name="gender">
                                                        <option disabled selected>Select Gender</option>
                                                        <option value="male">Male</option>
                                                        <option value="female">Female</option>
                                                        <option value="other">Other</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="BirthDate">Date of birth</label>
                                                    <input type="date" name="birthDate" class="form-control" id="BirthDate"
                                                        placeholder="">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="PhoneNumber">Phone</label>
                                                    <input type="text" name="phone" class="form-control" id="PhoneNumber"
                                                        placeholder="">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="SecondaryPhone">Secondary Phone</label>
                                                    <input type="text" name="secondPhone" class="form-control" id="SecondaryPhone"
                                                        placeholder="">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="CountryName">Country</label>
                                                    <input type="text" name="country" class="form-control" id="CountryName"
                                                        placeholder="">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Resident</label>
                                                    <select class="resident-dropdown form-control" name="resident">
                                                        <option selected value="yes">Yes</option>
                                                        <option value="no">No</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="StreetName">Street</label>
                                                    <input type="text" name="street" class="form-control" id="StreetName"
                                                        placeholder="">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="CityName">City</label>
                                                    <input type="text" name="city" class="form-control" id="CityName"
                                                        placeholder="">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="TownName">Town</label>
                                                    <input type="text" name="town" class="form-control" id="TownName"
                                                        placeholder="">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="DivisionName">Division</label>
                                                    <input type="text" name="division" class="form-control" id="DivisionName"
                                                        placeholder="">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="PostalCode">Postal Code</label>
                                                    <input type="text" name="postCode" class="form-control" id="PostalCode"
                                                        placeholder="">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="TINnumber">TIN</label>
                                                    <input type="text" name="tinNo" class="form-control" id="TINnumber"
                                                        placeholder="">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="VaccRefNum">Vaccination Reference Number</label>
                                                    <input type="text" name="vaccNo" class="form-control" id="VaccRefNum"
                                                        placeholder="">
                                                </div>
                                                <div class="form-group col-md-12 file-upload-resume">
                                                    <label for="file" class="">Resume</label>
                                                    <div class="input-group">
                                                        <div class="input-group-btn">
                                                            <div class="btn btn-default custom-file-uploader">
                                                                <input type="file" name="file"
                                                                    onchange="this.form.filename.value = this.files.length ? this.files[0].name : ''" />
                                                                Upload Resume
                                                            </div>
                                                            <span>DOC, DOCx, PDF, RTF | Max: 2 MB</span>
                                                        </div>
                                                        <input type="text" name="filename"
                                                            class="form-control file-name" placeholder="" readonly>
                                                    </div>
                                                    <div class="info-txt">Recruiters give first preference to candidates
                                                        who have a resume</div>
                                                </div>

                                                <div class="form-group col-md-12 chkbx">
                                                    <input type="checkbox" id="logintab">
                                                    <label for="logintab">
                                                        <span class="chk-txt">You accept our <a href="">Terms and
                                                                Conditions</a> and <a href="">Privacy
                                                                Policy</a></span>
                                                    </label>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <button type="submit" class="btn-typ1 rounded-btn100">User Register</button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-pane" id="eMployer" role="tabpanel">
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label for="EmplyrName">Name</label>
                                                    <input type="text" class="form-control" id="EmplyrName"
                                                        placeholder="">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="CompanyName">Company Name</label>
                                                    <input type="text" class="form-control" id="CompanyName"
                                                        placeholder="">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="eMailEmplyr">Email</label>
                                                    <input type="email" class="form-control" id="eMailEmplyr"
                                                        placeholder="">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="PasswordEmplyr">Password</label>
                                                    <input id="PasswordEmplyr" type="password" class="form-control"
                                                        name="password">
                                                    <span class="error-msg">Password error</span>
                                                    <span toggle="#PasswordEmplyr"
                                                        class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="PhoneNumberEmplyr">Phone</label>
                                                    <input type="text" class="form-control" id="PhoneNumberEmplyr"
                                                        placeholder="">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="CompanyPhoneEmplyr">Company Phone</label>
                                                    <input type="text" class="form-control" id="CompanyPhoneEmplyr"
                                                        placeholder="">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="TINnumberEmplyr">TIN</label>
                                                    <input type="text" class="form-control" id="TINnumberEmplyr"
                                                        placeholder="">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="StreetNameEmplyr">Street</label>
                                                    <input type="text" class="form-control" id="StreetNameEmplyr"
                                                        placeholder="">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="CityNameEmplyr">City</label>
                                                    <input type="text" class="form-control" id="CityNameEmplyr"
                                                        placeholder="">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="CountryNameEmplyr">Country</label>
                                                    <input type="text" class="form-control" id="CountryNameEmplyr"
                                                        placeholder="">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label for="AboutCompany">About</label>
                                                    <textarea name="" id="AboutCompany" class="form-control" cols="30" rows="4"></textarea>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="CompanyWebsite">Website</label>
                                                    <input type="url" class="form-control" id="CompanyWebsite"
                                                        placeholder="">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="CompanyFacebook">Facebook</label>
                                                    <input type="url" class="form-control" id="CompanyFacebook"
                                                        placeholder="">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="CompanyInstagram">Instagram</label>
                                                    <input type="url" class="form-control" id="CompanyInstagram"
                                                        placeholder="">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="CompanyLinkedIn">LinkedIn</label>
                                                    <input type="url" class="form-control" id="CompanyLinkedIn"
                                                        placeholder="">
                                                </div>
                                                <div class="form-group col-md-12 chkbx">
                                                    <input type="checkbox" id="registertab">
                                                    <label for="registertab">
                                                        <span class="chk-txt">You accept our <a href="">Terms and
                                                                Conditions</a> and <a href="">Privacy
                                                                Policy</a></span>
                                                    </label>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <a href="" class="btn-typ1 rounded-btn100">Emp Register</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group d-none col-md-12 work-status">
                                <label for="">Work Status</label>
                                <div class="d-flex justify-content-between">
                                    <span href="#" class="slct-wrk-status exprncd selected">
                                        <svg width="25" height="20" viewBox="0 0 25 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M3.75 0H21.25C22.2446 0 23.1984 0.395088 23.9017 1.09835C24.6049 1.80161 25 2.75544 25 3.75V16.25C25 17.2446 24.6049 18.1984 23.9017 18.9017C23.1984 19.6049 22.2446 20 21.25 20H3.75C2.75544 20 1.80161 19.6049 1.09835 18.9017C0.395088 18.1984 0 17.2446 0 16.25L0 3.75C0 2.75544 0.395088 1.80161 1.09835 1.09835C1.80161 0.395088 2.75544 0 3.75 0V0ZM3.75 2.5C3.41848 2.5 3.10054 2.6317 2.86612 2.86612C2.6317 3.10054 2.5 3.41848 2.5 3.75V16.25C2.5 16.5815 2.6317 16.8995 2.86612 17.1339C3.10054 17.3683 3.41848 17.5 3.75 17.5H21.25C21.5815 17.5 21.8995 17.3683 22.1339 17.1339C22.3683 16.8995 22.5 16.5815 22.5 16.25V3.75C22.5 3.41848 22.3683 3.10054 22.1339 2.86612C21.8995 2.6317 21.5815 2.5 21.25 2.5H3.75ZM17.3425 8.75C17.0645 9.8228 16.438 10.7729 15.5616 11.4512C14.6851 12.1294 13.6082 12.4974 12.5 12.4974C11.3918 12.4974 10.3149 12.1294 9.43842 11.4512C8.56196 10.7729 7.93555 9.8228 7.6575 8.75H2.5V6.25H22.5V8.75H17.3425ZM14.665 8.75H10.335C10.5544 9.13002 10.87 9.44559 11.2501 9.66499C11.6301 9.88439 12.0612 9.99989 12.5 9.99989C12.9388 9.99989 13.3699 9.88439 13.7499 9.66499C14.13 9.44559 14.4456 9.13002 14.665 8.75Z"
                                                fill="#3E9FFF" />
                                        </svg>
                                        <strong>I’m Experienced</strong>
                                        <span>I have work experience (excluding internships)</span>
                                    </span>
                                    <span href="#" class="slct-wrk-status frshr">
                                        <svg width="20" height="25" viewBox="0 0 20 25" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M15 3.75V2.5C15 1.83696 14.7366 1.20107 14.2678 0.732233C13.7989 0.263392 13.163 0 12.5 0H7.5C6.83696 0 6.20107 0.263392 5.73223 0.732233C5.26339 1.20107 5 1.83696 5 2.5V3.75C3.67392 3.75 2.40215 4.27678 1.46447 5.21447C0.526784 6.15215 0 7.42392 0 8.75V22.5C0 23.163 0.263392 23.7989 0.732233 24.2678C1.20107 24.7366 1.83696 25 2.5 25H17.5C18.163 25 18.7989 24.7366 19.2678 24.2678C19.7366 23.7989 20 23.163 20 22.5V8.75C20 7.42392 19.4732 6.15215 18.5355 5.21447C17.5979 4.27678 16.3261 3.75 15 3.75ZM7.5 2.5H12.5V3.75H7.5V2.5ZM10 8.75L12.5 11.25L10 13.75L7.5 11.25L10 8.75ZM17.5 22.5H2.5V17.5H5V20H6.25V17.5H17.5V22.5ZM17.5 16.25H2.5V8.75C2.5 8.08696 2.76339 7.45107 3.23223 6.98223C3.70107 6.51339 4.33696 6.25 5 6.25H15C15.663 6.25 16.2989 6.51339 16.7678 6.98223C17.2366 7.45107 17.5 8.08696 17.5 8.75V16.25Z"
                                                fill="#3E9FFF" />
                                        </svg>
                                        <strong>I’m Experienced</strong>
                                        <span>I have work experience (excluding internships)</span>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group d-none col-md-12 file-upload-resume">
                                <label for="file" class="">Resume</label>
                                <div class="input-group">
                                    <div class="input-group-btn">
                                        <div class="btn btn-default custom-file-uploader">
                                            <input type="file" name="file"
                                                onchange="this.form.filename.value = this.files.length ? this.files[0].name : ''" />
                                            Upload Resume
                                        </div>
                                        <span>DOC, DOCx, PDF, RTF | Max: 2 MB</span>
                                    </div>
                                    <input type="text" name="filename" class="form-control file-name" placeholder=""
                                        readonly>
                                </div>
                                <div class="info-txt">Recruiters give first preference to candidates who have a resume
                                </div>
                            </div>
                            <div class="form-group d-none col-md-12 chkbx register-new">
                                <input type="checkbox" id="register-new">
                                <label for="register-new">Send me important updates on <svg width="20" height="20"
                                        viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M0.424836 9.91308C0.42437 11.599 0.864896 13.2453 1.70255 14.6963L0.344727 19.6539L5.41825 18.3236C6.82151 19.0875 8.39377 19.4878 9.9915 19.4879H9.9957C15.2701 19.4879 19.5636 15.196 19.5659 9.92062C19.5669 7.36434 18.5723 4.96058 16.7652 3.15212C14.9585 1.34381 12.5556 0.347419 9.99532 0.346252C4.72028 0.346252 0.427092 4.63796 0.424914 9.91308"
                                            fill="url(#paint0_linear_295_952)" />
                                        <path
                                            d="M0.0832209 9.90997C0.0826764 11.6566 0.538991 13.3617 1.40651 14.8646L0 20L5.25544 18.622C6.70348 19.4115 8.33383 19.8278 9.99281 19.8284H9.99708C15.4607 19.8284 19.9085 15.3821 19.9108 9.91791C19.9117 7.26977 18.8813 4.7796 17.0097 2.90635C15.1379 1.03334 12.649 0.00108887 9.99708 0C4.5325 0 0.0854764 4.44571 0.0832987 9.90997H0.0832209ZM3.21295 14.6058L3.01672 14.2943C2.19182 12.9827 1.75643 11.467 1.75705 9.9106C1.75884 5.36884 5.45509 1.67375 10.0002 1.67375C12.2013 1.67468 14.2698 2.53271 15.8257 4.08949C17.3814 5.64642 18.2375 7.71605 18.237 9.91728C18.2349 14.459 14.5386 18.1546 9.99708 18.1546H9.99382C8.51505 18.1538 7.06475 17.7567 5.79995 17.0062L5.49896 16.8277L2.38027 17.6454L3.21295 14.6057V14.6058Z"
                                            fill="url(#paint1_linear_295_952)" />
                                        <path
                                            d="M7.51934 5.76696C7.33377 5.35451 7.13847 5.34619 6.962 5.33895C6.81749 5.33273 6.65229 5.3332 6.48725 5.3332C6.32205 5.3332 6.05364 5.39534 5.82677 5.64306C5.59966 5.89101 4.95972 6.4902 4.95972 7.70888C4.95972 8.92764 5.84738 10.1054 5.97112 10.2708C6.09502 10.436 7.68477 13.0169 10.2026 14.0098C12.2951 14.8349 12.7209 14.6708 13.175 14.6294C13.6292 14.5882 14.6406 14.0304 14.847 13.452C15.0535 12.8736 15.0535 12.3779 14.9916 12.2743C14.9297 12.1711 14.7645 12.1091 14.5167 11.9853C14.2689 11.8614 13.0511 11.2621 12.8241 11.1794C12.597 11.0968 12.4319 11.0556 12.2667 11.3036C12.1015 11.5513 11.6271 12.1091 11.4825 12.2743C11.3381 12.4399 11.1935 12.4605 10.9459 12.3366C10.698 12.2123 9.90024 11.951 8.95377 11.1072C8.21739 10.4507 7.72024 9.63984 7.57573 9.39181C7.43122 9.14417 7.56025 9.00993 7.68446 8.8865C7.79576 8.77551 7.93226 8.59725 8.05623 8.45266C8.17974 8.308 8.22096 8.20479 8.30356 8.03959C8.38624 7.87424 8.34486 7.72957 8.28303 7.60567C8.22096 7.48178 7.73961 6.2568 7.51934 5.76704"
                                            fill="white" />
                                        <defs>
                                            <linearGradient id="paint0_linear_295_952" x1="9.9553" y1="19.6539"
                                                x2="9.9553" y2="0.346252" gradientUnits="userSpaceOnUse">
                                                <stop stop-color="#1FAF38" />
                                                <stop offset="1" stop-color="#60D669" />
                                            </linearGradient>
                                            <linearGradient id="paint1_linear_295_952" x1="9.95539" y1="20"
                                                x2="9.95539" y2="0" gradientUnits="userSpaceOnUse">
                                                <stop stop-color="#F9F9F9" />
                                                <stop offset="1" stop-color="white" />
                                            </linearGradient>
                                        </defs>
                                    </svg>
                                    <strong>WhatsApp</strong></label>
                            </div>
                            <div class="form-group d-none col-md-12">
                                <div class="info-txt2">You accept our <a href="">Terms and Conditions</a> and <a
                                        href="">Privacy Policy</a></div>
                            </div>
                        </div>
                    </form>




                </div>
            </div>
        </div>
    </section>
@endsection
