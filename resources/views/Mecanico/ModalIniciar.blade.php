<div class="modal fade" id="IniciarTarea{{$item->id_tarea}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background: #0081A7"> 
                <h6 class="modal-title" style="color: #fff; text-align: center;">
                    Proceso de Trabajo
                </h6>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="POST" action="{{route('mecanico.iniciar')}}"> 
            @csrf

                <div class="modal-body" id=cont_modal>
                    <div class="form-group">
                        <h5>¿Esta seguro que desea iniciar el proceso de trabajo?</h5>
                    </div>
                    <div class="form-group">
                        <input type="number" id="id_tarea" name="id_tarea" value="{{$item->id_tarea}}" hidden>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" data-bs-dismiss="modal">Inicar Proceso</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>