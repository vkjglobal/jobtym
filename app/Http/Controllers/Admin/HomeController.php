<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Employer;
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
        $this->middleware('admin.auth:admin');
    }

    /**
     * Show the Admin dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        $count_employer = Employer::count();
        $count_user = User::count();
        $count_jobs = JobPost::count();
        return view('admin.home', compact('count_employer', 'count_user', 'count_jobs'));
    }
}
