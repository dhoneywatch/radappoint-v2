@extends('layouts.admin-layout')
@section('contents')

        <form action={{ route('admin.approver.update', ['approver'=>$approver->id ]) }} method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="container">
                <h1 class="text-center mb-5">Edit Approver Information</h1>
                <div class="row mb-3">
                    <x-form.input name="name" descriptiveName="Full Name *" :value="old('name', $approver->name)"/>
                </div>
                <div class="row mb-3">
                    <x-form.input name="email" descriptiveName="Email *" type="email" :value="old('email', $approver->email)" />
                </div>
                <div class="row mb-3">
                    <x-form.input name="password" descriptiveName="Password *" type="password" :value="old('password', $approver->password)"/>
                </div>
                <div class="row mb-3">
                    <x-form.input name="password_confirmation" descriptiveName="Confirm Password *" type="password" :value="old('password', $approver->password)" />
                </div>
                <div class="row mt-5">
                    <div class="col d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </form>

@endsection
