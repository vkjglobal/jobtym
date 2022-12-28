<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\JobPost;
use App\Models\Result;
use App\Models\SaveJob;
use App\Models\UserJobApply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $appliedJob = UserJobApply::where('user_id',$user->id)->latest()->get();
            foreach ($appliedJob as $ajkey => $aj) {
                $jobId = $aj->job_id;
                $userID = $user->id;
                $resultExam = Result::where('user_id',$user->id)->where('job_id',$jobId)->first();
                $aj->examJoined = $resultExam ? true : false;
                $aj->resultId = $resultExam ? $resultExam->id : "";
            }
            $savedJob = SaveJob::where('user_id',$user->id)->latest()->get();
            $getSaveJob = array();
            foreach ($savedJob as $key => $value) {
                $saveJobPost = JobPost::where('id', $value->job_id)->get();
                array_push($getSaveJob,$saveJobPost);
            }
            return view('user.dashboard', compact('user','appliedJob', 'getSaveJob'));
        }else{
            return redirect('user');
        }
    }

    public function loadSearchData(Request $request)
    {
        // $categories = Category::all();
        $searchSavedJob = $request->query('searchSavedJob');
        $sortingQuery = $request->query('sortingQuery');

        $user = Auth::user();

        $sort = "job_posts.created_at";
        $direction = "asc";
        if ($sortingQuery == "new") {
            $direction = "desc";
        }

        $savedJob = SaveJob::where(function($query) use($user, $searchSavedJob, $sortingQuery)
            {
                $query->where('user_id',$user->id);
                if($searchSavedJob) {
                    $query->where('job_posts.title','LIKE',"%{$searchSavedJob}%");
                }
            })->join('job_posts', 'job_posts.id', '=', 'save_jobs.job_id')->orderBy($sort,$direction)->get();






        // $getSaveJob = array();
        foreach ($savedJob as $key => $value) {
            $savedJob[$key]["crateDate"] = date_format($value->created_at,"M d,Y");
            $savedJob[$key]["deleteUrl"] = url('user/delete-saveJob',base64_encode($value->id) );
            $savedJob[$key]["viewUrl"] = url('user/job-detail',base64_encode($value->id));
        }

        // dd($savedJob);
        return response()->json($savedJob);
    }
}
