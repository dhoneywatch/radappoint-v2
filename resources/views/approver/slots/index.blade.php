@extends('layouts.approver-layout')
@section('contents')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Slots Table</h1>
            <a href={{ route('slots.create') }}>Add Slot</a>
            {{-- <a href={{ route('services.edit') }}>Update</a> --}}
        </div>
        <table class="table">
            <thead>
                <tr class="text-center">
                    <th scope="col">Modality Code</th>
                    <th scope="col">Procedure Code</th>
                    <th scope="col">Procedure Name</th>
                    <th scope="col">Date</th>
                    <th scope="col">Timeslot</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($slots as $slot)
                    <tr class="text-center">
                        <td> {{ $slot->service->modality_code }}</td>
                        <td> {{ $slot->service->procedure_code }}</td>
                        <td> {{ $slot->service->procedure_name }}</td>
                        <td>{{ $slot->date }}</td>
                        <td>{{ $slot->timeslot }}</td>
                        <td><a href={{ route('slots.update', ['slot' => $slot->id]) }}
                                class="btn btn-sm btn-{{ $slot->is_closed ? 'danger' : 'success' }}">
                                {{ $slot->is_closed ? 'Closed' : 'Open' }}
                            </a>
                        </td>
                    </tr>
                @endforeach
        </table>
    </div>
@endsection
