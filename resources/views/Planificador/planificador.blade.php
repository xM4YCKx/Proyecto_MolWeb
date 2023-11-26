<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/planificador.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" 
    crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/d8efb065c4.js" crossorigin="anonymous"></script>
    <!--<script src="scriptpopup.js" defer></script>-->
    <title>Planificador</title>
    <header class="gradient-custom">
        <a href="#" class="logo">
            <img src="img/logo.png" alt="logo empresa" class="logomol">
        </a>
        <h2 class="nombre empresa text-center">Mol Ambiente App</h2>
        <nav>
            <h6>Tipo de cuenta: {{$cargo}}</h6>
            <h6>Localidad: Santiago</h6>
            <a href="{{route('vehiculo')}}" type="button" class="btn btn-sm text-white" style="background-color: #1f5fe8 ">administrar vehiculos</a>
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

    @include('Supervisor/mensaje')
    <br/>
    <br>
    <div class="container" style="background: transparent">
        <div class="card">
            <div class="card-header" style="background: rgba(181, 181, 181) ;">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                      <button class="nav-link active" id="pills-pendientes-tab" data-bs-toggle="pill" href="#pills-pendientes" type="button" role="tab" aria-controls="pills-pendientes" aria-selected="true">Pendientes</button>
                    </li>
                    <li class="nav-item">
                      <button class="nav-link" id="pills-asignados-tab" data-bs-toggle="pill" href="#pills-asignados" type="button" role="tab" aria-controls="pills-asignados" aria-selected="false">Asignados</button>
                    </li>
                    <li class="nav-item">
                      <button class="nav-link" id="pills-derivados-tab" data-bs-toggle="pill" href="#pills-derivados" type="button" role="tab" aria-controls="pills-derivados" aria-selected="false">Derivados</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" id="pills-finalizados-tab" data-bs-toggle="pill" href="#pills-finalizados"type="button"  role="tab" aria-controls="pills-finalizados" aria-selected="false">Finalizados</button>
                    </li>
                </ul>
            </div>
            <div class="card-body" style="background: rgba(242, 244, 203, 0.5)">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-pendientes" role="tabpanel" aria-labelledby="pills-pendientes-tab">
                        <div class="container">
                            <div div class="table-responsive">
                                <!--<a href="javascript:;;" class="llamaHtml btn btn-info btn-block">Cargar HTML</a>-->
        
                                <table class="table table-striped table-bordered">
                                    <thead>
                                    <tr class="bg-success text-white">
                                        <th style="background: #1DD3B0">Codigo</th>
                                        <th style="background: #1DD3B0">Tipo vehiculo</th>
                                        <th style="background: #1DD3B0">Faena</th>
                                        <th style="background: #1DD3B0">Gravedad</th>
                                        <th style="background: #1DD3B0">Estado</th>
                                        <th style="background: #1DD3B0">Acciones</th>
                                    </tr>
                                    </thead>
                                    <tbody class="tble-group-divider"> <!--tabla-->
                                        @foreach ($Pendientes as $item)
                                            <tr class="text-bg-light text-center">
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">{{$item->codigo_vehiculo}}</td>
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">{{$item->tipo_vehiculo}}</td>
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">{{$item->faena}}</td>
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">{{$item->gravedad}}</td>
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">{{$item->estado_solicitud}}</td>
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">
                                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#verSolicitud{{$item->id_solicitud}}">Ver</button>
                                                    <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#derivarSolicitud{{$item->id_solicitud}}">Derivar</button>
                                                    <a href="{{route('tarea.create', $item->id_solicitud)}}" type="button" class="btn btn-sm text-white" style="background-color: #e81f1f ">Asignar</a>
                                                </td>
                                            </tr>

                                            <!--Modal para visualizar la solicitud-->
                                            @include('Planificador/ModalVerSolicitud') 
                                            @include('Planificador/ModalDerivar') 

                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>    
                    </div>
                    <div class="tab-pane fade" id="pills-asignados" role="tabpanel" aria-labelledby="pills-asignados-tab">
                        <div class="container">
                            <div div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                    <tr class="bg-success text-white">
                                        <th style="background: #1DD3B0">Faena</th>
                                        <th style="background: #1DD3B0">Tipo vehiculo</th>
                                        <th style="background: #1DD3B0">Codigo</th>
                                        <th style="background: #1DD3B0">Gravedad</th>
                                        <th style="background: #1DD3B0">Estado</th>
                                        <th style="background: #1DD3B0">Acciones</th>
                                    </tr>
                                    </thead>
                                    <tbody class="tble-group-divider">
                                        @foreach ($Asignados as $item)
                                            <tr class="text-bg-light text-center">
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">{{$item->faena}}</td>
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">{{$item->tipo_vehiculo}}</td>
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">{{$item->codigo_vehiculo}}</td>
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">{{$item->gravedad}}</td>
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">{{$item->estado_solicitud}}</td>
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">
                                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#verSolicitud{{$item->id_solicitud}}">Ver</button>
                                                </td>
                                            </tr>

                                            <!--Modal para visualizar la solicitud-->
                                            @include('Planificador/ModalVerSolicitud') 

                                        @endforeach
                                    <tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-derivados" role="tabpanel" aria-labelledby="pills-derivados-tab">
                        <div class="container">
                            <div div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                    <tr class="bg-success text-white">
                                        <th style="background: #1DD3B0">Faena</th>
                                        <th style="background: #1DD3B0">Tipo vehiculo</th>
                                        <th style="background: #1DD3B0">Codigo</th>
                                        <th style="background: #1DD3B0">Gravedad</th>
                                        <th style="background: #1DD3B0">Estado</th>
                                        <th style="background: #1DD3B0">Acciones</th>
                                    </tr>
                                    </thead>
                                    <tbody class="tble-group-divider">
                                        @foreach ($Derivados as $item)
                                            <tr class="text-bg-light text-center">
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">{{$item->faena}}</td>
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">{{$item->tipo_vehiculo}}</td>
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">{{$item->codigo_vehiculo}}</td>
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">{{$item->gravedad}}</td>
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">{{$item->estado_solicitud}}</td>
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">
                                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#verSolicitud{{$item->id_solicitud}}">Ver</button>
                                                </td>
                                            </tr>

                                            <!--Modal para visualizar la solicitud-->
                                            @include('Planificador/ModalVerSolicitud') 
                                        @endforeach
                                    <tbody>
                                </table>
                            </div>
                        </div>    
                    </div>
                    <div class="tab-pane fade" id="pills-finalizados" role="tabpanel" aria-labelledby="pills-finalizados-tab">
                        <div class="container">
                            <div div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                    <tr class="bg-success text-white">
                                        <th style="background: #1DD3B0">Faena</th>
                                        <th style="background: #1DD3B0">Tipo vehiculo</th>
                                        <th style="background: #1DD3B0">Codigo</th>
                                        <th style="background: #1DD3B0">Gravedad</th>
                                        <th style="background: #1DD3B0">Estado</th>
                                        <th style="background: #1DD3B0">Acciones</th>
                                    </tr>
                                    </thead>
                                    <tbody class="tble-group-divider table-warning">
                                        @foreach ($Finalizados as $item)
                                            <tr class="text-bg-light text-center">
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">{{$item->faena}}</td>
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">{{$item->tipo_vehiculo}}</td>
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">{{$item->codigo_vehiculo}}</td>
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">{{$item->gravedad}}</td>
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">{{$item->estado_solicitud}}</td>
                                                <td style="background-color: rgba(242, 244, 203, 0.5)">
                                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#verSolicitud{{$item->id_solicitud}}">Ver</button>
                                                </td>
                                            </tr>
                                            <!--Modal para visualizar la solicitud-->
                                            @include('Planificador/ModalVerSolicitud') 
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

    <!--<script>
        $(document).ready(function(){
            $(".llamaHtml").click(function(){
                alert("paso");
            });
           
            $.getJSON("http://127.0.0.1:8000/planificadorJSON", null, function(dataTabla) {
                console.log(dataTabla);
                $.each(dataTabla,
                    function(indice, valor) {
                        console.log("valor -> " + dataTabla[indice].faena)
                        $(".tabla").append("<tr><td>" + valor.faena + "</td><td>" + this.tipo_vehiculo + "</td></td>" + this.gravedad + "</td><td>" + this.tipo_vehiculo + "</td></tr>");
                    }
                );
            });
           
        });
    </script>-->
</body>
</html>

