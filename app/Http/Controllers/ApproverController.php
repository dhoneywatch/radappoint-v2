<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class ApproverController extends Controller
{
    public function index()
    {
        return view('approver.index');
    }

    public function patient_index()
    {
        return view('approver.patient-table.index', [
            'patients' => Patient::all()
        ]);
    }
}
