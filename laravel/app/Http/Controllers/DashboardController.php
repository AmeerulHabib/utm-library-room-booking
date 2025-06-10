<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('guest');
        }

        switch ($user->role) {
            case 'admin':
                return view('dashboard.admin', compact('user'));
            case 'staff':
                return view('dashboard.staff', compact('user'));
            default: // student/user
                return view('dashboard.user', compact('user'));
        }
    }
}
