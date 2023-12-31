<?php

namespace App\Http\Controllers\Employer\Auth;

use App\Models\Employer;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new admins as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect employers after registration.
     *
     * @var string
     */
    protected $redirectTo = '/employer';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('employer.guest:employer');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string',
            'company_name' => 'required|string',
            'email' => 'required|email|unique:employers,email',
            'phone' => 'required',
            'company_phone' => 'required',
            'address' => 'required',
            'street' => 'required|string',
            'city' => 'required|string',
            'country' => 'required|string',
            'tin' => 'required|string',
            'about' => 'required',
            'website' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'image' => 'nullable|image|max:2048|mimes:jpeg,png,jpg,gif,svg',
        ]);
    }

    /**
     * Create a new employer instance after a valid registration.
     *
     * @param array $data
     *
     * @return \App\Models\Employer
     */
    protected function create(array $data)
    {
        $employer = new Employer();
        $employer->name = $data['name'];
        $employer->company_name = $data['company_name'];
        $employer->email = $data['email'];
        $employer->password = Hash::make($data['email']);
        $employer->phone = $data['phone'];
        $employer->company_phone = $data['company_phone'];
        $employer->tin = $data['tin'];
        $employer->country = $data['country'];
        $employer->address = $data['address'];
        $employer->street = $data['street'];
        $employer->city = $data['city'];
        $employer->about = $data['about'];
        $employer->website = $data['website'];
        $employer->facebook = $data['facebook'];
        $employer->instagram = $data['instagram'];
        $employer->linkedin = $data['linkedin'];

        if (isset($data['image'])) {
            $path =  $data['image']->storeAs(
                'uploads/employers',
                urlencode(time()) . '_' . uniqid() . '_' . $data['image']->getClientOriginalName(),
                'public'
            );
            $employer->image = $path;
        }

        $res = $employer->save();
        if ($res) {
            notify()->success(__('Register successfull'));
            return $employer;
        } else {
            notify()->error(__('Failed to Register. Please try again'));
            return redirect()->back();
        }
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('employer.auth.register');
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('employer');
    }
}
