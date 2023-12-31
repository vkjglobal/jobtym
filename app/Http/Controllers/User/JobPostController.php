<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\JobPost;
use App\Models\SaveJob;
use App\Models\UserJobApply;
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
        if($request->filled('job-keyword') || $request->has('city') || $request->has('category') || $request->has('jobTitle') || $request->has('jobType') || $request->has('country')){
            $term = $request['job-keyword'];
            $city = $request['city'];
            $country = $request['country'];
            $jobTitle = $request['jobTitle'];
            $jobType = $request['jobType'];
            
            $jobs = JobPost::where(function($query) use($term, $city, $country, $jobTitle, $jobType)
            {
                if($term) {
                    $query->where('skills','LIKE', "%{$term}%")->orwhere('title','LIKE',"%{$term}%");
                }
                if($city) {
                    $query->where('city','LIKE',"%{$city}%");
                }
                if($country) {
                    $query->where('country','LIKE',"%{$country}%");
                }
                if($jobTitle) {
                    $query->where('title','LIKE',"%{$jobTitle}%");
                }
                if($jobType) {
                    $query->where('type','LIKE',"%{$jobType}%");
                }
            })->paginate(6);
            $getCountry = JobPost::where('status','=','1')->select('country')->distinct()->get();
        }else{
            $jobs = JobPost::where('status','=','1')->latest()->paginate(6);
            $getCountry = JobPost::where('status','=','1')->select('country')->distinct()->get();
        }
        return view('user.jobs.index',compact('jobs','getCountry'));
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
        if ($userid) {
            $applyJob = UserJobApply::where('user_id',$user->id)->where('job_id',$id)->count();
        }else{
            $applyJob = 0;
        }
        $countSavedJob = SaveJob::where('job_id', $id)->where('user_id', $userid )->count();
        $isSavedJob = $countSavedJob > 0 ? true : false;
        $relatedJob = JobPost::latest()->first();
        // dd($relatedJob);
        return view('user.jobs.jobDetails', compact('job','isSavedJob','user', 'applyJob', 'relatedJob'));
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
    public function deleteSaveJob($id)
    {   
        $user = Auth::user();
        $id = base64_decode($id);
        $userid = isset($user['id']) ? $user['id'] : '';
        $deleteJobPost = SaveJob::where('job_id', $id)->where('user_id', $userid)->delete();
        if ($deleteJobPost) {
            notify()->success(__('Save Job Deleted successfully'));
        } else {
            notify()->error(__('Please try again'));
        }
        return redirect()->back();
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function applyJob(Request $request)
    {   
        // dd($request->all());
        $user = Auth::user();
        // $resultExam = UserJobApply::where('user_id',$user->id)->where('job_id',$request->job_id)->first();
        if (!$user) {
            return Redirect("user/find-job")->with('error', 'Oops! You are not allowed to apply this job. Please login first.');
        }else {
            $fieldValidtion = [
                'first_name' => 'required|string',
                'last_name' => 'required|string',
                'email' => 'required|email',
                'phone' => 'required',
                'current_job' => 'required',
                'current_salary' => 'required',
                'academic' => 'required',
                'age' => 'required',
                'salary' => 'required',
                'gender' => 'required|in:male,female,other',
                'industry' => 'required',
                'accept' => 'required',
            ];
            // dd($request->file());
            if($request->file() == []){
                $fieldValidtion ['resumeUpload'] = 'required|mimes:pdf,xlx,csv|max:2048';
                $fieldValidtion ['coverLatter'] = 'required|mimes:pdf,doc,docx|max:2048';
            }else{
                $fieldValidtion ['resumeUpload'] = 'mimes:pdf,xlx,csv|max:2048';
                $fieldValidtion ['coverLatter'] = 'mimes:pdf,xlx,csv|max:2048';
            }
            $validated = $request->validate($fieldValidtion,[
                'first_name' => 'Please Enter First Name',
                'last_name' => 'Please Enter Last Name',
                'email' => 'Please Enter Email',
                'phone' => 'Please Enter Phone Number',
                'current_job' => 'Please Enter Current Job',
                'current_salary' => 'Please Enter Current Salary',
                'academic' => 'Please Enter Academic Level',
                'age' => 'Please Enter Age',
                'salary' => 'Please Enter Salary',
                'gender' => 'Please Select Gender',
                'industry' => 'Please Enter Industry',
                'resumeUpload' => 'Please Upload Resume',
                'coverLatter' => 'Please Upload Cover Letter',
                'accept.required' => 'Please accept the terms and conditions.',
            ]);

            $fileName = time().'.'.$request['resumeUpload']->extension();
            $coverLatter = time().'.'.$request['coverLatter']->extension();
            $request->file('resumeUpload')->move(('user_assets/uploadResumes'), $fileName);
            $request->file('coverLatter')->move(('user_assets/uploadResumes'), $coverLatter);
            $data['resumeUpload'] = $fileName;

            DB::table('user_job_applies')->insert([
                'job_id' => $request->job_id,
                'user_id' => $request->user_id,
                'job_title' => $request->job_id,
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
}