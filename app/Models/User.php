<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'lastname',
        'email',
        'password',
        'google_id',
        'phone',
        'birthdate',
        'gender',
        'bio',
        'profile_picture',
        'is_owner',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'birthdate' => 'date',
            'is_owner' => 'boolean',
            'password' => 'hashed',
        ];
    }

    public function ads()
    {
        return $this->hasMany(Ad::class, 'owner_id');
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
