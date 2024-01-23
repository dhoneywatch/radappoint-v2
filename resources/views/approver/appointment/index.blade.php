@extends('layouts.approver-layout')
@section('contents')
    <div class="container">
        <div class="d-flex justify-content-center">
            <h1>Appointments</h1>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr class="text-center">
                        <th scope="col">Full Name</th>
                        <th scope="col">Procedure Code</th>
                        <th scope="col">Date</th>
                        <th scope="col">Timeslot</th>
                        <th scope="col">Request</th>
                        <th scope="col">Payment</th>
                        <th scope="col">Booking Status</th>
                        <th scope="col">Update Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($appointments as $appointment)
                        <tr class="text-center">
                            <td>{{ $appointment->patient->full_name }}</td>
                            <td>{{ $appointment->slot->service->procedure_code }}</td>
                            <td>{{ $appointment->slot->date }}</td>
                            <td>{{ $appointment->slot->timeslot }}</td>
                            <td><img src={{ asset($appointment->request_image) }} width='50' height='50'
                                    alt="request">
                            </td>
                            <td>

                                    <img src={{ asset($appointment->payment_image) }} width='50' height='50'
                                        alt="payment">


                            </td>
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
                            <td>
                                @if ($appointment->status == 0)
                                    <div class="dropdown">
                                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            Select
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item"
                                                    href={{ route('appointment.decline', $appointment->id) }}>Declined</a>
                                            </li>
                                            <li><a class="dropdown-item"
                                                    href={{ route('appointment.confirm', $appointment->id) }}>Confirmed</a>
                                            </li>
                                        </ul>
                                    </div>
                                @endif
                                {{-- @if ($appointment->status == 1)
                                    <div class="dropdown">
                                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            Select
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item"
                                                    href={{ route('appointment.served', $appointment->id) }}>Served</a></li>
                                            <li><a class="dropdown-item"
                                                    href={{ route('appointment.absent', $appointment->id) }}>Absent</a></li>
                                        </ul>
                                    </div>
                                @endif --}}
                            </td>
                            <td>
                                @if ($appointment->status == 1)
                                    <a href={{ route('appointment.assign', ['appointment' => $appointment->id]) }} class="btn btn-sm btn-primary">Assign</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
            </table>
        </div>

    </div>
@endsection
