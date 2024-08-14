<?php

namespace App\Http\Controllers\citizen;

use App\Http\Controllers\Controller;
use App\Models\CitizenModel;
use Illuminate\Http\Request;

class PersonalInfoController extends Controller
{
    public function index($id)
    {
        $citizen = CitizenModel::where('user_id', $id)->first();

        if (!$citizen) {
            return response()->json([
                'message' => 'Record not found',
            ], 500);
        }

        return view('citizen.Info.info', compact('citizen'));
    }
}
