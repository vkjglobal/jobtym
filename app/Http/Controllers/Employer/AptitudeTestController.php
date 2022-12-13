<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use App\Models\AptitudeTest;
use App\Models\Category;
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
        return view('employer.aptitude-tests.create', compact('breadcrumbs', 'categories'));
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
            "category_id" => "required",
            "question" => "required",
            "option_one" => "required",
            "option_two" => "required",
            "option_three" => "required",
            "option_four" => "required",
            "answer" => "required",
        ]);

        $employer = Auth::guard('employer')->user();

        $test = new AptitudeTest();
        $test->employer_id = $employer->id;
        $test->category_id = $validated['category_id'];
        $test->question = $validated['question'];
        $test->option_one = $validated['option_one'];
        $test->option_two = $validated['option_two'];
        $test->option_three = $validated['option_three'];
        $test->option_four = $validated['option_four'];
        $test->answer = $validated['answer'];
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
        return view('employer.aptitude-tests.edit', compact('breadcrumbs', 'categories', 'aptitudeTests'));
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
        $updateData = $request->validate([
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
