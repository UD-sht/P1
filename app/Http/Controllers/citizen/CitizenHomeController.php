<?php

namespace App\Http\Controllers\citizen;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CitizenHomeController extends Controller
{
    public function index()
    {
        return view('citizen.dashboard');
        // $admin = Auth::guard()->user();
        // echo 'Welcome  '.$admin->name.' <a href=" '.route('admin.logout').' ">Logout</a>'; 
    }
    public function logout()
    {
        Auth::guard()->logout();
        return redirect()->route('citizen.login');
    }
}
