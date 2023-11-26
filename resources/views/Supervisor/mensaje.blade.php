@if(Session::has('mensajeAprobacionCL'))
    <div class="alert alert-success" role="alert" id="mensaje">
        <button type="button" class="close" data-bs-dismiss="alert" aria-lable="close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong> {{Session::get('mensajeAprobacionCL')}}</strong>
    </div>
@endif

@if(Session::has('mensajeEnvioSolicitud'))
@endif