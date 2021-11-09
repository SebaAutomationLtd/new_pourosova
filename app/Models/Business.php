<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    protected $table = 'business';
    use HasFactory;
protected $fillable = [
       'user_id',
           'father',
           'mother',
           'spouse',
           'nid',
           'birth_certificate',
           'photo',
           'road_moholla',
           'business_name',
           'business_address',
           'current_address',
           'permanent_address',
           'ward_id',
           'business_type_id',
           'payment_method_id',
            'trade_fee',
            'vat',
            'signboard_tax',
            'business_tax',
            'other_tax',
            'trade_total',
            'service_charge',
           'last_license_issue_year',
            'activated_by',
            'deactivated_by',
            'activated_at',
            'deactivated_at',
            'status',
    ];
   
}
