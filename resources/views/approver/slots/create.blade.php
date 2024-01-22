@extends('layouts.approver-layout')
@section('contents')
    <div class="container">
        <h1>Set Available Slots</h1>
        <form action={{ route('slots.store') }} method="POST" enctype="multipart/form-data">
            @csrf
            <table class="table" id="slot_table">
                <thead>
                    <tr class="text-center">
                        <th scope="col">Procedure Code</th>
                        <th scope="col">Date</th>
                        <th scope="col">Time</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-center">
                        <td><x-form.table.dropdown name="inputs[0][service_id]" descriptiveName="Procedure Code">
                                <option value="" selected>Choose...</option>
                                @foreach ($services as $service)
                                    <option value="{{ $service->id }}"
                                        {{ old('inputs[0][service_id]') == $service->id ? 'selected' : '' }}>
                                        {{ $service->procedure_code }} - {{ $service->procedure_name }}
                                    </option>
                                @endforeach
                                </x-form.dropdown></td>
                        <td><x-form.table.input name="inputs[0][date]" descriptiveName="Date" type="date" /></td>
                        <td><x-form.table.input name="inputs[0][timeslot]" descriptiveName="Timeslot" type="time" /></td>
                        <td><button type="button" id="add" name="add" class="btn btn-info">Add</button></td>
                    </tr>
            </table>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection

@section('scripts')
    <script>
        var i = 0;
        $('#add').click(function() {
            ++i;
            $('#slot_table').append(
                `<tr class="text-center">
                        <td><x-form.table.dropdown name="inputs[` + i + `][service_id]" descriptiveName="Procedure Code">
                                <option value="" selected>Choose...</option>
                                @foreach ($services as $service)
                                    <option value="{{ $service->id }}"
                                        {{ old('inputs[0][service_id]') == $service->id ? 'selected' : '' }}>
                                        {{ $service->procedure_code }} - {{ $service->procedure_name }}
                                    </option>
                                @endforeach
                            </x-form.dropdown></td>
                        <td><x-form.table.input name="inputs[` + i + `][date]" descriptiveName="Date" type="date" /></td>
                        <td><x-form.table.input name="inputs[` + i + `][timeslot]" descriptiveName="Timeslot" type="time" /></td>
                        <td><button type="button" id="remove" class="btn btn-danger">Remove</button></td>
                    </tr>`);
        });

        $(document).on('click', '#remove', function() {
            $(this).parents('tr').remove();
        });
    </script>
@endsection
