@extends('layouts.approver-layout')
@section('contents')
    <div class="container">
        <h1 class="text-center">Assign Appointment</h1>
        <form action={{ route('patient.appointment.assignment', ['appointment' => $appointment->id]) }} method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="container table-responsive">
                <input class="form-check-input" name="appointment_id" value={{ $appointment->id }} type="hidden">
                <table class="table" id="slot_table">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">Appointment ID</th>
                            <th scope="col">Patient Name</th>
                            <th scope="col">Procedure Code</th>
                            <th scope="col">Date</th>
                            <th scope="col">Time</th>
                            <th scope="col">Room</th>
                            <th scope="col">Radiologist</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-center">
                            <td>
                                {{ $appointment->id }}
                            </td>
                            <td>
                                {{ $appointment->patient->full_name }}
                            </td>
                            <td>
                                {{ $appointment->slot->service->procedure_code }}
                            </td>
                            <td>
                                {{ $appointment->slot->date }}
                            </td>
                            <td>
                                {{ $appointment->slot->timeslot }}
                            </td>
                            <td>
                                <x-form.table.dropdown name="room_id" descriptiveName="Assign room">
                                    <option value="" selected disabled>Choose...</option>
                                    @foreach ($rooms as $room)
                                        <option value="{{ $room->id }}"
                                            {{ old('room_id') == $room->id ? 'selected' : '' }}>
                                            {{ $room->room }}
                                        </option>
                                    @endforeach
                                    </x-form.dropdown>
                            </td>
                            <td>
                                <x-form.table.dropdown name="radiologist_id" descriptiveName="Assign radiologist">
                                    <option value="" selected disabled>Choose...</option>
                                    @foreach ($radiologists as $radiologist)
                                        <option value="{{ $radiologist->id }}"
                                            {{ old('radiologist_id') == $radiologist->id ? 'selected' : '' }}>
                                            {{ $radiologist->name }}
                                        </option>
                                    @endforeach
                                    </x-form.dropdown>
                            </td>
                        </tr>
                </table>
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

        </form>
    </div>
@endsection
