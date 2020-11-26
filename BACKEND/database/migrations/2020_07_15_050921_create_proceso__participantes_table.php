<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcesoParticipantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proceso__participantes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('Proceso_id');
            $table->unsignedBigInteger('Participante_id');
            $table->unsignedBigInteger('Rol_id');
            $table->unsignedBigInteger('Aula_id');
            $table->string('Entrega_DJ');
            $table->char('Asistencia',2);
            $table->foreign('Proceso_id')->references('id')->on('procesos');
            $table->foreign('Participante_id')->references('id')->on('participantes');
            $table->foreign('Rol_id')->references('id')->on('roles');
            $table->foreign('Aula_id')->references('id')->on('aulas');
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
        Schema::dropIfExists('proceso__participantes');
    }
}
