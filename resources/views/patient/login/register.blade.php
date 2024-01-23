@extends('layouts.general-layout')
@section('contents')
    <form action={{ route('patient.confirm.register') }} method="POST" enctype="multipart/form-data">
        @csrf
        <div class="container">
            <h1 class="text-center mb-5">Register here</h1>
            <div class="row mb-3">
                <div class="col-4">
                    <x-form.input name="last_name" descriptiveName="Last Name *" />
                </div>
                <div class="col-4">
                    <x-form.input name="first_name" descriptiveName="First Name *" />
                </div>
                <div class="col-4">
                    <x-form.input name="middle_name" descriptiveName="Middle Name" />
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-3">
                    <x-form.input name="birthdate" descriptiveName="Birthdate" type="date" />
                </div>
                <div class="col-3 d-flex flex-row gap-5 justify-content-center align-items-center">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="sex" id="male" value="Male">
                        <label class="form-check-label" for="male">
                            Male
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="sex" id="female" value="Female" checked>
                        <label class="form-check-label" for="female">
                            Female
                        </label>
                    </div>
                </div>
                <div class="col-3">
                    <x-form.input name="contact_number" descriptiveName="Contact Number *" />
                </div>
                <div class="col-3">
                    <x-form.input name="email" descriptiveName="Email *" type="email" />
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-4">
                    <x-form.input name="password" descriptiveName="Password *" type="password" />
                </div>
                <div class="col-4">
                    <x-form.input name="password_confirmation" descriptiveName="Confirm Password *" type="password" />
                </div>
            </div>
            <div class="row d-flex justify-content-center mt-5">
                <div class="col-4 d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk text-light"></i>
                        Submit</button>
                </div>

            </div>
        </div>
    </form>
@endsection
