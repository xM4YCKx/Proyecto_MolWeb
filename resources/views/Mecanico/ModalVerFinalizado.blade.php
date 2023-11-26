<div class="modal fade" id="verTareaFinalizada{{$item->id_tarea}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background: #0081A7"> 
                <h6 class="modal-title" style="color: #fff; text-align: center;">
                    Detalles Tarea Asignada vehiculo : {{$item->codigo_vehiculo_mc}}
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
                                <label for="recipient-name" class=col-form-label>Codigo del Vehiculo</label>
                                <input type="text" name="codigo_vehiculo" class="form-control" value="{{ $item->codigo_vehiculo_mc}}" disabled>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="recipient-name" class=col-form-label>Patente</label>
                                <input type="text" name="patente_mc" class="form-control" value="{{ $item->patente_mc}}" disabled>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="recipient-name" class=col-form-label>Faena</label>
                                <input type="text" name="faena_mc" class="form-control" value="{{ $item->faena_mc}}" disabled>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="recipient-name" class=col-form-label>Gravedad</label>
                                <input type="text" name="gravedad" class="form-control" value="{{ $item->gravedad}}" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="recipient-name" class=col-form-label>fecha limite</label>
                                <input type="text" name="fecha_limite" class="form-control" value="{{ $item->fecha_limite}}" disabled>
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
                                <label for="recipient-name" class=col-form-label>fecha de termino</label>
                                <input type="text" name="fecha_termino" class="form-control" value="{{ $item->fecha_termino}}" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class=col-form-label>Detalle de la tarea:</label>
                    </div>
                    <br>
                    <div class="form-group">
                        <textarea name="detalle_tarea" id="detalle_tarea" cols="100" rows="10" disabled>{{ $item->detalle_tarea}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class=col-form-label>Comentario:</label>
                    </div>
                    <br>
                    <div class="form-group">
                        <textarea name="comentario" id="comentario" cols="100" rows="10" disabled>{{ $item->comentario}}</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>