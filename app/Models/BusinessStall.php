<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessStall extends Model
{
     protected $table = 'business_stalls';
    use HasFactory;
     protected $fillable = [
        'business_holding_id',
        'stall_no',
        'ownership',
        'stall_nid',
        'stall_date',
        'stall_phone',
        'stall_rent',
        'stall_tax',   
            'activated_by',
            'deactivated_by',
            'activated_at',
            'deactivated_at',
            'biddut',
            'status',
    ];
}
