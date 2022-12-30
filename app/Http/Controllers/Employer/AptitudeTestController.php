<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use App\Models\AptitudeTest;
use App\Models\Category;
use App\Models\JobPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AptitudeTestController extends Controller
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
            [(__('Aptitude Tests')), null],
        ];

        $employer = Auth::guard('employer')->user();
        $aptitudeTests = AptitudeTest::where('employer_id',$employer->id)->latest()->get();
        // $aptitudeTests = AptitudeTest::where('employer_id',$employer->id)->join('categories', 'categories.id', '=', 'aptitude_tests.category_id')->get();
        // dd($aptitudeTests);
        return view('employer.aptitude-tests.index', compact('breadcrumbs', 'aptitudeTests'));
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
            [(__('Aptitude Tests')), route('employer.aptitude-tests.index')],
            [(__('Create')), null],
        ];

        $categories = Category::where('status', 1)->get();
            $jobs = JobPost::where('status', 1)->get();
        return view('employer.aptitude-tests.create', compact('breadcrumbs', 'categories', 'jobs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "job_id" => "required",
            "category_id" => "required",
            "question" => "required",
            "questionType" => "required",
        ]);


        $option_one = '';
        $option_two = '';
        $option_three = '';
        $option_four = '';
        $option_text = '';
        $answer = [];

        if ($request->questionType == "radio") {
            $radioOptions = $request->radioOption;

            $i = 4;
            foreach ($radioOptions as $chkey => $radioVal) {
                $optionName = $radioVal["answer"];
                $correctOption = isset($radioVal["correctOption"]) ? 1 : 0;

                if($correctOption === 1) {
                    array_push($answer,$optionName);
                }
                
                if($i === 4) {
                    $option_four = $optionName;
                }
                else if($i === 3) {
                    $option_three = $optionName;
                }
                else if($i === 2) {
                    $option_two = $optionName;
                }
                else if($i === 1) {
                    $option_one = $optionName;
                }

                $i--;
                
            }

        }

        if ($request->questionType == "checkbox") {
            $checkboxOptions = $request->checkboxOption;
            $i = 4;
            foreach ($checkboxOptions as $chkey => $checkboxVal) {
                $optionName = $checkboxVal["answer"];
                
                $correctOption = isset($checkboxVal["correctOption"]) ? 1 : 0;

                if($correctOption === 1) {
                    array_push($answer,$optionName);
                }
                if($i === 4) {
                    $option_four = $optionName;
                }
                else if($i === 3) {
                    $option_three = $optionName;
                }
                else if($i === 2) {
                    $option_two = $optionName;
                }
                else if($i === 1) {
                    $option_one = $optionName;
                }

                $i--;
                
            }
        }



        if ($request->questionType == "text") {
            $option_text = $request->textOption;
            array_push($answer,$option_text);
        }

        $employer = Auth::guard('employer')->user();

        $test = new AptitudeTest();
        $test->employer_id = $employer->id;
        $test->job_id = $validated['job_id'];
        $test->category_id = $validated['category_id'];
        $test->question = $validated['question'];
        $test->option_one = $option_one;
        $test->option_two = $option_two;
        $test->option_three = $option_three;
        $test->option_four = $option_four;
        $test->question_type = $request->questionType;
        $test->answer = implode(',',$answer);
        $test->text_box = $option_text;
        $test->time_alloted = urlencode(time());
        $test->status = 1;
        $res = $test->save();

        if ($res) {
            notify()->success(__('Created successfully'));
        } else {
            notify()->error(__('Failed to Create. Please try again'));
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AptitudeTest  $aptitudeTest
     * @return \Illuminate\Http\Response
     */
    public function show(AptitudeTest $aptitudeTest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AptitudeTest  $aptitudeTest
     * @return \Illuminate\Http\Response
     */
    public function edit(AptitudeTest $aptitudeTest)
    {
        $breadcrumbs = [
            [(__('Dashboard')), route('employer.home')],
            [(__('Aptitude Tests')), route('employer.aptitude-tests.index')],
            [(__('Create')), null],
        ];

        $aptitudeTests = AptitudeTest::where('id','=',$aptitudeTest->id)->first();
        $categories = Category::where('status', 1)->get();
        $jobs = JobPost::where('status', 1)->get();
        return view('employer.aptitude-tests.edit', compact('breadcrumbs', 'categories', 'aptitudeTests', 'jobs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AptitudeTest  $aptitudeTest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AptitudeTest $aptitudeTest)
    {
        // dd($request->all());
        $updateData = $request->validate([
            "job_id" => "required",
            "category_id" => "required",
            "question" => "required",
            "option_one" => "required",
            "option_two" => "required",
            "option_three" => "required",
            "option_four" => "required",
            "answer" => "required",
        ]);

        $res = AptitudeTest::whereId($aptitudeTest->id)->update($updateData);

        if ($res) {
            notify()->success(__('Profile Updated successfully'));
        } else {
            notify()->error(__('Failed to update profile. Please try again'));
        }
        return Redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AptitudeTest  $aptitudeTest
     * @return \Illuminate\Http\Response
     */
    public function destroy(AptitudeTest $aptitudeTest)
    {
        //
    }

    // Change Aptitude test Status
    public function changeStatus(Request $request)
    {
        $aptitudeTest = AptitudeTest::find($request->test_id);
        $aptitudeTest->status = $request->status;
        $aptitudeTest->save();

        return response()->json(['success' => 'Status change successfully.']);
    }
}
