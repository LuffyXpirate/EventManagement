<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\StudentModel;
use App\Models\Marks;
use App\Models\Result;

class DashboardController extends Controller
{
    // Dashboard method for different user types
   // In DashboardController.php
public function dashboard()
{
    $data['header_title'] = 'Dashboard';
    $user = Auth::user();

    if (!$user) {
        return redirect('/login')->with('error', 'You are not logged in.');
    }

    if ($user->user_type == 'admin') {
        return view('admin.dashboard', $data);
    } elseif ($user->user_type == 'organizer') {
        return view('organizer.dashboard', $data);
    } elseif ($user->user_type == 'attendee') {
        return view('attendee.dashboard', $data);
    } else {
        Auth::logout();
        return redirect('/login')->with('error', 'Unauthorized user type.');
    }
}
public function logout()
{
    Auth::logout();
    return redirect('/login')->with('success', 'Logged out successfully.');
}
}
