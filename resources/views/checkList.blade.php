<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/styleConductor.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" 
    crossorigin="anonymous">
    <script src="scriptpopup.js" defer></script>
    <title>Checklist</title>
    <header>
        <a href="#" class="logo">
            <img src="img/logo.png" alt="logo empresa" class="logomol">
            <h2 class="nombre empresa">Mol Ambiente App</h2>
        </a>
        <nav>
            <a href="" class="nav-link">Tipo de cuenta</a>
            <a href="" class="nav-link">Faena</a>
            <form style="display: inline" action="/logout" method="POST">
                @csrf
                <a href="#" 
                onclick="this.closest('form').submit()"
                >Cerrar Sesion</a>
            </form>
        </nav>
    </header>
</head>
<body background="img/fondoc.jpg">
    <div class="container">
        <div class="p-5 table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                <tr class="bg-success text-white">
                    <th>Faena</th>
                    <th>Tipo vehiculo</th>
                    <th>Codigo</th>
                    <th>Gravedad</th>
                    <th>Motivo</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody class="tble-group-divider">
                    @foreach ($datos as $item)
                        <tr class="text-bg-light text-center">
                            <td>{{$item->faena}}</td>
                            <td>{{$item->tipo_vehiculo}}</td>
                            <td>{{$item->codigo_vehiculo}}</td>
                            <td>{{$item->gravedad}}</td>
                            <td>{{$item->motivo}}</td>
                            <td>{{$item->estado_solicitud}}</td>
                            <td>
                                <a href="" class="btn btn-primary btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                            </td>
                        </tr>
                    @endforeach
                <tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" 
    crossorigin="anonymous"></script>
</body>
</html>