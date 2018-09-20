<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClienteRemitente extends Model
{
   Protected $table='clientesremitentes';
   Protected $fillable =  ['nombre_clienter','apellido_clienter','dni_clienter','telefono_clienter','direccion_clienter'];
   public $timestamps = false;




}
