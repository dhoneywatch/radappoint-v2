<?php

namespace App\Http\Controllers;

use App\Models\Radiologist;
use App\Models\Appointment;
use App\Models\Assignment;
use App\Models\Room;
use Illuminate\Http\Request;

class AssignmentController extends Controller
{
    public function create(Appointment $appointment)
    {
        return view('approver.assignment.create', [
            'appointment' => $appointment,
            'radiologists' => Radiologist::all(),
            'rooms' => Room::all()
        ]);
    }

    public function store(Request $request)
    {
        $attributes = $this->validate($request, [
            'appointment_id' => 'required',
            'radiologist_id' => 'required',
            'room_id' => 'required'
        ]);

        Assignment::create($attributes);
        return redirect()->route('assignment.index')->with('message', 'Successfully assigned appointment.');
    }

    public function index()
    {
        return view('approver.assignment.index', [
            'assignments' => Assignment::all()
        ]);
    }

}
