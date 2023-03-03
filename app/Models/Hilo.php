<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hilo extends Model
{
    use HasFactory;

    public $timestamps =false;

    protected $table = 'hilos';

    protected $fillable = ['texto', 'imagen', 'fecha'];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function tuit()
    {
        return $this->hasMany(Tuit::class);
    }
}