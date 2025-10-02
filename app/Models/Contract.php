<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $fillable = [
        'ad_id', 'owner_id', 'tenant_id',
        'price', 'start_date', 'end_date', 'status'
    ];

    public function ad()
    {
        return $this->belongsTo(Ad::class);
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function tenant()
    {
        return $this->belongsTo(User::class, 'tenant_id');
    }
}
