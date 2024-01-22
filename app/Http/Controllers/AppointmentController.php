<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Models\Slot;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    public function create()
    {
        $slot = Slot::where('is_closed', 0)->get();
        return view('patient.appointment.create', [
            'slots' => $slot
        ]);
    }

    public function store(Request $request)
    {

        $attributes = $this->validate($request, [
            'slot_id' => 'required',
            'patient_id' => 'required',
            'request_image' => [
                'required',
                'image',
                'mimes:png,jpg,jpeg'
            ]
        ], [
            'slot_id' => 'Pick a slot.',
            'request_image' => 'Request from a physician is required.'
        ]);

        $path1 = $request->file('request_image')->store('temp');
        $path = storage_path('app') . '/' . $path1;
        $attributes['request_image'] = $path;
        $attributes['slot_id'] = $request->input('slot_id');
        Appointment::create($attributes);

        $slot_id = $attributes['slot_id'];
        $slot = Slot::where('id', '=', $slot_id)->first();
        if ($slot) {
            $slot->update(['is_closed' => 1]);
        }
        return redirect()->route('patient.appointment.index')->with('message', 'Appointment booked successfully. Kindly check your email for payment details.');
    }


    public function patient_index()
    {
        $currentUser =  Auth::guard('patient')->user()->id;
        return view('patient.appointment.index', [
            'appointments' => Appointment::where('patient_id', $currentUser)->orderBy('updated_at', 'DESC')->get()
        ]);
    }

    public function edit(Appointment $appointment)
    {
        $slot = Slot::where('is_closed', 0)->get();
        return view('patient.appointment.edit', [
            'appointment' => $appointment,
            'slots' => $slot,
        ]);
    }

    public function update(Request $request, $id)
    {
        $attributes = $this->validate($request, [
            'slot_id' => 'required',
            'patient_id' => 'required',
            'request_image' => [
                'required',
                'image',
                'mimes:png,jpg,jpeg'
            ]
        ]);

        $previousAppointment = Appointment::findOrFail($id);
        $previousSlotID = $previousAppointment->slot_id;
        $previousSlot = Slot::find($previousSlotID);
        if ($previousSlot) {
            $previousSlot->update(['is_closed' => 0]);
        }

        $path1 = request()->file('request_image')->store('temp');
        $path = storage_path('app') . '/' . $path1;
        $attributes['request_image'] = $path;
        $attributes['slot_id'] = request()->input('slot_id');

        $previousAppointment->update($attributes);

        $newSlot = Slot::where('id', '=', $attributes['slot_id'])->first();
        if($newSlot) {
            $newSlot->update(['is_closed' => 1]);
        }

        return redirect()->route('patient.appointment.index')->with('message', 'Booking edited successfully.');
    }

    public function cancel($id) {
        $appointment = Appointment::findOrFail($id);
        if($appointment) {
            $appointment->update(['status' => 2]);
        }

        $slotID = $appointment->slot_id;
        $slot = Slot::find($slotID);
        if($slot){
            $slot->update(['is_closed' => 0]);
        }

        return back()->with('message', 'Appointment cancelled.');
    }

    public function decline($id) {
        $appointment = Appointment::findOrFail($id);
        if($appointment) {
            $appointment->update(['status' => 2]);
        }

        $slotID = $appointment->slot_id;
        $slot = Slot::find($slotID);
        if($slot){
            $slot->update(['is_closed' => 0]);
        }

        return back()->with('message', 'Appointment declined.');
    }

    public function confirm($id) {
        $appointment = Appointment::findOrFail($id);
        if($appointment) {
            $appointment->update(['status' => 1]);
        }

        return back()->with('message', 'Appointment confirmed.');
    }

    public function served($id) {
        $appointment = Appointment::findOrFail($id);
        if($appointment) {
            $appointment->update(['status' => 3]);
        }

        return back()->with('message', 'Patient succesfully served.');
    }

    public function absent($id) {
        $appointment = Appointment::findOrFail($id);
        if($appointment) {
            $appointment->update(['status' => 4]);
        }

        return back()->with('message', 'Patient did not arrive on their appointment.');
    }

    public function approver_appointment()
    {
        return view('approver.appointment.index', [
            'appointments' => Appointment::orderBy('created_at', 'DESC')->get()
        ]);
    }
}
