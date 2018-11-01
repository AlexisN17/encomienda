<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Encomienda;
use Illuminate\Support\Facades\DB;

class ExcelController extends Controller
{
    public function exportEncomiendas(Request $request)
    {
    if ($request->destino != null){
      \Excel::create('Encomiendas', function($excel) use($request) {
        $encomiendas = DB::table('encomiendas')
        ->join('clientesremitentes','clientesremitentes.id','=','encomiendas.id_clienteremitente')
        ->join('clientesdestinatarios','clientesdestinatarios.id','=','encomiendas.id_clientedestinatario')
        ->select('encomiendas.*',
                 'clientesdestinatarios.nombre_cliente','clientesdestinatarios.apellido_cliente','clientesdestinatarios.dni_cliente',
                 'clientesremitentes.nombre_clienter','clientesremitentes.apellido_clienter','clientesremitentes.dni_clienter')
        ->where('encomiendas.destino_encomienda','=',$request->destino)
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

        });

      })->export('xlsx');
      return view ('reportes');

    };
    if ($request->destinatario != null){
    \Excel::create('Encomiendas', function($excel) use($request) {
      $buscar = DB::table('clientesdestinatarios')
      ->where('clientesdestinatarios.nombre_cliente','=', $request->destinatario)
      ->join('encomiendas','encomiendas.id_clientedestinatario','=','clientesdestinatarios.id')
      ->join('clientesremitentes','clientesremitentes.id','=','encomiendas.id_clienteremitente')
      ->get();


      $excel->sheet('Encomiendas', function($sheet) use($buscar) { //sheet crea nueva hoja

      $sheet->row(1, [
              'ID','Nombre Remitente', 'Apellido', 'DNI', 'Destino', 'Descripcion', 'Pago', 'Nombre Destinatario', 'Apellido', 'DNI'
          ]);
      foreach($buscar as $index => $busca) {
        $sheet->row($index+2, [
            $busca->id, $busca->nombre_clienter, $busca->apellido_clienter, $busca->dni_clienter, $busca->destino_encomienda,
            $busca->descripcion_encomienda, $busca->pago_encomienda, $busca->nombre_cliente, $busca->apellido_cliente, $busca->dni_cliente
          ]);
        }

      });

    })->export('xlsx');
    return view ('reportes');

      };
    }

    public function filtradoexport(Request $request){
      if((is_null( $request->localidades)) and (is_null( $request->fechadesde)) and (is_null( $request->fechahasta))) {
         return('no ingresaste nada');
      } else{
            \Excel::create('Encomiendas', function($excel) use($request) {
              $encomiendas = DB::table('encomiendas')
              ->join('clientesremitentes','clientesremitentes.id','=','encomiendas.id_clienteremitente')
              ->join('clientesdestinatarios','clientesdestinatarios.id','=','encomiendas.id_clientedestinatario');
              if(isset($request->localidades)){
                  $encomiendas->where('encomiendas.destino_encomienda','=', $request->localidades)
              }
             else{
                dd($request->localidades)
            }


    });
    }
  }
}
