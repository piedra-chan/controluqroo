<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;
use App\Models\EventosAcceso;
use App\Models\Autorizaciones;
use RealRashid\SweetAlert\Facades\Alert;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\User;
use DateTime;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class AreaController extends Controller
{
    public function index()
    {
        $areas = Area::all();
        $users = User::all();

        return view('pages-control.areas.areas', compact('areas'));

    }

    public function store(Request $request)
    {
        $area = new Area;

        $area->nombre = $request->nombre;
        $area->descripcion = $request->descripcion;
        $area->usuarios_permitidos = $request->users;
        $now = now(); // Obtener la fecha y hora actual
        $area->created_at = $now;
        $area->updated_at = $now;
        $area->save();
        Alert::success('Éxito', '! Área registrada !');

        return redirect('/ver-areas')->with('success', 'Área agregada');


    }

    public function administrar(String $id)
    {
        $area = Area::find($id);
        $users = User::all();

     // Generar el gráfico que representara los accesos durante la semana de lunes a viernes
     // mandar el parametro del id al metodo constructor que esta
     // en el modelo eventosAcceso

     $accesos_semanales = EventosAcceso::accesosSemanales($id);

        // obtener la fecha actual
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

        foreach($accesos_semanales as $access) {
            $dia = date('l', strtotime($access->date));
            $diaEspanol = $daysMap[$dia];
            if (isset($diasSemana[$diaEspanol])){
                $diasSemana[$diaEspanol] = $access->count;
            }
        }

        
         //obtener los dias en el orden correcto 
         
         $diasOrdenados = array_keys($diasSemana);

         //obtener los accesos en el orden correcto

         $data = array_values($diasSemana);

         // generar el grafo

         $chart = (new LarapexChart)->lineChart()
         ->addData('Accesos', $data)
         ->setXAxis($diasOrdenados)
         ->setWidth(600) // Ancho del gráfico en píxeles
         ->setHeight(410); // Alto del gráfico en píxeles

        // Generar grafo de dona para representar los usuarios 
        // masculinos y femeninos dentro del área

        $data = EventosAcceso::accesosPorGenero($id);
        //conteo de hombres
        $countM = $data->count_hombres;
        //conteo de mujeres
        $countF = $data->count_mujeres;
        $countO = $data->count_otro;

        $accesos = [
            'Hombres' => $countM,
            'Mujeres' => $countF,
            'Otro' => $countO,
            'Total' => ($countF + $countM + $countO)
        ];

        // Calcular porcentajes
        $total = $data->count_hombres + $data->count_mujeres + $data->count_otro;
        // Asegurarse de no dividir por cero si $total es cero
        $percentageHombres = $total != 0 ? ($data->count_hombres / $total) * 100 : 0;
        $percentageMujeres = $total != 0 ? ($data->count_mujeres / $total) * 100 : 0;
        $percentageOther = $total != 0 ? ($data->count_otro / $total) * 100 : 0;

        // generar grafo

        $chart2 = (new LarapexChart)->pieChart()
         /*   ->setTitle('Distribución de accesos por Género')
            ->setSubtitle('Semana actual') */
            ->addData([$percentageHombres, $percentageMujeres, $percentageOther])
            ->setLabels(['Masculino', 'Femenino', 'Otro género&nbsp;'])
            ->setColors(['#3498db', '#e91e63', '#572364'])
            ->setWidth(330) // Ancho del gráfico en píxeles
            ->setHeight(230); // Alto del gráfico en píxeles;


            // Cargar usuarios permitidos dentro del area
        $users_acces = Autorizaciones::usuariosPermitidos($id);



        return view('pages-control.areas.adm_areas', compact('area', 'chart', 'chart2', 'users','accesos','users_acces'));
    }

    public function permitirAccesos(Request $request)
    {
        $usuarios = $request->usuarios;
        $area = $request->area;
        
        foreach($usuarios as $user)
        {
            $autorizacion = new Autorizaciones;
            $autorizacion->usuario_id = $user;
            $autorizacion->area_id = $area;
            $now = now(); // Obtener la fecha y hora actual
            $autorizacion->created_at = $now;
            $autorizacion->updated_at = $now;
            $autorizacion->expires_at = Carbon::create($request->expires);
            $autorizacion->save();

        }

            return redirect()->back()->with('success', 'Los usuarios ahora tienen acceso a esta área');
        
    }

    public function update(Request $request, $id)
    {
        $area = Area::find($id);
        $area->nombre = $request->nombreedit;
        $area->usuarios_permitidos = $request->usersedit;
        $area->descripcion = $request->descripcionedit;
        $area->save();

        return redirect("/ver-areas")->with('success', 'Área actializada exitosamente');
    }

    public function generarReporte(Request $request, $id)
    {
        setlocale(LC_TIME, 'es_ES.UTF-8');
        Carbon::setLocale('es');
        $area = Area::find($id);


        $fecha_inicial = $request->fecha_inicio;
        $fecha_final = $request->fecha_fin;
        $sexo = $request->sexo;
        $area_id = $area->area_id;

        $accesos_periodicas = EventosAcceso::accesosPorPeriodo($fecha_inicial, $fecha_final, $area_id, $sexo);

        //array de meses
        $accesosPorMes = [
            'enero' => 0,
            'febrero' => 0,
            'marzo' => 0,
            'abril' => 0,
            'mayo' => 0,
            'junio' => 0,
            'julio' => 0,
            'agosto' => 0,
            'septiembre' => 0,
            'octubre' => 0,
            'noviembre' => 0,
            'diciembre' => 0,
        ];

        $mesesEsp = [
            'Enero' => 0,
            'Febrero' => 0,
            'Marzo' => 0,
            'Abril' => 0,
            'Mayo' => 0,
            'Junio' => 0,
            'Julio' => 0,
            'Agosto' => 0,
            'Septiembre' => 0,
            'Octubre' => 0,
            'Noviembre' => 0,
            'Diciembre' => 0,
        ];

    $conteo_final = null;
    $conteo_permitidos = null;
    $conteo_denegados = null;

    foreach($accesos_periodicas as $acceso) {
        // Obtener el mes desde la fecha
        $mes = Carbon::parse($acceso->date)->monthName;
        $mes = strtolower($mes);
        // Sumar el conteo al mes correspondiente
        if(array_key_exists($mes, $accesosPorMes)) {
            $accesosPorMes[$mes] += (int) $acceso->conteo_permitido + $acceso->conteo_denegado;
            $conteo_final += $acceso->conteo;
            $conteo_permitidos += $acceso->conteo_permitido;
            $conteo_denegados += $acceso->conteo_denegado;
        }
    }

   // dd([
     //   'total_conteo' => $conteo_final,
       // 'total_conteo_permitido' => $conteo_permitidos,
    //    'total_conteo_denegado' => $conteo_denegados,
  // ]);

    // Obtener los nombres de los meses ordenados
    $mesesOrdenados = array_keys($accesosPorMes);

    // Obtener los datos de conteo por mes
    $data = array_values($accesosPorMes);

    // Configurar el gráfico con LarapexCharts
    $chart = (new LarapexChart)->barChart()
        ->addData('Accesos', $data)
        ->setXAxis($mesesOrdenados)
        ->setWidth(500)
        ->setHeight(500);

    $hoy = Carbon::now();
    $data = array_map('intval', $data);
    $nombre_area = $area->nombre;
    $conteo = $accesos_periodicas;
    // Generar folio
    $uuid = Str::uuid()->toString();

    //$chartImage = $chart->render();
    $pdf = \PDF::loadView('pages-control.areas.pre-reporte', compact('data', 'uuid', 'conteo_final', 'conteo_permitidos', 'conteo_denegados', 'mesesOrdenados', 'fecha_inicial', 'fecha_final', 'nombre_area'));

    return $pdf->download('Reporte_accesos_' . $nombre_area . ' ' . $hoy . '.pdf');

    }
}
