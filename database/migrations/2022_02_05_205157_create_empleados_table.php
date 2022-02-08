<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('codEmpleado');
            $table->unsignedBigInteger('codCargo')->unsigned();
            $table->string('nombreEmpleado');
            $table->string('apellidoEmpleado');
            $table->string('emailEmpleado');

            
            // $table->foreign('codCargo')->references('codCargo')->on('cargos')->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empleados');
    }
}
