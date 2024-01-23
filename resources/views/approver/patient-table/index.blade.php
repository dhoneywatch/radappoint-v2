@extends('layouts.approver-layout')
@section('contents')
    <div class="container">
        <div class="d-flex justify-content-center align-items-center">
            <h1>Patients Table</h1>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr class="text-center">
                        <th scope="col">Full Name</th>
                        <th scope="col">Sex</th>
                        <th scope="col">Birthdate</th>
                        <th scope="col">Age</th>
                        <th scope="col">Contact Number</th>
                        <th scope="col">Email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($patients as $patient)
                        <tr class="text-center vertical-center">
                            <td>{{ $patient->full_name }}</td>
                            <td>{{ $patient->sex }}</td>
                            <td>{{ $patient->birthdate }}</td>
                            <td>{{ $patient->age }}</td>
                            <td>{{ $patient->contact_number }}</td>
                            <td>{{ $patient->email }}</td>

                        </tr>
                    @endforeach
            </table>
        </div>

    </div>
@endsection
