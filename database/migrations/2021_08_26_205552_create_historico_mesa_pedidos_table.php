<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoricoMesaPedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historico_mesa_pedidos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('historico_id');
            $table->foreign('historico_id') -> references('id') ->on ('historico_mesas');
            $table->unsignedBigInteger('articulo_id');
            $table->foreign('articulo_id') -> references('id') ->on ('articulos');
            $table->integer('cantidad');
            $table->double('precio');
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
        Schema::dropIfExists('historico_mesa_pedidos');
    }
}
