<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->engine="InnoDB";

            $table->string('cedulaPaciente');
            $table->string('nombrePaciente');
            $table->string('apellidoPaciente');
            $table->string('emailPaciente');
            $table->string('celularPaciente');

            $table->primary('cedulaPaciente');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pacientes');
    }
}
