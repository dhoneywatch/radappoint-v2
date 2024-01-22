<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\Slot;

class SlotController extends Controller
{
    public function create()
    {
        return view('approver.slots.create', [
            'services' => Service::all()
        ]);
    }

    public function index()
    {
        // dd(Slot::all());
        return view('approver.slots.index', [
            'slots' => Slot::all(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'inputs.*.service_id' => 'required',
            'inputs.*.date' => [
                'required',
                'date',
                'after:tomorrow + 2 day'
            ],
            'inputs.*.timeslot' => 'required',
        ],[
            'inputs.*.service_id' => 'Procedure is required.',
            'inputs.*.date' => 'Date is required and needs to be at least three days from now.',
            'inputs.*.timeslot' => 'Timeslot is required'
        ]);

        foreach ($request->inputs as $key => $value)
        {
            Slot::create($value);
        }

        return redirect()->route('slots.index')->with('message', 'Successfully added slot/s.');
    }

    public function update($id)
    {
        $slot = Slot::find($id);

        $slot->is_closed = !$slot->is_closed;

        $slot->save();

        return back();
    }

    public function destroy($id)
    {
        $slot = Slot::findOrFail($id);
        $slot->delete();
        return back()->with('message', 'Slot deleted successfully.');
    }

}
