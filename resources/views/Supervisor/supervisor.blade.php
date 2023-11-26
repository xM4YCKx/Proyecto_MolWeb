<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/supervisor.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" 
    crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">
    <!--<script src="scriptpopup.js" defer></script>-->
    <title>Supervisor</title>
    <header class="gradient-custom">
        <a href="" class="logo">
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
    background-image: url('img/supervisor_1.jpg'); 
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

    @include('Supervisor/mensaje')
    <br>
    <div class="container">
        <div class="card" style="background: rgba(181, 181, 181) ;">
            <div class="card-header ">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                    <button class="nav-link active" id="pills-pendientes-tab" data-bs-toggle="pill" href="#pills-pendientes" type="button" role="tab" aria-controls="pills-pendientes" aria-selected="true">Pendientes</button>
                    </li>
                    <li class="nav-item">
                    <button class="nav-link" id="pills-aprobados-tab" data-bs-toggle="pill" href="#pills-aprobados" type="button" role="tab" aria-controls="pills-aprobados" aria-selected="false">Aprobados</button>
                    </li>
                    <li class="nav-item">
                    <button class="nav-link" id="pills-rechazados-tab" data-bs-toggle="pill" href="#pills-rechazados" type="button" role="tab" aria-controls="pills-rechazados" aria-selected="false">Rechazados</button>
                    </li>
                </ul>
            </div>
            <div class="card-body" style="background: rgba(242, 244, 203, 0.5)">
                <div class="tab-content"  id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-pendientes" role="tabpanel" aria-labelledby="pills-pendientes-tab">
                        <div class="container" >
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead class="" style="background-color: rgba(242, 244, 203)" color="#4CAF50">
                                    <tr class="text-white" style="background-color: rgba(242, 244, 203)" >
                                        <th style="background: #9AD4D6">Codigo vehiculo</th>
                                        <th style="background: #9AD4D6">patente</th>
                                        <th style="background: #9AD4D6">Tipo vehiculo</th>
                                        <th style="background: #9AD4D6">Conductor</th>
                                        <th style="background: #9AD4D6">Km Salida</th>
                                        <th style="background: #9AD4D6">Estado</th>
                                        <th style="background: #9AD4D6">Acciones</th>
                                    </tr>
                                    </thead>
                                    <tbody class="tble-group-divider table-warning">
                                        @foreach ($Pendientes as $item)
                                            <tr class="text-bg-light text-center">
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">{{$item->codigo_vehiculo_ch}}</td>
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">{{$item->patente_ch}}</td>
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">{{$item->tipo_vehiculo_ch}}</td>
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">{{$item->conductor_ch}}</td>
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">{{$item->km_salida}}</td>
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">{{$item->estado_check_list}}</td>
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">
                                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#verCheckList{{$item->id_check_list}}">Ver</button>
                                                    <a href="{{route('checklist.aprobar', $item->id_check_list)}}" type="button" class="btn btn-sm text-white" style="background-color: #0cd134 ">Aprobar Ruta</a>
                                                    <a href="{{route('solicitud.create', $item->id_check_list)}}" type="button" class="btn btn-sm text-white" style="background-color: #e81f1f ">Crear Solicitud</a>
                                                </td>
                                            </tr>
        
                                            <!--Modal para visualizar checklist-->
                                            @include('Supervisor/ModalVisualizar') 
        
                                        @endforeach
                                    <tbody>
                                </table>
                            </div>
                        </div>    
                    </div>
                    <div class="tab-pane fade " id="pills-aprobados" role="tabpanel" aria-labelledby="pills-aprobados-tab">
                        <div class="container">
                            <div div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                    <tr class="bg-success text-white">
                                        <th style="background: #9AD4D6">Codigo vehiculo</th>
                                        <th style="background: #9AD4D6">patente</th>
                                        <th style="background: #9AD4D6">Tipo vehiculo</th>
                                        <th style="background: #9AD4D6">Conductor</th>
                                        <th style="background: #9AD4D6">Km Salida</th>
                                        <th style="background: #9AD4D6">Estado</th>
                                        <th style="background: #9AD4D6">Acciones</th>
                                    </tr>
                                    </thead>
                                    <tbody class="tble-group-divider table-warning">
                                        @foreach ($Aprobados as $item)
                                            <tr class="text-bg-light text-center">
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">{{$item->codigo_vehiculo_ch}}</td>
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">{{$item->patente_ch}}</td>
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">{{$item->tipo_vehiculo_ch}}</td>
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">{{$item->conductor_ch}}</td>
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">{{$item->km_salida}}</td>
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">{{$item->estado_check_list}}</td>
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">
                                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#verCheckList{{$item->id_check_list}}">Ver</button>
                                                </td>
                                            </tr>

                                            <!--Modal para visualizar checklist-->
                                            @include('Supervisor/ModalVisualizar') 

                                        @endforeach
                                    <tbody>
                                </table>
                            </div>
                        </div>    
                    </div>
                    <div class="tab-pane fade " id="pills-rechazados" role="tabpanel" aria-labelledby="pills-rechazados-tab">
                        <div class="container">
                            <div div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                    <tr class="bg-success text-white">
                                        <th style="background: #9AD4D6">Codigo vehiculo</th>
                                        <th style="background: #9AD4D6">patente</th>
                                        <th style="background: #9AD4D6">Tipo vehiculo</th>
                                        <th style="background: #9AD4D6">Conductor</th>
                                        <th style="background: #9AD4D6">Km Salida</th>
                                        <th style="background: #9AD4D6">Estado</th>
                                        <th style="background: #9AD4D6">Acciones</th>
                                    </tr>
                                    </thead>
                                    <tbody class="tble-group-divider table-warning">
                                        @foreach ($Rechazados as $item)
                                            <tr class="text-bg-light text-center">
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">{{$item->codigo_vehiculo_ch}}</td>
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">{{$item->patente_ch}}</td>
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">{{$item->tipo_vehiculo_ch}}</td>
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">{{$item->conductor_ch}}</td>
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">{{$item->km_salida}}</td>
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">{{$item->estado_check_list}}</td>
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">
                                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#verCheckList{{$item->id_check_list}}">Ver</button>
                                                </td>
                                            </tr>

                                            <!--Modal para visualizar checklist-->
                                            @include('Supervisor/ModalVisualizar') 

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

