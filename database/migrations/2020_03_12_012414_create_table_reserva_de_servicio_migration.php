<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableReservaDeServicioMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserva_de_servicio', function (Blueprint $table) {
            $table->bigIncrements('reserva_id');
            $table->string('nombre_cliente');
            $table->string('comentarios')->nullable();
            $table->date('dia_servicio');
            $table->time('hora_servicio', 0);
            $table->unsignedBigInteger('servicio_id');
            $table->double('precio_total', 8, 2)->nullable();
            $table->timestamps();            
            $table->foreign('servicio_id')->references('servicio_id')->on('servicio_de_spa');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reserva_de_servicio');
    }
}
