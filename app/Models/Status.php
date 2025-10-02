<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function ads()
    {
        return $this->hasMany(Ad::class);
    }

    public function applications()
    {
        return $this->hasMany(Application::class);
    }

    public function contracts()
    {
        return $this->hasMany(Contract::class);
    }
}
