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
        Schema::create('solicitud', function (Blueprint $table) {
            $table->integer('id_solicitud', true);
            $table->string('faena', 100);
            $table->string('tipo_vehiculo', 100);
            $table->string('codigo_vehiculo', 30);
            $table->string('gravedad', 50);
            $table->text('motivo');
            $table->timestamp('fecha_solicitud')->useCurrent();
            $table->string('estado_solicitud', 20);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('solicitud');
    }
};
