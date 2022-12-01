<?php


namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
// use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
            return redirect('user');
        }
        return view('user.home');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        
        $credentials = $request->only('email', 'password');
        // dd($request->all(),Auth::attempt($credentials));
        if (Auth::attempt($credentials)) {
            FacadesSession::put('user', $request->input('email'));
            return redirect('user/dashboard')->withSuccess('Great! You have Successfully Login.');;
        }

        return redirect("user")->withSuccess('Oppes! You have entered invalid credentials');
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
        FacadesSession::flush();
        Auth::logout();

        return Redirect('user');
    }
}
