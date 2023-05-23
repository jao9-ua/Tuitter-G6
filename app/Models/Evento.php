<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'Evento';

    protected $fillable = ['Texto', 'Imagen'];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function usuario()
    {
        return $this->belongsToMany(Usuario::class);
    }
}