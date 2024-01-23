<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Assignment;
use App\Models\Appointment;

class RadiologistController extends Controller
{
    public function index()
    {
        return view('radiologist.index');
    }

    public function assignment_index()
    {
        $currentUser =  Auth::guard('radiologist')->user()->id;
        return view('radiologist.assignment.index', [
            'assignments' => Assignment::where('radiologist_id', $currentUser)->orderBy('created_at', 'DESC')->get()
        ]);
    }

    public function served($id)
    {
        $appointment = Appointment::findOrFail($id);
        if ($appointment) {
            $appointment->update(['status' => 3]);
        }

        return back()->with('message', 'Patient succesfully served.');
    }

    public function absent($id)
    {
        $appointment = Appointment::findOrFail($id);
        if ($appointment) {
            $appointment->update(['status' => 4]);
        }

        return back()->with('message', 'Patient did not arrive on their appointment.');
    }
}
