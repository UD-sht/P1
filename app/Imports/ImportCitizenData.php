<?php

namespace App\Imports;

use App\Models\CitizenFormModel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use App\Bsdate\BsdateFacade;

class ImportCitizenData implements ToCollection, WithHeadingRow, WithCustomCsvSettings
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {

            // Convert AD dates to formatted strings
            $AD_Dob = Date::excelToDateTimeObject($row['dob_ad'])->format('Y-m-d');
            $AD_CitizenshipIssuedDate = Date::excelToDateTimeObject($row['issued_date_ad'])->format('Y-m-d');


             // Validate the AD dates
             if ($this->isValidDateRange($AD_Dob) && $this->isValidDateRange($AD_CitizenshipIssuedDate)) {
                // Convert AD dates to BS dates using BsdateFacade
                $BS_Dob = BsdateFacade::eng_to_nep($AD_Dob);
                $BS_CitizenshipIssuedDate = BsdateFacade::eng_to_nep($AD_CitizenshipIssuedDate);
            } 
            else
            {
                // Handle dates outside the supported range (e.g., set to null or some default value)
                $BS_Dob = null;
                $BS_CitizenshipIssuedDate = null;
            }
            

            // Create a new record in CitizenFormModel
            CitizenFormModel::create([
                'hhid' => $row['hhid'],
    
                'first_name' => $row['first_name'],
                'middle_name' => $row['middle_name'],
                'last_name' => $row['last_name'],
                'np_first_name' => $row['np_first_name'],
                'np_middle_name' => $row['np_middle_name'],
                'np_last_name' => $row['np_last_name'],
    
                'dob_ad' => $AD_Dob, // AD date of birth
                'dob_bs' => $BS_Dob, // BS date of birth (Nepali calendar)
    
                'citizenship_number' => $row['citizenship_number'],
                'issued_date' => $BS_CitizenshipIssuedDate, // Nepali date format
                'issued_date_ad' => $AD_CitizenshipIssuedDate, // AD date format
                'issued_district_id' => $row['issued_district_id'],
                'issued_district_name' => $row['issued_district_name'],
    
                'province_id' => $row['province_id'],
                'district_id' => $row['district_id'],
                'muncipality_id' => $row['muncipality_id'],
                'ward_id' => $row['ward_id'],
                'tole' => $row['tole'],
    
                'f_name' => $row['f_name'],
                'm_name' => $row['m_name'],
                'g_name' => $row['g_name'],
    
                'citizenship_front' => $row['citizenship_front'],
                'citizenship_front_url' => $row['citizenship_front_url'],
                'citizenship_back' => $row['citizenship_back'],
                'citizenship_back_url' => $row['citizenship_back_url'],
                'social_security_fund_number' => $row['social_security_fund_number'],
    
                'gender' => $row['gender'],
                'mobile_number' => $row['mobile_number'],
                'email_address' => $row['email_address'],
            ]);
        }
    }
   
    /**
     * Specify the CSV settings for Excel parsing.
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

        /**
     * Validate if the given date is within the supported range (1944-2022).
     *
     * @param string $date
     * @return bool
     */
    private function isValidDateRange(string $date): bool
    {
        $year = (int) date('Y', strtotime($date));
        return $year >= 1944 && $year <= 2022;
    }
}
