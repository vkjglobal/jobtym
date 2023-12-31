<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin.auth:admin');
    }

    public function index()
    {
        $breadcrumbs = [
            [(__('Dashboard')), route('admin.home')],
            [(__('Profile')), null],
        ];

        $admin = Auth::guard('admin')->user();
        return view('admin.profile.index', compact('breadcrumbs', 'admin'));
    }

    public function store(Request $request)
    {
        $admin = Auth::guard('admin')->user();
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:admins,email,' . $admin->id
        ]);

        $admin->name = $validated['name'];
        $admin->email = $validated['email'];
        $res = $admin->save();

        if ($res) {
            notify()->success(__('Updated successfully'));
        } else {
            notify()->error(__('Failed to Update. Please try again'));
        }
        return redirect()->back();
    }

    public function updatePass(Request $request)
    {
        $admin = Auth::guard('admin')->user();
        $validated = $request->validate([
            'password' => 'required|confirmed',
        ]);

        $admin->password = Hash::make($validated['password']);
        $res = $admin->save();

        if ($res) {
            notify()->success(__('Password changed successfully'));
        } else {
            notify()->error(__('Failed to chnage Password. Please try again'));
        }
        return redirect()->back();
    }
}
