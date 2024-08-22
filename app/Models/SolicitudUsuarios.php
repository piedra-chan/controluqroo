<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitudUsuarios extends Model
{
    use HasFactory;

    protected $table = 'solicitud_usuarios';
    protected $primaryKey = 'solicitud_usuario_id';

    protected $fillable = [
        'solicitud_id',
        'usuario_id',
        'updated_at'
    ];

    public function solicitud()
    {
        return $this->belongsTo(Solicitud::class, 'usuario_id');
    }
}
