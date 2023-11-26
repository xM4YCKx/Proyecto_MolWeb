<div class="modal fade" id="CrearSolicitud{{$item->id_patente}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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

                <div class="form-group">
                    <label for="codigo_vehiculo">Codigo_vehiculo</label>
                    <input class="form-control" id="codigo_vehiculo" name="codigo_vehiculo" value="{{$vehiculo[0]->codigo}}" readonly>
                    <br/>
                </div>

                <div class="form-group">
                    <label for="tipo_vehiculo">Tipo:</label>
                    <input class="form-control" id="tipo_vehiculo" name="tipo_vehiculo" value="{{$vehiculo[0]->tipo_vehiculo}}" readonly>
                    <br>
                </div>

                <div class="form-group">
                    <label for="faena">Faena:</label>
                    <input class="form-control" id="faena" name="faena" value="{{$vehiculo[0]->faena_asignada}}" readonly>
                    <br>
                </div>
                    <br/>
                    <br/>

                <div class="container text-center">
                    <div class="row">
                      <div class="col">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gravedad" id="baja" value="Baja">
                            <label class="form-check-label" for="gravedad">
                              Baja
                            </label>
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gravedad" id="media" value="Media">
                            <label class="form-check-label" for="gravedad">
                              Media
                            </label>
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gravedad" id="grave" value="Alta" checked>
                            <label class="form-check-label" for="gravedad">
                              Grave
                            </label>
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gravedad" id="urgente" value="Urgente"checked>
                            <label class="form-check-label" for="gravedad">
                              Urgente
                            </label>
                        </div>
                      </div>
                    </div>
                  </div>

                <br/>

                <label for="motivo">Motivo de la Solicitud:</label>
                <textarea class="form-control" id="motivo" name="motivo" rows="4" ></textarea><br>

            <input class="btn btn-success" type="submit" value="Enviar Solicitud">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>