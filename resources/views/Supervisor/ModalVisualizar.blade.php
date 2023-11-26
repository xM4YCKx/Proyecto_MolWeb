<div class="modal fade" id="verCheckList{{$item->id_check_list}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background: #136F63"> 
                <h6 class="modal-title" style="color: #fff; text-align: center;">
                    Detalles Check List Diario
                </h6>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form><!--<form method="POST" action="Aqui va la ruta del put , y el id para actualizar">    color morado:#563d7c  -->
            @method('PUT')
            @csrf
                <div class="modal-body" id=cont_modal>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="recipient-name" class=col-form-label>Tipo de vehiculo</label>
                                <input type="text" name="tipo_vehiculo_ch" class="form-control" value="{{ $item->tipo_vehiculo_ch}}" disabled>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="recipient-name" class=col-form-label>Patente</label>
                                <input type="text" name="patente_ch" class="form-control" value="{{ $item->patente_ch}}" disabled>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="recipient-name" class=col-form-label>Conductor</label>
                                <input type="text" name="conductor_ch" class="form-control" value="{{ $item->conductor_ch}}" disabled>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="recipient-name" class=col-form-label>Km de salida</label>
                                <input type="text" name="km_salida" class="form-control" value="{{ $item->km_salida}}" disabled>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="recipient-name" class=col-form-label>fecha de inicio</label>
                                <input type="text" name="fecha_inicio" class="form-control" value="{{ $item->fecha_inicio}}" disabled>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="recipient-name" class=col-form-label>Nivel de combustible</label>
                                <input type="text" name="nivel_combustible" class="form-control" value="{{ $item->nivel_combustible}}" disabled>
                            </div>
                        </div>
                    </div>
                    <!--<div class="form-group">
                        <label for="recipient-name" class=col-form-label>Km de llegada</label>
                        <input type="text" name="km_llegada" class="form-control" value="{{ $item->km_llegada}}" disabled>
                    </div>-->
                    <!--<div class="form-group">
                        <label for="recipient-name" class=col-form-label>fecha de termino</label>
                        <input type="text" name="fecha_termino" class="form-control" value="{{ $item->fecha_termino}}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class=col-form-label>dias</label>
                        <input type="text" name="dias" class="form-control" value="{{ $item->dias}}" disabled>
                    </div>-->
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="recipient-name" class=col-form-label>Cuenta y porta licencia municipal vigente</label>
                                <input type="text" name="licencia_muni_vigente" class="form-control" value="{{ $item->licencia_muni_vigente}}" disabled>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="recipient-name" class=col-form-label>Cuenta y porta licencia interna</label>
                                <input type="text" name="licencia_interna" class="form-control" value="{{ $item->licencia_interna}}" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class=col-form-label>Documentacion (Permiso de circulacion, Padron,R.tecnica, An. gases,Seguro) al dia.</label>
                        <input type="text" name="documentacion_actualizada" class="form-control" value="{{ $item->documentacion_actualizada}}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class=col-form-label>Revision de Niveles, aceite motor, liq. Refrigerante, liq. Limpiaparabrisas</label>
                        <input type="text" name="revision_nivel_liquidos" class="form-control" value="{{ $item->revision_nivel_liquidos}}" disabled>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="recipient-name" class=col-form-label>Luces (altas,bajas,retroceso,etc.)</label>
                                <input type="text" name="luces" class="form-control" value="{{ $item->luces}}" disabled>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="recipient-name" class=col-form-label>Vidrios (parabrisas, puertas, luneta)</label>
                                <input type="text" name="vidrios" class="form-control" value="{{ $item->vidrios}}" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="recipient-name" class=col-form-label>Direccion/frenos</label>
                                <input type="text" name="direccion_frenos" class="form-control" value="{{ $item->direccion_frenos}}" disabled>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="recipient-name" class=col-form-label>Resolucion Sanitaria</label>
                                <input type="text" name="resolucion_sanitaria" class="form-control" value="{{ $item->resolucion_sanitaria}}" disabled>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="recipient-name" class=col-form-label>Bocina /Alarma de retroceso</label>
                                <input type="text" name="bocina_alarma_retroceso" class="form-control" value="{{ $item->bocina_alarma_retroceso}}" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="recipient-name" class=col-form-label>Seguro tuercas (arañas, indicador)</label>
                                <input type="text" name="seguro_tuercas" class="form-control" value="{{ $item->seguro_tuercas}}" disabled>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="recipient-name" class=col-form-label>Espejos retrovisores</label>
                                <input type="text" name="espejos_retrovisores" class="form-control" value="{{ $item->espejos_retrovisores}}" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="recipient-name" class=col-form-label>Cinturones de seguridad</label>
                                <input type="text" name="cinturones_seguridad" class="form-control" value="{{ $item->cinturones_seguridad}}" disabled>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="recipient-name" class=col-form-label>Estado de Parachoques Delan-Tras</label>
                                <input type="text" name="estado_parachoques" class="form-control" value="{{ $item->estado_parachoques}}" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="recipient-name" class=col-form-label>Estado placas patentes</label>
                                <input type="text" name="estado_placas" class="form-control" value="{{ $item->estado_placas}}" disabled>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="recipient-name" class=col-form-label>Estado Interior - Exterior</label>
                                <input type="text" name="estado_interior_exterior" class="form-control" value="{{ $item->estado_interior_exterior}}" disabled>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="recipient-name" class=col-form-label>Estado Neumaticos y repuesto</label>
                                <input type="text" name="estado_neumaticos_repuesto" class="form-control" value="{{ $item->estado_neumaticos_repuesto}}" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class=col-form-label>Kit Seguridad (gata con barrote,llave,triangulo, extintor, chaleco, botiquin,Pertiga, baliza, cuñas, conos.)</label>
                        <input type="text" name="kit_seguridad" class="form-control" value="{{ $item->kit_seguridad}}" disabled>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="recipient-name" class=col-form-label>Calefaccion/aire acondicionado</label>
                                <input type="text" name="calefaccion_aire_acondicionado" class="form-control" value="{{ $item->calefaccion_aire_acondicionado}}" disabled>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="recipient-name" class=col-form-label>Prueba de equipo antes de salir</label>
                                <input type="text" name="prueba_funcional" class="form-control" value="{{ $item->prueba_funcional}}" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class=col-form-label>Carga de combustible ( Lts. Aprox)</label>
                        <input type="number" name="carga_combustible" class="form-control" value="{{ $item->carga_combustible}}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class=col-form-label>Observaciones</label>
                    </div>
                    <div class="form-group">
                        <textarea name="observaciones" id="observaciones" cols="100" rows="10">{{$item->observaciones}}</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>