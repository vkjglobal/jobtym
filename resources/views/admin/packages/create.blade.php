@extends('admin.layouts.app')
@section('content')
    @component('admin.layouts.partials.breadcrumbs', ['breadcrumbs' => $breadcrumbs])
    @endcomponent

    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Package Create</h6>
                    <form method="POST" action="{{ route('admin.packages.store') }}">
                        @csrf

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">Package Name <span class="text-danger">*</span></label>
                                    <input type="text"
                                        class="form-control @if ($errors->has('name')) is-invalid @endif"
                                        name="name" value="{{ old('name') }}" placeholder="Enter package name"
                                        required>
                                    <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">Price <span class="text-danger">*</span></label>
                                    <input type="text"
                                        class="form-control @if ($errors->has('price')) is-invalid @endif"
                                        name="price" value="{{ old('price') }}" placeholder="Enter company name"
                                        required>
                                    <div class="invalid-feedback">{{ $errors->first('price') }}</div>
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">Description</label>
                                    <textarea class="form-control @if ($errors->has('description')) is-invalid @endif" name="description"
                                        id="tinymceExample" rows="10">
                                        {{ old('description') }}
                                    </textarea>
                                    <div class="invalid-feedback">{{ $errors->first('description') }}</div>
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
    <style>
        .form-group label {
            font-weight: 600
        }
    </style>
@endpush
@push('custom_js')
    <script src="{{ asset('admin_assets/vendors/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('admin_assets/js/tinymce.js') }}"></script>
@endpush
