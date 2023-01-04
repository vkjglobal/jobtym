@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-12 col-xl-12 stretch-card">
            <div class="row flex-grow">
                <div class="col-md-4 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-baseline">
                                <h6 class="card-title mb-0"><a  href="{{route('admin.employers.index')}}">Employers</a></h6>
                                
                            </div>
                            <div class="row">
                                <div class="col-6 col-md-12 col-xl-5 mt-3">
                                    @if ($count_employer > 0)
                                        <h3 class="mb-2">{{$count_employer}}</h3>
                                    @else
                                        <h3 class="mb-2">No Employers Found</h3>
                                    @endif
                                    
                                </div>
                                <div class="col-6 col-md-12 col-xl-7">
                                    <div id="apexChart1" class="mt-md-3 mt-xl-0"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-baseline">
                                <h6 class="card-title mb-0"><a  href="{{route('admin.users.index')}}">JobSeekers</a></h6>
                                
                            </div>
                            <div class="row">
                                <div class="col-6 col-md-12 col-xl-5 mt-3">
                                    @if ($count_user > 0)
                                        <h3 class="mb-2">{{$count_user}}</h3>
                                    @else
                                    <h3 class="mb-2">No Users Found</h3>
                                    @endif
                                </div>
                                <div class="col-6 col-md-12 col-xl-7">
                                    <div id="apexChart2" class="mt-md-3 mt-xl-0"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-baseline">
                                <h6 class="card-title mb-0"><a  href="{{route('admin.report.allJob')}}">Jobs Posted</a></h6>
                                
                            </div>
                            <div class="row">
                                <div class="col-6 col-md-12 col-xl-5 mt-3">
                                    @if ($count_jobs > 0)
                                        <h3 class="mb-2">{{$count_jobs}}</h3>
                                    @else
                                    <h3 class="mb-2">No Jobs Found</h3>
                                    @endif
                                    
                                </div>
                                <div class="col-6 col-md-12 col-xl-7">
                                    <div id="apexChart3" class="mt-md-3 mt-xl-0"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- row -->
@endsection
