<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoriaClinicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historia_clinicas', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('codHistoria');
            $table->unsignedBigInteger('codConsulta')->unsigned();
            $table->string('cedulaPaciente');

            $table->date('fechaCreacion');
            $table->string('anamnesis');
            $table->string('exploracionFisica');
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
        Schema::dropIfExists('historia_clinicas');
    }
}
