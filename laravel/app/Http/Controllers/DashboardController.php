<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __invoke()
    {
        /** @var \App\Models\User $user */
        $user = auth()->user();
        $role = $user->role;

        if ($role === 'admin') {
            return view('dashboard.admin', compact('user'));
        } elseif ($role === 'staff') {
            return view('dashboard.staff', compact('user'));
        } else {
            return view('dashboard.user', compact('user'));
        }
    }
}
