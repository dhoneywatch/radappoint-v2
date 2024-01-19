<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApproverController extends Controller
{
    public function index()
    {
        return view('approver.index');
    }
}
