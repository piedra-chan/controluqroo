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
use Illuminate\Support\Facades\Auth;

class EventosController extends Controller
{
    public function index()
    {
        $eventos = EventosAcceso::accesosHoy();

       // dd($eventos);

        return view('pages-control.historial', compact('eventos'));
    }

    public function miHistorial()
    {
        $user_id = Auth::user()->usuario_id;
        $eventos = EventosAcceso::accesosUsers($user_id);

        return view('pages-control.mi-historial', compact('eventos'));
    }
}
