<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CheckList;
use App\Models\Ruta;
use App\Models\Vehiculo;
use App\Models\Trabajador;

class CheckListController extends Controller
{
    public function listarCheckList(Request $request){

        $id_trabajador = session('id_trabajador');
        $faena_t = Trabajador::where('id_trabajador','=',$id_trabajador)->get('faena');
        $cargo_t = Trabajador::where('id_trabajador','=',$id_trabajador)->get('cargo');
        $faena = $faena_t[0]->faena;
        $cargo = $cargo_t[0]->cargo;

        $Pendientes=CheckList::where('estado_check_list', '=', 'Pendiente')->where('faena_ch',$faena)->get();
        $Aprobados=CheckList::where('estado_check_list', '=', 'Aprobado')->where('faena_ch',$faena)->get();
        $Rechazados=CheckList::where('estado_check_list', '=', 'Rechazado')->where('faena_ch',$faena)->get();
        
        return view('Supervisor/supervisor')
        ->with('faena',$faena)
        ->with('cargo',$cargo)
        ->with('Pendientes',$Pendientes)
        ->with('Aprobados',$Aprobados)
        ->with('Rechazados',$Rechazados);
    }

    public function create ($item) {
        $codigo_vehiculo = $item;
        $vehiculo=Vehiculo::where('codigo', '=', $codigo_vehiculo)->get();
        return view('Supervisor/SolicitudCreate', ['vehiculo' => $vehiculo]);
    }

    public function store (Request $request) {

        $id_trabajador = session('id_trabajador');
        $fecha_inicio = date('Y-m-d H:i:s', strtotime('now'));

        $checkList = new CheckList();
        $checkList -> id_conductor = $id_trabajador;
        $checkList -> codigo_vehiculo_ch = $request -> codigo_vehiculo_ch;
        $checkList -> tipo_vehiculo_ch = $request -> tipo_vehiculo_ch;
        $checkList -> patente_ch  = $request -> patente_ch;
        $checkList -> conductor_ch = $request -> conductor_ch;
        $checkList -> faena_ch = $request -> faena_ch;
        $checkList -> km_salida = $request -> km_salida;
        $checkList -> fecha_inicio = $fecha_inicio;
        $checkList -> licencia_muni_vigente = $request -> licencia_muni_vigente;
        $checkList -> licencia_interna = $request -> licencia_interna;
        $checkList -> documentacion_actualizada = $request -> documentacion_actualizada;
        $checkList -> resolucion_sanitaria = $request -> resolucion_sanitaria;
        $checkList -> nivel_combustible = $request -> nivel_combustible;
        $checkList -> revision_nivel_liquidos = $request -> revision_nivel_liquidos;
        $checkList -> luces = $request -> luces;
        $checkList -> vidrios = $request -> vidrios;
        $checkList -> direccion_frenos = $request -> direccion_frenos;
        $checkList -> bocina_alarma_retroceso = $request -> bocina_alarma_retroceso;
        $checkList -> seguro_tuercas = $request -> seguro_tuercas;
        $checkList -> espejos_retrovisores = $request -> espejos_retrovisores;
        $checkList -> cinturones_seguridad = $request -> cinturones_seguridad;
        $checkList -> estado_parachoques = $request -> estado_parachoques;
        $checkList -> estado_placas = $request -> estado_placas;
        $checkList -> estado_interior_exterior = $request -> estado_interior_exterior;
        $checkList -> estado_neumaticos_repuesto = $request -> estado_neumaticos_repuesto;
        $checkList -> kit_seguridad = $request -> kit_seguridad;
        $checkList -> calefaccion_aire_acondicionado = $request -> calefaccion_aire_acondicionado;
        $checkList -> prueba_funcional = $request -> prueba_funcional;
        $checkList -> carga_combustible = $request -> carga_combustible;
        $checkList -> observaciones = $request -> observaciones; 
        $checkList -> estado_check_list = 'Pendiente';

        Vehiculo::updateOrInsert(
            ['codigo' => $request->codigo_vehiculo_ch],
            [
                'km_actual' => $request->km_salida
            ]);
        
        $checkList -> save();

        return redirect()->route('conductor');

    }

    public function aprobarCheckList($id_check_list){

        $codigo_vehiculo = CheckList::where('id_check_list',$id_check_list)->get('codigo_vehiculo_ch');
        $codigo = $codigo_vehiculo[0]->codigo_vehiculo_ch;
        CheckList::updateOrInsert(
            ['id_check_list' => $id_check_list],
            [
                'estado_check_list' => 'Aprobado'
            ]);
        Vehiculo::updateOrInsert(
            ['codigo' => $codigo],
            [
                'estado' => 'En ruta'
            ]);

        return redirect()->route('supervisor')
        ->with('mensajeAprobacionCL','El checklist ha sido aprobado correctamente');
    }

    public function rechazarCheckList($id_check_list){

        CheckList::updateOrInsert(
            ['id_check_list' => $id_check_list],
            [
                'estado_check_list' => 'Rechazado'
            ]);

        return redirect()->route('supervisor');
    }

    public function verCheckList($id_check_list){
        return 'hoal';
    }
}
