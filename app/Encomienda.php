<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Encomienda extends Model
{
    Protected $table='encomiendas';
   Protected $fillable =  ['peso_encomienda','destino_encomienda','tamaño_encomienda','descripcion_encomienda','pago_encomienda','estado_encomienda','id_clienteremitente','id_clientedestinatario'];
  

}
