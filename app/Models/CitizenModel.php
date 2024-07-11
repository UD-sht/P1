<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CitizenModel extends Model
{
    use HasFactory;
    protected $table = "citizen";
    protected $primaryKey = "id";
    protected $fillable = [ 
    'hhid',       
    'citizenship_no',
    'citizenship_issue_date',
    'f_name',
    'm_name',
    'l_name',
    'full_name',
    't_province',
    't_district',
    't_municipality',
    't_ward_no',
    't_tole',
    'f_fname',
    'm_fname',
    'l_fname',
    'f_mname',
    'm_mname',
    'l_mname',
    'f_gname',
    'm_gname',
    'l_gname',
    'contact_no',
    'email',
    'gender',

    'user_id'
    ];
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
