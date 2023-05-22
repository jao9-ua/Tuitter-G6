<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    use HasFactory;
    use AuthenticatableTrait;
    use HasFactory;

    public $timestamps = false;

    protected $table = 'Usuario';

    protected $fillable = ['Nombre', 'email', 'foto', 'biografia', 'password', 'es_Admin?'];

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

    public function like_t()
    {
        return $this->belongsToMany(Tuit::class,'usuario_tuit');
    }

    public function like_h()
    {
        return $this->belongsToMany(Tuit::class,'usuario_hilo');
    }
    
    /*public function findForPassport($username)
    {
        return $this->where('Nombre', $username)->orWhere('email', $username)->first();
    }

    public function getAuthIdentifierName()
    {
    return 'Nombre';
    }
    
    
    public function getAuthPassword()
    {
    return $this->password;
    }*/

}