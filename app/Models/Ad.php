<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    protected $fillable = [
        'user_id', 'title', 'address', 'postal_code',
        'floor', 'rooms', 'bathrooms', 'square_meters',
        'terrace', 'storage_room', 'price', 'description'
    ];

    // Un anuncio pertenece a un usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Un anuncio tiene muchas fotos
    public function photos()
    {
        return $this->hasMany(AdPhoto::class);
    }

    // Un anuncio puede tener muchos favoritos
    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    // Un anuncio puede recibir muchas postulaciones
    public function applications()
    {
        return $this->hasMany(Application::class);
    }
}
