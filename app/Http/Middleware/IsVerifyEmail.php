<?php

namespace App\Http\Middleware;

use App\Models\User;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class IsVerifyEmail
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $email = $request->email;
        $user = User::where('email','=',$email)->first();
        if ($user->is_verify_otp == 0) {
            $token = Str::random(64);
            $otp = random_int(1000, 9999);

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
            return redirect()->route('user.viewVerifyotp', ['email'=> $email]);
          }
   
        return $next($request);
    }
}
