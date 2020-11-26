<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParticipantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('participantes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Tipo_Participante');
            $table->string('Tipo_Documento');
            $table->integer('Nro_Documento');
            $table->string('Apellidos');
            $table->string('Nombres');
            $table->date('Fecha_Nacimiento');
            $table->string('Sexo');
            $table->string('Correo');
            $table->integer('Teléfono');
            $table->string('Situación');
            $table->integer('CUI');
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
        Schema::dropIfExists('participantes');
    }
}
