<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RoomController extends Controller
{
    public function index()
    {
        return view('approver.room.index', [
            'rooms' => Room::all()
        ]);
    }

    public function create()
    {
        return view('approver.room.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'inputs.*.room' => [
                'required',
                Rule::unique('rooms')->ignore($request->id),
                ]
        ], [
            'inputs.*.room' => 'Room is required and should be unique'
        ]);

        foreach ($request->inputs as $key => $value) {
            Room::create($value);
        }

        return redirect()->route('room.index')->with('message', 'Room/s created successfully');
    }

    public function destroy($id)
    {
        $room = Room::findOrFail($id);
        $room->delete();
        return redirect()->route('room.index')->with('message', 'Deleted the room successfully.');
    }
}
