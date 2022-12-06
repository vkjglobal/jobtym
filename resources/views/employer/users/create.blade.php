@extends('employer.layouts.app')
@section('content')
    @component('admin.layouts.partials.breadcrumbs', ['breadcrumbs' => $breadcrumbs])
    @endcomponent

    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Employee Create</h6>
                    <form method="POST" action="{{ route('employer.employee.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">First Name <span class="text-danger">*</span></label>
                                    <input type="text"
                                        class="form-control @if ($errors->has('first_name')) is-invalid @endif"
                                        name="first_name" value="{{ old('first_name') }}"
                                        placeholder="Enter your first name" required>
                                    <div class="invalid-feedback">{{ $errors->first('first_name') }}</div>
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">Last Name <span class="text-danger">*</span></label>
                                    <input type="text"
                                        class="form-control @if ($errors->has('last_name')) is-invalid @endif"
                                        name="last_name" value="{{ old('last_name') }}" placeholder="Enter your last name"
                                        required>
                                    <div class="invalid-feedback">{{ $errors->first('last_name') }}</div>
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->

                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="control-label">Email <span class="text-danger">*</span></label>
                                    <input type="email"
                                        class="form-control @if ($errors->has('email')) is-invalid @endif"
                                        name="email" value="{{ old('email') }}" placeholder="Enter Email" required>
                                    <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="control-label">Phone <span class="text-danger">*</span></label>
                                    <input type="number"
                                        class="form-control @if ($errors->has('phone')) is-invalid @endif"
                                        name="phone" value="{{ old('phone') }}" placeholder="Enter phone" required>
                                    <div class="invalid-feedback">{{ $errors->first('phone') }}</div>
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="control-label">Secondary Phone</label>
                                    <input type="number"
                                        class="form-control @if ($errors->has('secondary_phone')) is-invalid @endif"
                                        name="secondary_phone" value="{{ old('secondary_phone') }}"
                                        placeholder="Enter secondary phone" required>
                                    <div class="invalid-feedback">{{ $errors->first('secondary_phone') }}</div>
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->

                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="control-label">Gender <span class="text-danger">*</span></label>
                                    <select name="gender"
                                        class="form-control text-dark @if ($errors->has('gender')) is-invalid @endif"
                                        required>
                                        <option disabled selected>Choose an option...</option>
                                        <option value="male" {{ old('gender') == 'male' ? "selected" : "" }}>
                                            Male
                                        </option>
                                        <option value="female" {{ old('gender') == 'female' ? "selected" : "" }}>
                                            Female
                                        </option>
                                        <option value="other" {{ old('gender') == 'other' ? "selected" : "" }}>
                                            Others
                                        </option>
                                    </select>
                                    <div class="invalid-feedback">{{ $errors->first('gender') }}</div>
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="control-label">Date of Birth <span class="text-danger">*</span></label>
                                    <input type="text"
                                        class="form-control @if ($errors->has('date_of_birth')) is-invalid @endif"
                                        name="date_of_birth" id="datepicker" value="{{ old('date_of_birth') }}"
                                        placeholder="Enter date of birth" required>
                                    <div class="invalid-feedback">{{ $errors->first('date_of_birth') }}</div>
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="control-label">Vaccination Reference Number</label>
                                    <input type="text"
                                        class="form-control @if ($errors->has('vaccination_ref_number')) is-invalid @endif"
                                        name="vaccination_ref_number" value="{{ old('vaccination_ref_number') }}"
                                        placeholder="Enter Vaccination Reference Number" required>
                                    <div class="invalid-feedback">{{ $errors->first('vaccination_ref_number') }}</div>
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">Street <span class="text-danger">*</span></label>
                                    <input type="text"
                                        class="form-control @if ($errors->has('street')) is-invalid @endif"
                                        name="street" value="{{ old('street') }}" placeholder="Enter Street" required>
                                    <div class="invalid-feedback">{{ $errors->first('street') }}</div>
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">City <span class="text-danger">*</span></label>
                                    <input type="text"
                                        class="form-control @if ($errors->has('city')) is-invalid @endif"
                                        name="city" value="{{ old('city') }}" placeholder="Enter City" required>
                                    <div class="invalid-feedback">{{ $errors->first('city') }}</div>
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->

                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label class="control-label">Town <span class="text-danger">*</span></label>
                                    <input type="text"
                                        class="form-control @if ($errors->has('town')) is-invalid @endif"
                                        name="town" value="{{ old('town') }}" placeholder="Enter town" required>
                                    <div class="invalid-feedback">{{ $errors->first('town') }}</div>
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label class="control-label">Division <span class="text-danger">*</span></label>
                                    <input type="text"
                                        class="form-control @if ($errors->has('division')) is-invalid @endif"
                                        name="division" value="{{ old('division') }}" placeholder="Enter division"
                                        required>
                                    <div class="invalid-feedback">{{ $errors->first('division') }}</div>
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label class="control-label">Country <span class="text-danger">*</span></label>
                                    <input type="text"
                                        class="form-control @if ($errors->has('country')) is-invalid @endif"
                                        name="country" value="{{ old('country') }}" placeholder="Enter Country"
                                        required>
                                    <div class="invalid-feedback">{{ $errors->first('country') }}</div>
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label class="control-label">Is a Resident <span class="text-danger">*</span></label>
                                    <select name="isResident" required
                                        class="form-control text-dark @if ($errors->has('isResident')) is-invalid @endif">
                                        <option disabled selected>Select an option..</option>
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                    </select>
                                    <div class="invalid-feedback">{{ $errors->first('isResident') }}</div>
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">Postal Address <span class="text-danger">*</span></label>
                                    <textarea name="postal_address" class="form-control @if ($errors->has('postal_address')) is-invalid @endif"
                                        cols="30" rows="5" required>{{ old('postal_address') }}</textarea>
                                    <div class="invalid-feedback">{{ $errors->first('postal_address') }}</div>
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">Tax Identification Number (TIN)</label>
                                    <input type="text"
                                        class="form-control @if ($errors->has('tin')) is-invalid @endif"
                                        name="tin" value="{{ old('tin') }}" placeholder="Enter TIN" required>
                                    <div class="invalid-feedback">{{ $errors->first('tin') }}</div>
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">Image</label>
                                    <input type="file"
                                        class="form-control @if ($errors->has('image')) is-invalid @endif"
                                        name="image" value="{{ old('image') }}" placeholder="Enter Image">
                                    <div class="invalid-feedback">{{ $errors->first('image') }}</div>
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->

                        <button type="submit" class="btn btn-primary submit">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
@push('custom_css')
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
    <style>
        .ui-datepicker-title {
            display: flex;
        }
    </style>
@endpush
@push('custom_js')
    <script src="{{ asset('admin_assets/vendors/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('admin_assets/js/tinymce.js') }}"></script>
    <script src="https://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    <script>
        $(function() {
            $("#datepicker").datepicker({
                changeMonth: true,
                changeYear: true,
                maxDate: 0,
                yearRange: "-100:+0",
                dateFormat: "dd-mm-yy"
            });
        });
    </script>
@endpush
