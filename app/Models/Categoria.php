<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{

    public $timestamps =false;

    protected $table = 'Categoria';

    protected $fillable = ['hashtag', 'views', 'imagen'];

    public function hilo()
    {
        return $this->hasMany(Hilo::class);
    }

    public function usuarios()
    {
        return $this->belongsToMany(Usuario::class);
    }

    public function evento()
    {
        return $this->hasMany(Evento::class);
    }   
}