<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tuit extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'tuits';

    protected $fillable = ['texto', 'imagen', 'fecha', 'orden'];

    public function hilo()
    {
        return $this->belongsTo(Hilo::class);
    }
}