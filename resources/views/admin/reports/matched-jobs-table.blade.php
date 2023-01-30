<table id="dataTableExample" class="table">
    <thead>
        <tr>
            <th>Sl#</th>
            <th>Applicant Name</th>
            <th>Industry</th>
            <th>Job Title</th>
            <th>Employer</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($jobs as $job)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>@isset($job->first_name) {{ $job->first_name }}@endisset</td>
                <td>@isset($job->jobApply->industry) {{ $job->jobApply->industry }}@endisset</td>
                <td>@isset($job->jobApply->title) {{ $job->jobApply->title }}@endisset</td>
                <td>@isset($job->employeName->name) {{ $job->employeName->company_name }}@endisset</td>
            </tr>
        @endforeach
    </tbody>
</table>