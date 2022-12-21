<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\JobPost;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        $jobs = JobPost::where('status','=','1')->latest()->paginate(6);
        // dd($jobs);
        return view('user.home', compact('jobs'));
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function categories()
    {
        return view('user.categories');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function contactUs()
    {
        return view('user.contactUs');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function aboutUs()
    {
        return view('user.aboutUs');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function termsCondition()
    {
        return view('user.termsConditions');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function faq()
    {
        return view('user.faq');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function privacyPolicy()
    {
        return view('user.privacyPolicy');
    }
}
