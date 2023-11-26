<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Solicitud;
use App\Models\Trabajador;
use App\Models\CheckList;
use App\Models\Vehiculo;

class SolicitudController extends Controller
{
    public function listarSolicitudes(Request $request){
        //echo session('id_trabajador');
        $id_trabajador = session('id_trabajador');
        $c = Trabajador::where('id_trabajador','=',$id_trabajador)->get('cargo');
        $cargo = $c[0] -> cargo;
        $Pendientes=Solicitud::where('estado_solicitud', '=', 'Pendiente')->get();
        $Asignados=Solicitud::where('estado_solicitud', '=', 'Asignado')->get();
        $Derivados=Solicitud::where('estado_solicitud', '=', 'Derivado')->get();
        $Finalizados=Solicitud::where('estado_solicitud', '=', 'Finalizado')->get();
        return view('Planificador/planificador')
        ->with('cargo',$cargo)
        ->with('Pendientes',$Pendientes)
        ->with('Asignados',$Asignados)
        ->with('Derivados',$Derivados)
        ->with('Finalizados',$Finalizados);
    }

    //public function listarSolicitudesJSON(Request $request){

    //    $Pendientes=Solicitud::where('estado_solicitud', '=', 'Pendiente')->get();
    //    header('Content-type: application/json');
    //    echo json_encode($Pendientes);
        /*
        $Asignados=Solicitud::where('estado_solicitud', '=', 'Asignado')->get();
        $Derivados=Solicitud::where('estado_solicitud', '=', 'Derivado')->get();
        $Finalizados=Solicitud::where('estado_solicitud', '=', 'Finalizado')->get();
        return view('planificador')
        ->with('Pendientes',$Pendientes)
        ->with('Asignados',$Asignados)
        ->with('Derivados',$Derivados)
        ->with('Finalizados',$Finalizados);
        */
    //}
    
    public function create ($item) {
        $id_trabajador = session('id_trabajador');
        $faena_t = Trabajador::where('id_trabajador','=',$id_trabajador)->get('faena');
        $cargo_t = Trabajador::where('id_trabajador','=',$id_trabajador)->get('cargo');
        $faena = $faena_t[0]->faena;
        $cargo = $cargo_t[0]->cargo;

        $id_check_list = $item;
        $patente = CheckList::where('id_check_list','=',$id_check_list)->get('patente_ch');
        $observacion_t = CheckList::where('id_check_list','=',$id_check_list)->get('observaciones');
        $patente_ch = $patente[0] -> patente_ch;
        $observacion = $observacion_t[0] -> observaciones;
        $vehiculo = Vehiculo::where('patente', '=', $patente_ch)->get();
       return view('Supervisor/SolicitudCreate')
        ->with('cargo',$cargo)
        ->with('faena',$faena)
        ->with('vehiculo', $vehiculo)
        ->with('observacion',$observacion)
        ->with('id_check_list',$id_check_list);
    }

    public function store (Request $request) {

        $id_check_list = $request -> id_check_list;

        $solicitud = new Solicitud();
        $solicitud -> faena = $request -> faena;
        $solicitud -> tipo_vehiculo = $request -> tipo_vehiculo;
        $solicitud -> codigo_vehiculo  = $request -> codigo_vehiculo;
        $solicitud -> gravedad = $request -> gravedad;
        $solicitud -> motivo = $request -> motivo;
        $solicitud -> estado_solicitud = 'Pendiente';

        CheckList::updateOrInsert(
            ['id_check_list' => $id_check_list],
            [
                'estado_check_list' => 'Rechazado'
            ]);
        
        $solicitud -> save();
        return redirect()->route('supervisor');
    }   

    public function derivar(Request $request){

        $id_solicitud = $request -> id_solicitud;
        $codigo = Solicitud::where('id_solicitud', $id_solicitud)->get('codigo_vehiculo');
        $codigo_vehiculo = $codigo[0] -> codigo_vehiculo;
        Solicitud::updateOrInsert(
            ['id_solicitud' => $id_solicitud],
            ['estado_solicitud' => 'Derivado']);
        
        Vehiculo::updateOrInsert([
            'codigo' => $codigo_vehiculo
        ],[
            'estado' => 'En taller'
        ]);
        
        return redirect()->route('planificador');
    
    }
        //return redirect()->route('supervisor');
/*
        $checkList_1 = CheckList::where('codigo_vehiculo_ch',$request->codigo_vehiculo)->get();
        $id_check_list = $checkList_1[0] -> id_check_list;
        $checkList = CheckList::find($id_check_list);
        $checkList -> estado_check_list = 'Rechazado';
        //$checkList -> save();
        return $checkList;
    */
}
