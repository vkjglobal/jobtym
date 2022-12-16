@extends('employer.layouts.app')
@section('content')
    @component('admin.layouts.partials.breadcrumbs', ['breadcrumbs' => $breadcrumbs])
    @endcomponent

    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Aptitude Test Create</h6>
                    <form method="POST" action="{{ route('employer.aptitude-tests.update',$aptitudeTests ) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">Job <span class="text-danger">*</span></label>
                                    <select name="job_id"
                                        class="text-dark form-control @if ($errors->has('job_id')) is-invalid @endif"
                                        required>
                                        <option disabled selected>Select option...</option>
                                        @foreach ($jobs as $job)
                                            <option {{ ($aptitudeTests->job_id) == $job->id ? 'selected' : '' }} value="{{ $job->id }}">
                                                {{ $job->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">{{ $errors->first('category_id') }}</div>
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">Category <span class="text-danger">*</span></label>
                                    <select name="category_id"
                                        class="text-dark form-control @if ($errors->has('category_id')) is-invalid @endif"
                                        required>
                                        <option disabled selected>Select option...</option>
                                        @foreach ($categories as $category)
                                            <option {{ ($aptitudeTests->category_id) == $category->id ? 'selected' : '' }} value="{{ $category->id }}">
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">{{ $errors->first('category_id') }}</div>
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">Question <span class="text-danger">*</span></label>
                                    <textarea name="question" class="form-control @if ($errors->has('question')) is-invalid @endif" cols="30"
                                        rows="5" required>{{ $aptitudeTests->question }}</textarea>
                                    <div class="invalid-feedback">{{ $errors->first('question') }}</div>
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">Option One <span class="text-danger">*</span></label>
                                    <input type="text"
                                        class="form-control @if ($errors->has('option_one')) is-invalid @endif"
                                        name="option_one" value="{{ $aptitudeTests->option_one }}" placeholder="Enter option one"
                                        required>
                                    <div class="invalid-feedback">{{ $errors->first('option_one') }}</div>
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">Option Two <span class="text-danger">*</span></label>
                                    <input type="text"
                                        class="form-control @if ($errors->has('option_two')) is-invalid @endif"
                                        name="option_two" value="{{ $aptitudeTests->option_two }}" placeholder="Enter option two"
                                        required>
                                    <div class="invalid-feedback">{{ $errors->first('option_two') }}</div>
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">Option Three <span class="text-danger">*</span></label>
                                    <input type="text"
                                        class="form-control @if ($errors->has('option_three')) is-invalid @endif"
                                        name="option_three" value="{{ $aptitudeTests->option_three }}"
                                        placeholder="Enter option three" required>
                                    <div class="invalid-feedback">{{ $errors->first('option_three') }}</div>
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">Option Four <span class="text-danger">*</span></label>
                                    <input type="text"
                                        class="form-control @if ($errors->has('option_four')) is-invalid @endif"
                                        name="option_four" value="{{ $aptitudeTests->option_four }}" placeholder="Enter option four"
                                        required>
                                    <div class="invalid-feedback">{{ $errors->first('option_four') }}</div>
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">Answer <span class="text-danger">*</span></label>
                                    <select name="answer" class="text-dark form-control @if ($errors->has('answer')) is-invalid @endif"
                                        required>
                                        <option disabled selected>Select option...</option>
                                        <option {{ ($aptitudeTests->answer) == 'option_one' ? 'selected' : '' }} value="option_one">Option One</option>
                                        <option {{ ($aptitudeTests->answer) == 'option_two' ? 'selected' : '' }} value="option_two">Option Two</option>
                                        <option {{ ($aptitudeTests->answer) == 'option_three' ? 'selected' : '' }} value="option_three">Option Three</option>
                                        <option {{ ($aptitudeTests->answer) == 'option_four' ? 'selected' : '' }} value="option_four">Option Four</option>
                                    </select>
                                    <div class="invalid-feedback">{{ $errors->first('answer') }}</div>
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
    <link href="{{ asset('admin_assets/vendors/jquery-tags-input/jquery.tagsinput.min.css') }}">
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
