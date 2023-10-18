<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/stylechofer.css') }}">
    <script src="scriptpopup.js" defer></script>
    <title>Conductor</title>
</head>
<<body background="img/fondoc.jpg">
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
    
    <form class="form">
        <h3>Tipo Vehiculo</h3>
        <select class="selectbox">
            <option selected value="0">Seleccione Tipo de Vehiculo</option>
            <option value="1">Camion</option>
            <option value="2">Camioneta</option>
            <option value="3">Maquina</option>
          </select>
           <h3>Tipo Vehiculo</h3>
          <select class="selectbox">
            <option selected value="0">Seleccione Vehiculo Especifico</option>
            <option value="1">Mol30</option>
            <option value="2">C23</option>
            <option value="3">REX12</option>
          </select>
          <button class="button">Checklist</button>
        </form>
        
</body>
</html>
