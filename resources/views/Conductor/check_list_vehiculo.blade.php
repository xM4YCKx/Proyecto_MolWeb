<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/styleConductor_v2.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" 
    crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/d8efb065c4.js" crossorigin="anonymous"></script>
    <!--<script src="scriptpopup.js" defer></script>-->
    <title>Check List Vehiculo</title>
    <header class="gradient-custom">
        <a href="" class="logo">
            <img src="/img/logo.png" alt="logo empresa" class="logomol">
        </a>
        <h2 class="nombre empresa">Mol Ambiente App</h2>
        <nav>
            <h6>Tipo de cuenta:{{$cargo}}</h6>
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
  }
  </style>
<body class="">
    <br/>
    <br/>
    <div class="container">
        <div class="card">
            <div class="card-header" style="background: #136F63">
                <h2 class="text-center">Check List Vehículo Diario</h2>
            </div>   
            <div class="card-body">
                <form action="{{route('check_list.store')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="card-header">
                            <h3>Datos previos</h3>
                        </div>
                        <br>
                        <br>
                        <div class="col">
                            <h6>Codigo Vehículo</h6>
                            <input type="text" id="codigo_vehiculo_ch" name="codigo_vehiculo_ch" value="{{ $codigo_vehiculo}}" readonly>
                        </div>
                        <div class="col">
                            <h6>Tipo Vehículo</h6>
                            <input type="text" id="tipo_vehiculo_ch" name="tipo_vehiculo_ch" value="{{ $tipo_vehiculo}}" readonly>
                        </div>
                        <div class="col">
                            <h6>Patente Vehículo</h6>
                            <input type="text" id="patente_ch" name="patente_ch" value="{{ $patente_vehiculo}}" readonly>
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="row">
                        <div class="col">
                            <h6>Faena Asignada</h6>
                            <input type="text" id="faena_ch" name="faena_ch" value="{{ $faena}}" readonly>
                        </div>
                        <div class="col">
                            <h6>Conductor</h6>
                            <input type="text" id="conductor_ch" name="conductor_ch" value="{{ $nombre_conductor}}" readonly>
                        </div>
                        <div class="col">

                        </div>
                    </div>
                    <br>
                    <div class="card-body-header">
                        <h3>Verificación de documentos</h3>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <h5>Licencia Municipalidad Vigente</h5>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="licencia_muni_vigente" id="Bien" value="Bien">
                                <label class="form-check-label" for="flexRadioDefault1">
                                  Bien
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="licencia_muni_vigente" id="Mal" value="Mal" >
                                <label class="form-check-label" for="flexRadioDefault2">
                                  Mal
                                </label>
                            </div>
                        </div>
                        <div class="col">
                            <h5>Porta Licencia Interna</h5>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="licencia_interna" id="Bien" value="Bien">
                                <label class="form-check-label" for="flexRadioDefault1">
                                  Bien
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="licencia_interna" id="Mal" value="Mal">
                                <label class="form-check-label" for="flexRadioDefault2">
                                  Mal
                                </label>
                            </div>
                        </div>
                        <div class="col">
                            <h5>Resolución Sanitaria</h5>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="resolucion_sanitaria" id="Bien" value="Bien">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Bien
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="resolucion_sanitaria" id="Mal" value="Mal">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Mal
                                </label>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br/>
                    <h5>Documentación (Permiso de circulación, Padrón,R.técnica, An. gases,Seguro) al día.</h5>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="documentacion_actualizada" id="Bien" value="Bien">
                        <label class="form-check-label" for="flexRadioDefault1">
                          Bien
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="documentacion_actualizada" id="Mal"value="Mal" >
                        <label class="form-check-label" for="flexRadioDefault2">
                          Mal
                        </label>
                    </div>
                    <br/>
                    <div class="card-body-header">
                        <h3>Verificación vehículo</h3>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="col">
                            <h5>Nivel de Combustible</h5>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="nivel_combustible" id="Bien" value="Bien">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Bien
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="nivel_combustible" id="Mal" value="Mal" >
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Mal
                                </label>
                            </div>
                        </div>
                        <div class="col">
                            <h5>Luces(altas,bajas,retroceso,etc)</h5>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="luces" id="Bien" value="Bien">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Bien
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="luces" id="Mal" value="Mal" >
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Mal
                                </label>
                            </div>
                        </div>
                        <div class="col">
                            <h5>Vidrios (parabrisas,puertas,luneta)</h5>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="vidrios" id="Bien" value="Bien">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Bien
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="vidrios" id="Mal" value="Mal">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Mal
                                </label>
                            </div>
                        </div>
                    </div>
                    <br/>   
                    <br/>    
                    <h5>Revisón de Niveles, aceite de motor,liq.Refrigerante,liq.Limpiaparabrisas</h5>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="revision_nivel_liquidos" id="Bien" value="Bien">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Bien
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="revision_nivel_liquidos" id="Mal" value="Mal">
                        <label class="form-check-label" for="flexRadioDefault2">
                            Mal
                        </label>
                    </div>
                    <br>
                    <br>
                    <div class="row">
                        <div class="col">
                            <h5>Dirección/frenos</h5>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="direccion_frenos" id="Bien" value="Bien">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Bien
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="direccion_frenos" id="Mal" value="Mal">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Mal
                                </label>
                            </div>
                        </div>
                        <div class="col">
                            <h5>Bocina/Alarma de retroceso</h5>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="bocina_alarma_retroceso" id="Bien" value="Bien">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Bien
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="bocina_alarma_retroceso" id="Mal" value="Mal">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Mal
                                </label>
                            </div>
                        </div>
                        <div class="col">
                            <h5>Seguro tuercas (arañas,indicador)</h5>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="seguro_tuercas" id="Bien" value="Bien">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Bien
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="seguro_tuercas" id="Mal" value="Mal">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Mal
                                </label>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="row">
                        <div class="col">
                            <h5>Espejos retrovisores</h5>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="espejos_retrovisores" id="Bien" value="Bien">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Bien
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="espejos_retrovisores" id="Mal" value="Mal">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Mal
                                </label>
                            </div>
                        </div>
                        <div class="col">
                            <h5>Cinturones de seguridad</h5>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="cinturones_seguridad" id="Bien" value="Bien">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Bien
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="cinturones_seguridad" id="Mal" value="Mal">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Mal
                                </label>
                            </div>
                        </div>
                        <div class="col">
                            <h5>Estado placas patentes</h5>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="estado_placas" id="Bien" value="Bien">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Bien
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="estado_placas" id="Mal" value="Mal">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Mal
                                </label>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="row">
                        <div class="col">
                            <h5>Estado Neumáticos y repuestos</h5>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="estado_neumaticos_repuesto" id="Bien" value="Bien">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Bien
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="estado_neumaticos_repuesto" id="Mal" value="Mal">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Mal
                                </label>
                            </div>
                        </div>
                        <div class=col>
                            <h5>Calefacción/aire acondicionado</h5>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="calefaccion_aire_acondicionado" id="Bien" value="Bien">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Bien
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="calefaccion_aire_acondicionado" id="Mal" value="Mal">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Mal
                                </label>
                            </div>
                        </div>
                        <div class="col">
                            <h5>Estado Interior-Extrerior</h5>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="estado_interior_exterior" id="Bien" value="Bien">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Bien
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="estado_interior_exterior" id="Mal" value="Mal">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Mal
                                </label>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="row">
                        <div class="col">
                            <h5>Estado de Parachoques Delanteros-Traseros</h5>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="estado_parachoques" id="Bien" value="Bien">
                                <label class="form-check-label" for="flexRadioDefault1">
                                        Bien
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="estado_parachoques" id="Mal" value="Mal">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Mal
                                </label>
                            </div>
                        </div>
                        <div class="col">
                            <h5>Prueba de equipo antes de salir</h5>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="prueba_funcional" id="Bien" value="Bien">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Bien
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="prueba_funcional" id="Mal" value="Mal">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Mal
                                </label>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <h5>Kit Seguridad (gata con barrote, llave, triángulo, extintor, chaleco, pertiga, baliza, cuñas conos.)</h5>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="kit_seguridad" id="Bien" value="Bien">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Bien
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="kit_seguridad" id="Mal" value="Mal">
                        <label class="form-check-label" for="flexRadioDefault2">
                            Mal
                        </label>
                    </div>
                    <br>
                    <div>
                        <label for="motivo">Km actual vehículo</label>
                        <input type="number" class="form-control" id="km_salida" name="km_salida" rows="4" required><br>
                    </div>
                    <div>
                        <label for="motivo">litros combustible</label>
                        <input type="number" class="form-control" id="carga_combustible" name="carga_combustible" rows="4" required><br>
                    </div>
                    <div>
                        <label for="motivo">Observación:</label>
                        <textarea class="form-control" id="observaciones" name="observaciones" rows="4" required></textarea><br>
                    </div>
        
                    <input class="form-control btn btn-success" type="submit" value="Enviar Solicitud">
                </form>
            </div>
        </div>
    </div>    
</body>
</html>