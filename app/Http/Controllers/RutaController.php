<?php

namespace App\Http\Controllers;

use App\Models\CheckList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Redirector;
use App\Models\Ruta;
use App\Models\Trabajador;
use App\Models\Vehiculo;
use App\Models\TipoVehiculo;

class RutaController extends Controller
{
    public function estadoRuta (){

        $id_trabajador = session('id_trabajador');
        $c = Trabajador::where('id_trabajador','=',$id_trabajador)->get('cargo');
        $f = Trabajador::where('id_trabajador','=',$id_trabajador)->get('faena');
        $cargo = $c[0] -> cargo;
        $faena = $f[0] -> faena;
        $tipo_vehiculo = TipoVehiculo::all();
        $codigo_vehiculo = Vehiculo::where('estado','Operativo')->where('faena_asignada',$faena)->get('codigo');
        $vehiculo = Vehiculo::where('codigo',$codigo_vehiculo[0]->codigo);
        $estado = CheckList::where('id_conductor','=',$id_trabajador)->orderByDesc('fecha_inicio')->get('estado_check_list')->first();
        
        if ($estado === null ){
            return view('Conductor/conductor', compact('tipo_vehiculo'))
            ->with('cargo',$cargo)
            ->with('faena',$faena)
            ->with('codigo_vehiculo',$codigo_vehiculo);
        }else if ($estado -> estado_check_list === 'Pendiente'){
            $check_list = CheckList::where('id_conductor','=',$id_trabajador)->orderByDesc('fecha_inicio')->get()->first();
            $id_check_list = $check_list -> id_check_list;
            $id = Ruta::where('id_conductor',$id_trabajador)->orderByDesc('fecha_creacion')->get('id_ruta')->first();
            $id_ruta = $id -> id_ruta;
            Ruta::updateOrInsert(
                ['id_ruta' => $id_ruta],
                [
                    'id_check_list' => $id_check_list
                ]);
            return view('Conductor/conductorRuta')
            ->with('cargo',$cargo)
            ->with('faena',$faena);
        }else if ($estado -> estado_check_list  === 'Aprobado'){
            $check_list = CheckList::where('id_conductor','=',$id_trabajador)->orderByDesc('fecha_inicio')->get()->first();
            $id_check_list = $check_list -> id_check_list;
            $codigo = $check_list -> codigo_vehiculo_ch;
            $tipo_vehiculo_i = $check_list -> tipo_vehiculo_ch;
            $fecha_inicio = $check_list -> fecha_inicio;
            $ruta = Ruta::where('id_conductor',$id_trabajador)->orderByDesc('fecha_creacion')->get()->first();
            $id_ruta = $ruta -> id_ruta;
            Ruta::updateOrInsert(
                ['id_ruta' => $id_ruta],
                [
                    'id_check_list' => $id_check_list
                ]);
            if($ruta->estado_ruta == 'Finalizada'){
                return view('Conductor/conductor', compact('tipo_vehiculo'))
                ->with('cargo',$cargo)
                ->with('faena',$faena)
                ->with('codigo_vehiculo',$codigo_vehiculo);
            }else{
                return view('Conductor/conductorRutaIniciada')
                ->with('cargo',$cargo)
                ->with('faena',$faena)
                ->with('codigo',$codigo)
                ->with('tipo_vehiculo_i',$tipo_vehiculo_i)
                ->with('fecha_inicio',$fecha_inicio)
                ->with('id_ruta',$id_ruta)
                ->with('codigo_vehiculo',$codigo_vehiculo);
            }
        }else if ($estado -> estado_check_list  === 'Rechazado'){
            $check_list = CheckList::where('id_conductor','=',$id_trabajador)->orderByDesc('fecha_inicio')->get()->first();
            $id_check_list = $check_list -> id_check_list;
            $id = Ruta::where('id_conductor',$id_trabajador)->orderByDesc('fecha_creacion')->get('id_ruta')->first();
            $id_ruta = $id -> id_ruta;
            Ruta::updateOrInsert(
                ['id_ruta' => $id_ruta],
                [
                    'id_check_list' => $id_check_list
                ]);
            return view('Conductor/conductor', compact('tipo_vehiculo'))
            ->with('cargo',$cargo)
            ->with('faena',$faena)
            ->with('codigo_vehiculo',$codigo_vehiculo);
        }
    }

    public function store (Request $request) {

        $id_trabajador = session('id_trabajador');
        $tipo_vehiculo = $request -> tipo_vehiculo;
        $codigo_vehiculo = $request -> codigo_vehiculo;
        $nombre = Trabajador::where('id_trabajador',$id_trabajador)->get('nombre');
        $apellido = Trabajador::where('id_trabajador',$id_trabajador)->get('apellido_p');
        $faena_ini = Trabajador::where('id_trabajador',$id_trabajador)->get('faena');
        $cargo_ini = Trabajador::where('id_trabajador',$id_trabajador)->get('cargo');
        $patente_ini = Vehiculo::where('codigo',$codigo_vehiculo)->get('patente');
        $patente_vehiculo = $patente_ini[0]->patente;
        $faena = $faena_ini[0]->faena;
        $cargo = $cargo_ini[0]->cargo;
        $nombre_conductor = $nombre[0]->nombre.' '.$apellido[0]->apellido_p; 
        $ruta = new Ruta();
        $ruta -> id_conductor = $id_trabajador;
        $ruta -> nombre_conductor = $nombre_conductor;
        $ruta -> tipo_vehiculo = $tipo_vehiculo;
        $ruta -> codigo_vehiculo = $codigo_vehiculo;
        $ruta -> estado_ruta = 'Espera';

        Vehiculo::updateOrInsert(
            ['codigo' => $codigo_vehiculo],
            [
                'estado' => 'Espera'
            ]);

        $ruta -> save();

        return view('Conductor/check_list_vehiculo')
        ->with('nombre_conductor', $nombre_conductor)
        ->with('patente_vehiculo', $patente_vehiculo)
        ->with('faena', $faena)
        ->with('cargo', $cargo)
        ->with('tipo_vehiculo', $tipo_vehiculo)
        ->with('codigo_vehiculo', $codigo_vehiculo);
    }

    public function finalizarRuta(){

        $id_trabajador = session('id_trabajador');
        $c = Trabajador::where('id_trabajador','=',$id_trabajador)->get('cargo');
        $f = Trabajador::where('id_trabajador','=',$id_trabajador)->get('faena');
        $cargo = $c[0] -> cargo;
        $faena = $f[0] -> faena;
        $fecha_termino = date('Y-m-d H:i:s', strtotime('now'));
        $ruta = Ruta::where('id_conductor',$id_trabajador)->orderByDesc('fecha_creacion')->get()->first();
        $cod_vehiculo = Ruta::where('id_conductor',$id_trabajador)->get('codigo_vehiculo');
        $codigo = $cod_vehiculo[0] -> codigo_vehiculo;
        $id_ruta = $ruta -> id_ruta;

        Ruta::updateOrInsert([
            'id_ruta' =>$id_ruta
        ],[
            'fecha_termino' => $fecha_termino,
            'estado_ruta' => 'Finalizada'
        ]);  

        Vehiculo::updateOrInsert(
            ['codigo' => $codigo],
            [
                'estado' => 'Operativo'
            ]);
        
        return redirect()->route('conductor');
        
        /*return view('Conductor/conductorRutaLista')
        ->with('faena', $faena)
        ->with('cargo', $cargo);*/
    }
}
