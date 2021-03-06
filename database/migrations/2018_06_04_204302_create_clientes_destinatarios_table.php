<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesDestinatariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ClientesDestinatarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_cliente');
            $table->string('apellido_cliente');
            $table->bigInteger('dni_cliente')->unique();
            $table->bigInteger('telefono_cliente');
            $table->string('email_cliente')->nullable();
            $table->string('direccion_cliente');
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
        Schema::dropIfExists('ClientesDestinatarios');
    }
}
