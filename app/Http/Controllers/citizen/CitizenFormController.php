<?php

namespace App\Http\Controllers\citizen;

use App\Http\Controllers\Controller;
use App\Http\Requests\citizen\CitizenFormRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\CitizenModel;
use Illuminate\Http\Request;

class CitizenFormController extends Controller
{
    public function index()
    {
        return view('citizen.ApplicationForm.form');
    }

    public function store(CitizenFormRequest $request)
    {
        $validatedData = $request->validated();

        if (Auth::check()) 
        {
                CitizenModel::create(array_merge($validatedData, [
                'user_id' => Auth::id()]));
                return redirect()->route('citizen.form')->with('success', 'Form submitted successfully!');
        } 
        else 
        {
            return redirect()->route('citizen.login')->with('error', 'You are not logged in.');
        }
    }

    public function view($id)
    {   
        $citizen = CitizenModel::where('user_id', $id)->first();
        if(!empty($citizen))
        {
            return view('citizen.Info.info', compact('citizen'));
        }
        else 
        {
            return redirect()->route('citizen.dashboard')->with('error', 'Citizen record not found.');
        }
        
    }

}
