@extends('layouts.admin-layout')
@section('contents')

        <form action={{ route('admin.admin.store') }} method="POST" enctype="multipart/form-data">
            @csrf
            <div class="container">
                <h1 class="text-center">Register an Admin</h1>
                <div class="row mb-3">
                    <x-form.input name="name" descriptiveName="Full Name *" />
                </div>
                <div class="row mb-3">
                    <x-form.input name="email" descriptiveName="Email *" type="email" />
                </div>
                <div class="row mb-3">
                    <x-form.input name="password" descriptiveName="Password *" type="password" />
                </div>
                <div class="row mb-3">
                    <x-form.input name="password_confirmation" descriptiveName="Confirm Password *" type="password" />
                </div>
                <div class="row">
                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk text-light"></i>
                        Submit</button>
                </div>
            </div>
        </form>

@endsection
