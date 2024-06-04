<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventosAcceso extends Model
{
    use HasFactory;

    protected $table = 'eventos_acceso';
    protected $primaryKey = 'evento_id';

    protected $fillabale = [
        'semestre',
        'grupo',
        'matricula',
        'area_id',
        'usuario_id',
        'permiso',
        'fecha_hora'
    ];

}
