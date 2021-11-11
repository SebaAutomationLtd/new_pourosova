<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessHolding extends Model
{
       protected $table = 'business_holdings';
    use HasFactory;

     protected $fillable = [
        'user_id',
            'father',
            'mother',
            'spouse',
            'gender',
            'marital_status',
            'dob',
            'nid',
            'birth_certificate',
            'religion',
            'photo',
            'family_class_id',
            'ward_id',
            'village_id',
            'post_office_id',
            'house_type_id',
            'occupation_id',
            'payment_method_id',
            'sanitation_id',
            'holding_no',
            'total_room',
            'height',
            'width',
            'total_male',
            'total_female',
            'monthly_income',
            'yearly_value',
            'yearly_vat',
            'service_charge',
            'last_tax_year',
            'activated_by',
            'deactivated_by',
            'activated_at',
            'deactivated_at',
            'biddut',
            'status',
    ];


    public function ward()
    {
        return $this->belongsTo(Ward::class);
    }

    public function village()
    {
        return $this->belongsTo(Village::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
