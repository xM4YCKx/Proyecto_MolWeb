<?php

namespace App\Http\Controllers;
use App\Models\Tarea;
use App\Models\Solicitud;
use App\Models\trabajador;
use App\Models\Vehiculo;
use Illuminate\Support\Facades\DB;
use App\Models\Historial_local;

use Illuminate\Http\Request;

class TareaController extends Controller
{
    public function listarTareas(Request $request){

        $id_trabajador = session('id_trabajador');
        $c = Trabajador::where('id_trabajador','=',$id_trabajador)->get('cargo');
        $cargo = $c[0] -> cargo;
        $Pendientes=Tarea::where('id_mecanico',$id_trabajador)->where('estado_tarea', '=', 'Pendiente')->get();
        $Ejecucion=Tarea::where('id_mecanico',$id_trabajador)->where('estado_tarea', '=', 'En ejecucion')->get();
        $Finalizadas=Tarea::where('id_mecanico',$id_trabajador)->where('estado_tarea', '=', 'Finalizada')->get();
        return view('Mecanico/mecanico')
        ->with('cargo',$cargo)
        ->with('Pendientes',$Pendientes)
        ->with('Ejecucion',$Ejecucion)
        ->with('Finalizadas',$Finalizadas);
    }

    public function create ($item) {
        $nombre_mecanico = [];
        $id_solicitud = $item;
        $datos_soli = Solicitud::where('id_solicitud',$id_solicitud)->get();
        $nombre=DB::select("select nombre, apellido_p from trabajadores where cargo = 'mecanico' ");

        for ($i = 0; $i < sizeof($nombre); $i++)
        {
            $nombre_mecanico[$i] = $nombre[$i]->nombre.' '.$nombre[$i]->apellido_p;

        };
        
        return view('Planificador/tareaCreate')
        ->with('id_solicitud',$id_solicitud)
        ->with('datos_soli',$datos_soli)
        ->with('nombre_mecanico',$nombre_mecanico);
    }

    public function store (Request $request) {

        $id_solicitud= $request -> id_solicitud;
        $codigo_vehiculo = $request -> codigo_vehiculo;
        $patente_v = Vehiculo::where('codigo',$request->codigo_vehiculo)->get('patente');
        $patente = $patente_v[0] -> patente;

        if($request->nombre_mecanico == 'Boris Ponce'){                 
            $id_mecanico = 15;
        }else if($request->nombre_mecanico == 'Bastian Huidobro'){
            $id_mecanico = 16;
        }else if($request->nombre_mecanico == 'Martin Aranda'){
            $id_mecanico = 17;
        }else if($request->nombre_mecanico == 'Fernando Alvarez'){
            $id_mecanico = 18;
        }

        $tarea = new Tarea();
        $tarea -> nombre_mecanico = $request -> nombre_mecanico;
        $tarea -> codigo_vehiculo_mc = $codigo_vehiculo;
        $tarea -> patente_mc  = $patente;
        $tarea -> faena_mc = $request -> faena;
        $tarea -> detalle_tarea = $request -> detalle_tarea;
        $tarea -> gravedad = $request -> gravedad;
        $tarea -> fecha_limite = $request -> fecha_limite;
        $tarea -> estado_tarea = 'Pendiente';
        $tarea -> id_solicitud = $id_solicitud;
        $tarea -> id_mecanico = $id_mecanico;
        
        Solicitud::updateOrInsert([
            'id_solicitud' => $id_solicitud
        ],[
            'estado_solicitud' => 'Asignado'
        ]);

        Vehiculo::updateOrInsert([
            'codigo' => $codigo_vehiculo
        ],[
            'estado' => 'En taller'
        ]);

        $tarea -> save();

        return redirect()->route('planificador');
    }

