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
        Schema::create('historial_vehiculo_local', function (Blueprint $table) {
            $table->integer('id_historial_l', true);
            $table->string('cod_vehiculo', 50);
            $table->string('gravedad', 100);
            $table->timestamp('fecha_finalizacion');
            $table->text('detalle_tarea');
            $table->text('comentario_tarea');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('historial_vehiculo_local');
    }
};
