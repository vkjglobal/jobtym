<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\JobPost;
use App\Models\SaveJob;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;

class JobPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if($request->filled('job-keyword')){
            $term = $request['job-keyword'];
            $jobs = JobPost::where('skills','LIKE','%'.$term.'%')->orwhere('title','LIKE','%'.$term.'%')->orwhere('city','LIKE','%'.$term.'%')->paginate(10);
            // dd($jobs);
        }else{
            // $jobs = JobPost::latest()->get();
            $jobs = JobPost::paginate(6);
        }
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
        $id = base64_decode($id);
        $userid = isset($user['id']) ? $user['id'] : '';
        $job = JobPost::where('id', $id)->first();
        $countSavedJob = SaveJob::where('job_id', $id)->where('user_id', $userid )->count();
        $isSavedJob = $countSavedJob > 0 ? true : false;
        return view('user.jobs.jobDetails', compact('job','isSavedJob','user'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function saveJob(Request $request)
    {   
        $user = Auth::user();
        $userid = isset($user['id']) ? $user['id'] : '';
        $saveJobPost = SaveJob::where('job_id', $request->job_id)->where('user_id', $userid)->count();
        // dd($saveJobPost);
        if ($saveJobPost == 0) {
            $saveJob = SaveJob::create($request->all());
            return response(['success' => true]);
        }else{
            $deleteJobPost = SaveJob::where('job_id', $request->job_id)->where('user_id', $userid)->delete();
            return response(['success' => false]);
        }
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function applyJob(Request $request)
    {   
        // dd($request->all());
        $validated = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email',
            'academic' => 'required',
            'age' => 'required',
            'gender' => 'required|in:male,female,other',
            'industry' => 'required',
            'accept' => 'required',
        ]);
        // dd($request->file);
        // if($request->file == ""){
        //     $validated = $request->validate([
        //         'resumeUpload' => 'required|mimes:pdf,xlx,csv|max:2048',
        //     ]);
        // }
        // dd($validated->fails());

        // dd($request->all());

        // $fileName = time().'.'.$request['uploadResume']->extension();
        // $request->file('uploadResume')->move(('user_assets/uploadResumes'), $fileName);
        // $data['uploadResume'] = $fileName;

        DB::table('user_job_applies')->insert([
            'job_id' => $request->job_id,
            'user_id' => $request->user_id,
            'job_title' => $request->job_title,
            'employer' => $request->employer,
            'shortlist' => $request->shortlist,
            'attend_interview' => $request->attend_interview,
            'apptitude' => $request->apptitude,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'current_job' => $request->current_job,
            'current_salary' => $request->current_salary,
            'academic' => $request->academic,
            'age' => $request->age,
            'salary' => $request->salary,
            'gender' => $request->gender,
            'industry' => $request->industry,
            'resumeUpload' => $request->resumeUpload,
            'file' => $request->file,
        ]);

        return Redirect("user/find-job")->with('message', 'Your Application has been successfully uploaded');
    }
}