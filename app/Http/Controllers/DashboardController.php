<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{

    public function index()
    {
        
        $role = 'Admin';

        switch ($role) {
            case auth()->user()->hasRole(['User']):
                return redirect()->route('user.dashboard');
                break;
            
            default:
                return redirect()->route('admin.dashboard');
                break;
        }
    }
}
