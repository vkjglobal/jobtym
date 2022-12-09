@extends('user.layouts.app')

@section('content')
    <section class="otp-input-sec">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <form method="POST" action="{{ route('user.verifyotp') }}" class="col-md-8 otp-input-box text-center flex-column d-flex align-items-center">
                    @csrf
                    <strong class="fs-20 fw-600 mb-2">Please enter the One-Time Password to verify your account</strong>
                    <p class="fs-15 fw-300 mb-5">A One-Time Password has been sent to <b>{{ $email }}.</b></p>
                    <div class="d-flex justify-content-center mb-4">
                        <input type="hidden" name="email" value="{{ $email }}">
                        <input type="text" name="otp1" class="form-control" minlength="1" maxlength="1">
                        <input type="text" name="otp2" class="form-control" minlength="1" maxlength="1">
                        <input type="text" name="otp3" class="form-control" minlength="1" maxlength="1">
                        <input type="text" name="otp4" class="form-control" minlength="1" maxlength="1">
                    </div>
                    <input type="submit" value="Verify & Proceed" class="btn-typ1 rounded-btn100 w-auto fs-16 pl-5 pr-5 mb-4">
                    <button class="resend-btn">Resend One-Time Password</button>
                </form>
            </div>
        </div>
    </section>
@endsection