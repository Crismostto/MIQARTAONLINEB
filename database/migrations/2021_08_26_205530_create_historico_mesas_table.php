<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoricoMesasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historico_mesas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mesa_id');
            $table->foreign('mesa_id') -> references('id') ->on ('mesas');
            $table->datetime('fecha_apertura');
            $table->datetime('fecha_cierre');
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
        Schema::dropIfExists('historico_mesas');
    }
}
