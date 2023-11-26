<div class="modal fade" id="finalizar{{$item->id_tarea}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background: #0081A7"> 
                <h6 class="modal-title" style="color: #fff; text-align: center;">
                    Finalizar el trabajo
                </h6>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="POST" action="{{route('mecanico.finalizar')}}">
            @csrf

                <div class="modal-body" id=cont_modal>
                    <div class="form-group">
                        <label>Comentarios sobre el procedimiento:</label>
                    </div>
                    <div class="form-group">
                        <textarea name="comentario" id="comentario" cols="60" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="number" id="id_tarea" name="id_tarea" value="{{$item->id_tarea}}" hidden>
                    </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Finalizar proceso</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>