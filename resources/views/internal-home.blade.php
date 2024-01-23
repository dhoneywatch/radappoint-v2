@extends('layouts.general-layout')
@section('contents')
    <div class="container">
        <h1>What type of internal user are you?</h1>
        <a href={{ route('admin.login') }}>Admin</a>
        <a href={{ route('approver.login') }}>Approver</a>
        <a href={{ route('radiologist.login') }}>Radiologist</a>
    </div>
@endsection
