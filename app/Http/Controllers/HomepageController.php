<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class HomepageController extends Controller
{
    public function index()
    {
        return view('HomePage.homepage');
    }

    public function show()
    {
        return view('HomePage.register');
    }

    public function register(Request $request)
    {   
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:customer',
            'password' => 'required|string|min:8|confirmed',
        ]);
        if ($validator->passes()) {
            Customer::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
    
            return redirect()->route('homepage')->with('success', 'Registration successful!');
        }
        else
        {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

    }

}
