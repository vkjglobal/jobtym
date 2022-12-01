<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobPost;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $breadcrumbs = [
            [(__('Dashboard')), route('admin.home')],
            [(__('Reports')), route('admin.report.allJob')],
            [(__('All Jobs Report')), null]
        ];

        $jobs = JobPost::with('employer')->latest()->get();
        return view('admin.reports.all-jobs', compact('breadcrumbs', 'jobs'));
    }

    public function viewJob($id)
    {
        $breadcrumbs = [
            [(__('Dashboard')), route('admin.home')],
            [(__('Reports')), route('admin.report.allJob')],
            [(__('Job Detail')), null]
        ];

        $jobPost = JobPost::find($id);

        return view('admin.reports.job-details', compact('breadcrumbs', 'jobPost'));
    }
}
