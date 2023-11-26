<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Historial_local;
use App\Models\Trabajador;

class HistorialLocalController extends Controller
{
    public function listarHistorialLocal ($item){

        $codigo_vehiculo = $item;
        $id_trabajador = session('id_trabajador');
        $c = Trabajador::where('id_trabajador','=',$id_trabajador)->get('cargo');
        $cargo = $c[0] -> cargo;
        $historial_l = Historial_local::where('cod_vehiculo',$codigo_vehiculo)->get();

        //return $historial_l;
        return view('Vehiculo/historialVehiculo')
            ->with('cargo',$cargo)
            ->with('historial_l',$historial_l);
    }
}
