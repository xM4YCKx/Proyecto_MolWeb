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
        Schema::create('trabajadores', function (Blueprint $table) {
            $table->integer('id_trabajador', true);
            $table->string('nombre', 50);
            $table->string('apellido_p', 50);
            $table->string('apellido_m', 50)->nullable();
            $table->string('rut', 15);
            $table->string('correo', 150);
            $table->string('faena', 200)->nullable();
            $table->string('cargo', 30);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trabajadores');
    }
};
