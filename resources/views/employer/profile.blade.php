@extends('employer.layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">{{ __('Edit Profile') }}</h6>
                        <form method="POST" action="{{ url('employer/profile',Auth::guard('employer')->user()->id ) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label">Name <span class="text-danger">*</span></label>
                                        <input type="text"
                                            class="form-control @if ($errors->has('name')) is-invalid @endif"
                                            name="name" value="{{ $employerData->name }}" placeholder="Enter your name"
                                            required>
                                        <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label">Company Name <span class="text-danger">*</span></label>
                                        <input type="text"
                                            class="form-control @if ($errors->has('company_name')) is-invalid @endif"
                                            name="company_name" value="{{ $employerData->company_name }}"
                                            placeholder="Enter company name" required>
                                        <div class="invalid-feedback">{{ $errors->first('company_name') }}</div>
                                    </div>
                                </div><!-- Col -->
                            </div><!-- Row -->
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="control-label">Email <span class="text-danger">*</span></label>
                                        <input type="email"
                                            class="form-control @if ($errors->has('email')) is-invalid @endif"
                                            name="email" value="{{ $employerData->email }}" placeholder="Enter Email" required>
                                        <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="control-label">Phone <span class="text-danger">*</span></label>
                                        <input type="text"
                                            class="form-control @if ($errors->has('phone')) is-invalid @endif"
                                            name="phone" value="{{ $employerData->phone }}" placeholder="Enter phone" required>
                                        <div class="invalid-feedback">{{ $errors->first('phone') }}</div>
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="control-label">Company Phone <span
                                                class="text-danger">*</span></label>
                                        <input type="text"
                                            class="form-control @if ($errors->has('company_phone')) is-invalid @endif"
                                            name="company_phone" value="{{ $employerData->company_phone }}"
                                            placeholder="Enter company phone" required>
                                        <div class="invalid-feedback">{{ $errors->first('company_phone') }}</div>
                                    </div>
                                </div><!-- Col -->
                            </div><!-- Row -->
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">Address <span class="text-danger">*</span></label>
                                        <textarea name="address" class="form-control @if ($errors->has('address')) is-invalid @endif" cols="30"
                                            rows="5" required>{{ $employerData->address }}</textarea>
                                        <div class="invalid-feedback">{{ $errors->first('address') }}</div>
                                    </div>
                                </div><!-- Col -->
                            </div><!-- Row -->
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="control-label">Street <span class="text-danger">*</span></label>
                                        <input type="text"
                                            class="form-control @if ($errors->has('street')) is-invalid @endif"
                                            name="street" value="{{ $employerData->street }}" placeholder="Enter Street" required>
                                        <div class="invalid-feedback">{{ $errors->first('street') }}</div>
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="control-label">City <span class="text-danger">*</span></label>
                                        <input type="text"
                                            class="form-control @if ($errors->has('city')) is-invalid @endif"
                                            name="city" value="{{ $employerData->city }}" placeholder="Enter City" required>
                                        <div class="invalid-feedback">{{ $errors->first('city') }}</div>
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="control-label">Country <span class="text-danger">*</span></label>
                                        <input type="text"
                                            class="form-control @if ($errors->has('country')) is-invalid @endif"
                                            name="country" value="{{ $employerData->country }}" placeholder="Enter Country"
                                            required>
                                        <div class="invalid-feedback">{{ $errors->first('country') }}</div>
                                    </div>
                                </div><!-- Col -->
                            </div><!-- Row -->
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label">Tax Identification Number (TIN) <span
                                                class="text-danger">*</span></label>
                                        <input type="text"
                                            class="form-control @if ($errors->has('tin')) is-invalid @endif"
                                            name="tin" value="{{ $employerData->tin }}" placeholder="Enter TIN" required>
                                        <div class="invalid-feedback">{{ $errors->first('tin') }}</div>
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label">Website</label>
                                        <input type="url"
                                            class="form-control @if ($errors->has('website')) is-invalid @endif"
                                            name="website" value="{{ $employerData->website }}" placeholder="Enter Website">
                                        <div class="invalid-feedback">{{ $errors->first('website') }}</div>
                                    </div>
                                </div><!-- Col -->
                            </div><!-- Row -->
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">About Company <span
                                                class="text-danger">*</span></label>
                                        <textarea class="form-control @if ($errors->has('about')) is-invalid @endif" name="about"
                                            id="tinymceExample" rows="10">{{ $employerData->about }}</textarea>
                                        <div class="invalid-feedback">{{ $errors->first('about') }}</div>
                                    </div>
                                </div><!-- Col -->
                            </div><!-- Row -->
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="control-label">Facebook Link</label>
                                        <input type="url"
                                            class="form-control @if ($errors->has('facebook')) is-invalid @endif"
                                            name="facebook" value="{{ $employerData->facebook }}"
                                            placeholder="Enter Facebook link">
                                        <div class="invalid-feedback">{{ $errors->first('facebook') }}</div>
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="control-label">Instagram</label>
                                        <input type="url"
                                            class="form-control @if ($errors->has('instagram')) is-invalid @endif"
                                            name="instagram" value="{{ $employerData->instagram }}"
                                            placeholder="Enter Instagram">
                                        <div class="invalid-feedback">{{ $errors->first('instagram') }}</div>
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="control-label">Linkedin</label>
                                        <input type="url"
                                            class="form-control @if ($errors->has('linkedin')) is-invalid @endif"
                                            name="linkedin" value="{{ $employerData->linkedin }}" placeholder="Enter linkedin">
                                        <div class="invalid-feedback">{{ $errors->first('linkedin') }}</div>
                                    </div>
                                </div><!-- Col -->
                            </div><!-- Row -->
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">Image</label>
                                        <input type="file"
                                            class="form-control @if ($errors->has('image')) is-invalid @endif"
                                            name="image" value="{{ $employerData->image }}" placeholder="Enter Image">
                                        <div class="invalid-feedback">{{ $errors->first('image') }}</div>
                                    </div>
                                </div><!-- Col -->
                            </div><!-- Row -->
                            <button type="submit" class="btn btn-primary submit">Update Profile</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('custom_css')
    <style>
        @media screen and (min-width: 800px) {
            .page-wrapper {
                margin-left: 100px !important;
            }
        }

        .page-content {
            margin-top: 10px !important
        }
    </style>
@endpush
