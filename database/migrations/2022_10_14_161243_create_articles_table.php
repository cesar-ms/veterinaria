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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->enum('tipo_articulo',['venta','insumo',]);
            $table->enum('categoria',['medicamento','accesorio','alimento']);
            $table->longText('descripcion')->nullable();
            $table->date('fecha_caducidad')->nullable();
            $table->integer('num_pzas');
            $table->float('costo_pzas');
            $table->date('fecha_llegada');
            $table->string('codigo_barras');
            $table->timestamps();

            $table->unsignedBigInteger('user_id');

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
};
