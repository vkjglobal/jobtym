@extends('admin.layouts.app')
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
                    <h6 class="card-title">Job Post Details</h6>
                    <form>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">Title </label>
                                    <span class="form-control">{{ $jobPost->title }}</span>
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">Industry </label>
                                    <span class="form-control">{{ $jobPost->industry }}</span>
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">HR Email </label>
                                    <span class="form-control">{{ $jobPost->email }}</span>
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">Job Type </label>
                                    <span class="form-control">{{ ucfirst($jobPost->type) }}</span>
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">Job Description </label>
                                    <span class="form-control">{{ ucfirst($jobPost->description) }}</span>
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">Skills </label>
                                    <span class="form-control">{{ $jobPost->skills }}</span>
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">Street </label>
                                    <span class="form-control">{{ ucfirst($jobPost->street) }}</span>
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">City </label>
                                    <span class="form-control">{{ ucfirst($jobPost->city) }}</span>
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->

                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label class="control-label">Town </label>
                                    <span class="form-control">{{ ucfirst($jobPost->town) }}</span>
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label class="control-label">Division </label>
                                    <span class="form-control">{{ ucfirst($jobPost->division) }}</span>
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label class="control-label">Country </label>
                                    <span class="form-control">{{ ucfirst($jobPost->country) }}</span>
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label class="control-label">Job Open To </label>
                                    <span class="form-control">{{ ucfirst($jobPost->residentType) }}</span>
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">Salary Range</label>
                                    <div class="d-flex">
                                        <span class="form-control">{{ $jobPost->salaryFrom }}</span>
                                        <span class="m-2">-</span>
                                        <span class="form-control">{{ $jobPost->salaryTo }}</span>
                                    </div>
                                </div>
                            </div><!-- Col -->

                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label class="control-label">Scheduled Date </label>
                                    <span
                                        class="form-control">{{ date('j F, Y', strtotime($jobPost->schedule_date)) }}</span>
                                </div>
                            </div><!-- Col -->

                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label class="control-label">Deadline </label>
                                    <span class="form-control">{{ date('j F, Y', strtotime($jobPost->deadline)) }}</span>
                                </div>
                            </div><!-- Col -->

                        </div><!-- Row -->

                        @if ($jobPost->attachment)
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">Attachment</label>
                                        <img src="{{ asset('storage/' . $jobPost->attachment) }}"
                                            alt="{{ $jobPost->title }}" class="img-thumbnail" width="250">
                                    </div>
                                </div><!-- Col -->
                            </div><!-- Row -->
                        @endif

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
