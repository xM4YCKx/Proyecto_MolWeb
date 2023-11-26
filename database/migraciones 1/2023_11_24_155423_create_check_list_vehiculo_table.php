<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('check_list_vehiculo', function (Blueprint $table) {
            $table->integer('id_check_list', true);
            $table->integer('id_conductor')->nullable();
            $table->string('codigo_vehiculo_ch', 15);
            $table->string('tipo_vehiculo_ch', 50);
            $table->string('patente_ch', 50);
            $table->string('faena_ch', 100)->nullable();
            $table->string('conductor_ch', 50);
            $table->integer('km_salida');
            $table->integer('km_llegada')->nullable();
            $table->timestamp('fecha_inicio')->useCurrent();
            $table->date('fecha_termino')->nullable();
            $table->integer('dias')->nullable();
            $table->string('licencia_muni_vigente', 10);
            $table->string('licencia_interna', 10);
            $table->string('documentacion_actualizada', 10);
            $table->string('resolucion_sanitaria', 10);
            $table->string('nivel_combustible', 10);
            $table->string('revision_nivel_liquidos', 10);
            $table->string('luces', 10);
            $table->string('vidrios', 10);
            $table->string('direccion_frenos', 10);
            $table->string('bocina_alarma_retroceso', 10);
            $table->string('seguro_tuercas', 10);
            $table->string('espejos_retrovisores', 10);
            $table->string('cinturones_seguridad', 10);
            $table->string('estado_parachoques', 10);
            $table->string('estado_placas', 10);
            $table->string('estado_interior_exterior', 10);
            $table->string('estado_neumaticos_repuesto', 10);
            $table->string('kit_seguridad', 10);
            $table->string('calefaccion_aire_acondicionado', 10);
            $table->string('prueba_funcional', 10);
            $table->integer('carga_combustible');
            $table->text('observaciones')->nullable();
            $table->string('estado_check_list', 50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('check_list_vehiculo');
    }
};
