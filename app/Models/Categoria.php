<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    public $timestamps =false;

    protected $table = 'Categoria';

    protected $fillable = ['hashtag', 'views', 'imagen'];

    public function hilo()
    {
        return $this->belongsToMany(Hilo::class);
    }

    public function usuarios()
    {
        return $this->belongsToMany(Usuario::class);
    }

    public function evento()
    {
        return $this->belongsToMany(Evento::class);
    }
}