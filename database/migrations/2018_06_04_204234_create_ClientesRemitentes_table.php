<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesRemitentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('ClientesRemitentes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_clienter');
            $table->string('apellido_clienter');
            $table->integer('dni_clienter')->unique();
            $table->integer('telefono_clienter');
            $table->string('direccion_clienter');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ClientesRemitentes');
    }
}
