<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'Evento';

    protected $fillable = ['Texto', 'Imagen', 'Fecha_ini', 'Fecha_fin', 'Fecha_post'];

    public function categoria()
    {
        return $this->belongsToMany(Categoria::class);
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }
}