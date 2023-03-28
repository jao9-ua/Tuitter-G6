<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'Usuario';

    protected $fillable = ['Nombre', 'Correo', 'Foto', 'Biografía', 'Password', 'Es_Admin?'];

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

    public function tuit()
    {
        return $this->belongsToMany(Tuit::class,'usuario_tuit');
    }

    //segunda relacion de crear?
}