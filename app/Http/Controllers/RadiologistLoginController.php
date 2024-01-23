<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\Models\Admin;
use App\Models\Radiologist;
use Illuminate\Http\RedirectResponse;

class RadiologistLoginController extends Controller
{
    public function login()
    {
        return view('radiologist.login.login');
    }

    public function confirm_login(Request $request)
    {
        $attributes = $request->all();
        if (Auth::guard('radiologist')->attempt([
            'email' => $attributes['email'],
            'password' => $attributes['password']
        ])) {
            return redirect()->route('radiologist.index')->with('message', "Successful login.");
        } else {
            return back()->with('message', 'Invalid credentials.');
        }
    }

    public function logout(): RedirectResponse
    {
        Auth::guard('radiologist')->logout();

        return redirect()->route('radiologist.login')->with('message', "Logged out successfully.");
    }
}
