<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\Models\Admin;
use Illuminate\Http\RedirectResponse;

class AdminLoginController extends Controller
{
    public function login()
    {
        return view('admin.login.login');
    }

    public function confirm_login(Request $request)
    {
        $attributes = $request->all();
        if (Auth::guard('admin')->attempt([
            'email' => $attributes['email'],
            'password' => $attributes['password']
        ])) {
            return redirect()->route('admin.index')->with('message', "Successful login.");
        } else {
            return back()->with('message', 'Invalid credentials.');
        }
    }

    public function register()
    {
        return view('admin.login.register');
    }

    public function confirm_register()
    {
        $attributes = $this->validate_register();
        Admin::create($attributes);
        return redirect()->route('admin.login')->with('message', 'Admin user account is successfully created.');
    }

    protected function validate_register(?Admin $admin = null): array
    {
        $admin ??= new Admin();
        return request()->validate([
            'name' => 'required',
            'email' => [
                'required',
                'string',
                Rule::unique('admins')->ignore($admin->id),
            ],
            'password' => [
                'required',
                'confirmed',
                'min:8',
            ],
        ]);
    }

    public function logout(): RedirectResponse
    {
        Auth::guard('admin')->logout();

        // $request->session()->invalidate();

        // $request->session()->regenerateToken();

        return redirect()->route('admin.login')->with('message', "Logged out successfully.");
    }
}
