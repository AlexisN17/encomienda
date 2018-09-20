<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClienteDestinatario extends Model
{
    Protected $table = 'clientesdestinatario';
    Protected $fillable =  ['nombre_cliente','apellido_cliente','dni_cliente','telefono_cliente','direccion_cliente'];
    public $timestamps = false;

}
