<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Encomienda;
use Illuminate\Support\Facades\DB;

class ExcelController extends Controller
{
    public function exportUsers()
    {
      \Excel::create('Users', function($excel) {

        $users = User::all();

        $excel->sheet('Users', function($sheet) use($users) { //sheet crea nueva hoja

        $sheet->row(1, [
              'Nombre', 'Apellido', 'Email', 'DNI', 'Telefono', 'Direccion', 'Nombre de usuario'
          ]);
        foreach($users as $index => $user) {
          $sheet->row($index+2, [
            $user->nombre_personal, $user->apellido_personal, $user->email, $user->dni_personal, $user->telefono_personal, $user->direccion_personal, $user->username
          ]);
        }

        });

      })->export('xlsx');
      return view ('reportes');
    }

    public function exportEncomiendas()
    {
      \Excel::create('Encomiendas', function($excel) {

        $encomiendas = DB::table('encomiendas')
        ->join('clientesremitentes','clientesremitentes.id','=','encomiendas.id_clienteremitente')
        ->join('clientesdestinatarios','clientesdestinatarios.id','=','encomiendas.id_clientedestinatario')
        ->select('encomiendas.*',
                 'clientesdestinatarios.nombre_cliente','clientesdestinatarios.apellido_cliente','clientesdestinatarios.dni_cliente',
                 'clientesremitentes.nombre_clienter','clientesremitentes.apellido_clienter','clientesremitentes.dni_clienter')
        ->get();

        $excel->sheet('Encomiendas', function($sheet) use($encomiendas) { //sheet crea nueva hoja

        $sheet->row(1, [
                'ID','Nombre Remitente', 'Apellido', 'DNI', 'Destino', 'Descripcion', 'Pago', 'Nombre Destinatario', 'Apellido', 'DNI'
            ]);
        foreach($encomiendas as $index => $encomienda) {
          $sheet->row($index+2, [
              $encomienda->id, $encomienda->nombre_clienter, $encomienda->apellido_clienter, $encomienda->dni_clienter, $encomienda->destino_encomienda,
              $encomienda->descripcion_encomienda, $encomienda->pago_encomienda, $encomienda->nombre_cliente, $encomienda->apellido_cliente, $encomienda->dni_cliente
            ]);
          }
        // $sheet->fromArray($encomiendas);

        });

      })->export('xlsx');
      return view ('reportes');
    }
}
