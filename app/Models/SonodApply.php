<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class SonodApply extends Model
{
    use HasFactory, LogsActivity;
    protected $table = 'sonod_apply';
    protected $guarded = [];

    public function sonod_setting()
    {
        return $this->belongsTo(SonodSetting::class, 'sonod_setting_id');
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['*']);
    }
}
