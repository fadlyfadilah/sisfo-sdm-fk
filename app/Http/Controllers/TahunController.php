<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TahunController extends Controller
{
    public function index(Request $request)
    {
        $request->session()->put('tahun', request('tahun'));
        
        return back();
    }
}
