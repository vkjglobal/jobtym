@extends('admin.layouts.app')
@section('content')
    @component('admin.layouts.partials.breadcrumbs', ['breadcrumbs' => $breadcrumbs])
    @endcomponent

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="col-6">
                            <h6 class="card-title">Categories</h6>
                        </div>
                        <div class="col-6">
                            <!-- Category create modal -->
                            <button type="button" class="btn btn-primary float-right" data-toggle="modal"
                                data-target="#createCategory">
                                Add Category
                            </button>

                            <!-- Category Create Modal -->
                            @include('admin.categories.create-modal')

                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>Sl#</th>
                                    <th>Category Name</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>
                                            <input data-id="{{ $category->id }}" class="toggle-class" type="checkbox"
                                                data-onstyle="success" data-offstyle="danger" data-toggle="toggle"
                                                data-on="Active" data-off="InActive"
                                                {{ $category->status ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <div class="btn-toolbar" role="toolbar">
                                                <!-- edit button -->
                                                <div class="btn-group mr-1" role="group">
                                                    <a href="{{ route('admin.categories.edit', $category->id) }}"
                                                        data-hover="tooltip" data-placement="top"
                                                        data-target="#modal-edit-categories{{ $category->id }}"
                                                        data-toggle="modal" id="modal-edit" title="Edit"
                                                        class="text-warning">
                                                        <i data-feather="edit"></i>
                                                    </a>

                                                    <!-- Edit modal -->
                                                    @include('admin.categories.edit-modal', [
                                                        'category' => $category,
                                                    ])
                                                </div>

                                                <!-- delete button -->
                                                <div class="btn-group mr-1" role="group">
                                                    <button type="button" class="text-danger"
                                                        onclick="event.preventDefault(); if(confirm('Are you sure to delete ?')){
                                                        document.getElementById('delete-data-{{ $category->id }}').submit();}">
                                                        <i data-feather="trash"></i>
                                                    </button>
                                                    <form id="delete-data-{{ $category->id }}"
                                                        action="{{ route('admin.categories.destroy', $category->id) }}"
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
                var category_id = $(this).data('id');

                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '{{ route('admin.category.status') }}',
                    data: {
                        'status': status,
                        'category_id': category_id
                    },
                    success: function(data) {
                        console.log(data.success)
                    }
                });
            })
        })
    </script>
@endpush
