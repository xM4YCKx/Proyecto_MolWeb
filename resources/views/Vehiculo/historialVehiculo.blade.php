<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/planificador.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/tabla.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" 
    crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/d8efb065c4.js" crossorigin="anonymous"></script>
    <!--<script src="scriptpopup.js" defer></script>-->
    <title>Historial Vehicular</title>
    <header class="gradient-custom">
        <a href="" class="logo">
            <img src="/img/logo.png" alt="logo empresa" class="logomol">
        </a>
        <h2 class="nombre empresa">Mol Ambiente App</h2>
        <nav>
            <h6>Tipo de cuenta: {{$cargo}}</h6>
            <h6>Localidad: Santiago</h6>
            <a href="{{route('planificador')}}" type="button" class="btn btn-sm text-white" style="background-color: #1f5fe8 ">administrar solicitudes</a>
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
    background-image: url('/img/planificador_ofi.jpg'); 
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
    <div class="container">
        <div class="card" style="background: rgba(181, 181, 181) ;">
            <div class="card-header ">
                <h3>Historial vehiculo</h3>
            </div>
            <div class="card-body" style="background: rgba(242, 244, 203, 0.5)">
                <div class="container" >
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead class="" style="background-color: rgba(242, 244, 203)" color="#4CAF50">
                                <tr class="text-white" style="background-color: rgba(242, 244, 203)" >
                                    <th style="background: #9AD4D6">Codigo vehiculo</th>
                                    <th style="background: #9AD4D6">Gravedad</th>
                                    <th style="background: #9AD4D6">fecha de finalizacion</th>
                                    <th style="background: #9AD4D6">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="tble-group-divider table-warning">
                                @foreach ($historial_l as $item)
                                    <tr class="text-bg-light text-center">
                                        <td style="background-color: rgba(242, 244, 203, 0.5)">{{$item->cod_vehiculo}}</td>
                                        <td style="background-color: rgba(242, 244, 203, 0.5)">{{$item->gravedad}}</td>
                                        <td style="background-color: rgba(242, 244, 203, 0.5)">{{$item->fecha_finalizacion}}</td>
                                        <td style="background-color: rgba(242, 244, 203, 0.5)">
                                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#detallestarea{{$item->id_tarea}}">detalles</button>
                                        </td>
                                    </tr>      
                                    @include('Vehiculo/ModalHistorial')
                                @endforeach
                            <tbody>
                        </table>
                    </div>
                </div>    
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" 
    crossorigin="anonymous"></script>
</body>
</html>

