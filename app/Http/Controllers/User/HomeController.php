<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\JobPost;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function uploadFile(Request $request)
    {
        $data = $request->all();
        if (Auth::check()) {
            $user = Auth::user();
            $validated = $request->validate([
                'uploadResume' => 'mimes:pdf,xlx,csv|max:2048'
            ]);
            $fileName = time().'.'.$request['uploadResume']->extension();
            $request->file('uploadResume')->move(('user_assets/uploadResumes'), $fileName);
            $data['uploadResume'] = $fileName;
            
            $res = User::whereId($user->id)->update(['image' =>  $data['uploadResume']]);
            if ($res) {
                return Redirect("user")->with('message', 'Great! You have Successfully Upload your resume.');
            } else {
                return Redirect("user")->with('error', 'Something Went Wrong! Please try again');
            }
        }else{
            return Redirect("user")->with('error', 'Oops! You are not Login! Please login and try again');
        }
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
