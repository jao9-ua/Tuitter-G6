<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Foundation\Auth\User;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Usuario extends Authenticatable
{
    use Notifiable;
    use HasApiTokens, HasFactory;

    public $timestamps = false;

    public $table = 'Usuario';

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
        return $this->belongsToMany(Tuit::class, 'usuario_tuit');
    }

    public function like_h()
    {
        return $this->belongsToMany(Hilo::class, 'usuario_hilo');
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
}
