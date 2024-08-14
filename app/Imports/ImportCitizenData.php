<?php

namespace App\Imports;

use App\Bsdate\BsdateFacade;
use App\Models\CitizenFormModel;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;

class ImportCitizenData implements ToCollection, WithHeadingRow, WithCustomCsvSettings
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $AD_Dob = $this->convertExcelDate($row['dob_ad']);
            $AD_CitizenshipIssuedDate = $this->convertExcelDate($row['citizenship_issued_date_ad']);

            $BS_Dob = $this->isValidDateRange($AD_Dob) ? BsdateFacade::eng_to_nep($AD_Dob) : null;
            $BS_CitizenshipIssuedDate = $this->isValidDateRange($AD_CitizenshipIssuedDate) ? BsdateFacade::eng_to_nep($AD_CitizenshipIssuedDate) : null;

            $citi = $this->normalizeCitizenshipNumber($row['citizenship_number']);


            $issue_id = $this->getIssueId($row['citizenship_issued_district'] ?? '');
            $dis = $this->getDistrictId($row['district'] ?? '');
            $mun = $this->getMunicipalityId($row['municipality'] ?? '');
            $pro = $this->getProvinceId($row['province'] ?? '');

            // Convert empty strings to null for bigint fields
            $issue_id = $this->ensureInteger($issue_id);
            $dis = $this->ensureInteger($dis);
            $mun = $this->ensureInteger($mun);
            $pro = $this->ensureInteger($pro);

            // Update or create the citizen record
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
                'citizenship_issued_district' => $row['citizenship_issued_district'] ?? null,
                'no_citizenship_reason' => $row['no_citizenship_reason'] ?? null,
                'province_id' => $pro,
                'district_id' => $dis,
                'municipality_id' => $mun,
                'ward' => $row['ward'] ?? null,
                'blood_group' => $row['blood_group'] ?? null,
                'citizenship_front' => $row['citizenship_front'] ?? null,
                'citizenship_front_url' => $row['citizenship_front_url'] ?? null,
                'citizenship_back' => $row['citizenship_back'] ?? null,
                'citizenship_back_url' => $row['citizenship_back_url'] ?? null,
                'gender' => $row['gender'] ?? null,
                'mobile_number' => $row['mobile_number'] ?? null,
                'email_address' => $row['email_address'] ?? null,
                'province' => $row['province'] ?? null,
                'district' => $row['district'] ?? null,
                'municipality' => $row['municipality'] ?? null,
            ]);
        }
    }


    private function normalizeCitizenshipNumber(?string $number): ?string
    {
        if (is_null($number) || trim($number) === '') {
            return null;
        }
        $number = $this->convertNepaliToEnglishNumber($number);
        $invalidPatterns = [
            '/^(0|00|000|0000|00000|000000|00000000)$/',
            '/^\s*$/',
        ];
        foreach ($invalidPatterns as $pattern) {
            if (preg_match($pattern, $number)) {
                return null;
            }
        }
        $validPatterns = [
            '/^[0-9]+[-\/][0-9]+[-\/][0-9]+[-\/][0-9]+$/',
            '/^[0-9]+[\/][0-9]+$/',
        ];
        foreach ($validPatterns as $pattern) {
            if (preg_match($pattern, $number)) {
                return $number;
            }
        }
        return null;
    }


    private function convertExcelDate($date): ?string
    {
        if (is_string($date) && strtotime($date) !== false) {
            return date('Y-m-d', strtotime($date));
        }
        if (empty($date) || !is_numeric($date)) {
            return null;
        }

        try {
            $dateTime = Date::excelToDateTimeObject((int) $date);
            $formattedDate = $dateTime->format('Y-m-d');
            return $formattedDate;
        } catch (\Exception $e) {
            return null;
        }
    }

    private function convertNepaliToEnglishNumber(string $number): string
    {
        $englishNumbers = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
        $nepaliUnicode = array('०', '१', '२', '३', '४', '५', '६', '७', '८', '९');
        return str_replace($nepaliUnicode, $englishNumbers, $number);
    }

    private function getIssueId(?string $district): ?int
    {
        if ($district === null) {
            return null;
        }
        return $district === 'अर्घाखाँची' ? 48 : null;
    }

    private function getDistrictId(?string $district): ?int
    {
        if ($district === null) {
            return null;
        }
        return $district === 'अर्घाखाँची' ? 48 : null;
    }

    private function getMunicipalityId(?string $municipality): ?int
    {
        if ($municipality === null) {
            return null;
        }
        return $municipality === 'सन्धिखर्क नगरपालिका' ? 485 : null;
    }


    private function getProvinceId(?string $province): ?int
    {
        if ($province === null) {
            return null;
        }
        return $province === 'लुम्बिनी प्रदेश' ? 5 : null;
    }

    private function ensureInteger(?string $value): ?int
    {
        return is_numeric($value) && $value !== '' ? (int) $value : null;
    }

    public function getCsvSettings(): array
    {
        return [
            'input_encoding' => 'UTF-8',
            'delimiter' => ',',
            'enclosure' => '"',
            'line_ending' => "\r\n",
            'use_bom' => false,
            'date_format' => 'm/d/Y', // Adjust if needed
        ];
    }

    private function isValidDateRange(?string $date): bool
    {
        if (is_null($date)) {
            return false;
        }
        $year = (int) date('Y', strtotime($date));
        return $year >= 1944 && $year <= 2023;
    }
}
