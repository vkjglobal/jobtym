<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session as FacadesSession;

class LoginController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        if (Auth::check()) {
            return Redirect('user');
        }
        return Redirect('user');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postLogin(Request $request)
    {
        $request->validate([
            'role' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($request->role == 'user') {
            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {
                FacadesSession::put('user', $request->input('email'));
                return Redirect('user/dashboard')->with('message', 'Great! You have Successfully Login.');
            }else {
                return Redirect("user")->with('error', 'Oppes! You have entered invalid credentials');
            }
        } else {
            $credentials = $request->only('email', 'password');
            if (Auth::guard('employer')->attempt($credentials)) {
                return redirect()->route('employer.home');
            }else {
                return Redirect("user")->with('error', 'Oppes! You have entered invalid credentials');
            }
        }

        return Redirect("user")->with('error', 'Oppes! You have entered invalid credentials');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function logout()
    {
        FacadesSession::flush();
        Auth::logout();

        return Redirect('user');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function resetPasswordSubmit(Request $request)
    {

        $user_check = User::where('email', $request->email)->first();
        // dd($user_check);
        if ($user_check) {
            $token = Str::random(64);
    
            DB::table('user_password_resets')->insert([
                'email' => $request->email,
                'token' => $token,
                'created_at' => Carbon::now(),
            ]);
    
            Mail::send('user.auth.passwords.email', ['token' => $token], function ($message) use ($request) {
                $message->to($request->email);
                $message->subject('Reset Password');
            });
    
            return Redirect('user')->with('message', 'We have e-mailed your password reset link!');
        }else{
            return Redirect('user')->with('error', 'You have entered wrong email');
        }
    }

    /**
     * Display the password reset view for the given token.
     *
     * If no token is present, display the link request form.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string|null  $token
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showResetForm(Request $request, $token = null)
    {
        return view('user.auth.passwords.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function submitResetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);

        $updatePassword = DB::table('user_password_resets')->where(['email' => $request->email, 'token' => $request->token])->first();
        
        if(!$updatePassword){
        return back()->withInput()->with('error', 'Invalid token!');
        }

        $user = User::where('email', $request->email)->update(['password' => Hash::make($request->password)]);

        DB::table('user_password_resets')->where(['email'=> $request->email])->delete();

        return Redirect('user')->with('message', 'Your password has been changed! Please Login again!');
    }
}