    public function iniciarProceso(Request $request){

        $id_tarea = $request -> id_tarea;
        $codigo = Tarea::where('id_tarea',$id_tarea)->get('codigo_vehiculo_mc');
        $codigo_vehiculo = $codigo[0]->codigo_vehiculo_mc;

        $fecha_inicio = date('Y-m-d H:i:s', strtotime('now'));
        //Fecha de inicio con la fecha actual
        Tarea::updateOrInsert([
            'id_tarea' =>$id_tarea
        ],[
            'fecha_inicio' => $fecha_inicio,
            'estado_tarea' => 'En ejecucion'
        ]);     
        
        Vehiculo::updateOrInsert([
            'codigo' =>$codigo_vehiculo
        ],[
            'estado' => 'En revision'
        ]);

        return redirect()->route('mecanico');
    }

    public function finalizarProceso(Request $request){

        $id_tarea = $request -> id_tarea;
        $tarea = Tarea::where('id_tarea',$id_tarea)->get();
        $codigo = Tarea::where('id_tarea',$id_tarea)->get('codigo_vehiculo_mc');
        $codigo_vehiculo = $codigo[0]->codigo_vehiculo_mc;

        $fecha_termino = date('Y-m-d H:i:s', strtotime('now'));
        //Fecha termino con la fecha actual
        Tarea::updateOrInsert([
            'id_tarea' =>$id_tarea
        ],[
            'comentario' => $request -> comentario,
            'fecha_termino' => $fecha_termino,
            'estado_tarea' => 'Finalizada'
        ]); 

        Solicitud::updateOrInsert([
            'id_solicitud' =>$tarea[0]->id_solicitud
        ],[
            'estado_solicitud' => 'Finalizado'
        ]); 
        
        Vehiculo::updateOrInsert([
            'codigo' =>$codigo_vehiculo
        ],[
            'estado' => 'Operativo'
        ]);

        $historial_l = new Historial_local;
        $historial_l -> cod_vehiculo = $codigo_vehiculo;
        $historial_l -> gravedad = $tarea[0]->gravedad;
        $historial_l -> fecha_finalizacion = $fecha_termino;
        $historial_l -> detalle_tarea = $tarea[0] -> detalle_tarea;
        $historial_l -> comentario_tarea = $request -> comentario;
        $historial_l -> id_tarea = $id_tarea;

        $historial_l->save();

        return redirect()->route('mecanico');
    }

    public function desabilitarVehiculo(Request $request){

        $id_tarea = $request -> id_tarea;
        $tarea = Tarea::where('id_tarea',$id_tarea)->get();
        $codigo = Tarea::where('id_tarea',$id_tarea)->get('codigo_vehiculo_mc');
        $codigo_vehiculo = $codigo[0]->codigo_vehiculo_mc;

        $fecha_termino = date('Y-m-d H:i:s', strtotime('now'));
        //Fecha termino con la fecha actual
        Tarea::updateOrInsert([
            'id_tarea' =>$id_tarea
        ],[
            'comentario' => $request -> comentario,
            'fecha_termino' => $fecha_termino,
            'estado_tarea' => 'Finalizada'
        ]); 

        Solicitud::updateOrInsert([
            'id_solicitud' =>$tarea[0]->id_solicitud
        ],[
            'estado_solicitud' => 'Finalizado'
        ]); 
        
        Vehiculo::updateOrInsert([
            'codigo' =>$codigo_vehiculo
        ],[
            'estado' => 'No operativo'
        ]);

        $historial_l = new Historial_local;
        $historial_l -> cod_vehiculo = $codigo_vehiculo;
        $historial_l -> gravedad = $tarea[0]->gravedad;
        $historial_l -> fecha_finalizacion = $fecha_termino;
        $historial_l -> detalle_tarea = $tarea[0] -> detalle_tarea;
        $historial_l -> comentario_tarea = $request -> comentario;
        $historial_l -> id_tarea = $id_tarea;

        $historial_l->save();

        return redirect()->route('mecanico');
    }

}
