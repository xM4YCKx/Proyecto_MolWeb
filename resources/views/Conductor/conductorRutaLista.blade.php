<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/styleConductor_v2.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" 
    crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.1.js" 
    integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" 
    crossorigin="anonymous"></script>
    <!--<script src="scriptpopup.js" defer></script>-->
    <title>Fin Ruta</title>
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
    background-image: url('/img/conductor_2.jpg');
    background-repeat: no-repeat;
    background-position: center center;
    background-attachment: fixed;
    background-size: cover;
  };
  </style>
<body>
    <br>
    <br>
    <br>
    <div class="container">
        <div class="card" >
            <div class="card-header">
                <h4>Informacion de la ruta</h4>
            </div>
            <div class="card-body">
                <h6>La ruta de hoy fue finalizada con exito</h6>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
  integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" 
  crossorigin="anonymous"></script>
</body>
</html>
