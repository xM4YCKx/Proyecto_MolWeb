<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Vehiculo;
use App\Models\TipoVehiculo;
use App\Models\Trabajador;

class VehiculoController extends Controller
{
    public function completaRuta(){

        $id_trabajador = session('id_trabajador');
        $c = Trabajador::where('id_trabajador','=',$id_trabajador)->get('cargo');
        $f = Trabajador::where('id_trabajador','=',$id_trabajador)->get('faena');
        $cargo = $c[0] -> cargo;
        $faena = $f[0] -> faena;
        $tipo_vehiculo = TipoVehiculo::all();
        $codigo_vehiculo = Vehiculo::where('estado','Operativo')->get('codigo');

        return view('Conductor/conductor', compact('tipo_vehiculo'))
        ->with('cargo',$cargo)
        ->with('faena',$faena)
        ->with('codigo_vehiculo',$codigo_vehiculo);
    }

    public function listarVehiculos(){

        $id_trabajador = session('id_trabajador');
        $c = Trabajador::where('id_trabajador','=',$id_trabajador)->get('cargo');
        $cargo = $c[0] -> cargo;
        $operativos = Vehiculo::where('estado','Operativo')->get();
        $no_operativos = Vehiculo::where('estado','No operativo')->get();
        $espera = Vehiculo::where('estado','Espera')->get();
        $ruta = Vehiculo::where('estado','En ruta')->get();
        $taller = Vehiculo::where('estado','En taller')->get();
        $mantencion = Vehiculo::where('estado','En mantencion')->get();
        //$datos=DB::select("select * from vehiculo");
        return view('Vehiculo/vehiculo')
        ->with('cargo',$cargo)
        ->with('operativos',$operativos)
        ->with('no_operativos',$no_operativos)
        ->with('espera',$espera)
        ->with('ruta',$ruta)
        ->with('taller',$taller)
        ->with('mantencion',$mantencion);
    }

    public function vehiculosDisponibles(){
        
        //filtrado para busqueda de codigos de vehiculos que pertenezcan a tipo de vehiculo
        $disponibles = Vehiculo::where('estado','Operativo')->get();
        return view('Conductor/conductor')
        ->with('disponibles',$disponibles);
    }   
}
