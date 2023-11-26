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
        Schema::create('vehiculo', function (Blueprint $table) {
            $table->integer('id_vehiculo', true);
            $table->string('codigo', 10);
            $table->string('administrador', 100);
            $table->string('patente', 100);
            $table->string('tag_ruta_maipo', 10)->nullable();
            $table->integer('id_tipo_vehiculo');
            $table->string('tipo_vehiculo', 100);
            $table->string('carroceria', 100)->nullable();
            $table->string('servicio', 100);
            $table->string('telma', 20)->nullable();
            $table->string('gps', 50)->nullable();
            $table->string('faena_asignada', 100);
            $table->string('ubicacion', 100);
            $table->string('estado', 100);
            $table->string('marca', 100);
            $table->string('modelo');
            $table->integer('anio');
            $table->string('n_motor')->nullable();
            $table->string('n_chasis')->nullable();
            $table->string('color', 100)->nullable();
            $table->string('zona', 50);
            $table->date('fecha_rt_gases');
            $table->date('fecha_permiso_circulacion_seguro');
            $table->integer('km_ultima_mantencion');
            $table->integer('km_actual');
            $table->integer('km_proxima_mantencion');
            $table->string('valor_comercial')->nullable();
            $table->string('detalle', 500)->nullable();
            $table->string('servicio_impuestos_internos', 500)->nullable();
            $table->timestamp('fecha_creacion')->useCurrent();
            $table->timestamp('fecha_actualizacion')->useCurrentOnUpdate()->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehiculo');
    }
};
