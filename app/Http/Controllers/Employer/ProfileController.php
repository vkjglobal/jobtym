<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use App\Models\Employer;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Show the Employer dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit($id) {
        $employerData = Employer::where('id', $id)->first();
        return view('employer.profile',compact('employerData'));
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
        $updateData = $request->validate([
            "name" => "required",
            "company_name" => "required",
            "email" => "required",
            "phone" => "required",
            "company_phone" => "required",
            "address" => "required",
            "street" => "required",
            "city" => "required",
            "country" => "required",
            "tin" => "required",
            "website" => "required",
            "about" => "required",
            "facebook" => "required",
            "instagram" => "required",
            "linkedin" => "required",
        ]);

        $res = Employer::whereId($id)->update($updateData);

        if ($res) {
            notify()->success(__('Profile Updated successfully'));
        } else {
            notify()->error(__('Failed to update profile. Please try again'));
        }
        return Redirect()->back();
    }
}
