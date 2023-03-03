<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hilo extends Model
{
    protected $table = 'hilo';

    public function categoria()
    {
        return $this->belongsTo('Categoria', 'id_categoria');
    }

    public function tuits()
    {
        return $this->hasMany('Tuit', 'id_hilo');
    }
}

class Categoria extends Model
{
    protected $table = 'categoria';

    public function hilos()
    {
        return $this->hasMany('Hilo', 'id_categoria');
    }
}

class Tuit extends Model
{
    protected $table = 'tuit';

    public function hilo()
    {
        return $this->belongsTo('Hilo', 'id_hilo');
    }
}