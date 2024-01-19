<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\Models\Approver;
use Illuminate\Http\RedirectResponse;

class ApproverLoginController extends Controller
{
    public function login()
    {
        return view('approver.login.login');
    }

    public function confirm_login(Request $request)
    {
        $attributes = $request->all();
        if (Auth::guard('approver')->attempt([
            'email' => $attributes['email'],
            'password' => $attributes['password']
        ])) {
            return redirect()->route('approver.index')->with('message', "Successful login.");
        } else {
            return back()->with('message', 'Invalid credentials.');
        }
    }

    public function register()
    {
        return view('approver.login.register');
    }

    public function confirm_register()
    {
        $attributes = $this->validate_register();
        Approver::create($attributes);
        return redirect()->route('approver.login')->with('message', 'Approver account is successfully created.');
    }

    protected function validate_register(?Approver $approver = null): array
    {
        $approver ??= new Approver();
        return request()->validate([
            'name' => 'required',
            'email' => [
                'required',
                'string',
                Rule::unique('approvers')->ignore($approver->id),
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
        Auth::guard('approver')->logout();

        // $request->session()->invalidate();

        // $request->session()->regenerateToken();

        return redirect()->route('approver.login')->with('message', "Logged out successfully.");
    }
}
