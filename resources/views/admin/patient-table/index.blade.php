@extends('layouts.admin-layout')
@section('contents')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Patients Table</h1>
        </div>
        <table class="table">
            <thead>
                <tr class="text-center">
                    <th scope="col">Full Name</th>
                    <th scope="col">Sex</th>
                    <th scope="col">Birthdate</th>
                    <th scope="col">Contact Number</th>
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>
                    <th scope="col">Actions</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($patients as $patient)
                    <tr class="text-center vertical-center">
                        <td>{{ $patient->full_name }}</td>
                        <td>{{ $patient->sex }}</td>
                        <td>{{ $patient->birthdate }}</td>
                        <td>{{ $patient->contact_number }}</td>
                        <td>{{ $patient->email }}</td>
                        <td>{{ $patient->password }}</td>
                        <td>
                            {{-- <a class="btn btn-primary" href={{ route('admin.patient.edit', ['patient' => $patient->id]) }}
                                role="button"><i class="bi bi-pencil-square"></i></a> --}}
                            <form action="{{ route('admin.patient.destroy', $patient->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit"><i class="bi bi-trash"></i></button>
                            </form>

                        </td>
                    </tr>
                @endforeach
        </table>
    </div>
@endsection
