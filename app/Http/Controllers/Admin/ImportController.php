<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\UsersImport;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
    public function index()
    {
        return view('admin.import.index');
    }
    public function users()
    {
        Excel::import(new UsersImport, request()->file('file')); 

        return back()->with('success', 'Import Berhasil!');
    }
}
