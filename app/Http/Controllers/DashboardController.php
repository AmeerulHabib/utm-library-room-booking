<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function index()
    {
        // you can pass any data you like to the dashboard
        return view('dashboard');
    }
}
