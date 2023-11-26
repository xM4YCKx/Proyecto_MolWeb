<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/styleConductor.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/tabla.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" 
    crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/d8efb065c4.js" crossorigin="anonymous"></script>
    <!--<script src="scriptpopup.js" defer></script>-->
    <title>Vehiculo</title>
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

   <form action="" method="post">
        <h2>Creacion de un nuevo vehiculo</h2>

        <input placeholder="codigo del cehiculo" name="codigo">

        <input placeholder="administrador" name="codigo">

        <input placeholder="patente" name="codigo">

        <input placeholder="tag ruta maipu" name="codigo">

        <input placeholder="tipo de vehiculo" name="codigo">

        <input placeholder="carroceria" name="codigo">

        <input placeholder="servicio" name="codigo">

        <input placeholder="telma" name="codigo">

        <input placeholder="GPS" name="codigo">

        <input placeholder="Faena Asignada" name="codigo">

        <input placeholder="Ubicacion" name="codigo">

        <input placeholder="estado" name="codigo">

        <input placeholder="marca" name="codigo">

        <input placeholder="modelo" name="codigo">

        <input placeholder="año" name="codigo">

        <input placeholder="motor" name="codigo">

        <input placeholder="chasis" name="codigo">

        <input placeholder="color" name="codigo">

        <input placeholder="zona" name="codigo">

        <input placeholder="fecha de vencimiento gases" name="codigo">

        <input placeholder="fecha vencimiento permiso de circulacion" name="codigo">

        <input placeholder="Km ultima mantencion" name="codigo">

        <input placeholder="km actual" name="codigo">

        <input placeholder="km proxima mantencion" name="codigo">

        <input placeholder="valor comercial" name="codigo">

        <input placeholder="detalle" name="codigo">

        <input placeholder="Servicio impuestos interno" name="codigo">
   </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" 
    crossorigin="anonymous"></script>
</body>
</html>
