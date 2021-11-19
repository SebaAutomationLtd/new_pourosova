<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TradeLicence extends Model
{
    use HasFactory;
    protected $table = 'trade_licence';
    protected $guarded = [];

    public function sonod_apply()
    {
        return $this->belongsTo(SonodApply::class, 'sonod_apply_id');
    }
}
