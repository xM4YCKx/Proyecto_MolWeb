<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/styleConductor_v2.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" 
    crossorigin="anonymous">
    <!--<script src="scriptpopup.js" defer></script>-->
    <title>Conductor</title>
    <header class="gradient-custom">
        <a href="" class="logo">
            <img src="img/logo.png" alt="logo empresa" class="logomol">
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
    background-image: url('img/conductor_2.jpg'); 
    background-repeat: no-repeat;
    background-position: center center;
    background-attachment: fixed;
    background-size: cover;
  }
  .nav-link{
    background: rgba(181, 181, 181, 0.5);
    color:black;
  }
  .nav-link.active{
    background-color: black !important;
  }
</style>
<body>
    <br>
    <br>
    <br>
    <div class="container" style=" width: 500px">
        <div class="card text-center" >
            <div class="card-header" style="background: rgba(0, 166, 118, 0.5) !important;"> <!-- Gris oscuro:(105, 114, 104, 0.5)-->
                <h2 class="text-center">Iniciar nueva ruta</h2>
            </div>
            <div class="card-body" style="background: rgba(255, 255, 255, 0.5) !important;"> <!-- Gris claro:(181, 181, 181, 0.5)-->
                <form method="POST" action="{{route('ruta.store')}}">
                    @csrf
                    <div class="form-group">
                        <label for="">Tipo Vehiculo</label>
                    </div>
                    <div class="form-group">
                        <select name="tipo_vehiculo" id="tipo_vehiculo">
                            @foreach($tipo_vehiculo as $item)
                                <option value="{{$item['nombre_tipo_vehiculo']}}">{{$item['nombre_tipo_vehiculo']}}</option>
                            @endforeach
                        </select>
                    </div>
            
                    <div class="form-group">
                        <label for="">Codigo Vehiculo</label>
                    </div>
                    <div class="form-group">
                        <select class="selectbox" name="codigo_vehiculo" id="codigo_vehiculo">
                            @foreach($codigo_vehiculo as $item)
                                <option value="{{$item->codigo}}">{{$item->codigo}}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                      <button type= "submit" class="btn btn-primary" >Siguiente</button>
                    </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
  integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" 
  crossorigin="anonymous"></script>
</body>
</html>
