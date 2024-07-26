<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

// use App\Models\CitizenModel;
use App\Models\CitizenFormModel;

use App\Exports\CitizenExport;

// use App\Imports\CitizenImport;
use App\Imports\ImportCitizenData;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use App\Http\Requests\UpdateCitizenRequest;
use App\Imports\CitizenDataUpdateImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class 
RecordController extends Controller
{
    public function index(Request $request)
    {
        // $token = $request->header('api_token');
        // if (!$token || $token !== 'NftPSzhR22T7c7oLtrLFV7O3O2jtfAqqdRiOIvw8') {
        //     return response()->json([
        //         'message' => 'Unauthorized'
        //     ], 401);
        // }
        $validator = Validator::make($request->all(), [
            'citizenship_number' => 'nullable|string',
            'issued_date_ad' => 'nullable|date',
            'hhid' => 'nullable|integer'
        ]);
        if ($validator->passes()) {

            $query = CitizenFormModel::query();
            if ($request->filled('citizenship_number')) {
                $query->where('citizenship_number', 'like', '%' . $request->citizenship_number . '%');
            }
            if ($request->filled('issued_date_ad')) {
                $query->whereDate('issued_date_ad', $request->issued_date_ad);
            }
            if ($request->filled('hhid')) {
                $query->where('hhid', $request->hhid);
            }
            $citizens = $query->paginate(10);
            return view('admin.Record.record', compact('citizens'));
        } 
        else 
        {
            return redirect()->route('admin.record')
                ->withErrors($validator)
                ->withInput();
        }
    }

    public function importexceldata(Request $request)
    {
        $request->validate([
            'import_file' => ['required', 'file'],
        ]);   
        
        try {      
            Excel::import(new ImportCitizenData, $request->file('import_file'));
            return redirect()->route('admin.record')->with('success', 'File imported successfully!');
        } 
        catch (\Exception $e) {
           throw $e;
        }
    }

 

    public function exportexceldata()
    {
        return Excel::download(new CitizenExport, 'users.xlsx');
    }

    public function download()
    {
        $filePath = public_path('files/mastersample.xlsx');
        return Response::download($filePath, 'mastersample.xlsx');
    }


    public function view($id)
    {
        $citizen = CitizenFormModel::find($id);

        if (!$citizen) {
            return response()->json([
                'message' => 'Record not found',
            ], 500);
        }
        // return response()->json(['data' => $citizen]);
        return view('admin.Record.viewcitizen_page', compact('citizen'));


        // if (request()->wantsJson()) {
        //     return response()->json(['data' => $citizen]);
        // } else {
        //     return view('admin.viewcitizen_page', compact('citizen'));
        // }
    }

    public function editpage($id)
    {
        $citizen = CitizenFormModel::findOrFail($id);

        if (!$citizen) {
            return response()->json([
                'message' => 'Record not found',
            ], 500);
        }

        // return response()->json(['data' => $citizen]);
        return view('admin.Record.editcitizen_page', compact('citizen'));


        // if (request()->wantsJson()) {
        //     return response()->json(['data' => $citizen]);
        // } else {
        //     return view('admin.editcitizen_page', compact('citizen'));
        // }
    }

    public function update(UpdateCitizenRequest $request, $id)
    {
        $citizen = CitizenFormModel::find($id);
        if (!$citizen) {
            return response()->json([
                'message' => 'Record not found',
            ], 500);
        }
        $citizen->update($request->validated());
        // return response()->json(['message' => 'Citizen details updated successfully.']);
        return redirect()->route('admin.record')->with('success', 'Citizen details updated successfully.');


        //     if (request()->wantsJson()) {
        //         return response()->json(['message' => 'Citizen details updated successfully.']);
        //     } else {
        //         return redirect()->route('record')->with('success', 'Citizen details updated successfully.');
        //     }
    }

    public function destroy($id)
    {
        $citizen = CitizenFormModel::whereId($id)->first();
        if (!$citizen) {
            return response()->json([
                'message' => 'Record not found',
            ], 500);
        }
        $citizen->delete();

        // return response()->json(['message' => 'Citizen details deleted successfully.'],5);
        return redirect()->route('admin.record')->with('success', 'Citizen details deleted successfully.');

        // if (request()->wantsJson()) {
        //     return response()->json(['message' => 'Citizen details deleted successfully.']);
        // } else {
        //     return redirect()->route('record')->with('success', 'Citizen details deleted successfully.');
        // }
    }
}
