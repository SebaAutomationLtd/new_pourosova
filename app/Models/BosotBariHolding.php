<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BosotBariHolding extends Model
{
    protected $table = 'bosot_bari';

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

     public function house_type()
     {
        return $this->belongsTo(HouseType::class, 'house_type_id');
     }

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

    public function gender_data()
    {
        return $this->belongsTo(Gender::class, 'gender');
    }

    public function marital_status_data()
    {
        return $this->belongsTo(MaritalStatus::class, 'marital_status');
    }

    public function religion_data()
    {
        return $this->belongsTo(religion::class, 'religion');
    }

    public function family_class()
    {
        return $this->belongsTo(FamilyClass::class);
    }

    public function post_office()
    {
        return $this->belongsTo(PostOffice::class);
    }

    public function payment_method()
    {
        return $this->belongsTo(PaymentMethod::class);
    }

    public function occupation()
    {
        return $this->belongsTo(Occupation::class);
    }

    public function sanitation()
    {
        return $this->belongsTo(Sanitation::class);
    }

}
