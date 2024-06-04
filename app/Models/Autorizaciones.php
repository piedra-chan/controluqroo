<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autorizaciones extends Model
{
    use HasFactory;

    protected $table = 'autorizaciones_usuarios';
    protected $id = 'aut_id';

    protected $fillable = [
        'usuario_id',
        'area_id',
        'duracion'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    
}
