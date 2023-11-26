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
        Schema::create('ruta', function (Blueprint $table) {
            $table->integer('id_ruta', true);
            $table->integer('id_conductor')->nullable();
            $table->string('nombre_conductor', 100);
            $table->string('codigo_vehiculo', 15);
            $table->string('tipo_vehiculo', 50);
            $table->integer('id_check_list')->nullable();
            $table->timestamp('fecha_creacion')->useCurrent();
            $table->timestamp('fecha_inicio')->nullable();
            $table->timestamp('fecha_termino')->nullable();
            $table->string('estado_ruta', 20);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ruta');
    }
};
