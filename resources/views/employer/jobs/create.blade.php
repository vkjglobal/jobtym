@extends('employer.layouts.app')
@section('content')
    @component('admin.layouts.partials.breadcrumbs', ['breadcrumbs' => $breadcrumbs])
    @endcomponent
    {{-- @if ($errors->any())
        {!! implode('', $errors->all('<div>:message</div>')) !!}
    @endif --}}
    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Job Post Create</h6>
                    <form method="POST" action="{{ route('employer.job-posts.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">Title <span class="text-danger">*</span></label>
                                    <input type="text"
                                        class="form-control @if ($errors->has('title')) is-invalid @endif"
                                        name="title" value="{{ old('title') }}" placeholder="Enter job title" required>
                                    <div class="invalid-feedback">{{ $errors->first('title') }}</div>
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">Industry <span class="text-danger">*</span></label>
                                    <input type="text"
                                        class="form-control @if ($errors->has('industry')) is-invalid @endif"
                                        name="industry" value="{{ old('industry') }}" placeholder="Enter Industry" required>
                                    <div class="invalid-feedback">{{ $errors->first('industry') }}</div>
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">HR Email <span class="text-danger">*</span></label>
                                    <input type="email"
                                        class="form-control @if ($errors->has('email')) is-invalid @endif"
                                        name="email" value="{{ old('email') }}" placeholder="Enter HR Email" required>
                                    <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">Job Type <span class="text-danger">*</span></label>
                                    <select name="type"
                                        class="text-dark form-control @if ($errors->has('type')) is-invalid @endif"
                                        required>
                                        <option disabled selected>Select option...</option>
                                        <option value="fullTime" {{ old('type') == 'fullTime' ? 'selected' : '' }}>
                                            Full Time
                                        </option>
                                        <option value="fresher" {{ old('type') == 'fresher' ? 'selected' : '' }}>
                                            Fresher
                                        </option>
                                        <option value="internship" {{ old('type') == 'internship' ? 'selected' : '' }}>
                                            Internship
                                        </option>
                                        <option value="contract" {{ old('type') == 'contract' ? 'selected' : '' }}>
                                            Contract
                                        </option>
                                        <option value="temporary" {{ old('type') == 'temporary' ? 'selected' : '' }}>
                                            Temporary
                                        </option>
                                        <option value="partTime" {{ old('type') == 'partTime' ? 'selected' : '' }}>
                                            Part Time
                                        </option>
                                    </select>
                                    <div class="invalid-feedback">{{ $errors->first('type') }}</div>
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">Job Description <span class="text-danger">*</span></label>
                                    <textarea name="description" class="form-control @if ($errors->has('description')) is-invalid @endif" cols="30"
                                        rows="5" required>{{ old('description') }}</textarea>
                                    <div class="invalid-feedback">{{ $errors->first('description') }}</div>
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">Skills <span class="text-danger">*</span></label>
                                    <input class="form-control @if ($errors->has('skills')) is-invalid @endif"
                                        name="skills" id="skills" value="{{ @old('skills') }}" />
                                    <div class="invalid-feedback">{{ $errors->first('skills') }}</div>
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
                                    <label class="control-label">Job Open To <span class="text-danger">*</span></label>
                                    <select name="residentType" required
                                        class="form-control text-dark @if ($errors->has('residentType')) is-invalid @endif">
                                        <option disabled selected>Select an option..</option>
                                        <option value="resident"
                                            {{ old('residentType') == 'resident' ? 'selected' : '' }}>
                                            Resident
                                        </option>
                                        <option value="nonResident"
                                            {{ old('residentType') == 'nonResident' ? 'selected' : '' }}>
                                            Non - Resident
                                        </option>
                                    </select>
                                    <div class="invalid-feedback">{{ $errors->first('residentType') }}</div>
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">Salary Range (per week)</label>
                                    <div class="d-flex">
                                        <input type="number"
                                            class="form-control @if ($errors->has('salaryFrom')) is-invalid @endif"
                                            name="salaryFrom" value="{{ old('salaryFrom') }}"
                                            placeholder="Enter salaryFrom" required>
                                        <div class="invalid-feedback">{{ $errors->first('salaryFrom') }}</div>
                                        <span class="m-2">-</span>
                                        <input type="number"
                                            class="form-control @if ($errors->has('salaryTo')) is-invalid @endif"
                                            name="salaryTo" value="{{ old('salaryTo') }}" placeholder="Enter salaryTo"
                                            required>
                                        <div class="invalid-feedback">{{ $errors->first('salaryTo') }}</div>
                                    </div>
                                </div>
                            </div><!-- Col -->

                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label class="control-label">Scheduled Date </label>
                                    <input type="text"
                                        class="form-control @if ($errors->has('schedule_date')) is-invalid @endif"
                                        name="schedule_date" id="scheduleDate" value="{{ old('schedule_date') }}"
                                        placeholder="Enter scheduled date">
                                    <div class="invalid-feedback">{{ $errors->first('schedule_date') }}</div>
                                </div>
                            </div><!-- Col -->

                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label class="control-label">Deadline <span class="text-danger">*</span></label>
                                    <input type="text"
                                        class="form-control @if ($errors->has('deadline')) is-invalid @endif"
                                        name="deadline" id="deadline" value="{{ old('deadline') }}"
                                        placeholder="Enter deadline" required>
                                    <div class="invalid-feedback">{{ $errors->first('deadline') }}</div>
                                </div>
                            </div><!-- Col -->

                        </div><!-- Row -->

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">Attachment</label>
                                    <input type="file"
                                        class="form-control @if ($errors->has('attachment')) is-invalid @endif"
                                        name="attachment" value="{{ old('attachment') }}"
                                        placeholder="Enter attachment">
                                    <div class="invalid-feedback">{{ $errors->first('attachment') }}</div>
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
    <script src="{{ asset('admin_assets/vendors/jquery-tags-input/jquery.tagsinput.min.css') }}"></script>
    <style>
        .ui-datepicker-title {
            display: flex;
        }

        .tagsinput {
            border: 1px solid;
        }

        div.tagsinput span.tag {
            margin: 5px;
        }
    </style>
@endpush
@push('custom_js')
    <script src="{{ asset('admin_assets/vendors/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('admin_assets/js/tinymce.js') }}"></script>
    <script src="https://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    <script src="{{ asset('admin_assets/vendors/jquery-tags-input/jquery.tagsinput.min.js') }}"></script>
    <script>
        $(function() {
            $("#deadline").datepicker({
                changeMonth: true,
                changeYear: true,
                yearRange: "-3:+2",
                dateFormat: "dd-mm-yy"
            });
            $("#scheduleDate").datepicker({
                changeMonth: true,
                changeYear: true,
                yearRange: "-3:+2",
                dateFormat: "dd-mm-yy"
            });
        });

        $('#skills').tagsInput({
            'width': '100%',
            'height': '75%',
            'interactive': true,
            'defaultText': 'Add More',
            'removeWithBackspace': true,
            'minChars': 0,
            'maxChars': 20,
            'placeholderColor': '#666666'
        });
    </script>
@endpush
