<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;

class HomeController
{
    public function index()
    {
        return view('frontend.home');
    }
}