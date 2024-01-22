<?php

namespace App\Http\Controllers;

use App\Imports\ServicesImport;
use App\Models\Service;
use App\Models\Slot;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ServiceController extends Controller
{
    public function index()
    {
        return view('approver.services.index', [
            'services' => Service::all(),
        ]);
    }

    public function create()
    {
        return view('approver.services.create');
    }

    public function store(Request $request)
    {
        if (count($request->all()) >= 2) {
            Slot::query()->delete();
            Service::query()->delete();
            $path1 = $request->file('file')->store('temp');
            $path = storage_path('app') . '/' . $path1;
            Excel::import(new ServicesImport, $path);
            return redirect()->route('services.index')->with('message', 'Services imported successfully.');
        } else {
            return back()->with('message', 'Invalid input.');
        }
    }

}
