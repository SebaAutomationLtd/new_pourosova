<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class TradeLicence extends Model
{
    use HasFactory, LogsActivity;
    protected $table = 'trade_licence';
    protected $guarded = [];

    public function sonod_apply()
    {
        return $this->belongsTo(SonodApply::class, 'sonod_apply_id');
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['*']);
    }
}
