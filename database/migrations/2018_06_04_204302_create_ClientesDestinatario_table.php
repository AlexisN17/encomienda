<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesDestinatarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ClientesDestinatario', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_cliente');
            $table->string('apellido_cliente');
            $table->integer('dni_cliente' 20)->unique();
            $table->integer('telefono_cliente' 20);
            $table->string('direccion_cliente');
    });
   }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ClientesDestinatario');
    }
}
