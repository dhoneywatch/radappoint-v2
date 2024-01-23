@extends('layouts.patient-layout')
@section('contents')
<div class="container">
    <div class="hero d-flex justify-content-center align-items-center gap-5">

        <img src={{ asset('img/fit-logo.png') }} class="home-logo" alt="">

        <div class="hero-right">
            <h1 class="hero-h1">
                RadAppoint
            </h1>
            <p>
                Welcome! This is your dedicated online appointment system tailored for radiology matters.
                RadAppoint streamlines the process of scheduling and managing appointments for radiological services,
                offering a seamless experience for both healthcare providers and patients.


            </p>
        </div>
    </div>
</div>
@endsection
