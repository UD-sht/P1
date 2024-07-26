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

        'first_name',
        'middle_name',
        'last_name',
        'np_first_name',
        'np_middle_name',
        'np_last_name',

        'dob_ad',
        'dob_bs',

        
        'citizenship_number',
        'issued_date',
        'issued_date_ad',
        'issued_district_id',
        'issued_district_name',

        'province_id',
        'district_id',
        'muncipality_id',
        'ward_id',
        'tole',
       
        'f_name',
        'm_name',
        'g_name',

        'citizenship_front',
        'citizenship_front_url',
        'citizenship_back',
        'citizenship_back_url',
        'social_security_fund_number',

        'gender',
        'mobile_number',
        'email_address',
        
        'province',
        'district',
        'municipality',
        'ward',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

}
