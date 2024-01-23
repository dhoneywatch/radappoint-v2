@extends('layouts.approver-layout')
@section('contents')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h1>List of Rooms</h1>
            <a href={{ route('room.create') }} class="btn btn-sm btn-primary">Add rooms</a>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr class="text-center">
                        <th scope="col">Room</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rooms as $room)
                        <tr class="text-center">
                            <td>{{ $room->room }}</td>
                            <td>
                                <form action="{{ route('room.delete', $room->id) }}" method="POST">
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
