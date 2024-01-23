<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Approver;
use App\Models\Patient;
use App\Models\Appointment;
use App\Models\Radiologist;
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
        return redirect()->route('admin.admin.index')->with('message', 'Successfully updated user information!');
    }

    public function admin_destroy($id) {
        $admin = Admin::findOrFail($id);
        $admin->delete();
        return redirect()->route('admin.admin.index')->with('message', 'User deleted successfully.');
    }

    // Radiologist Table Controller
    public function radiologist_index()
    {
        return view('admin.radiologist-table.index', [
            'radiologists' => Radiologist::all()
        ]);
    }

    public function radiologist_create()
    {
        return view('admin.radiologist-table.create');
    }

    public function radiologist_store()
    {
        $attributes = $this->validate_radiologist();
        Radiologist::create($attributes);
        return redirect(route('admin.radiologist.index'))->with('message', 'User registered successfully.');
    }

    protected function validate_radiologist(?Radiologist $radiologist = null): array
    {
        $radiologist ??= new Radiologist();
        return request()->validate([
            'name' => 'required',
            'email' => [
                'required',
                'string',
                Rule::unique('radiologists')->ignore($radiologist->id),
            ],
            'password' => [
                'required',
                'string',
                'min:8',
            ]
        ]);
    }

    public function radiologist_edit(Radiologist $radiologist)
    {
        return view('admin.radiologist-table.edit', [
            'radiologist' => $radiologist,
        ]);
    }

    public function radiologist_update(Radiologist $radiologist)
    {
        $attributes = $this->validate_radiologist($radiologist);
        $radiologist->update($attributes);
        return redirect()->route('admin.radiologist.index')->with('message', 'Successfully updated user information!');
    }

    public function radiologist_destroy($id) {
        $radiologist = Radiologist::findOrFail($id);
        $radiologist->delete();
        return redirect()->route('admin.radiologist.index')->with('message', 'User deleted successfully.');
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
         return redirect(route('admin.approver.index'))->with('message', 'User registered successfully.');
     }

     protected function validate_approver(?Approver $approver = null): array
     {
         $approver ??= new Approver();
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
         $attributes = $this->validate_approver($approver);
         $approver->update($attributes);
         return redirect()->route('admin.approver.index')->with('message', 'Successfully updated user information!');
     }

     public function approver_destroy($id) {
         $approver = Approver::findOrFail($id);
         $approver->delete();
         return redirect()->route('admin.approver.index')->with('message', 'User deleted successfully.');
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

        Appointment::where('patient_id', '=', $id)->delete();
        return redirect()->route('admin.patient.index')->with('message', 'User deleted successfully.');
    }

}
