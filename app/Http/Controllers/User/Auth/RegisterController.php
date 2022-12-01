<?php

namespace App\Http\Controllers\User\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function registration()
    {
        return view('user.auth.register');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postRegistration(Request $request)
    {
        // dd('here');
        // $request->validate([
        //     'first_name' => 'required|string',
        //     'last_name' => 'required|string',
        //     'email' => 'required|email|unique:users,email',
        //     'password' => 'required',
        //     'gender' => 'required',
        //     'date_of_birth' => 'required',
        //     'phone' => 'required',
        //     'secondary_phone' => 'required',
        //     'country' => 'required',
        //     'isResident' => 'required',
        //     'street' => 'required',
        //     'city' => 'required',
        //     'town' => 'required',
        //     'division' => 'required',
        //     'postal_address' => 'required',
        //     'tin' => 'required',
        //     'vaccination_ref_number' => 'required',
        //     'image' => 'nullable|image|max:2048|mimes:jpeg,png,jpg,gif,svg',
        // ]);

        $data = $request->all();
        $check = $this->create($data);

        return redirect("user/login")->withSuccess('Great! You have Successfully Registered! Please Login');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function create(array $data)
    {
        // dd($data);
        return User::create([
            'first_name' => $data['firstName'],
            'last_name' => $data['lastName'],
            'email'  => $data['email'],
            'password' => Hash::make($data['newPassword']),
            'gender' => $data['gender'],
            'date_of_birth' => $data['birthDate'],
            'phone' => $data['phone'],
            'secondary_phone' => $data['secondPhone'],
            'country' => $data['country'],
            'isResident' => $data['resident'],
            'street' => $data['street'],
            'city' => $data['city'],
            'town' => $data['town'],
            'division' => $data['division'],
            'postal_address' => $data['postCode'],
            'tin' => $data['tinNo'],
            'vaccination_ref_number' => $data['vaccNo'],
            'image' => $data['filename'],
        ]);
    }
}
