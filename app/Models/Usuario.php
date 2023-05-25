<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Database\Factories\UsuarioFactory;


class Usuario extends Model implements Authenticatable
{
    use HasFactory;
    use AuthenticatableTrait;
    use HasFactory;

    public $timestamps = false;

    protected $table = 'Usuario';

    protected $fillable = ['Nombre', 'email', 'foto', 'biografia', 'password', 'es_Admin'];

    public function categorias()
    {
        return $this->belongsToMany(Categoria::class);
    }

    public function eventos()
    {
        return $this->hasMany(Evento::class);
    }

    public function hilos()
    {
        return $this->hasMany(Hilo::class);
    }

    public function like_t()
    {
        return $this->belongsToMany(Tuit::class,'usuario_tuit');
    }

    public function like_h()
    {
        return $this->belongsToMany(Tuit::class,'usuario_hilo');
    }

    public function getAuthIdentifierName()
    {
        return 'id'; // Cambia esto si el identificador de autenticación es diferente en tu modelo
    }

    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }
    
    public function findForPassport($username)
    {
        return $this->where('Nombre', $username)->orWhere('email', $username)->first();
    }
    public static function factory()
    {
        return new UsuarioFactory();
    }    
}