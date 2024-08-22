<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    use HasFactory;

    protected $table = 'solicitudes';
    protected $primaryKey = 'solicitud_id';

    protected $fillable = [
        'usuario_id',
        'mensaje',
        'area_id',
        'fecha_deseada',
        'area_id'
    ];

    public function solicitudUsuario()
    {
        return $this->hasMany(SolicitudUsuario::class, 'usuario_id');
    }
}
