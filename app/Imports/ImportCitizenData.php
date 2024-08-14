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

            $AD_Dob = Date::excelToDateTimeObject($row['dob_ad'])->format('Y-m-d');
            $AD_CitizenshipIssuedDate = Date::excelToDateTimeObject($row['citizenship_issued_date_ad'])->format('Y-m-d');

            if ($this->isValidDateRange($AD_Dob) && $this->isValidDateRange($AD_CitizenshipIssuedDate)) {
                $BS_Dob = BsdateFacade::eng_to_nep($AD_Dob);
                $BS_CitizenshipIssuedDate = BsdateFacade::eng_to_nep($AD_CitizenshipIssuedDate);
            } else {
                $BS_Dob = null;
                $BS_CitizenshipIssuedDate = null;
            }

            $citi = $row['citizenship_number'];

            $englishNumbers = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
            $nepaliUnicode = array('०', '१', '२', '३', '४', '५', '६', '७', '८', '९');

            $citi = str_replace($nepaliUnicode, $englishNumbers, $row['citizenship_number']);
            if(!(int)$citi) {
                $citi = NULL;
            }


            if ($row['citizenship_issued_district'] == 'अर्घाखाँची') {
                $issue_id = '48';
            } else {
                $issue_id = null;
            }

            if ($row['district'] == 'अर्घाखाँची') {
                $dis = '48';
            } else {
                $dis = null;
            }

            if ($row['municipality'] == 'सन्धिखर्क नगरपालिका') {
                $mun = '485';
            } else {
                $mun = null;
            }

            if ($row['province'] == 'लुम्बिनी प्रदेश') {
                $pro = '5';
            } else {
                $pro = null;
            }

            CitizenFormModel::updateOrCreate([
                'hhid' => $row['hhid'],
                'hh_index' => $row['hh_index'],


                'first_name' => $row['first_name'],
                'last_name' => $row['last_name'],
                'full_name' => $row['full_name'],
                'full_name_en_block' => $row['full_name_en_block'],

                'dob_ad' => $AD_Dob,
                'dob_bs' => $BS_Dob,

                'citizenship_number' => $citi,
                'citizenship_issued_date' => $BS_CitizenshipIssuedDate,
                'citizenship_issued_date_ad' => $AD_CitizenshipIssuedDate,
                'citizenship_issued_district_id' => $issue_id,
                'citizenship_issued_district' => $row['citizenship_issued_district'],
                'no_citizenship_reason' => $row['no_citizenship_reason'],

                'province_id' => $pro,
                'district_id' => $dis,
                'muncipality_id' => $mun,
                'ward' => $row['ward'],
                'blood_group' => $row['blood_group'],

                'citizenship_front' => $row['citizenship_front'],
                'citizenship_front_url' => $row['citizenship_front_url'],
                'citizenship_back' => $row['citizenship_back'],
                'citizenship_back_url' => $row['citizenship_back_url'],

                'gender' => $row['gender'],
                'mobile_number' => $row['mobile_number'],
                'email_address' => $row['email_address'],

                'province' => $row['province'] ?? null,
                'district' => $row['district'] ?? null,
                'municipality' => $row['municipality'] ?? null,
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
        return $year >= 1944 && $year <= 2023;
    }
}
