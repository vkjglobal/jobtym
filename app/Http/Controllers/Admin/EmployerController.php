<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\EmployerStoreRequest;
use App\Http\Requests\Admin\EmployerUpdateRequest;
use App\Models\Employer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class EmployerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $breadcrumbs = [
            [(__('Dashboard')), route('admin.home')],
            [(__('Employers')), null],
        ];
        $employers = Employer::latest()->get();
        return view('admin.employers.index', compact('breadcrumbs', 'employers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $breadcrumbs = [
            [(__('Dashboard')), route('admin.home')],
            [(__('Employers')), route('admin.employers.index')],
            [(__('Create')), null]
        ];
        return view('admin.employers.create', compact('breadcrumbs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployerStoreRequest $request)
    {
        $validated = $request->validated();

        $employer = new Employer();
        $employer->name = $validated['name'];
        $employer->company_name = $validated['company_name'];
        $employer->email = $validated['email'];
        $employer->password = Hash::make($validated['email']);
        $employer->phone = $validated['phone'];
        $employer->company_phone = $validated['company_phone'];
        $employer->tin = $validated['tin'];
        $employer->country = $validated['country'];
        $employer->address = $validated['address'];
        $employer->street = $validated['street'];
        $employer->city = $validated['city'];
        $employer->about = $validated['about'];
        $employer->website = $validated['website'];
        $employer->facebook = $validated['facebook'];
        $employer->instagram = $validated['instagram'];
        $employer->linkedin = $validated['linkedin'];

        if ($request->hasFile('image')) {
            $path =  $request->file('image')->storeAs(
                'uploads/employers',
                urlencode(time()) . '_' . uniqid() . '_' . $request->image->getClientOriginalName(),
                'public'
            );
            $employer->image = $path;
        }

        $res = $employer->save();

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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Employer $employer)
    {
        $breadcrumbs = [
            [(__('Dashboard')), route('admin.home')],
            [(__('Employers')), route('admin.employers.index')],
            [(__('Edit')), null]
        ];
        return view('admin.employers.edit', compact('breadcrumbs', 'employer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmployerUpdateRequest $request, Employer $employer)
    {
        $validated = $request->validated();

        $employer->name = $validated['name'];
        $employer->company_name = $validated['company_name'];
        $employer->email = $validated['email'];
        $employer->password = Hash::make($validated['email']);
        $employer->phone = $validated['phone'];
        $employer->company_phone = $validated['company_phone'];
        $employer->tin = $validated['tin'];
        $employer->country = $validated['country'];
        $employer->address = $validated['address'];
        $employer->street = $validated['street'];
        $employer->city = $validated['city'];
        $employer->about = $validated['about'];
        $employer->website = $validated['website'];
        $employer->facebook = $validated['facebook'];
        $employer->instagram = $validated['instagram'];
        $employer->linkedin = $validated['linkedin'];

        if ($request->hasFile('image')) {
            $path =  $request->file('image')->storeAs(
                'uploads/employers',
                urlencode(time()) . '_' . uniqid() . '_' . $request->image->getClientOriginalName(),
                'public'
            );
            Storage::delete($employer->image);
            $employer->image = $path;
        }

        $res = $employer->save();

        if ($res) {
            notify()->success(__('Updated successfully'));
        } else {
            notify()->error(__('Failed to Update. Please try again'));
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employer $employer)
    {
        $res = $employer->delete();

        if ($res) {
            notify()->success(__('Deleted successfully'));
        } else {
            notify()->error(__('Failed to Delete. Please try again'));
        }
        return redirect()->back();
    }

    // Change Employer Status
    public function changeStatus(Request $request)
    {
        $employer = Employer::find($request->employer_id);
        $employer->status = $request->status;
        $employer->save();

        return response()->json(['success' => 'Status change successfully.']);
    }
}
