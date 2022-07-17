<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;

class HomeController
{
    public function index()
    {
        return view('home');
    }
}