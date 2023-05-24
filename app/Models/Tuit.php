<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tuit extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'Tuit';

    protected $fillable = ['texto', 'imagen', 'fecha', 'orden'];

    public function hilo()
    {
        return $this->belongsTo(Hilo::class);
    }

    public function usuarios()
    {
        return $this->belongsToMany(Usuario::class,'usuario_tuit');
    }
    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }
}