<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Autorizaciones extends Model
{
    use HasFactory;

    protected $table = 'autorizaciones_usuarios';
    protected $id = 'aut_id';

    protected $fillable = [
        'usuario_id',
        'area_id'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'expires_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

    public static function usuariosPermitidos($area_id = null)
    {
        $sql = DB::table('autorizaciones_usuarios as a')
            ->join('usuarios as u', 'a.usuario_id', '=', 'u.usuario_id')
            ->join('persona as p', 'u.usuario_id', '=', 'p.usuario_id')
            ->where('a.area_id', $area_id)
            ->select('p.nombre', 'p.ape_materno', 'p.ape_paterno', 'p.matricula', 'a.expires_at');
        
        return $sql->get();
    }

    
}
