<?php

namespace App\Exports;

use App\Models\CitizenFormModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\Log;

class CitizenExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $citizens = CitizenFormModel::all();  // Correct model name and fetch data
        
        // Add logging to verify data
        Log::info('Exporting citizens:', $citizens->toArray());
        
        if ($citizens->isEmpty()) {
            Log::warning('No citizens found to export.');
        }
        
        return $citizens;
    }
}

