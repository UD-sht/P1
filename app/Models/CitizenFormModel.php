<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CitizenFormModel extends Model
{
    use HasFactory;
    protected $table = "citizendata";
    protected $primaryKey = "id";
    protected $fillable = [

        'hhid',
        'hh_index',

        'first_name',
        'last_name',
        'full_name',
        'full_name_en_block',

        'dob_ad',
        'dob_bs',


        'citizenship_number',
        'citizenship_issued_date',
        'citizenship_issued_date_ad',
        'citizenship_issued_district_id',
        'citizenship_issued_district',
        'no_citizenship_reason',

        'province_id',
        'province',
        'district_id',
        'district',
        'municipality_id',
        'municipality',
        'ward',
        'tole',

        'f_name',
        'm_name',
        'g_name',

        'citizenship_front',
        'citizenship_front_url',
        'citizenship_back',
        'citizenship_back_url',

        'blood_group',
        'gender',
        'mobile_number',
        'email_address',

    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
