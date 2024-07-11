<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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

    public static function accesosSemanales($area = null)
    {
         $sql = DB::table('eventos_acceso')
        ->select(DB::raw('DATE(fecha_hora) as date'), DB::raw('count(*) as count'))
        ->whereBetween('fecha_hora', [now()->startOfWeek(), now()->endOfWeek()])
        ->groupBy('date')
        ->orderBy('date');

        if($area) {
            $sql->where('area_id', $area);
        }

        return $sql->get();

    }
    // Funcion para contar cuantos usuarios masculinos y cuantos femeninos
    // ingresaron al area
    public static function accesosPorGenero($area_id = null)
    {
        $sql = DB::table('eventos_acceso as e')
            ->join('usuarios as u', 'e.usuario_id', '=', 'u.usuario_id')
            ->join('persona as p', 'u.usuario_id', '=', 'p.usuario_id')
            ->whereBetween('e.fecha_hora', [now()->startOfWeek(), now()->endOfWeek()])
            ->select(
                DB::raw('SUM(CASE WHEN p.sexo = "M" THEN 1 ELSE 0 END) as count_hombres'),
                DB::raw('SUM(CASE WHEN p.sexo = "F" THEN 1 ELSE 0 END) as count_mujeres'),
                DB::raw('SUM(CASE WHEN p.sexo = "O" THEN 1 ELSE 0 END) as count_otro')
            )
            ->where('e.area_id', $area_id);

            return $sql->first();
    }
    
    public static function accesosPorPeriodo($fecha_inicial = null, $fecha_final = null, $area_id = null, $sexo = null)
    {
        // Convertir las fechas a objetos Carbon y establecer la hora adecuadamente
        // la funcion startOfDay de carbon, sirve para que tome en cuenta el inicio del dia osea  alas 00:00:00
        // la funcion endOfDay de carbon, srive para que tome en cuenta el final del dia ingresado osea a las 23:59:59
        // estas dos funciones fueron agregados, debido que el formmulario de reporte mandamos datos tipo date y no datetime

        $fecha_inicial = $fecha_inicial ? Carbon::parse($fecha_inicial)->startOfDay()->toDateTimeString() : null;
        $fecha_final = $fecha_final ? Carbon::parse($fecha_final)->endOfDay()->toDateTimeString() : null;

        $sql = DB::table('eventos_acceso as e')
            ->join('usuarios as u', 'e.usuario_id', '=', 'u.usuario_id')
            ->join('persona as p', 'u.usuario_id', '=', 'p.usuario_id')
            ->whereBetween('e.created_at', [$fecha_inicial, $fecha_final])
            ->where('e.area_id', $area_id);
    
        switch ($sexo) {
            case 'hombres':
                $sql->select(DB::raw('DATE(e.fecha_hora) as date'),
                    DB::raw('SUM(CASE WHEN p.sexo = "M" THEN 1 ELSE 0 END) as conteo'),
                    DB::raw('SUM(CASE WHEN e.permiso = "PERMITIDO" THEN 1 ELSE 0 END) as conteo_permitido'),
                    DB::raw('SUM(CASE WHEN e.permiso = "NO PERMITIDO" THEN 1 ELSE 0 END) as conteo_denegado')
                );
                break;
            case 'mujeres':
                $sql->select(DB::raw('DATE(e.fecha_hora) as date'),
                    DB::raw('SUM(CASE WHEN p.sexo = "F" THEN 1 ELSE 0 END) as conteo'),
                    DB::raw('SUM(CASE WHEN e.permiso = "PERMITIDO" THEN 1 ELSE 0 END) as conteo_permitido'),
                    DB::raw('SUM(CASE WHEN e.permiso = "NO PERMITIDO" THEN 1 ELSE 0 END) as conteo_denegado')
                );
                break;
            case 'todos':
                $sql->select(DB::raw('DATE(e.fecha_hora) as date'),
                    DB::raw('COUNT(*) as conteo'),
                    DB::raw('SUM(CASE WHEN e.permiso = "PERMITIDO" THEN 1 ELSE 0 END) as conteo_permitido'),
                    DB::raw('SUM(CASE WHEN e.permiso = "NO PERMITIDO" THEN 1 ELSE 0 END) as conteo_denegado')
                );
                break;
            default:
                $sql->select(DB::raw('DATE(e.fecha_hora) as date'),
                    DB::raw('COUNT(*) as conteo'),
                    DB::raw('SUM(CASE WHEN e.permiso = "PERMITIDO" THEN 1 ELSE 0 END) as conteo_permitido'),
                    DB::raw('SUM(CASE WHEN e.permiso = "NO PERMITIDO" THEN 1 ELSE 0 END) as conteo_denegado')
                );
                break;
        }
    
        return $sql->groupBy('date')
                   ->orderBy('date')
                   ->get();
    }
    }


        


