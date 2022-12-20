<?php

namespace App\Http\Controllers\User\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\Employer;
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
        }else{
            $fieldValidtion ['uploadResume'] = 'mimes:pdf,xlx,csv|max:2048';
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
    public function viewVerifyotp($email)
    {
        // dd($email);
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

        $email = $request->email;

        $updateData = ([
            'is_verify_otp' => 1
        ]);

        $otp = $request->otp1.$request->otp2.$request->otp3.$request->otp4;
        
        $verifyOtp = DB::table('verify_register_otp')->where(['email' => $request->email,'otp' => $otp])->first();
        
        if(!$verifyOtp){
            return view('user.auth.otp', compact('email'));
        }
        $res = User::where('email','=',$request->email)->update($updateData);
        
        DB::table('verify_register_otp')->where(['email' => $request->email])->delete();
        return Redirect("user")->with('message', 'Great! You have Successfully Registered! Please Login Again');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function reSendOtp(Request $request, $email)
    {
        $token = Str::random(64);
        $otp = random_int(1000, 9999);

        DB::table('verify_register_otp')->insert([
            'email' => $email,
            'token' => $token,
            'otp' => $otp,
            'created_at' => Carbon::now(),
        ]);
        Mail::send('user.auth.otpConfirmation', ['token' => $token, 'otp' => $otp], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Registration Confirmation'); 
        });
        return redirect()->route('user.viewVerifyotp', ['email'=> $email]);
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


    /**
     * Create a new employer instance after a valid registration.
     *
     * @param array $data
     *
     * @return \App\Models\Employer
     */
    protected function Empcreate(Request $request)
    {
        $data = $request->validate([
            'EmplyrName' => 'required|string',
            'CompanyName' => 'required|string',
            'EmplyrEmail' => 'required|email|unique:employers,email',
            'EmplyrPassword' => 'required',
            'EmplyrPhoneNumber' => 'required',
            'EmplyrCompanyPhone' => 'required',
            'EmplyrTINnumber' => 'required',
            'CountryNameEmplyr' => 'required',
            'AboutCompany' => 'required',
            'CompanyWebsite' => 'required',
            'CompanyFacebook' => 'required',
            'CompanyInstagram' => 'required',
            'CompanyLinkedIn' => 'required',
            'terms' => 'required',
        ]);
       
        $employer = new Employer();
        $employer->name = $request->EmplyrName;
        $employer->company_name = $request->CompanyName;
        $employer->email = $request->EmplyrEmail;
        $employer->password = Hash::make($request->EmplyrPassword);
        $employer->phone = $request->EmplyrPhoneNumber;
        $employer->company_phone = $request->EmplyrCompanyPhone;
        $employer->tin = $request->EmplyrTINnumber;
        $employer->country = $request->CountryNameEmplyr;
        $employer->address = 'Please enter your address here';
        $employer->street = $request->StreetNameEmplyr;
        $employer->city = $request->CityNameEmplyr;
        $employer->about = $request->AboutCompany;
        $employer->website = $request->CompanyWebsite;
        $employer->facebook = $request->CompanyFacebook;
        $employer->instagram = $request->CompanyInstagram;
        $employer->linkedin = $request->CompanyLinkedIn;

        $res = $employer->save();
        if ($res) {
            return Redirect("user")->with('message', 'Great! You have Successfully Registered! Please Login');
        } else {
            return Redirect("user")->with('error', 'Opps! Something went wrong');
        }
    }
}