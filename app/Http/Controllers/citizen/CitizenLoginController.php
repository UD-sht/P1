<?php

namespace App\Http\Controllers\citizen;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class CitizenLoginController extends Controller
{
    public function index()
    {
        return view('citizen.citizenlogin');
    }
    public function authenticate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
        if($validator->passes())
        {
            if(Auth::guard('citizen')->attempt(['email'=>$request->email, 'password'=>$request->password],$request->get('remember')))
            {
                    return redirect()->route('citizen.dashboard');
            }
            else
            {
                return redirect()->route('citizen.login')->with('error', 'Invalid Credentials');
            }
        }
        else
        {
            return redirect()->route('citizen.login')
                ->withErrors($validator)
                ->withInput($request->only('email'));
        }
    }
}
