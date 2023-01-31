<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobPost;
use App\Models\MatchedJobs;
use Illuminate\Http\Request;
use App\Models\Employer;
use App\Models\Category;
use App\Models\UserJobApply;


class ReportController extends Controller
{
    public function index(Request $request)
    {
        $breadcrumbs = [
            [(__('Dashboard')), route('admin.home')],
            [(__('Reports')), route('admin.report.allJob')],
            [(__('All Jobs Report')), null]
        ];


        $job_id1 = $request->title;
        $industryname = $request->industry;
        $emp_id = $request->employer;
        // $datefrom = $request->input('datefrom');
        // $dateto = $request->input('dateto');;
        $jobs = JobPost::all();

            
        if($request->ajax()){ 
        
        $jobs = JobPost::where(function($query) use($job_id1, $industryname, $emp_id)
            {
                if($industryname) {
                    $query->where('industry', 'like', '%'.$industryname.'%');
                }
                if($job_id1) {
                    $query->where('id', 'like', $job_id1)->orWhere('id', $job_id1);
                }
                if($emp_id) {
                    $query->where('employer_id', $emp_id);
                }
            })->paginate(6);
        return view('admin.reports.all-jobs_table', compact('jobs'));

        }

        $employers = Employer::orderBy('company_name', 'ASC')->get();

        $industry= Category::all();

        return view('admin.reports.all-jobs', compact('breadcrumbs', 'jobs', 'employers', 'industry'));

    }

    public function matched_jobs(Request $request)
    {
        $breadcrumbs = [
            [(__('Dashboard')), route('admin.home')],
            [(__('Reports')), route('admin.report.matchedJob')],
            [(__('Matched Jobs Report')), null]
        ];

        // $jobs = MatchedJobs::with('employer')->with('users')->with('jobposts')->latest()->get();
        $jobs = UserJobApply::with('employeName')->with('users')->with('jobApply')->get();
        
        $job_id1 = $request->title;
        // $industryname = $request->industry;
        $emp_id = $request->employer;

        $titles = JobPost::all();
        
        $employers = Employer::orderBy('company_name', 'ASC')->get();

            
        if($request->ajax()){ 
            
            // $jobs = UserJobApply::where('id', $job_id1)->where('employer_id', $emp_id)->get();

            $jobs = UserJobApply::where(function($query) use($job_id1, $emp_id)
            {
                // if($industryname) {
                //     $query->where('industry', 'like', '%'.$industryname.'%');
                // }
                if($job_id1) {
                    $query->where('job_id', $job_id1);
                }
                if($emp_id) {
                    $query->where('employer', $emp_id);
                }
            })->paginate(6);
            
            return view('admin.reports.matched-jobs', compact('breadcrumbs', 'jobs', 'employers', 'titles'));
        }


        // $industry= Category::all();

        return view('admin.reports.matched-jobs', compact('breadcrumbs', 'jobs', 'employers', 'titles'));
    
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
