<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use App\Models\JobPost;

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
        $jobPostCount = JobPost::get()->count();
        // dd($jobPostCount);
        return view('employer.home', compact('jobPostCount'));
    }
}
