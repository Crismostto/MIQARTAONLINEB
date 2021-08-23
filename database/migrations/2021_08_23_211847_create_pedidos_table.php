<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->integer('cantidad');
            $table->double('precio');
            $table->unsignedBigInteger('mesa_id');
            $table->foreing('mesa_id') -> references('id') ->on ('mesas');
            $table->unsignedBigInteger('articulo_id');
            $table->foreing('articulo_id') -> references('id') ->on ('articulos');
            $table-> datetime('fecha');
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
        Schema::dropIfExists('pedidos');
    }
}
