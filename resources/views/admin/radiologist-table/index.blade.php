@extends('layouts.admin-layout')
@section('contents')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Radiologists Table</h1>
            <a href={{ route('admin.radiologist.create') }}>New Radiologist</a>
        </div>
        <table class="table">
            <thead>
                <tr class="text-center">
                    <th scope="col">Full Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($radiologists as $radiologist)
                    <tr class="text-center">
                        <td>{{ $radiologist->name }}</td>
                        <td>{{ $radiologist->email }}</td>
                        <td>{{ $radiologist->password }}</td>
                        <td class="d-flex flex-row justify-content-center gap-2">
                            <a class="btn btn-primary" href={{ route('admin.radiologist.edit', ['radiologist' => $radiologist->id]) }}
                                role="button"><i class="bi bi-pencil-square"></i></a>
                            <form action="{{ route('admin.radiologist.destroy', $radiologist->id) }}" method="POST">
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
