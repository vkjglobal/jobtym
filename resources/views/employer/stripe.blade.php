@extends('employer.layouts.app')
@section('content')
    <div class="container">
        <div class='row'>
            <div class='col-md-12'>
                <div class="card">
                    <div class="card-header">
                        Payment here to create more jobs
                    </div>
                    <div class="card-body">
                        @if (Session::has('error'))
                            <font color="red">{{ Session::get('error') }}</font>
                        @endif
                        <form class="form-horizontal" method="post" id="payment-form" role="form"
                            action="{!! route('employer.addmoney.stripe') !!}">
                            @csrf
                            <div class="mb-3">
                                <label class='control-label'>Card Number</label>
                                <input autocomplete='off' class='form-control card-number' size='20' type='text' name="card_no" required>
                            </div>
                            <div class="row g-3 align-items-center">
                                <div class="col-auto">
                                    <label class='control-label'>CVV</label>
                                    <input autocomplete='off' class='form-control card-cvc' placeholder='ex. 311' size='4' type='text' name="cvvNumber" required>
                                </div>
                                <div class="col-auto">
                                    <label class='control-label'>Expiration</label>
                                    <input class='form-control card-expiry-month' placeholder='MM' size='4' type='text' name="ccExpiryMonth" required>
                                </div>
                                <div class="col-auto">
                                    <label class='control-label'>Year</label>
                                    <input class='form-control card-expiry-year' placeholder='YYYY' size='4' type='text' name="ccExpiryYear" required>
                                    <input class='form-control card-expiry-year' placeholder='YYYY' size='4' type='hidden' name="amount" value="300" required>
                                </div>
                            </div>

                            <div class="mb-3" style="padding-top:20px;">
                                <h5 class='total'>Total:<span class='amount'>$10</span></h5>
                            </div>

                            <div class="mb-3">
                                <button class='form-control btn btn-success submit-button' type='submit'>Pay »</button>
                            </div>

                            <div class="mb-3">
                                <div class='alert-danger alert' style="display:none;">
                                    Please correct the errors and try again.
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
