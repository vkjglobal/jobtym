<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use App\Models\JobPost;
use App\Models\AptitudeTest;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('employer.auth:employer');
    }

    /**
     * Show the Employer dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {

        $employer = Auth::guard('employer')->user();

        $jobPostCount = JobPost::where('employer_id',$employer->id)->get()->count();

        $id = $employer->id ;
        $aptitudecount = AptitudeTest::where('employer_id', $id)->count();
        
        // dd($jobPostCount);
        return view('employer.home', compact('jobPostCount','aptitudecount'));
    }
}
