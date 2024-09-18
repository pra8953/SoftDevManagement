<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // Apply the 'auth' middleware in the constructor to protect the dashboard
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Method to show the dashboard with the authenticated user's data
    public function showDashboard()
    {
        $user = Auth::user(); // Get the authenticated user

        // Pass the user data to the view
        return view('dashboard', compact('user'));
    }
}
