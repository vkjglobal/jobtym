<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUserRequest;
use App\Http\Requests\Admin\UpdateUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    //
    public function index()
    {
        $breadcrumbs = [
            [(__('Dashboard')), route('employer.home')],
            [(__('Employee')), null],
        ];

        $users = User::latest()->get();
        return view('employer.users.index', compact('breadcrumbs', 'users'));
    }

    public function create()
    {
        $breadcrumbs = [
            [(__('Dashboard')), route('employer.home')],
            [(__('Employee')), route('employer.employee.index')],
            [(__('Create')), null]
        ];

        return view('employer.users.create', compact('breadcrumbs'));

    }

    public function store(StoreUserRequest $request)
    {
        $validated = $request->validated();

        $user = new User();
        $user->first_name = $validated['first_name'];
        $user->last_name = $validated['last_name'];
        $user->email = $validated['email'];
        $user->password = Hash::make($validated['email']);
        $user->phone = $validated['phone'];
        $user->secondary_phone = $validated['secondary_phone'];
        $user->gender = $validated['gender'];
        $user->date_of_birth = date('Y-m-d', strtotime($validated['date_of_birth']));
        $user->vaccination_ref_number = $validated['vaccination_ref_number'];
        $user->street = $validated['street'];
        $user->city = $validated['city'];
        $user->town = $validated['town'];
        $user->division = $validated['division'];
        $user->country = $validated['country'];
        $user->isResident = $validated['isResident'];
        $user->postal_address = $validated['postal_address'];
        $user->tin = $validated['tin'];

        if ($request->hasFile('image')) {
            $path =  $request->file('image')->storeAs(
                'uploads/users',
                urlencode(time()) . '_' . uniqid() . '_' . $request->image->getClientOriginalName(),
                'public'
            );
            $user->image = $path;
        }

        $res = $user->save();

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
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id,User $user)
    {
        $user=User::where('id',$id)->first();
        $breadcrumbs = [
            [(__('Dashboard')), route('employer.home')],
            [(__('Users')), route('employer.employee.index')],
            [(__('Edit')), null]
        ];

        return view('employer.users.edit', compact('breadcrumbs', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update($id,Request $request, User $user)
    {
      //  $validated = $request->validated();
      $validated = $request->validate([
        'first_name' => 'required|string',
        'last_name' => 'required|string',
        'email' => 'required|email|unique:users,email,' . $id,
        'gender' => 'required',
        'date_of_birth' => 'required|date',
        'phone' => 'required|numeric',
        'secondary_phone' => 'required|numeric',
        'country' => 'required',
        'isResident' => 'required',
        'street' => 'required|string',
        'city' => 'required|string',
        'town' => 'required|string',
        'division' => 'required|string',
        'postal_address' => 'required',
        'tin' => 'required|string',
        'vaccination_ref_number' => 'required|string',
        'image' => 'nullable|mimes:jpg,jpeg,png,bmp,tiff,svg|max:4096',
    ]); 
        $user->first_name = $validated['first_name'];
        $user->last_name = $validated['last_name'];
        $user->email = $validated['email'];
        $user->phone = $validated['phone'];
        $user->secondary_phone = $validated['secondary_phone'];
        $user->gender = $validated['gender'];
        $user->date_of_birth = date('Y-m-d', strtotime($validated['date_of_birth']));
        $user->vaccination_ref_number = $validated['vaccination_ref_number'];
        $user->street = $validated['street'];
        $user->city = $validated['city'];
        $user->town = $validated['town'];
        $user->division = $validated['division'];
        $user->country = $validated['country'];
        $user->isResident = $validated['isResident'];
        $user->postal_address = $validated['postal_address'];
        $user->tin = $validated['tin'];

        if ($request->hasFile('image')) {
            $path =  $request->file('image')->storeAs(
                'uploads/users',
                urlencode(time()) . '_' . uniqid() . '_' . $request->image->getClientOriginalName(),
                'public'
            );

            $imagePath = public_path('storage/' . $user->image);
            if (File::exists($imagePath)) {
                unlink($imagePath);
            }

            $user->image = $path;
        }

        $res = $user->save();

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
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $res = $user->delete();

        if ($res) {
            notify()->success(__('Deleted successfully'));
        } else {
            notify()->error(__('Failed to Delete. Please try again'));
        }
        return redirect()->back();
    }

    // Change User Status
    public function changeStatus(Request $request)
    {
        $user = User::find($request->user_id);
        $user->status = $request->status;
        $user->save();

        return response()->json(['success' => 'Status change successfully.']);
    }

}
