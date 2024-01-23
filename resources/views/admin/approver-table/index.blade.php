@extends('layouts.admin-layout')
@section('contents')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Approvers Table</h1>
            <a href={{ route('admin.approver.create') }} class="btn btn-sm btn-primary">New approver</a>
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
                    @foreach ($approvers as $approver)
                        <tr class="text-center">
                            <td>{{ $approver->name }}</td>
                            <td>{{ $approver->email }}</td>
                            <td>{{ $approver->password }}</td>
                            <td class="d-flex flex-row justify-content-center gap-2">
                                <a class="btn btn-primary"
                                    href={{ route('admin.approver.edit', ['approver' => $approver->id]) }} role="button"><i
                                        class="bi bi-pencil-square"></i></a>
                                <form action="{{ route('admin.approver.destroy', $approver->id) }}" method="POST">
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
