<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'user_id', 'profile_photo', 'dni', 'age', 'gender',
        'smoker', 'has_children', 'pets', 'hobbies'
    ];

    // Un perfil pertenece a un usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
