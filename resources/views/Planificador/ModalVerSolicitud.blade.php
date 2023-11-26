<div class="modal fade" id="verSolicitud{{$item->id_solicitud}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #0cd134 !important;"> 
                <h6 class="modal-title" style="color: #fff; text-align: center;">
                    Detalles Solicitud
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
                        <label for="recipient-name" class=col-form-label>Codigo Vehiculo</label>
                        <input type="text" name="codigo_vehiculo" class="form-control" value="{{ $item->codigo_vehiculo}}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class=col-form-label>Faena</label>
                        <input type="text" name="faena" class="form-control" value="{{ $item->faena}}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class=col-form-label>Tipo Vehiculo</label>
                        <input type="text" name="tipo_vehiculo" class="form-control" value="{{ $item->tipo_vehiculo}}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class=col-form-label>Gravedad</label>
                        <input type="text" name="gravedad" class="form-control" value="{{ $item->gravedad}}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class=col-form-label>Estado</label>
                        <input type="text" name="estado" class="form-control" value="{{ $item->estado_solicitud}}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class=col-form-label>Motivo</label>
                    </div>
                    <div class="form-group">
                        <textarea name="motivo" id="motivo" cols="50" rows="10" disabled>{{ $item->motivo}}</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>