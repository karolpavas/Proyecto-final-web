<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturas', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('codFactura');

            $table->unsignedBigInteger('codEmpleado')->unsigned();
            $table->unsignedBigInteger('codPaciente')->unsigned();
            $table->string('cedulaPaciente');

            $table->string('estado');
            $table->dateTimeTz('fechaGeneracion', $precision = 0);
            $table->string('valor');

            
            // $table->foreign('codEmpleado')->references('codEmpleado')->on('empleados')->onDelete("cascade");
            // $table->foreign('cedulaPaciente')->references('cedulaPaciente')->on('pacientes')->onDelete("cascade");
            // $table->foreign('codConsulta')->references('codConsulta')->on('consultas')->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('facturas');
    }
}
