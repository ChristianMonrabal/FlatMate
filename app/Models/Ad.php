<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'status_id', 'title', 'description', 'address', 'city',
        'postal_code', 'floor', 'area', 'rooms', 'bathrooms', 'terrace', 
        'storage', 'monthly_price'
    ];

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function photos()
    {
        return $this->hasMany(AdPhoto::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    public function applications()
    {
        return $this->hasMany(Application::class);
    }

    public function chats()
    {
        return $this->hasMany(Chat::class);
    }

    public function contracts()
    {
        return $this->hasMany(Contract::class);
    }
}
