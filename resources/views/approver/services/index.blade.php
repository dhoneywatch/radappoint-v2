@extends('layouts.approver-layout')
@section('contents')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Services Table</h1>
            <a href={{ route('services.create') }}>Import</a>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr class="text-center">
                        <th scope="col">Modality Code</th>
                        <th scope="col">Procedure Code</th>
                        <th scope="col">Procedure Name</th>
                        <th scope="col">Price</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($services as $service)
                        <tr class="text-center">
                            <td>{{ $service->modality_code }}</th>
                            <td>{{ $service->procedure_code }}</td>
                            <td>{{ $service->procedure_name }}</td>
                            <td>{{ $service->price }}</td>
                        </tr>
                    @endforeach
            </table>
        </div>

    </div>
@endsection
