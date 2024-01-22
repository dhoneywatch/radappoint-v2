@extends('layouts.general-layout')
@section('contents')
    <form action="{{ route('admin.confirm.login') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="container">
            <h1 class="text-center">Admin User Login</h1>
            <div class="row mb-3">
                <x-form.input name="email" descriptiveName="Email" type="email" />
            </div>
            <div class="row mb-3">
                <x-form.input name="password" descriptiveName="Password" type="password" />
            </div>
            <div class="row">
                <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk text-light"></i>
                    Submit</button>
            </div>
        </div>
    </form>
@endsection
