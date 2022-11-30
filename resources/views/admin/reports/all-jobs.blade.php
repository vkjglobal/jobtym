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
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>Sl#</th>
                                    <th>Category</th>
                                    <th>Title</th>
                                    <th>Employer</th>
                                    <th>Posted Date</th>
                                    <th>Due Date</th>
                                    <th>No: of Applicants</th>
                                    <th>Amount</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jobs as $job)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $job->industry }}</td>
                                        <td>{{ $job->title }}</td>
                                        <td>{{ $job->employer->company_name }}</td>
                                        <td>{{ $job->schedule_date }}</td>
                                        <td>{{ $job->deadline }}</td>
                                        <td>45</td>
                                        <td>free</td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <!-- Employer Jobs -->
                                                <a href="{{ route('admin.report.viewJob', $job->id) }}"
                                                    class="mr-1 text-info" data-toggle="tooltip" data-placement="top"
                                                    title="Job Details">
                                                    <i data-feather="eye"></i>
                                                </a>

                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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
