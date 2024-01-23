@extends('layouts.general-layout')
@section('contents')
    <div class="container">
        <h1>What type of internal user are you?</h1>
        <div class=" d-flex flex-column align-items-center gap-3 mt-3">
            <a href={{ route('admin.login') }} class="card">
                <i class="bi bi-person-workspace"></i> Admin
            </a>
            <a href={{ route('approver.login') }} class="card"><i class="bi bi-clipboard2-check"></i> Approver</a>
            <a href={{ route('radiologist.login') }} class="card"><i class="bi bi-radioactive"></i> Radiologist</a>

        </div>
    </div>
@endsection
