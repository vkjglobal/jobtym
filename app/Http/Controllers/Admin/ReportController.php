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
        $job_id2 = $request->industry;
        $emp_id = $request->employer;
        $datefrom = $request->datefrom;
        $dateto = $request->dateto;

        $jobs = JobPost::all();

            
        if($request->ajax()){ 
            if (empty($job_id1) && empty($job_id2) && empty($emp_id) && empty($datefrom) && empty($dateto)){
                $jobs = JobPost::all();
            }elseif(!empty($job_id1) || !empty($job_id2) || !empty($emp_id) || !empty($datefrom) || !empty($dateto)){
                $jobs = JobPost::orWhere('id', $job_id1)
                            ->orWhere('industry', $job_id2)->orWhere('employer_id', $emp_id)
                            ->orWhere('schedule_date', $datefrom)->orWhere('deadline', $dateto)
                            ->get();
            }
            // elseif($job_id1 != true){
                // $jobs = JobPost::where('id', $job_id1)->get();
            // }elseif($job_id2 != true){
            //     $jobs = JobPost::where('industry', $job_id2)->get();
            // }elseif($emp_id != true){
            //     $jobs = JobPost::where('employer_id', $emp_id)->get();
            // }elseif($datefrom != true){
            //     $jobs = JobPost::where('schedule_date', $datefrom)->get();
            // }elseif($dateto != true){
            //     $jobs = JobPost::where('deadline', $dateto)->get();
            // }
        return view('admin.reports.all-jobs_table', compact('jobs'));
        }

        $employers = Employer::orderBy('company_name', 'ASC')->get();

        $industry= Category::all();


        return view('admin.reports.all-jobs', compact('breadcrumbs', 'jobs', 'employers', 'industry'));

    }

    public function matched_jobs()
    {
        $breadcrumbs = [
            [(__('Dashboard')), route('admin.home')],
            [(__('Reports')), route('admin.report.allJob')],
            [(__('Matched Jobs Report')), null]
        ];

        // $jobs = MatchedJobs::with('employer')->with('users')->with('jobposts')->latest()->get();
        $jobs = UserJobApply::with('employeName')->with('users')->with('jobApply')->get();
        return view('admin.reports.matched-jobs', compact('breadcrumbs', 'jobs'));
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
