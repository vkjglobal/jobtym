<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use App\Models\Employer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
            "facebook" => "nullable|url",
            "instagram" => "nullable|url",
            "linkedin" => "nullable|url",
            'image' => 'nullable|image|max:2048|mimes:jpeg,png,jpg,gif,svg',
        ]);
        
        if($request->image){
            //dd($request->image);
            $fileName = time().'.'.$request['image']->extension();
            $request->file('image')->move(('user_assets/uploadProfile'), $fileName);
            $updateData['image'] = $fileName;
        }

        $res = Employer::whereId($id)->update($updateData);

        if ($res) {
            notify()->success(__('Profile Updated successfully'));
        } else {
            notify()->error(__('Failed to update profile. Please try again'));
        }
        return Redirect()->back();
    }

    public function changePassword(Request $request, $id)
    {
        $password = $request->password;
        //dd($password);
       // try {
            $updateData = $request->validate([
                'password' => 'required|min:6|confirmed',
                'password_confirmation' => 'required'
                
            ]);
            //dd($updateData);
            $update_passwd = Employer::whereId($id)->update(['password' => Hash::make($request->password)]);
            if ($update_passwd) {
                notify()->success(__('Password Updated successfully.'));
            } else {
                notify()->error(__('Failed to update password. Please try again'));
            }
            return Redirect()->back();
       // } catch (\Throwable $th) {
         //   return back()->withError($th->getMessage())->withInput();
        //}
    }
}
