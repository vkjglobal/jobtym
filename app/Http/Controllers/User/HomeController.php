<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
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
        $categories = Category::where('status','=','1')->latest()->paginate(8);
        // dd($categories);
        $title = JobPost::select('title')->where('status','=','1')->orderBy('title', 'ASC')->distinct()->get();
        $location = JobPost::select('country')->where('status','=','1')->orderBy('country', 'ASC')->distinct()->get();

        return view('user.home', compact('jobs', 'categories','location','title'));
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
    public function categories($id, Request $request)
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
        
        $categories = Category::all();
        $jobs = JobPost::where('industry', $id)->latest()->paginate(6); 

        return view('user.categories', compact('categories', 'jobs', 'getCountry'));
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
