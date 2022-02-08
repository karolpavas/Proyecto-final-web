<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultas', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('codConsulta');
            $table->unsignedInteger('codEmpleado');
            $table->string('cedulaPaciente');
            $table->string('estado');
            $table->date('fecha');
            $table->string('tipoConsulta');

            
            //$table->foreign('codEmpleado')->references('codEmpleado')->on('empleados')->onDelete("cascade");
            //$table->foreign('cedulaPaciente')->references('cedulaPaciente')->on('pacientes')->onDelete("cascade");
            //$table->foreignId('codEmpleado')->constrained('empleados')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consultas');
    }
}
