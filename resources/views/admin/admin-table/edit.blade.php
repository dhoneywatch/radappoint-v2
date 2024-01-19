@extends('layouts.admin-layout')
@section('contents')

        <form action={{ route('admin.admin.update', ['admin'=>$admin->id ]) }} method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="container">
                <h1 class="text-center">Edit Admin Information</h1>
                <div class="row mb-3">
                    <x-form.input name="name" descriptiveName="Full Name *" :value="old('name', $admin->name)"/>
                </div>
                <div class="row mb-3">
                    <x-form.input name="email" descriptiveName="Email *" type="email" :value="old('email', $admin->email)" />
                </div>
                <div class="row mb-3">
                    <x-form.input name="password" descriptiveName="Password *" type="password" :value="old('password', $admin->password)"/>
                </div>
                <div class="row mb-3">
                    <x-form.input name="password_confirmation" descriptiveName="Confirm Password *" type="password" :value="old('password', $admin->password)" />
                </div>
                <div class="row">
                    <div class="col d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </form>

@endsection
