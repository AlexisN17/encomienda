<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEncomiendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('encomiendas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_personal');
            $table->unsignedInteger('id_clienteremitente');
            $table->unsignedInteger('id_clientedestinatario');
            $table->double('peso_encomienda');
            $table->double('tamaño_encomienda');
            $table->string('destino_encomienda');
            $table->string('descripcion_encomienda');
            $table->string('pago_encomienda');
            $table->boolean('estado_encomienda')->default(false);
            $table->date('created_at')->format('Y-m-d');
            $table->date('updated_at')->format('Y-m-d');

            $table->foreign('id_personal')->references('id')->on('users');
            $table->foreign('id_clientedestinatario')->references('id')->on('ClientesDestinatarios');
            $table->foreign('id_clienteremitente')->references('id')->on('ClientesRemitentes');


            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('encomiendas');
            }
}
