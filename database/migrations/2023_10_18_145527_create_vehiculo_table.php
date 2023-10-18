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
            $table->integer('N')->nullable();
            $table->string('Zona')->nullable();
            $table->string('Faena')->nullable();
            $table->string('Administrador')->nullable();
            $table->string('Codigo')->nullable();
            $table->string('Patente')->nullable();
            $table->string('Tipo de Activo')->nullable();
            $table->string('Carroceria')->nullable();
            $table->string('Servicio')->nullable();
            $table->date('Revisión Técnica y Gases Fecha Vencimiento')->nullable();
            $table->date('Permiso de circulacion y Seguro fecha de Vencimiento')->nullable();
            $table->float('KM Ultima Mantencion', 10, 0)->nullable();
            $table->float('KM Actual', 10, 0)->nullable();
            $table->float('KM Proxima Mantencion', 10, 0)->nullable();
            $table->string('estado', 50);
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
