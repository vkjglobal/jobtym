<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Employer\JobPosts\StoreJobPostRequest;
use App\Models\JobPost;
use App\Models\User;
use App\Models\UserJobApply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;

class JobPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $breadcrumbs = [
            [(__('Dashboard')), route('employer.home')],
            [(__('Jobs')), null],
        ];
        $employer = Auth::guard('employer')->user();
        $jobs = JobPost::where('employer_id',$employer->id)->latest()->get();

        return view('employer.jobs.index', compact('breadcrumbs', 'jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $breadcrumbs = [
            [(__('Dashboard')), route('employer.home')],
            [(__('Jobs')), route('employer.job-posts.index')],
            [(__('Create')), null]
        ];

        return view('employer.jobs.create', compact('breadcrumbs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreJobPostRequest $request)
    {
        $validated = $request->validated();

        $employer = Auth::guard('employer')->user();
        $jobCheck = JobPost::where('employer_id',$employer->id)->count();
        if ($jobCheck >= 1) {
            notify()->error(__('Failed to Create. Please make payment for create second job.'));
        } 
        else {
            $job = new JobPost();
            $job->employer_id = $employer->id;
            $job->title = $validated['title'];
            $job->industry = $validated['industry'];
            $job->type = $validated['type'];
            $job->description = $validated['description'];
            $job->skills = $validated['skills'];
            $job->country = $validated['country'];
            $job->residentType = $validated['residentType'];
            $job->street = $validated['street'];
            $job->city = $validated['city'];
            $job->town = $validated['town'];
            $job->division = $validated['division'];
            $job->salaryFrom = $validated['salaryFrom'];
            $job->salaryTo = $validated['salaryTo'];
            $job->email = $validated['email'];
            $job->schedule_date = date('Y-m-d', strtotime($validated['schedule_date']));
            $job->deadline = date('Y-m-d', strtotime($validated['deadline']));


            if ($request->hasFile('attachment')) {
                $path =  $request->file('attachment')->storeAs(
                    'uploads/employer/jobPosts',
                    urlencode(time()) . '_' . uniqid() . '_' . $request->attachment->getClientOriginalName(),
                    'public'
                );
                $job->attachment = $path;
            }

            $res = $job->save();

            // $userApply = UserJobApply::where('job_title','LIKE','%'.$job->title.'%')->get();

            $userApply = UserJobApply::where('job_title', 'like', $job->title.'%')->orWhere('job_title', 'like', '% '.$job->title.'%')->get();
            if (!empty($userApply)) {
                foreach ($userApply as $user => $user_id) {
                    $getAppliedUser = User::where('id',$user_id['user_id'])->get();
                    foreach ($getAppliedUser as $key => $value) {
                        $data = array('email'=>$value->email);
                        Mail::send('employer.jobs.user_job_notification',['title'=>$job->title, 'id'=>$job->id], function($message) use ($data) {
                            $message->to($data['email'])
                                ->subject('This is Subject');
                        });
                    }
                }
            }

            if ($res) {
                notify()->success(__('Created successfully'));
            } else {
                notify()->error(__('Failed to Create. Please try again'));
            }
                
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JobPost  $jobPost
     * @return \Illuminate\Http\Response
     */
    public function show(JobPost $jobPost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JobPost  $jobPost
     * @return \Illuminate\Http\Response
     */
    public function edit(JobPost $jobPost)
    {
        $breadcrumbs = [
            [(__('Dashboard')), route('employer.home')],
            [(__('Jobs')), route('employer.job-posts.index')],
            [(__('Edit')), null]
        ];

        return view('employer.jobs.edit', compact('breadcrumbs', 'jobPost'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JobPost  $jobPost
     * @return \Illuminate\Http\Response
     */
    public function update(StoreJobPostRequest $request, JobPost $jobPost)
    {
        $validated = $request->validated();

        $employer = Auth::guard('employer')->user();

        $jobPost->employer_id = $employer->id;
        $jobPost->title = $validated['title'];
        $jobPost->industry = $validated['industry'];
        $jobPost->type = $validated['type'];
        $jobPost->description = $validated['description'];
        $jobPost->skills = $validated['skills'];
        $jobPost->country = $validated['country'];
        $jobPost->residentType = $validated['residentType'];
        $jobPost->street = $validated['street'];
        $jobPost->city = $validated['city'];
        $jobPost->town = $validated['town'];
        $jobPost->division = $validated['division'];
        $jobPost->salaryFrom = $validated['salaryFrom'];
        $jobPost->salaryTo = $validated['salaryTo'];
        $jobPost->email = $validated['email'];
        $jobPost->schedule_date = date('Y-m-d', strtotime($validated['schedule_date']));
        $jobPost->deadline = date('Y-m-d', strtotime($validated['deadline']));

        if ($request->hasFile('attachment')) {
            $path =  $request->file('attachment')->storeAs(
                'uploads/employer/jobPosts',
                urlencode(time()) . '_' . uniqid() . '_' . $request->attachment->getClientOriginalName(),
                'public'
            );

            $imagePath = public_path('storage/' . $jobPost->attachment);
            if (File::exists($imagePath)) {
                unlink($imagePath);
            }

            $jobPost->attachment = $path;
        }

        $res = $jobPost->save();

        if ($res) {
            notify()->success(__('Updated successfully'));
        } else {
            notify()->error(__('Failed to Update. Please try again'));
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JobPost  $jobPost
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobPost $jobPost)
    {
        $res = $jobPost->delete();

        if ($res) {

            $imagePath = public_path('storage/' . $jobPost->attachment);
            if (File::exists($imagePath)) {
                unlink($imagePath);
            }

            notify()->success(__('Deleted successfully'));
        } else {
            notify()->error(__('Failed to Delete. Please try again'));
        }
        return redirect()->back();
    }

    // Change Job Post Status
    public function changeStatus(Request $request)
    {
        $josPost = JobPost::find($request->job_id);
        $josPost->status = $request->status;
        $josPost->save();

        return response()->json(['success' => 'Status change successfully.']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showReport()
    {
        $breadcrumbs = [
            [(__('Dashboard')), route('employer.home')],
            [(__('Jobs')), null],
        ];
        $employer = Auth::guard('employer')->user();
        $jobs = JobPost::where('employer_id',$employer->id)->latest()->get();

        return view('employer.reports.index', compact('breadcrumbs', 'jobs'));
    }
}
