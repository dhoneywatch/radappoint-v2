@extends('layouts.approver-layout')
@section('contents')
    <div class="container">
        <h1 class="text-center">Create a room</h1>
        <form action={{ route('room.store') }} method="POST" enctype="multipart/form-data">
            @csrf
            <table class="table" id="slot_table">
                <thead>
                    <tr class="text-center">
                        <th scope="col">No.</th>
                        <th scope="col">Room</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-center">
                        <td id="number">1</td>
                        <td><x-form.table.input name="inputs[0][room]" descriptiveName="Room" type="text" /></td>
                        <td><button type="button" id="add" name="add" class="btn btn-info">Add</button></td>
                    </tr>
            </table>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

        </form>
    </div>
@endsection

@section('scripts')
    <script>
        var i = 0;
        var j = 1;
        $('#add').click(function() {
            ++i;
            ++j;
            $('#slot_table').append(
                `<tr class="text-center">
                    <td id="number">`+j+`</td>
                        <td><x-form.table.input name="inputs[`+i+`][room]" descriptiveName="Room" type="text" /></td>
                        <td><button type="button" id="remove" class="btn btn-danger">Remove</button></td>
                    </tr>`);
        });

        $(document).on('click', '#remove', function() {
            $(this).parents('tr').remove();
        });
    </script>
@endsection
