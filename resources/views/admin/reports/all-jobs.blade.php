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
                    <form  id="search-form">
                        @csrf
                    <div class="mb-3">
                        <div class="row" id="filter">
                            <div class="col-md-2 m-2">
                                <label for="">Category</label>
                                <select name="industry" class="form-control category-dropdown" id="industry" placeholder="Industry">
                                    <option value=" ">--All--</option>
                                        @foreach($industry as $indus)
                                            <option value="{{$indus->name}}" {{Request::get('industry') == $indus->name ? 'selected': ''}}>{{$indus->name}}</option>
                                        @endforeach 
                                </select>
                            </div>
                            <div class="col-md-2 m-2" >
                                <label for="">Job Title</label>
                                <select name="title" class="form-control category-dropdown" id="title" placeholder="Job Title">
                                    <option value=" ">--All--</option>
                                        @foreach($jobs as $job)
                                            <option value="{{$job->id}}" {{Request::get('title') == $job->title ? 'selected': ''}}>{{$job->title}}</option>
                                            
                                        @endforeach 
                                </select>
                            </div>
                            <div class="col-md-2 m-2">
                                <label for="">Employer</label>
                                <select name="employer" class="form-control category-dropdown" id="employer" placeholder="Employer">
                                    <option value=" ">--All--</option>
                                        @foreach($employers as $employer)
                                            <option value="{{$employer->id}}" {{Request::get('employer') == $employer->id ? 'selected': ''}}>{{$employer->company_name}}</option>
                                            
                                        @endforeach 
                                </select>
                            </div>
                            {{-- <div class="col-md-2 m-2">
                                <label for="">Posted Date</label>
                                <input type="date" value="{{date('y-m-d')}}" name="datefrom" id="datefrom" placeholder="Posted" class="form-control">
                            </div>
                            <div class="col-md-2 m-2">
                                <label for="">Due Date</label>
                                <input type="date" value="{{date('y-m-d')}}" name="dateto" id="dateto" placeholder="Due" class="form-control">
                            </div> --}}
                            <div class="col-md-2 mt-3">
                                <label for=""></label>
                                <input type="submit" value="Submit" name="submit" id="submit"  class="form-control btn btn-primary">
                            </div>
                        </div>
                        
                    </div>
                </form>
                
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

<script >
    $(document).ready(function () {
        $("#search-form").on('submit', function(e){
            e.preventDefault();
            var title = $('#title').val();
            var industry = $('#industry').val();
            var employer = $('#employer').val();
            // var formData = $(this).serializeArray();
            console.log(industry, title, employer);

            $.ajax({
                url: "{{route('admin.report.allJob')}}",
                type: "get",
                
                data: {
                        'title': title,
                        'industry': industry,
                        'employer': employer,   
                        },
                success:function(data){
                    console.log(data);
                    $('#dataTableExample').html(data); 
                    feather.replace();
                }
            });
        });        
    });

</script>
@endpush