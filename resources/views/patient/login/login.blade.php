@extends('layouts.general-layout')
@section('contents')
    <form action="{{ route('patient.confirm.login') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="container d-flex justify-content-center align-items-center mt-5 pt-5">

            <div class="col-4 login-box p-5">
                <div class="d-flex justify-content-center mb-3">
                    <img src={{ asset('img/RadAppoint.png') }} class="login-logo" alt="logo">
                </div>
                <h1 class="text-center mb-3">Patient Login</h1>
                <div class="row mb-3">
                    <x-form.input name="email" descriptiveName="Email" type="email" />
                </div>
                <div class="row mb-3">
                    <x-form.input name="password" descriptiveName="Password" type="password" />
                </div>
                <div class="row pt-3">
                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk text-light"></i>
                        Submit</button>
                </div>
            </div>

        </div>
    </form>
@endsection
