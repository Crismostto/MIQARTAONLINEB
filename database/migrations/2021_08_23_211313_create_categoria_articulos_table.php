<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriaArticulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categoria_articulos', function (Blueprint $table) {
            $table->id();
            $table->integer('tipo');
            $table->string('nombre');
            $table->unsignedBigInteger('mesa_id');
            $table->unsignedBigInteger('articulo_id');
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
        Schema::dropIfExists('categoria_articulos');
    }
}
