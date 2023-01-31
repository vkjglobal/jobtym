
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
                                @if($jobs != NULL)
                                @foreach ($jobs as $job)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $job->industry }}</td>
                                        <td>{{ $job->title }}</td>
                                        <td>{{ $job->employer->company_name }}</td>
                                        <td>{{ $job->schedule_date }}</td>
                                        <td>{{ $job->deadline }}</td>
                                        <td>{{ $job->applicants() }}</td>
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
                                {{-- @else
                                No jobs found --}}
                                @endif
                            </tbody>
                        </table>
                 