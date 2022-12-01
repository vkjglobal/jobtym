@extends('employer.layouts.app')
@section('content')
    @component('admin.layouts.partials.breadcrumbs', ['breadcrumbs' => $breadcrumbs])
    @endcomponent

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Job Posts</h6>
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>Sl#</th>
                                    <th>Title</th>
                                    <th>Industry</th>
                                    <th>Schedule Date</th>
                                    <th>Deadline</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jobs as $job)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $job->title }}</td>
                                        <td>{{ $job->industry }}</td>
                                        <td>{{ $job->schedule_date }}</td>
                                        <td>{{ $job->deadline }}</td>
                                        <td>
                                            <input data-id="{{ $job->id }}" class="toggle-class" type="checkbox"
                                                data-onstyle="success" data-offstyle="danger" data-toggle="toggle"
                                                data-on="Active" data-off="InActive" {{ $job->status ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <div class="btn-toolbar" role="toolbar">
                                                <!-- edit button -->
                                                <div class="btn-group mr-1" role="group">
                                                    <a href="{{ route('employer.job-posts.edit', $job->id) }}"
                                                        class="text-warning">
                                                        <i data-feather="edit"></i>
                                                    </a>
                                                </div>

                                                <!-- delete button -->
                                                <div class="btn-group mr-1" role="group">
                                                    <button type="button" class="text-danger"
                                                        onclick="event.preventDefault(); if(confirm('Are you sure to delete ?')){
                                                        document.getElementById('delete-data-{{ $job->id }}').submit();}">
                                                        <i data-feather="trash"></i>
                                                    </button>
                                                    <form id="delete-data-{{ $job->id }}"
                                                        action="{{ route('employer.job-posts.destroy', $job->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </div>
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
    <script>
        $(function() {
            $('.toggle-class').change(function() {
                var status = $(this).prop('checked') == true ? 1 : 0;
                var job_id = $(this).data('id');

                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '{{ route('employer.job.status') }}',
                    data: {
                        'status': status,
                        'job_id': job_id
                    },
                    success: function(data) {
                        console.log(data.success)
                    }
                });
            })
        })
    </script>
@endpush
