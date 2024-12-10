<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Redirect user based on role
        if (auth()->check()) {
            if (auth()->user()->role === 'admin') {
                return redirect()->route('admin.buses.index');
            }
            
            return redirect()->route('user.schedules.index');            
        }

        // If no user is logged in, redirect to login page
        return redirect()->route('login');
    }
}
