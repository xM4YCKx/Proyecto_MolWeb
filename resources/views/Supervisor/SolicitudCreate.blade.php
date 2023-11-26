<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/supervisor.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" 
    crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/d8efb065c4.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    
    <title>Crear Solicitud</title>
    <header class="gradient-custom">
        <a href="#" class="logo">
            <img src="/img/logo.png" alt="logo empresa" class="logomol">
        </a>
        <h2 class="nombre empresa">Mol Ambiente App</h2>
        <nav>
          <h6>Tipo de cuenta: {{$cargo}}</h6>
          <h6>Faena: {{$faena}}</h6>
            <form style="display: inline" action="/logout" method="POST">
                @csrf
                <a href="#" class="btn btn-danger"
                onclick="this.closest('form').submit()"
                >Cerrar Sesion</a>
            </form>
        </nav>
    </header>
</head>
<style>
  body {
  /*background-color: rgba(242, 244, 203, 0.5) ;  Beich claro: rgba(242, 244, 203, 0.5)*/
  background-image: url('/img/supervisor_1.jpg'); 
  background-repeat: no-repeat;
  background-position: center center;
  background-attachment: fixed;
  background-size: cover;
}

</style>
<body>
<br>
  <div class="container">
    <div class="card">
        <form action="{{route('solicitud.store')}}" method="POST">
            @csrf
            <div class="card-header" style="background: rgba(181, 181, 181) ;">
              <h2>Solicitud de reparación</h2>
            </div>

            <input class="form-control" type="number" id="id_check_list" name="id_check_list" value="{{$id_check_list}}" hidden>
            <label for="codigo_vehiculo">Codigo_vehiculo</label>
            <input class="form-control" id="codigo_vehiculo" name="codigo_vehiculo" value="{{$vehiculo[0]->codigo}}" readonly>
            <br/>

            <label for="tipo_vehiculo">Tipo:</label>
            <input class="form-control" id="tipo_vehiculo" name="tipo_vehiculo" value="{{$vehiculo[0]->tipo_vehiculo}}" readonly>
            <br>

            <label for="faena">Faena:</label>
            <input class="form-control" id="faena" name="faena" value="{{$vehiculo[0]->faena_asignada}}" readonly>
            <br>
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
                <textarea class="form-control" id="motivo" name="motivo" rows="4">{{$observacion}}</textarea><br>

            <input class="btn btn-success" type="submit" value="Enviar Solicitud">
        </form>
    </div>
  </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" 
    crossorigin="anonymous"></script>
</body>
</html>