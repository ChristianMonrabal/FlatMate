<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;

    protected $fillable = [
        'ad_id', 'landlord_id', 'tenant_id', 'status_id', 
        'start_date', 'end_date', 'monthly_rent', 'file_path'
    ];

    public function ad()
    {
        return $this->belongsTo(Ad::class);
    }

    public function landlord()
    {
        return $this->belongsTo(User::class, 'landlord_id');
    }

    public function tenant()
    {
        return $this->belongsTo(User::class, 'tenant_id');
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
