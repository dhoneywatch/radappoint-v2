<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\Models\Patient;
use Illuminate\Http\RedirectResponse;

class PatientLoginController extends Controller
{
    public function login()
    {
        return view('patient.login.login');
    }

    public function confirm_login(Request $request)
    {
        $attributes = $request->all();
        if (Auth::guard('patient')->attempt([
            'email' => $attributes['email'],
            'password' => $attributes['password']
        ])) {
            return redirect()->route('patient.index')->with('message', "Successful login.");
        } else {
            return back()->with('message', 'Invalid credentials.');
        }
    }

    public function register()
    {
        return view('patient.login.register');
    }

    public function confirm_register()
    {
        $attributes = $this->validate_register();
        Patient::create($attributes);
        return redirect()->route('patient.login')->with('message', 'Patient account is successfully created.');
    }

    protected function validate_register(?Patient $patient = null): array
    {
        $patient ??= new Patient();
        return request()->validate([
            'last_name' => 'required',
            'first_name' => 'required',
            'middle_name' => 'nullable',
            'sex' => 'required',
            'birthdate' => 'required',
            'contact_number' => [
                'required',
                'numeric',
            ],
            'email' => [
                'required',
                'string',
                Rule::unique('patients')->ignore($patient->id),
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
        Auth::guard('patient')->logout();
        return redirect()->route('patient.login')->with('message', "Logged out successfully.");
    }
}
