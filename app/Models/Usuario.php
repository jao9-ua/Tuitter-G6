<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'Usuario';

    protected $fillable = ['Nombre', 'email', 'foto', 'biografia', 'password', 'es_Admin?'];

    public function categoria()
    {
        return $this->belongsToMany(Categoria::class);
    }

    public function evento()
    {
        return $this->hasMany(Evento::class);
    }

    public function hilo()
    {
        return $this->belongsToMany(Hilo::class);
    }

    public function like_t()
    {
        return $this->belongsToMany(Tuit::class,'usuario_tuit');
    }

    public function like_h()
    {
        return $this->belongsToMany(Tuit::class,'usuario_hilo');
    }
}