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
    <title>Vehiculo</title>
    <header class="gradient-custom">
        <a href="" class="logo">
            <img src="img/logo.png" alt="logo empresa" class="logomol">
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
    background-image: url('img/planificador_ofi.jpg'); 
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
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                    <button class="nav-link active" id="pills-operativos-tab" data-bs-toggle="pill" href="#pills-operativos" type="button" role="tab" aria-controls="pills-operativos" aria-selected="true">Operativos</button>
                    </li>
                    <li class="nav-item">
                    <button class="nav-link" id="pills-no_operativos-tab" data-bs-toggle="pill" href="#pills-no_operativos" type="button" role="tab" aria-controls="pills-no_operativos" aria-selected="false">No Operativos</button>
                    </li>
                    <li class="nav-item">
                    <button class="nav-link" id="pills-espera-tab" data-bs-toggle="pill" href="#pills-espera" type="button" role="tab" aria-controls="pills-espera" aria-selected="false">En espera</button>
                    </li>
                    <li class="nav-item">
                    <button class="nav-link" id="pills-ruta-tab" data-bs-toggle="pill" href="#pills-ruta" type="button" role="tab" aria-controls="pills-ruta" aria-selected="false">En ruta</button>
                    </li>
                    <li class="nav-item">
                    <button class="nav-link" id="pills-taller-tab" data-bs-toggle="pill" href="#pills-taller" type="button" role="tab" aria-controls="pills-taller" aria-selected="false">En taller</button>
                    </li>
                    <li class="nav-item">
                    <button class="nav-link" id="pills-mantencion-tab" data-bs-toggle="pill" href="#pills-mantencion" type="button" role="tab" aria-controls="pills-mantencion" aria-selected="false">En mantencion</button>
                    </li>
                </ul>
            </div>
            <div class="card-body" style="background: rgba(242, 244, 203, 0.5)">
                <div class="tab-content"  id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-operativos" role="tabpanel" aria-labelledby="pills-operativos-tab">
                        <div class="container" >
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead class="" style="background-color: rgba(242, 244, 203)" color="#4CAF50">
                                    <tr class="text-white" style="background-color: rgba(242, 244, 203)" >
                                        <th style="background: #9AD4D6">Zona</th>
                                        <th style="background: #9AD4D6">Codigo vehiculo</th>
                                        <th style="background: #9AD4D6">Tipo vehiculo</th>
                                        <th style="background: #9AD4D6">Faena</th>
                                        <th style="background: #9AD4D6">Km actual</th>
                                        <th style="background: #9AD4D6">Km Proxima mantencion</th>
                                        <th style="background: #9AD4D6">Fecha vencimiento r.t y gases</th>
                                        <th style="background: #9AD4D6">Fecha vencimiento p.circulacion y seguro</th>
                                        <th style="background: #9AD4D6">Acciones</th>
                                    </tr>
                                    </thead>
                                    <tbody class="tble-group-divider table-warning">
                                        @foreach ($operativos as $item)
                                            <tr class="text-bg-light text-center">
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">{{$item->zona}}</td>
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">{{$item->codigo}}</td>
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">{{$item->tipo_vehiculo}}</td>
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">{{$item->faena_asignada}}</td>
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">{{$item->km_actual}}</td>
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">{{$item->km_proxima_mantencion}}</td>
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">{{$item->fecha_rt_gases}}</td>
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">{{$item->fecha_permiso_circulacion_seguro}}</td>
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">
                                                    <a href="{{route('vehiculo.historial_local', $item->codigo)}}" type="button" class="btn btn-sm text-white" style="background-color: rgb(31, 58, 215) ">Historial</a>
                                                </td>
                                            </tr>      
                                            @include('Vehiculo/ModalVerVehiculo')  
                                        @endforeach
                                    <tbody>
                                </table>
                            </div>
                        </div>    
                    </div>
                    <div class="tab-pane fade " id="pills-no_operativos" role="tabpanel" aria-labelledby="pills-no_operativos-tab">
                        <div class="container">
                            <div div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                    <tr class="bg-success text-white">
                                        <th style="background: #9AD4D6">Zona</th>
                                        <th style="background: #9AD4D6">Codigo vehiculo</th>
                                        <th style="background: #9AD4D6">Tipo vehiculo</th>
                                        <th style="background: #9AD4D6">Faena</th>
                                        <th style="background: #9AD4D6">Km actual</th>
                                        <th style="background: #9AD4D6">Km Proxima mantencion</th>
                                        <th style="background: #9AD4D6">Fecha vencimiento r.t y gases</th>
                                        <th style="background: #9AD4D6">Fecha vencimiento p.circulacion y seguro</th>
                                        <th style="background: #9AD4D6">Acciones</th>
                                    </tr>
                                    </thead>
                                    <tbody class="tble-group-divider table-warning">
                                        @foreach ($no_operativos as $item)
                                            <tr class="text-bg-light text-center">
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">{{$item->zona}}</td>
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">{{$item->codigo}}</td>
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">{{$item->tipo_vehiculo}}</td>
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">{{$item->faena_asignada}}</td>
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">{{$item->km_actual}}</td>
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">{{$item->km_proxima_mantencion}}</td>
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">{{$item->fecha_rt_gases}}</td>
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">{{$item->fecha_permiso_circulacion_seguro}}</td>
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">
                                            </tr>  

                                            @include('Vehiculo/ModalVerVehiculo')

                                        @endforeach
                                    <tbody>
                                </table>
                            </div>
                        </div>    
                    </div>
                    <div class="tab-pane fade " id="pills-espera" role="tabpanel" aria-labelledby="pills-espera-tab">
                        <div class="container">
                            <div div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                    <tr class="bg-success text-white">
                                        <th style="background: #9AD4D6">Zona</th>
                                        <th style="background: #9AD4D6">Codigo vehiculo</th>
                                        <th style="background: #9AD4D6">Tipo vehiculo</th>
                                        <th style="background: #9AD4D6">Faena</th>
                                        <th style="background: #9AD4D6">Km actual</th>
                                        <th style="background: #9AD4D6">Km Proxima mantencion</th>
                                        <th style="background: #9AD4D6">Fecha vencimiento r.t y gases</th>
                                        <th style="background: #9AD4D6">Fecha vencimiento p.circulacion y seguro</th>
                                        <th style="background: #9AD4D6">Acciones</th>
                                    </tr>
                                    </thead>
                                    <tbody class="tble-group-divider table-warning">
                                        @foreach ($espera as $item)
                                            <tr class="text-bg-light text-center">
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">{{$item->zona}}</td>
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">{{$item->codigo}}</td>
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">{{$item->tipo_vehiculo}}</td>
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">{{$item->faena_asignada}}</td>
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">{{$item->km_actual}}</td>
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">{{$item->km_proxima_mantencion}}</td>
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">{{$item->fecha_rt_gases}}</td>
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">{{$item->fecha_permiso_circulacion_seguro}}</td>
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">
                                            </tr>  

                                            @include('Vehiculo/ModalVerVehiculo') 

                                        @endforeach
                                    <tbody>
                                </table>
                            </div>
                        </div>    
                    </div>
                    <div class="tab-pane fade" id="pills-ruta" role="tabpanel" aria-labelledby="pills-ruta-tab">
                        <div class="container" >
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead class="" style="background-color: rgba(242, 244, 203)" color="#4CAF50">
                                    <tr class="text-white" style="background-color: rgba(242, 244, 203)" >
                                        <th style="background: #9AD4D6">Zona</th>
                                        <th style="background: #9AD4D6">Codigo vehiculo</th>
                                        <th style="background: #9AD4D6">Tipo vehiculo</th>
                                        <th style="background: #9AD4D6">Faena</th>
                                        <th style="background: #9AD4D6">Km actual</th>
                                        <th style="background: #9AD4D6">Km Proxima mantencion</th>
                                        <th style="background: #9AD4D6">Fecha vencimiento r.t y gases</th>
                                        <th style="background: #9AD4D6">Fecha vencimiento p.circulacion y seguro</th>
                                        <th style="background: #9AD4D6">Acciones</th>
                                    </tr>
                                    </thead>
                                    <tbody class="tble-group-divider table-warning">
                                        @foreach ($ruta as $item)
                                            <tr class="text-bg-light text-center">
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">{{$item->zona}}</td>
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">{{$item->codigo}}</td>
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">{{$item->tipo_vehiculo}}</td>
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">{{$item->faena_asignada}}</td>
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">{{$item->km_actual}}</td>
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">{{$item->km_proxima_mantencion}}</td>
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">{{$item->fecha_rt_gases}}</td>
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">{{$item->fecha_permiso_circulacion_seguro}}</td>
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">
                                            </tr>  
        
                                            @include('Vehiculo/ModalVerVehiculo')
        
                                        @endforeach
                                    <tbody>
                                </table>
                            </div>
                        </div>    
                    </div>
                    <div class="tab-pane fade " id="pills-taller" role="tabpanel" aria-labelledby="pills-taller-tab">
                        <div class="container">
                            <div div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                    <tr class="bg-success text-white">
                                        <th style="background: #9AD4D6">Zona</th>
                                        <th style="background: #9AD4D6">Codigo vehiculo</th>
                                        <th style="background: #9AD4D6">Tipo vehiculo</th>
                                        <th style="background: #9AD4D6">Faena</th>
                                        <th style="background: #9AD4D6">Km actual</th>
                                        <th style="background: #9AD4D6">Km Proxima mantencion</th>
                                        <th style="background: #9AD4D6">Fecha vencimiento r.t y gases</th>
                                        <th style="background: #9AD4D6">Fecha vencimiento p.circulacion y seguro</th>
                                        <th style="background: #9AD4D6">Acciones</th>
                                    </tr>
                                    </thead>
                                    <tbody class="tble-group-divider table-warning">
                                        @foreach ($taller as $item)
                                            <tr class="text-bg-light text-center">
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">{{$item->zona}}</td>
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">{{$item->codigo}}</td>
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">{{$item->tipo_vehiculo}}</td>
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">{{$item->faena_asignada}}</td>
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">{{$item->km_actual}}</td>
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">{{$item->km_proxima_mantencion}}</td>
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">{{$item->fecha_rt_gases}}</td>
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">{{$item->fecha_permiso_circulacion_seguro}}</td>
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">
                                            </tr>  

                                            @include('Vehiculo/ModalVerVehiculo')

                                        @endforeach
                                    <tbody>
                                </table>
                            </div>
                        </div>    
                    </div>
                    <div class="tab-pane fade " id="pills-mantencion" role="tabpanel" aria-labelledby="pills-mantencion-tab">
                        <div class="container">
                            <div div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                    <tr class="bg-success text-white">
                                        <th style="background: #9AD4D6">Zona</th>
                                        <th style="background: #9AD4D6">Codigo vehiculo</th>
                                        <th style="background: #9AD4D6">Tipo vehiculo</th>
                                        <th style="background: #9AD4D6">Faena</th>
                                        <th style="background: #9AD4D6">Km actual</th>
                                        <th style="background: #9AD4D6">Km Proxima mantencion</th>
                                        <th style="background: #9AD4D6">Fecha vencimiento r.t y gases</th>
                                        <th style="background: #9AD4D6">Fecha vencimiento p.circulacion y seguro</th>
                                        <th style="background: #9AD4D6">Acciones</th>
                                    </tr>
                                    </thead>
                                    <tbody class="tble-group-divider table-warning">
                                        @foreach ($mantencion as $item)
                                            <tr class="text-bg-light text-center">
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">{{$item->zona}}</td>
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">{{$item->codigo}}</td>
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">{{$item->tipo_vehiculo}}</td>
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">{{$item->faena_asignada}}</td>
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">{{$item->km_actual}}</td>
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">{{$item->km_proxima_mantencion}}</td>
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">{{$item->fecha_rt_gases}}</td>
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">{{$item->fecha_permiso_circulacion_seguro}}</td>
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">
                                            </tr>  

                                            @include('Vehiculo/ModalVerVehiculo')

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

