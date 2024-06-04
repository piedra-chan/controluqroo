<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Autorizaciones;
use App\Models\EventosAcceso;
use App\Models\User;

class ApiUaqrooController extends Controller
{
    public function validarUsuario ()
    {
        $validaciones = Autorizaciones::with(['user' => function($query) {
            $query->select('nombre_usuario');
        }])->get();
        return response()->json($validaciones);
    }

    public function eventosAcceso (Request $request)
    {
        $validarDatos = $request->validate([
            'semestre' => 'required|string|max:50',
            'grupo' => 'required|string|max:50',
            'matricula' => 'required|string|max:50',
            'area_id' => 'nullable|integer',
            'usuario_id' => 'nullable|integer',
            'permiso' => 'nullable|boolean',
        ]);


        $evento = EventosAcceso::create($validarDatos);

        return response()->json($evento, 201);
    }

    public function buscarUsuario($email, $areaId)
    {
        $user = User::where('email', $email)->firstOrFail();

        $user_id = $user->usuario_id;

        if($user) {

        $validacion = Autorizaciones::where('usuario_id', $user_id)
                                        ->where('area_id', $areaId)
                                        ->first();

        if($validacion)  {
            return response()->json(['acceso' => true]);
        } else {
            return response()->json(['acceso' => false]);
        }
    }else {
        return response()->json(['Usuario no encontrado']); 
    }
    
                                    

    }
}
