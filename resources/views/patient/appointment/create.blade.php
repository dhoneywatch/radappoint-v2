@extends('layouts.patient-layout')
@section('contents')
    <div class="container">
        <h1 class="text-center">Book an appointment</h1>
        <form action={{ route('appointment.store') }} method="POST" enctype="multipart/form-data">
            @csrf
            {{-- <input name="patient_id" value={{ Auth::guard('patient')->user()->id }} hidden /> --}}
            <input class="form-check-input" type="hidden" name="patient_id" value={{ Auth::guard('patient')->user()->id }}>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">Modality</th>
                            <th scope="col">Procedure Name</th>
                            <th scope="col">Date</th>
                            <th scope="col">Timeslot</th>
                            <th scope="col">Price</th>
                            <th scope="col">Pick</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($slots as $slot)
                            <tr class="text-center">
                                <td>
                                    @if ($slot->service->modality_code == 'CR')
                                        X-ray
                                    @elseif ($slot->service->modality_code == 'US')
                                        Ultrasound
                                    @elseif ($slot->service->modality_code == 'MR')
                                        MRI
                                    @elseif ($slot->service->modality_code == 'CT')
                                        CT Scan
                                    @endif
                                </td>
                                <td> {{ $slot->service->procedure_name }}</td>
                                <td>{{ $slot->date }}</td>
                                <td>{{ $slot->timeslot }}</td>
                                <td>&#8369; {{ $slot->service->price }}</td>
                                <td>
                                    <input type="radio" name="slot_id" value="{{ $slot->id }}">
                                </td>
                            </tr>
                        @endforeach
                </table>
            </div>

            <div class="mb-3">
                <label for="formFile" class="form-label">Upload Physician's Request</label>
                <input class="form-control" type="file" id="form
                File" name="request_image">
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

        </form>
    </div>
@endsection
