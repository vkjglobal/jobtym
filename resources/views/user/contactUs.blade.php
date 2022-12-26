@extends('user.layouts.app')

@section('content')
<section class="main-title-wrp d-flex align-items-center">
    <div class="container">
        <h2>Contact Us</h2>
    </div>
</section>
<section class="contact-page white-bg">
    <div class="container">
        <div class="row justify-content-center flex-md-wrap-reverse">
            <div class="col-lg-8 col-md-10">
                <form action="" class="row contact-form">
                    <div class="form-group col-md-12 pb-3">
                        <strong>Leave A Message</strong>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="name1">Name</label>
                        <input type="text" class="form-control" id="name1" placeholder="">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="e-mail1">Email</label>
                        <input type="email" class="form-control" id="e-mail1" placeholder="">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="subject">Subject</label>
                        <input type="text" class="form-control" id="subject" placeholder="">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="yourComment">Your Comment</label>
                        <textarea class="form-control" name="" id="yourComment" cols="10" rows="5"></textarea>
                    </div>
                    <div class="form-group col-md-6">
                        <a href="" class="btn-typ1">Send Message</a>
                    </div>
                </form>
            </div>
            <div class="col-lg-8 col-md-10">
                <div class="row">
                    <div class="col-md-4 contact-details">
                        <div class="icon-wrp">
                            <svg width="44" height="54" viewBox="0 0 44 54" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M22 29.5C26.1421 29.5 29.5 26.1421 29.5 22C29.5 17.8579 26.1421 14.5 22 14.5C17.8579 14.5 14.5 17.8579 14.5 22C14.5 26.1421 17.8579 29.5 22 29.5Z" stroke="black" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M22 2C16.6957 2 11.6086 4.10714 7.85786 7.85786C4.10714 11.6086 2 16.6957 2 22C2 26.73 3.005 29.825 5.75 33.25L22 52L38.25 33.25C40.995 29.825 42 26.73 42 22C42 16.6957 39.8929 11.6086 36.1421 7.85786C32.3914 4.10714 27.3043 2 22 2V2Z" stroke="black" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                        </div>
                        <strong>Address</strong>
                        <address>
                            329 Queensberry Street, North
                        Melbourne VIC 3051, Australia.
                        </address>
                    </div>
                    <div class="col-md-4 contact-details">
                        <div class="icon-wrp">
                            <svg width="39" height="50" viewBox="0 0 39 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M6.98248 1.16471L9.88614 0.29137C11.4768 -0.188286 13.1876 -0.0728197 14.6994 0.616222C16.2112 1.30526 17.4206 2.52081 18.102 4.03604L20.3463 9.02726C20.9322 10.3306 21.0953 11.7846 20.8129 13.1853C20.5304 14.586 19.8165 15.8632 18.7713 16.8376L15.054 20.3036C14.9454 20.4048 14.8765 20.5416 14.86 20.6892C14.7505 21.677 15.4198 23.6003 16.9624 26.2751C18.0846 28.2184 19.1022 29.5843 19.9656 30.3482C20.5678 30.8832 20.8987 30.9976 21.0405 30.9578L26.0417 29.4276C27.4075 29.0098 28.8697 29.0299 30.2235 29.4851C31.5773 29.9402 32.7547 30.8075 33.5907 31.9655L36.7781 36.3845C37.7473 37.7283 38.196 39.3781 38.0409 41.0278C37.8858 42.6774 37.1374 44.2147 35.9346 45.3542L33.7301 47.4443C32.5601 48.5523 31.123 49.3384 29.559 49.726C27.9949 50.1136 26.3571 50.0896 24.8051 49.6562C17.9527 47.7429 11.8095 41.9604 6.3057 32.4283C0.794449 22.8838 -1.13884 14.6629 0.642672 7.76328C1.0437 6.21151 1.8377 4.7892 2.94813 3.63345C4.05856 2.47769 5.44798 1.62747 6.98248 1.16471ZM8.05984 4.74018C7.13941 5.0175 6.30589 5.52715 5.63957 6.22005C4.97325 6.91296 4.49658 7.76577 4.25546 8.69634C2.7576 14.4987 4.47193 21.7865 9.5378 30.5622C14.5962 39.3255 20.0428 44.451 25.8103 46.0634C26.7412 46.3226 27.7234 46.3365 28.6612 46.1037C29.5991 45.8709 30.4607 45.3992 31.1623 44.7347L33.3693 42.6446C33.9162 42.1266 34.2565 41.4276 34.327 40.6776C34.3975 39.9276 34.1933 39.1774 33.7525 38.5666L30.5676 34.1501C30.1876 33.6231 29.6521 33.2284 29.0362 33.0214C28.4204 32.8143 27.7552 32.8053 27.134 32.9956L22.1204 34.5308C19.2092 35.3967 16.5668 33.0553 13.7303 28.1412C11.8194 24.832 10.9287 22.2692 11.1501 20.2762C11.2671 19.2411 11.7473 18.2857 12.5087 17.5741L16.2259 14.1081C16.7012 13.6652 17.0259 13.0846 17.1544 12.4478C17.283 11.8111 17.2089 11.15 16.9425 10.5575L14.6982 5.56625C14.3885 4.87804 13.8391 4.32593 13.1524 4.01282C12.4658 3.6997 11.6887 3.64693 10.966 3.86435L8.05984 4.74018Z" fill="black"/>
                            </svg>                                    
                        </div>
                        <strong>Call Us</strong>
                        <a href="tel:123 456 7890">123 456 7890</a>
                    </div>
                    <div class="col-md-4 contact-details">
                        <div class="icon-wrp">
                            <svg width="47" height="37" viewBox="0 0 47 37" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.99916 3.83333H8L38.3333 3.83333L38.334 3.83333C39.0773 3.83236 39.8027 4.031 40.4367 4.4026L23.1667 15.6172L5.89639 4.40247C6.5304 4.03071 7.25585 3.83209 7.99916 3.83333ZM22.8944 19.414L23.6667 19.9155V19.2639L42.403 7.10071C42.4666 7.38952 42.5 7.69046 42.5 8V29C42.5 30.1051 42.061 31.1649 41.2796 31.9463C40.4982 32.7277 39.4384 33.1667 38.3333 33.1667H8C6.89493 33.1667 5.83512 32.7277 5.05372 31.9463C4.27232 31.1649 3.83333 30.1051 3.83333 29V8V7.9997C3.83315 7.69693 3.86607 7.39569 3.93109 7.10126L22.8944 19.414ZM38.3333 0.5H8C6.01088 0.5 4.10322 1.29018 2.6967 2.6967C1.29018 4.10322 0.5 6.01088 0.5 8V29C0.5 30.9891 1.29018 32.8968 2.6967 34.3033C4.10322 35.7098 6.01088 36.5 8 36.5H38.3333C40.3225 36.5 42.2301 35.7098 43.6366 34.3033C45.0432 32.8968 45.8333 30.9891 45.8333 29V8C45.8333 6.01088 45.0432 4.10322 43.6366 2.6967C42.2301 1.29018 40.3225 0.5 38.3333 0.5Z" fill="black" stroke="black"/>
                            </svg>
                        </div>
                        <strong>Email</strong>
                        <a href="mailto:contact.jobtym@info.com">contact.jobtym@info.com</a>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</section>
@endsection