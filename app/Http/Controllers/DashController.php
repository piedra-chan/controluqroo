<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EventosAcceso;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use ArielMejiaDev\LarapexCharts\LarapexChart;


class DashController extends Controller
{
    public function index()
    {
        $hoy = Carbon::today();
        $inicio_semana = Carbon::now()->startOfWeek();
        $fin_semana = Carbon::now()->endOfWeek();

        $conteo_hoy = EventosAcceso::whereDate('created_at', $hoy)->count();
        
        $conteo_permitido = EventosAcceso::whereBetween('created_at', [$inicio_semana, $fin_semana])
                                            ->where('permiso', 'PERMITIDO')
                                            ->count();
        
        $conteo_denegado = EventosAcceso::whereBetween('created_at', [$inicio_semana, $fin_semana])
                                            ->where('permiso', 'NO PERMITIDO')
                                            ->count();

        $total = $conteo_permitido + $conteo_denegado;
        $porcentaje_perm = ($conteo_permitido / $total) * 100;
        $porcentaje_deneg = ($conteo_denegado / $total) * 100;

        // Crear gráfico semanal 
        $eventos_m = EventosAcceso::accesosSemanalesM();
        $eventos_f = EventosAcceso::accesosSemanalesF();

        $fecha_actual = date('Y-m-d');

        // Mapear nombre de los dias de ingles a español

        $daysMap = [
            'Monday' => 'Lunes',
            'Tuesday' => 'Martes',
            'Wednesday' => 'Miércoles',
            'Thursday' => 'Jueves',
            'Friday' => 'Viernes',
            'Saturday' => 'Sábado',
            'Sunday' => 'Domingo'
        ];

        // Inicializar array para que el grafico empiece desde el dia lunes

        $diasSemana = [
            'Lunes' => 0,
            'Martes' => 0,
            'Miércoles' => 0,
            'Jueves' => 0,
            'Viernes' => 0,
            'Sábado' => 0,
            'Domingo' => 0
        ];

        $diasSemanaF = $diasSemana; // Copia para el conteo femenino

        foreach($eventos_m as $access_m) {
            $dia = date('l', strtotime($access_m->date));
            $diaEspanol = $daysMap[$dia];
            if (isset($diasSemana[$diaEspanol])){
                $diasSemana[$diaEspanol] += $access_m->count;
            }
        }
        
        foreach($eventos_f as $access_f) {
            $dia = date('l', strtotime($access_f->date));
            $diaEspanol = $daysMap[$dia];
            if (isset($diasSemanaF[$diaEspanol])){
                $diasSemanaF[$diaEspanol] += $access_f->count;
            }
        }
        
        
         //obtener los dias en el orden correcto 
         
         $diasOrdenados = array_keys($diasSemana);

         //obtener los accesos en el orden correcto

         $dataM = array_values($diasSemana);
         $dataF = array_values($diasSemanaF);

         $chart = (new LarapexChart)->lineChart()
         ->addData('Hombres', $dataM)
         ->addData('Mujeres', $dataF)
         ->setColors(['#0000FF', '#FF00FF']) // Colores azul y rosa
         ->setXAxis($diasOrdenados);
     // Línea con grosor 2
 /*   ->setOptions([
        'chart' => [
            'type' => 'line',
        ],
        'stroke' => [
            'curve' => 'smooth'
        ],
        'fill' => [
            'type' => 'gradient',
            'gradient' => [
                'shadeIntensity' => 1,
                'gradientToColors' => ['#00c6ff', '#ff99cc'], // Azul y rosa gradientes
                'inverseColors' => false,
                'opacityFrom' => 1,
                'opacityTo' => 1,
                'stops' => [0, 100]
            ],
        ]
    ]); */
        
        
        return view('barebone', compact('conteo_hoy','chart', 'conteo_permitido', 'conteo_denegado', 'porcentaje_perm', 'porcentaje_deneg'));
    }
}
