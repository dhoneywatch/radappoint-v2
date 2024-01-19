<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Approver;
use App\Models\Patient;
use Illuminate\Validation\Rule;


class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    // Admin Table Controller
    public function admin_index()
    {
        return view('admin.admin-table.index', [
            'admins' => Admin::all()
        ]);
    }

    public function admin_create()
    {
        return view('admin.admin-table.create');
    }


    public function admin_store()
    {
        $attributes = $this->validate_admin();
        Admin::create($attributes);
        return redirect(route('admin.admin.index'))->with('success', 'User registered successfully.');
    }

    protected function validate_admin(?Admin $admin = null): array
    {
        $admin ??= new Admin();
        return request()->validate([
            'name' => 'required',
            'email' => [
                'required',
                'string',
                Rule::unique('admins')->ignore($admin->id),
            ],
            'password' => [
                'required',
                'string',
                'min:8',
            ]
        ]);
    }

    public function admin_edit(Admin $admin)
    {
        return view('admin.admin-table.edit', [
            'admin' => $admin
        ]);
    }

    public function admin_update(Admin $admin)
    {
        $attributes = $this->validate_admin($admin);
        $admin->update($attributes);
        return redirect()->route('admin.admin.index')->with('success', 'Successfully updated user information!');
    }

    public function admin_destroy($id) {
        $admin = Admin::findOrFail($id);
        $admin->delete();
        return redirect()->route('admin.admin.index')->with('success', 'User deleted successfully.');
    }

    // Approver Table Controller
    public function approver_index()
    {
        return view('admin.approver-table.index', [
            'approvers' => Approver::all()
        ]);
    }

    public function approver_create()
    {
        return view('admin.approver-table.create');
    }

    public function approver_store()
    {
        $attributes = $this->validate_approver();
        Approver::create($attributes);
        return redirect(route('admin.approver.index'))->with('success', 'User registered successfully.');
    }

    protected function validate_approver(?Approver $approver = null): array
    {
        $approver ??= new Admin();
        return request()->validate([
            'name' => 'required',
            'email' => [
                'required',
                'string',
                Rule::unique('approvers')->ignore($approver->id),
            ],
            'password' => [
                'required',
                'string',
                'min:8',
            ]
        ]);
    }

    public function approver_edit(Approver $approver)
    {
        return view('admin.approver-table.edit', [
            'approver' => $approver,
        ]);
    }

    public function approver_update(Approver $approver)
    {
        $attributes = $this->validate_user($approver);
        $approver->update($attributes);
        return redirect()->route('admin.approver.index')->with('success', 'Successfully updated user information!');
    }

    public function approver_destroy($id) {
        $approver = Approver::findOrFail($id);
        $approver->delete();
        return redirect()->route('admin.approver.index')->with('success', 'User deleted successfully.');
    }

    // Patient Table Controller
    public function patient_index()
    {
        return view('admin.patient-table.index', [
            'patients' => Patient::all()
        ]);
    }

    public function patient_destroy($id) {
        $patient = Patient::findOrFail($id);
        $patient->delete();
        return redirect()->route('admin.patient.index')->with('success', 'User deleted successfully.');
    }

}
