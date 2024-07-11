<?php 

namespace App\Imports;

use App\Models\CitizenFormModel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Log;

class CitizenDataUpdateImport implements ToCollection, WithHeadingRow
{
    /**
     * @param Collection $rows
     */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {

            Log::info('Processing row:', $row->toArray());


            if (!isset($row['hhid'])) {
                Log::error('Missing HHID in row:', $row->toArray());
                continue;
            }

            // Update all records with the same HHID
            $updated = CitizenFormModel::where('hhid', $row['hhid'])->update([
                'province' => $row['province'] ?? null,
                'district' => $row['district'] ?? null,
                'municipality' => $row['municipality'] ?? null,
                'ward' => $row['ward'] ?? null
            ]);

            Log::info("Updated {$updated} records for HHID: {$row['hhid']}");
        }
    }
}
