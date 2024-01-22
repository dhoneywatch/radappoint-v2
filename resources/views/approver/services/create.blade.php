@extends('layouts.approver-layout')
@section('contents')
    <div class="container">
        <h1>Import Services</h1>
        <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="formFile" class="form-label">Import .csv file:</label>
                <input class="form-control" type="file" id="formFile" name="file">
            </div>
            <button type="submit" class="btn btn-primary">Import</button>
        </form>
    </div>
@endsection
