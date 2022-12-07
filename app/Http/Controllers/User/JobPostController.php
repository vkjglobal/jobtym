<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\JobPost;
use App\Models\SaveJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class JobPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = JobPost::latest()->get();
        return view('user.jobs.index',compact('jobs'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function findJobPost(Request $request)
    {
        $term = $request['job-keyword'];

        $jobs = JobPost::where('skills','LIKE','%'.$term.'%')->orwhere('title','LIKE','%'.$term.'%')->orwhere('city','LIKE','%'.$term.'%')->get();
        // dd($filterData);
        return view('user.jobs.index',compact('jobs'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function jobDetail($id)
    {   
        $user = Auth::user();
        $job = JobPost::where('id', $id)->first();
        $saveJob = SaveJob::where('job_id', $id)->first();
        return view('user.jobs.jobDetails', compact('job','saveJob','user'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function saveJob(Request $request)
    {   
        $user = Auth::user();
        $saveJobPost = SaveJob::where('job_id', $request->job_id)->count();
        if ($saveJobPost == 0) {
            $saveJob = SaveJob::create($request->all());
            return response(['success' => true]);
        }else{
            $deleteJobPost = SaveJob::where('job_id', $request->job_id)->delete();
            return response(['success' => false]);
        }
    }
}