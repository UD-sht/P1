<?php

namespace App\Imports;

use App\Models\CitizenModel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;

class CitizenImport implements ToCollection, WithHeadingRow, WithCustomCsvSettings
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            CitizenModel::create([
                'hhid' => $row['hhid'], 
                'citizenship_no' => $row['citizenship_no'],
                'citizenship_issue_date' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['citizenship_issue_date'])->format('Y-m-d'),
                'f_name' => $row['f_name'],
                'm_name' => $row['m_name'],
                'l_name' => $row['l_name'],
                'full_name' => $row['full_name'],
                't_province' => $row['t_province'],
                't_district' => $row['t_district'],
                't_municipality' => $row['t_municipality'],
                't_ward_no' => $row['t_ward_no'],
                't_tole' => $row['t_tole'],
                'f_fname' => $row['f_fname'],
                'm_fname' => $row['m_fname'],
                'l_fname' => $row['l_fname'],
                'f_mname' => $row['f_mname'],
                'm_mname' => $row['m_mname'],
                'l_mname' => $row['l_mname'],
                'f_gname' => $row['f_gname'],
                'm_gname' => $row['m_gname'],
                'l_gname' => $row['l_gname'],
                'contact_no' => $row['contact_no'],
                'email' => $row['email'],
                'gender' => $row['gender'],
            ]);
        }
    }
         /**
     * Specify the date format for Excel parsing.
     *
     * @return array
     */
    public function getCsvSettings(): array
    {
        return [
            'input_encoding' => 'UTF-8',
            'delimiter' => ',',
            'enclosure' => '"',
            'line_ending' => "\r\n",
            'use_bom' => false,
            'date_format' => 'm/d/Y', // Specify the date format of your Excel file
        ];
    }
    
}
