<div class="modal fade" id="verVehiculo{{$item->id_vehiculo}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #0cd134 !important;"> 
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
                    <div class="form-group">
                        <label for="recipient-name" class=col-form-label>Codigo</label>
                        <input type="text" name="codigo" class="form-control" value="{{ $item->codigo}}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class=col-form-label>Patente</label>
                        <input type="text" name="patente" class="form-control" value="{{ $item->patente}}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class=col-form-label>Tag ruta maipo</label>
                        <input type="text" name="tag_ruta_maipo" class="form-control" value="{{ $item->tag_ruta_maipo}}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class=col-form-label>Tipo Vehiculo</label>
                        <input type="text" name="tipo_vehiculo" class="form-control" value="{{ $item->tipo_vehiculo}}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class=col-form-label>Carroceria</label>
                        <input type="text" name="carroceria" class="form-control" value="{{ $item->carroceria}}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class=col-form-label>Servicio</label>
                        <input type="text" name="servicio" class="form-control" value="{{ $item->servicio}}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class=col-form-label>telma</label>
                        <input type="text" name="telma" class="form-control" value="{{ $item->telma}}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class=col-form-label>gps</label>
                        <input type="text" name="gps" class="form-control" value="{{ $item->gps}}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class=col-form-label>Faena Asignada</label>
                        <input type="text" name="faena_asignada" class="form-control" value="{{ $item->faena_asignada}}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class=col-form-label>Ubicacion</label>
                        <input type="text" name="ubicacion" class="form-control" value="{{ $item->ubicacion}}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class=col-form-label>Estado</label>
                        <input type="text" name="estado" class="form-control" value="{{ $item->estado}}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class=col-form-label>Marca</label>
                        <input type="text" name="marca" class="form-control" value="{{ $item->marca}}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class=col-form-label>Modelo</label>
                        <input type="text" name="modelo" class="form-control" value="{{ $item->modelo}}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class=col-form-label>Año</label>
                        <input type="text" name="anio" class="form-control" value="{{ $item->anio}}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class=col-form-label>N° Motor</label>
                        <input type="text" name="n_motor" class="form-control" value="{{ $item->n_motor}}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class=col-form-label>N° Chasis</label>
                        <input type="text" name="n_chasis" class="form-control" value="{{ $item->n_chasis}}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class=col-form-label>Color</label>
                        <input type="text" name="color" class="form-control" value="{{ $item->color}}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class=col-form-label>Zona</label>
                        <input type="text" name="zona" class="form-control" value="{{ $item->zona}}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class=col-form-label>Fecha de vencimiento gases</label>
                        <input type="text" name="fecha_rt_gases" class="form-control" value="{{ $item->fecha_rt_gases}}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class=col-form-label>Fecha de vencimiento seguro y permiso de circulacion</label>
                        <input type="text" name="fecha_permiso_circulacion_seguro" class="form-control" value="{{ $item->fecha_permiso_circulacion_seguro}}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class=col-form-label>Kilometraje ultima mantencion</label>
                        <input type="text" name="km_ultima_mantencion" class="form-control" value="{{ $item->km_ultima_mantencion}}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class=col-form-label>Kilometraje Actual</label>
                        <input type="text" name="km_actual" class="form-control" value="{{ $item->km_actual}}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class=col-form-label>Kilometraje proxima mantencion</label>
                        <input type="text" name="km_proxima_mantencion" class="form-control" value="{{ $item->km_proxima_mantencion}}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class=col-form-label>Valor comercial</label>
                        <input type="text" name="valor_comercial" class="form-control" value="{{ $item->valor_comercial}}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class=col-form-label>Detalle</label>
                        <input type="text" name="detalle" class="form-control" value="{{ $item->detalle}}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class=col-form-label>Servicios impuestos internos</label>
                        <input type="text" name="servicio_impuestos_internos" class="form-control" value="{{ $item->servicio_impuestos_internos}}" disabled>
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>