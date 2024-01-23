@extends('layouts.patient-layout')
@section('contents')
    <div class="container">
        <h1 class="text-center">Edit appointment</h1>
        <form action={{ route('patient.appointment.confirm.payment', ['appointment'=>$appointment->id]) }} method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <label for="formFile" class="form-label">Upload Proof of Payment</label>
                <input class="form-control" type="file" id="form
                File" name="payment_image">
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

        </form>
    </div>
@endsection
