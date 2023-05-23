<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hilo extends Model
{
    use HasFactory;

    public $timestamps =false;

    protected $table = 'Hilo';

    protected $fillable = ['texto', 'imagen', 'fecha'];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function tuits()
    {
        return $this->hasMany(Tuit::class);
    }

    public function usuario()
    {
        return $this->belongsToMany(Usuario::class,'usuario_hilo');
    }
    public static function factory()
    {
        return new HiloFactory();
    }    
}