@extends('layouts.patient-layout')
@section('contents')
    <div class="container">
        <h1>My Appointments</h1>
        <table class="table">
            <thead>
                <tr class="text-center">
                    <th scope="col">Modality</th>
                    <th scope="col">Procedure Name</th>
                    <th scope="col">Date</th>
                    <th scope="col">Time</th>
                    <th scope="col">Price</th>
                    <th scope="col">Booking Status</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($appointments as $appointment)
                    <tr class="text-center">
                        <td>
                            @if ($appointment->slot->service->modality_code == 'CR')
                                X-ray
                            @elseif ($appointment->slot->service->modality_code == 'US')
                                Ultrasound
                            @elseif ($appointment->slot->service->modality_code == 'MR')
                                MRI
                            @elseif ($appointment->slot->service->modality_code == 'CT')
                                CT Scan
                            @endif
                        </td>
                        <td>{{ $appointment->slot->service->procedure_name }}</th>
                        <td>{{ $appointment->slot->date }}</td>
                        <td>{{ $appointment->slot->timeslot }}</td>
                        <td>&#8369; {{ $appointment->slot->service->price }}</td>
                        <td>
                            @if ($appointment->status == 0)
                                In progress
                            @elseif ($appointment->status == 1)
                                Confirmed
                            @elseif ($appointment->status == 2)
                                Cancelled/Declined
                            @elseif ($appointment->status == 3)
                                Served
                            @elseif ($appointment->status == 4)
                                Absent
                            @endif
                        </td>
                        <td class="d-flex flex-row justify-content-center gap-2">
                            @if ($appointment->status == 0)
                                <a class="btn btn-sm btn-primary"
                                    href={{ route('patient.appointment.edit', ['appointment' => $appointment->id]) }}
                                    role="button"><i class="bi bi-pencil-square"></i></a>
                                <a href={{ route('patient.appointment.cancel', $appointment->id) }}
                                    class="btn btn-sm btn-danger">
                                    <i class="bi bi-x-square"></i>
                                </a>
                            @else
                                <h2>-</h2>
                            @endif
                        </td>
                    </tr>
                @endforeach
        </table>
    </div>
@endsection
