<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use App\Models\AptitudeTest;
use App\Models\Category;
use Illuminate\Http\Request;

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

        $aptitudeTests = AptitudeTest::with('category')->latest()->get();
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
        //
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
        //
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
        //
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
