<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAulasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aulas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('Pabellon_id');
            $table->integer('Aula_Nro');
            $table->integer('Código');
            $table->integer('Piso');
            $table->integer('Aforo');
            $table->integer('Filas');
            $table->integer('Columnas');
            $table->string('Situación');
            $table->foreign('Pabellon_id')->references('id')->on('pabellones');
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
        Schema::dropIfExists('aulas');
    }
}
