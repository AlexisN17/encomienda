<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Encomienda;
use App\ClienteRemitente;
use App\ClienteDestinatario;

class EncomiendasController extends Controller
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
          ->join('clientesdestinatario','clientesdestinatario.id','=','encomiendas.id_clientedestinario')
          ->select('encomiendas.*',
                   'clientesdestinatario.nombre_cliente','clientesdestinatario.apellido_cliente','clientesdestinatario.dni_cliente',
                   'clientesremitentes.nombre_clienter','clientesremitentes.apellido_clienter','clientesremitentes.dni_clienter')
          ->where('estado_encomienda','=',false)
          ->paginate(8);

          return view('entrega',compact('encomienda'));



     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
