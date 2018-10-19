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

        $sheet->fromArray($users);

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

        $sheet->fromArray($encomiendas);

        });

      })->export('xlsx');
      return view ('reportes');
    }
}
