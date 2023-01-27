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
                            <h6 class="card-title">Contact</h6>
                        </div>
                        
                    </div>
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>Sl#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Subject</th>
                                    {{-- <th>Message</th> --}}
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($messages as $message)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $message->name }}</td>
                                        <td>{{$message->email}}</td>
                                        <td>{{$message->subject}}</td>
                                        {{-- <td>{{  Str::limit($message->message, 40) }}</td> --}}
                                        <td>
                                            <input dat-id="{{ $message->id }}" class="toggle-class" type="checkbox"
                                                data-onstyle="danger" data-offstyle="success" data-toggle="toggle"
                                                data-on="Read" data-off="New" name="readstatus" id="readstatus"
                                                {{ $message->status ? 'checked' : '' }} >
                                        </td>
                                        <td>
                                            <div class="btn-toolbar" role="toolbar">
                                                <!-- view button -->
                                                <div class="btn-group mr-1 " role="group">
                                                    <a href="{{ route('admin.contact-view.show', $message->id) }}"
                                                        data-hover="tooltip" data-placement="top"
                                                        data-target="#modal-edit-contact{{ $message->id }}"
                                                        data-toggle="modal" id="modal-edit" title="Edit"
                                                        class="text-warning viewbuttoncontact" data-id="{{ $message->id }}">
                                                        <i data-feather="eye"></i></a>

                                                    <!-- view modal -->
                                                    @include('admin.contact.show', [
                                                        'message' => $message,
                                                    ])
                                                </div>

                                                <!-- delete button -->
                                                <div class="btn-group mr-1" role="group">
                                                    <button type="button" class="text-danger"
                                                        onclick="event.preventDefault(); if(confirm('Are you sure to delete ?')){
                                                        document.getElementById('delete-data-{{ $message->id }}').submit();}">
                                                        <i data-feather="trash"></i>
                                                    </button>
                                                    <form id="delete-data-{{ $message->id }}"
                                                        action="{{ route('admin.contact-view.destroy', $message->id) }}"
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
            $('.viewbuttoncontact').on('click',function() {
                var status = 1;
                var contact_id = $(this).data('id');
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '{{ route('admin.contact.status') }}',
                    data: {
                        'status': status,
                        'contact_id': contact_id
                    },
                    success: function(data) {
                        console.log(data);

                    }
                });
            })
        })    
    </script>
@endpush
