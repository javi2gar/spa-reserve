<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

class CreateTableHorarioDeServicioMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horario_de_servicio', function (Blueprint $table) {
            $table->bigIncrements('horario_id');
            $table->date('dia');
            $table->time('inicio',0);
            $table->time('fin',0);             
            $table->unsignedBigInteger('servicio_id');           
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
        Schema::dropIfExists('horario_de_servicio');
    }
}
