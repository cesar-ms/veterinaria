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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('ap_paterno');
            $table->string('ap_materno');
            $table->string('nombre_mascota')->nullable();
            $table->integer('edad_mascota')->nullable();
            $table->enum('tmp_nacimiento',['días','meses','años'])->nullable();
            $table->float('peso_mascota')->nullable();
            $table->string('tipo');
            $table->string('raza')->nullable();
            $table->longText('diagnostico');
            $table->string('telefono');
            $table->string('correo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patients');
    }
};
