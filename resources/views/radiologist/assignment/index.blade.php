@extends('layouts.radiologist-layout')
@section('contents')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Assignments Table</h1>
        </div>
        <div class="container table-responsive">
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
                        <th scope="col">Status</th>
                        <th scope="col">Update</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($assignments as $assignment)
                        <tr class="text-center">
                            <td>
                                {{ $assignment->appointment_id }}
                            </td>
                            <td>
                                {{ $assignment->appointment->patient->full_name }}
                            </td>
                            <td>
                                {{ $assignment->appointment->slot->service->procedure_code }}
                            </td>
                            <td>
                                {{ $assignment->appointment->slot->date }}
                            </td>
                            <td>
                                {{ $assignment->appointment->slot->timeslot }}
                            </td>
                            <td>
                                {{ $assignment->room->room }}
                            </td>
                            <td>
                                {{ $assignment->radiologist->name }}
                            </td>
                            <td>
                                @if ( $assignment->appointment->status == 1)
                                Confirmed
                                @elseif ( $assignment->appointment->status == 3)
                                Served
                                @elseif ( $assignment->appointment->status == 4)
                                Absent
                                @endif
                            </td>
                            <td>
                                @if ($assignment->appointment->status == 1)
                                    <div class="dropdown">
                                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            Select
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item"
                                                    href={{ route('radiologist.appointment.served', $assignment->appointment->id) }}>Served</a></li>
                                            <li><a class="dropdown-item"
                                                    href={{ route('radiologist.appointment.absent', $assignment->appointment->id) }}>Absent</a></li>
                                        </ul>
                                    </div>
                                @endif
                            </td>
                        </tr>
                    @endforeach

            </table>
        </div>
    </div>
@endsection
