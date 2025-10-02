<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = ['ad_id', 'applicant_id', 'status_id'];

    public function ad()
    {
        return $this->belongsTo(Ad::class);
    }

    public function applicant()
    {
        return $this->belongsTo(User::class, 'applicant_id');
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
