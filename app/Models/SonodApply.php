<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SonodApply extends Model
{
    use HasFactory;
    protected $table = 'sonod_apply';
    protected $guarded = [];

    public function sonod_setting()
    {
        return $this->belongsTo(SonodSetting::class, 'sonod_setting_id');
    }
}
