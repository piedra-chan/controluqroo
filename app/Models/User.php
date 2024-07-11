<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table = 'usuarios';
    protected $primaryKey = 'usuario_id';

    protected $fillable = [
        'nombre_usuario',
        'email',
        'password',
        'persona_id'
    ];

    public function persona()
    {
        return $this->hasOne(Persona::class, 'usuario_id');
    }

    public function autorizaciones()
    {
        return $this->hasMany(Autorizaciones::class, 'usuario_id');
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
  /*  protected $hidden = [
        'password',
        'remember_token',
    ]; *

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
  /*  protected $casts = [
        'email_verified_at' => 'datetime',
    ]; */
}
