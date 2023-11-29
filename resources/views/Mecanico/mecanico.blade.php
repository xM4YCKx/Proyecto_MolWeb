<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/mecanico.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" 
    crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">
    <!--<script src="scriptpopup.js" defer></script>-->
    <title>Mecanico</title>
    <header class="gradient-custom">
        <a href="" class="logo">
            <img src="/img/logo.png" alt="logo empresa" class="logomol">
        </a>
        <h2 class="nombre empresa">Mol Ambiente App</h2>
        <nav>
            <h6>Tipo de cuenta: {{$cargo}}</h6>
            <h6>Faena: P11</h6>
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
    background-image: url('img/mecanico.jpg'); 
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
        <div class="card">
            <div class="card-header" style="background: rgba(181, 181, 181) ;">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                    <button class="nav-link active" id="pills-pendientes-tab" data-bs-toggle="pill" href="#pills-pendientes" type="button" role="tab" aria-controls="pills-pendientes" aria-selected="true">Pendientes</button>
                    </li>
                    <li class="nav-item">
                    <button class="nav-link" id="pills-ejecucion-tab" data-bs-toggle="pill" href="#pills-ejecucion" type="button" role="tab" aria-controls="pills-ejecucion" aria-selected="false">En ejecucion</button>
                    </li>
                    <li class="nav-item">
                    <button class="nav-link" id="pills-finalizadas-tab" data-bs-toggle="pill" href="#pills-finalizadas" type="button" role="tab" aria-controls="pills-finalizadas" aria-selected="false">Finalizadas</button>
                    </li>
                </ul>
            </div>
            <div class="card-body" style="background: rgba(242, 244, 203, 0.5)">
                <div class="tab-content"  id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-pendientes" role="tabpanel" aria-labelledby="pills-pendientes-tab">
                        <div class="container">
                            <div div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead class="">
                                    <tr class="text-white">
                                        <th style="background: #0081A7">Vehiculo</th>
                                        <th style="background: #0081A7">Faena</th>
                                        <th style="background: #0081A7">Patente</th>
                                        <th style="background: #0081A7">Gravedad</th>
                                        <th style="background: #0081A7">detalle</th>
                                        <th style="background: #0081A7">trabajo</th>
                                    </tr>
                                    </thead>
                                    <tbody class="tble-group-divider table-warning">
                                        @foreach ($Pendientes as $item)
                                            <tr class="text-bg-light text-center">
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">{{$item->codigo_vehiculo_mc}}</td>
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">{{$item->faena_mc}}</td>
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">{{$item->patente_mc}}</td>
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">{{$item->gravedad}}</td>
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">
                                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#verTarea{{$item->id_tarea}}">Ver</button>
                                                </td>
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">
                                                    <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#IniciarTarea{{$item->id_tarea}}">iniciar</button>
                                                </td>
                                            </tr>
        
                                            <!--Modal para visualizar tarea-->
                                            @include('Mecanico/ModalVisualizacionTarea') 

                                            <!--Modal para iniciar y finalizar tarea-->
                                            @include('Mecanico/ModalIniciar') 
        
                                        @endforeach
                                    <tbody>
                                </table>
                            </div>
                        </div>    
                    </div>
                    <div class="tab-pane fade " id="pills-ejecucion" role="tabpanel" aria-labelledby="pills-ejecucion-tab">
                        <div class="container">
                            <div div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead class="">
                                    <tr class="text-white">
                                        <th style="background: #0081A7">Vehiculo</th>
                                        <th style="background: #0081A7">Faena</th>
                                        <th style="background: #0081A7">Patente</th>
                                        <th style="background: #0081A7">Gravedad</th>
                                        <th style="background: #0081A7">detalle</th>
                                        <th style="background: #0081A7">trabajo</th>
                                    </tr>
                                    </thead>
                                    <tbody class="tble-group-divider table-warning">
                                        @foreach ($Ejecucion as $item)
                                            <tr class="text-bg-light text-center">
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">{{$item->codigo_vehiculo_mc}}</td>
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">{{$item->faena_mc}}</td>
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">{{$item->patente_mc}}</td>
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">{{$item->gravedad}}</td>
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">
                                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#verTarea{{$item->id_tarea}}">Ver</button>
                                                </td>
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">
                                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#finalizar{{$item->id_tarea}}">Finalizar</button>
                                                    <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#Deshabilitar{{$item->id_tarea}}">Deshabilitar</button>
                                                </td>
                                            </tr>
                                            @include('Mecanico/ModalDesabilitar')
                                            <!--Modal para visualizar tarea-->
                                            @include('Mecanico/ModalVisualizacionTarea') 

                                            <!--Modal para iniciar y finalizar tarea-->
                                            @include('Mecanico/ModalFinalizar') 
        
                                        @endforeach
                                    <tbody>
                                </table>
                            </div>
                        </div> 
                    </div>
                    <div class="tab-pane fade " id="pills-finalizadas" role="tabpanel" aria-labelledby="pills-finalizadas-tab">
                        <div class="container">
                            <div div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead class="">
                                    <tr class="text-white" >
                                        <th style="background: #0081A7">Vehiculo</th>
                                        <th style="background: #0081A7">Faena</th>
                                        <th style="background: #0081A7">Patente</th>
                                        <th style="background: #0081A7">Gravedad</th>
                                        <th style="background: #0081A7">detalle</th>
                                    </tr>
                                    </thead>
                                    <tbody class="tble-group-divider table-warning">
                                        @foreach ($Finalizadas as $item)
                                            <tr class="text-bg-light text-center">
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">{{$item->codigo_vehiculo_mc}}</td>
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">{{$item->faena_mc}}</td>
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">{{$item->patente_mc}}</td>
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">{{$item->gravedad}}</td>
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">
                                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#verTareaFinalizada{{$item->id_tarea}}">Ver</button>
                                                </td>
                                            </tr>
        
                                            <!--Modal para visualizar tarea-->
                                            @include('Mecanico/ModalVerFinalizado') 
        
                                        @endforeach
                                    <tbody>
                                </table>
                            </div>
                        </div> 
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