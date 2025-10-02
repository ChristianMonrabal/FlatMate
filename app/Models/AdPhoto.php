<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdPhoto extends Model
{
    protected $fillable = [
        'ad_id', 'photo_path'
    ];

    public function ad()
    {
        return $this->belongsTo(Ad::class);
    }
}
