@extends('employer.layouts.app')
@section('content')
    @component('admin.layouts.partials.breadcrumbs', ['breadcrumbs' => $breadcrumbs])
    @endcomponent

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Aptitude Tests</h6>
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>Sl#</th>
                                    <th>Category</th>
                                    <th>Question</th>
                                    <th>Answer</th>
                                    <th>Time Alloted</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($aptitudeTests as $aptitudeTest)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $aptitudeTest->category }}</td>
                                        <td>{{ $aptitudeTest->question }}</td>
                                        <td>{{ $aptitudeTest->answer }}</td>
                                        <td>{{ $aptitudeTest->time_alloted }}</td>
                                        <td>
                                            <input data-id="{{ $aptitudeTest->id }}" class="toggle-class" type="checkbox"
                                                data-onstyle="success" data-offstyle="danger" data-toggle="toggle"
                                                data-on="Active" data-off="InActive"
                                                {{ $aptitudeTest->status ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <div class="btn-toolbar" role="toolbar">
                                                <!-- edit button -->
                                                <div class="btn-group mr-1" role="group">
                                                    <a href="{{ route('employer.aptitude-tests.edit', $aptitudeTest->id) }}"
                                                        class="text-warning">
                                                        <i data-feather="edit"></i>
                                                    </a>
                                                </div>

                                                <!-- delete button -->
                                                <div class="btn-group mr-1" role="group">
                                                    <button type="button" class="text-danger"
                                                        onclick="event.preventDefault(); if(confirm('Are you sure to delete ?')){
                                                        document.getElementById('delete-data-{{ $aptitudeTest->id }}').submit();}">
                                                        <i data-feather="trash"></i>
                                                    </button>
                                                    <form id="delete-data-{{ $aptitudeTest->id }}"
                                                        action="{{ route('employer.aptitude-tests.destroy', $aptitudeTest->id) }}"
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
                var test_id = $(this).data('id');

                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '{{ route('employer.job.status') }}',
                    data: {
                        'status': status,
                        'test_id': test_id
                    },
                    success: function(data) {
                        console.log(data.success)
                    }
                });
            })
        })
    </script>
@endpush
