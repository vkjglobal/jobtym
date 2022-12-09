@extends('admin.layouts.app')
@section('content')
@component('admin.layouts.partials.breadcrumbs', ['breadcrumbs' => $breadcrumbs])
@endcomponent
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Reports</h6>
                <div class="table-responsive">
                <div class="m-b-4">
                            <label for="search" class="col-form-label">Industry</label>
                            <input class="" id="search_text" data-resource="events" name="search" type="text">
                             <select id="status_filter">
                                        <option value="all"> Industry</option>
                                        <option value="upcoming">Upcoming</option>
                                        <option value="ongoing">Ongoing</option>
                                        <option value="expired">Expired</option>
                                        <option value="rejected">Rejected</option>
                                        <option value="approval_pending">Approval Pending</option>
                                    </select>
                            <div class="remove-row pull-right">
                                <button type="button" class="btn btn-primary btn-sm has-ripple" data-toggle="modal" data-target="#modal-report"><i class="feather icon-plus"></i> Add
                                </button>

                            </div>

                        </div>
                    <div id="list_table">
                        @include('admin.reports.all-jobs_table')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
@push('custom_css')
<link rel="stylesheet" href="{{ asset('admin_assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
@endpush
@push('custom_js')
<script src="{{ asset('admin_assets/vendors/datatables.net/jquery.dataTables.js') }}"></script>
<script src="{{ asset('admin_assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
<script src="{{ asset('admin_assets/js/data-table.js') }}"></script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<script></script>
@endpush