<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\JobPost;
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
}
