<div class="modal fade" id="detallestarea{{$item->id_tarea}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background: #0081A7"> 
                <h6 class="modal-title" style="color: #fff; text-align: center;">
                    Detalles Tarea realizada vehiculo : {{$item->cod_vehiculo}}
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
                                <input type="text" name="codigo_vehiculo" class="form-control" value="{{ $item->cod_vehiculo}}" disabled>
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
                                <label for="recipient-name" class=col-form-label>Fecha finalización</label>
                                <input type="text" name="fecha_finalizacion" class="form-control" value="{{ $item->fecha_finalizacion}}" disabled>
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
                        <textarea name="comentario" id="comentario" cols="100" rows="10" disabled>{{ $item->comentario_tarea}}</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>