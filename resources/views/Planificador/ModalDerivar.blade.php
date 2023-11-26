<div class="modal fade" id="derivarSolicitud{{$item->id_solicitud}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #0cd134 !important;"> 
                <h6 class="modal-title" style="color: #fff; text-align: center;">
                    Derivacion
                </h6>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="POST" action="{{route('solicitud.derivar')}}" >
            @csrf

                <div class="modal-body" id=cont_modal>
                    <div class="form-group">
                        <label for="recipient-name" class=col-form-label>¿ Esta seguro que desea derivar esta solicitud ?</label>
                        <input type="number" id="id_solicitud" name="id_solicitud" class="form-control" value="{{ $item->id_solicitud}}" hidden>
                    </div>
                </div>
                <div class="modal-footer">
                    <input class="btn btn-success" type="submit" value="Derivar Solicitud">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>