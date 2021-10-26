<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMesaPedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mesa_pedidos', function (Blueprint $table) {
            $table->id();
            $table->integer('cantidad');
            $table->double('precio',8,2);
            $table->unsignedBigInteger('mesa_id');
            $table->foreign('mesa_id') -> references('id') ->on ('mesas');
            $table->unsignedBigInteger('articulo_id');
            $table->foreign('articulo_id') -> references('id') ->on ('articulos');
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
        Schema::dropIfExists('mesa_pedidos');
    }
}
