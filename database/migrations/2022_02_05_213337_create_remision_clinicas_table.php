<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRemisionClinicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('remision_clinicas', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('codRemision');
            $table->unsignedBigInteger('codEmpleado')->unsigned();
            // $table->foreign('codEmpleado')->references('codEmpleado')->on('empleados')->onDelete("cascade");
            $table->string('cedulaPaciente');
            // $table->foreign('cedulaPaciente')->references('cedulaPaciente')->on('pacientes')->onDelete("cascade");

            $table->date('fechaRemision');
            $table->string('descripcion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('remision_clinicas');
    }
}
