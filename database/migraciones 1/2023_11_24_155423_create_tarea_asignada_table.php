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
        Schema::create('tarea_asignada', function (Blueprint $table) {
            $table->integer('id_tarea', true);
            $table->text('nombre_mecanico');
            $table->string('codigo_vehiculo_mc', 20);
            $table->string('patente_mc', 20);
            $table->string('faena_mc', 200);
            $table->longText('detalle_tarea');
            $table->text('gravedad');
            $table->string('estado_tarea', 20);
            $table->timestamp('fecha_creacion')->useCurrent();
            $table->date('fecha_limite');
            $table->date('fecha_inicio')->nullable();
            $table->date('fecha_termino')->nullable();
            $table->longText('comentario')->nullable();
            $table->integer('id_solicitud');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tarea_asignada');
    }
};
