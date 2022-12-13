<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('user.dashboard');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->password != null);

        $updateData = $request->validate([
            "first_name" => "required",
            "last_name" => "required",
            "email" => "required",
            "gender" => "required",
            "phone" => "required",
            "secondary_phone" => "required",
            "date_of_birth" => "required",
            "isResident" => "required",
            "country" => "required",
            "street" => "required",
            "city" => "required",
            "town" => "required",
            "division" => "required",
            "postal_address" => "required",
            "tin" => "required",
            "vaccination_ref_number" => "required",
        ]);

        $res = User::whereId($id)->update($updateData);

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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function changePassword(Request $request, $id)
    {
        $updateData = $request->validate([
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);
        $update_passwd = User::whereId($id)->update(['password' => Hash::make($request->password)]);
        dd($update_passwd);
        if ($update_passwd) {
            notify()->success(__('Password Updated successfully.'));
        } else {
            notify()->error(__('Failed to update password. Please try again'));
        }
        return Redirect()->back();
    }
}
