<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/planificador.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" 
    crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/d8efb065c4.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    
    <title>Asignar Tarea</title>
    <header class="gradient-custom">
        <a href="" class="logo">
            <img src="/img/logo.png" alt="logo empresa" class="logomol">
        </a>
        <h2 class="nombre empresa">Mol Ambiente App</h2>
        <nav>
            <h6 >Tipo de cuenta: Planificador</h6>
            <h6 >Faena: Santiago</h6>
            <form style="display: inline" action="/logout" method="POST">
                @csrf
                <a href="#" class="btn btn-danger"
                onclick="this.closest('form').submit()"
                >Cerrar Sesion</a>
            </form>
        </nav>
    </header>
    <style>
      body {
      background-image: url('/img/planificador_ofi.jpg');
      background-repeat: no-repeat;
      background-position: center center;
      background-attachment: fixed;
      background-size: cover;
    }
    </style>
</head>
<body>
  <br>  
  <br/>
  <div class="container">
    <div class="card">
      <div class="card-header" style="background: rgba(187, 197, 170, 0.5)">
        <h2 class="text-center">Asignar tarea</h2>
      </div>
      <div class="card-body" style="background-color: rgba(242, 244, 203, 0.5)">
        <form action="{{route('tarea.store')}}" method="POST">
          @csrf
          <div class="respuesta">
          </div>
          <div>
            <h5>Datos de la solicitud</h5>
          </div>
          <br>
          <div class="row">
            <div class="col">
              <input type="number" id="id_solicitud" name="id_solicitud" value="{{$id_solicitud}}" hidden>
              <label for="tipo_vehiculo">Codigo del vehiculo</label>
              <input class="form-control" id="codigo_vehiculo" name="codigo_vehiculo" value="{{$datos_soli[0]->codigo_vehiculo}}" readonly>
            </div>
            <div class="col">
              <label for="tipo_vehiculo">Patente</label>
          <input class="form-control" id="tipo_vehiculo" name="tipo_vehiculo" value="{{$datos_soli[0]->tipo_vehiculo}}" readonly>
            </div>
            <div class="col">
              <label for="tipo_vehiculo">Faena</label>
              <input class="form-control" id="faena" name="faena" value="{{$datos_soli[0]->faena}}" readonly>
            </div>
          </div>
          <br/>
          <div class="form-group">
            <label for="recipient-name" class=col-form-label>Detalle tarea</label>
          </div>
          <div class="form-group">
            <textarea name="detalle_tarea" id="detalle_tarea" cols="130" rows="10" >{{$datos_soli[0]->motivo}}</textarea>
          </div>
          <br/>
          <div>
            <h5>Datos de Asignacion</h5>
          </div>
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="">Mecanico:</label>
                <select name="nombre_mecanico" id="nombre_mecanico" style="background-color: rgba(242, 244, 203, 0.5)">
                  @foreach($nombre_mecanico as $item)
                    <option value="{{$item}}">{{$item}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label for="">Nivel de Urgencia:</label>
                  <select name="gravedad" id="gravedad" style="background-color: rgba(242, 244, 203, 0.5)">
                    <option value="Bajo">Bajo</option>
                    <option value="Medio">Medio</option>
                    <option value="Grave">Grave</option>
                    <option value="Urgente">Urgente</option>
                  </select>
              </div>
            </div>
          </div>
          <br>
          <div class="form-group">
            <label for="recipient-name" class=col-form-label>Fecha Limite</label>
            <input type="date" id="fecha_limite" name="fecha_limite"  style="background-color: rgba(242, 244, 203, 0.5)">
          </div>
          <br/>
    
          <input class="btn btn-success" type="submit" value="Asignar Tarea">
        </form>
      </div>
    </div>
  </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" 
    crossorigin="anonymous"></script>
</body>
</html>