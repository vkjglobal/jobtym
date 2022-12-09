<?php

namespace App\Http\Controllers\User\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function registration()
    {
        if (Auth::check()) {
            return Redirect('user');
        }
        return view('user.auth.register');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postRegistration(Request $request)
    {
        $data = $request->all();

        $fieldValidtion = [
            'firstName' => 'required|string',
            'lastName' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'newPassword' => 'required',
            'gender' => 'required|in:male,female,other',
            'birthDate' => 'required',
            'phone' => 'required',
            'country' => 'required',
            'resident' => 'required|in:yes,no',
            'street' => 'required',
            'city' => 'required',
            'town' => 'required',
            'postCode' => 'required',
            'accept' => 'required',
        ];

        if($request->file == ""){
            $fieldValidtion ['uploadResume'] = 'required|mimes:pdf,xlx,csv|max:2048';
        }
        $validated = $request->validate($fieldValidtion);

        $fileName = time().'.'.$request['uploadResume']->extension();
        $request->file('uploadResume')->move(('user_assets/uploadResumes'), $fileName);
        $data['uploadResume'] = $fileName;
        $check = $this->create($data);
        $token = Str::random(64);
        $otp = random_int(1000, 9999);
        $email = $request->email;

        DB::table('verify_register_otp')->insert([
            'email' => $request->email,
            'token' => $token,
            'otp' => $otp,
            'created_at' => Carbon::now(),
        ]);

        Mail::send('user.auth.otpConfirmation', ['token' => $token, 'otp' => $otp], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Registration Confirmation'); 
        });
        return view('user.auth.otp', compact('email'));
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function verifyotp(Request $request)
    {
        $request->validate([
            'otp1' => 'required|digits:1',
            'otp2' => 'required|digits:1',
            'otp3' => 'required|digits:1',
            'otp4' => 'required|digits:1',
        ]);

        $updateData = ([
            'is_verify_otp' => 1
        ]);

        $otp = $request->otp1.$request->otp2.$request->otp3.$request->otp4;
        
        $verifyOtp = DB::table('verify_register_otp')->where(['email' => $request->email])->first();
        $res = User::where('email','=',$request->email)->update($updateData);

        if(!$verifyOtp){
            return view('user.auth.otp')->with('error', 'Invalid token!');
        }
        
        DB::table('verify_register_otp')->where(['email' => $request->email])->delete();
        return Redirect("user/login")->with('message', 'Great! You have Successfully Registered! Please Login');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function create(array $data)
    {
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
            'image' => $data['uploadResume'],
        ]);
    }
}
