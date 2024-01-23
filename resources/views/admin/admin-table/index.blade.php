@extends('layouts.admin-layout')
@section('contents')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Admins Table</h1>
            <a href={{ route('admin.admin.create') }}>New admin</a>
        </div>
        <div class="table-responsive">
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
                    @foreach ($admins as $admin)
                        <tr class="text-center">
                            <td>{{ $admin->name }}</td>
                            <td>{{ $admin->email }}</td>
                            <td>{{ $admin->password }}</td>
                            <td class="d-flex flex-row justify-content-center gap-2">
                                <a class="btn btn-primary" href={{ route('admin.admin.edit', ['admin' => $admin->id]) }}
                                    role="button"><i class="bi bi-pencil-square"></i></a>
                                <form action="{{ route('admin.admin.destroy', $admin->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
            </table>
        </div>

    </div>
@endsection
