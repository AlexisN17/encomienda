<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Encomienda;
use App\ClienteRemitente;
use App\ClienteDestinatario;

class EncomiendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

          $encomienda = DB::table('encomiendas')
          ->join('clientesremitentes','clientesremitentes.id','=','encomiendas.id_clienteremitente')
          ->join('clientesdestinatarios','clientesdestinatarios.id','=','encomiendas.id_clientedestinatario')
          ->select('encomiendas.*',
                   'clientesdestinatarios.nombre_cliente','clientesdestinatarios.apellido_cliente','clientesdestinatarios.dni_cliente',
                   'clientesremitentes.nombre_clienter','clientesremitentes.apellido_clienter','clientesremitentes.dni_clienter')
          ->where('estado_encomienda','=',false)
          ->paginate(10);
          return view('entrega',compact('encomienda'));



     }

     public function despachados()
     {

           $encomienda = DB::table('encomiendas')
           ->join('clientesremitentes','clientesremitentes.id','=','encomiendas.id_clienteremitente')
           ->join('clientesdestinatarios','clientesdestinatarios.id','=','encomiendas.id_clientedestinatario')
           ->select('encomiendas.*',
                    'clientesdestinatarios.nombre_cliente','clientesdestinatarios.apellido_cliente','clientesdestinatarios.dni_cliente',
                    'clientesremitentes.nombre_clienter','clientesremitentes.apellido_clienter','clientesremitentes.dni_clienter')
           ->where('estado_encomienda','=',true)
           ->paginate(10);
           return view('despachados',compact('encomienda'));

      }


     public function busqueda(Request $request)
      {
           $buscar = Encomienda::where('id','=', $request->valor) -> get();
       //     if($buscar)   {
       //       foreach ($buscar as $key => $busqueda) {
       //       $output.='<tr>'.
       //
       //       '<td>'.$busqueda->nombre_clienter.'</td>'.
       //       '<td>'.$busqueda->apellido_clienter.'</td>'.
       //       '<td>'.$busqueda->dni_clienter.'</td>'.
       //
       //
       //      '<td>'.$busqueda->destino_encomienda.'</td>'.
       //      '<td>'.$busqueda->descripcion_encomienda.'</td>'.
       //      '<td>'.$busqueda->pago_encomienda.'</td>'.
       //
       //      '<td>'.$busqueda->nombre_cliente.'</td>'.
       //      '<td>'.$busqueda->apellido_cliente.'</td>'.
       //      '<td>'.$busqueda->dni_cliente.'</td>'.
       //      '<td>'.$busqueda->id.'</td>'.
       //      '</tr>';
       //
       //   }
       // }
          return $buscar;
     }


    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function entregado($id)
    {

      $encomiendas = Encomienda::find($id);
      $encomiendas -> estado_encomienda = true;
      $encomiendas ->save();

      return redirect('entrega');
    }
}
