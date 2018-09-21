<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ClienteDestinatario;
use App\ClienteRemitente;
use App\Encomienda;
use App\Personal;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;
use DB;
use App\Quotation;


class EnviosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //
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

      $this->validate($request,[

             'nombre' => 'required|max:255',
             'apellido'  => 'required|max:255',
             'dni' => 'required|max:255',
             'telefono' => 'required|max:255',
             'direccion' => 'required|max:255',

             'peso' => 'required|max:255',
             'tamaño' => 'required|max:255',
             'destino' => 'required|max:255',
             'pago' => 'required|max:255',
             'descripcion' => 'required|max:255',

             'nombre2' => 'required|max:255',
             'apellido2' => 'required|max:255',
             'dni2' => 'required|max:255',
             'telefono2' => 'required|max:255',
             'direccion2' => 'required|max:255',
         ],[
             'nombre.required' => 'El campo nombre remitente es obligatorio',
             'apellido.required' => 'El campo apellido remitente es obligatorio',
             'dni.required' => 'El campo DNI remitente es obligatorio',
             'telefono.required' => 'El campo telefono remitente es obligatorio',
             'direccion.required' => 'El campo direccion remitente es obligatorio',

             'peso.required' => 'El campo peso es obligatorio',
             'tamaño.required' => 'El campo tamaño es obligatorio',
             'destino.required' => 'El campo destino es obligatorio',
             'pago.required' => 'El campo pago es obligatorio',
             'descripcion.required' => 'El campo descripcion es obligatorio',

             'nombre2.required' => 'El campo nombre destinatario es obligatorio',
             'apellido2.required' => 'El campo apellido destinatario es obligatorio',
             'dni2.required' => 'El campo DNI destinatario es obligatorio',
             'telefono2.required' => 'El campo telefono destinatario es obligatorio',
             'direccion2.required' => 'El campo direccion destinatario es obligatorio',

          ]);


         // $cliente_aux = ClienteRemitente::where('dni_clienter','=',$request->dni)  ->get();
         //
         // if (is_null($cliente_aux))
         // {

         $errores = null;
         DB::beginTransaction();
         try {

           $origen = New ClienteRemitente;
           $origen -> nombre_clienter = $request -> nombre;
           $origen -> apellido_clienter = $request -> apellido;
           $origen -> dni_clienter = $request -> dni;
           $origen -> telefono_clienter = $request -> telefono;
           $origen -> direccion_clienter = $request -> direccion;
           $origen -> save();


           $destino = New ClienteDestinatario;
           $destino -> nombre_cliente = $request -> nombre2;
           $destino -> apellido_cliente = $request -> apellido2;
           $destino -> dni_cliente = $request -> dni2;
           $destino -> telefono_cliente = $request -> telefono2;
           $destino -> direccion_cliente = $request -> direccion2;
           $destino -> save();


           $encomienda = New Encomienda;
           $encomienda -> peso_encomienda = $request -> peso;
           $encomienda -> tamaño_encomienda = $request -> tamaño;
           $encomienda -> destino_encomienda = $request -> destino;
           $encomienda -> pago_encomienda = $request -> pago;
           $encomienda -> descripcion_encomienda = $request -> descripcion;
           $encomienda -> id_personal = Auth::user()->id;
           $encomienda -> id_clienteremitente = $origen -> id;
           $encomienda -> id_clientedestinario = $destino -> id;
           $encomienda -> save();

	       DB::commit();
	       $success = true;
         } catch (\Exception $e) {
	          $success = false;
            $errores = $e->getMessage();
	       DB::rollback();
         return view('inicio', compact('errores'));
         }
         if ($success) {
           return redirect('inicio');
         }


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

      $encomienda = DB::table('encomiendas')
      ->join('clientesremitentes','clientesremitentes.id','=','encomiendas.id_clienteremitente')
      ->join('clientesdestinatario','clientesdestinatario.id','=','encomiendas.id_clientedestinario')
      ->select('encomiendas.*',
               'clientesdestinatario.nombre_cliente','clientesdestinatario.apellido_cliente','clientesdestinatario.dni_cliente','clientesdestinatario.telefono_cliente','clientesdestinatario.direccion_cliente',
               'clientesremitentes.nombre_clienter','clientesremitentes.apellido_clienter','clientesremitentes.dni_clienter','clientesremitentes.telefono_clienter','clientesremitentes.direccion_clienter')
      ->where('estado_encomienda','=',false)
      ->where('encomiendas.id','=',$id)
      ->get();
        return view('editar',compact('encomienda'));
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
        $origen -> nombre_clienter = $request -> nombre;
        $origen -> apellido_clienter = $request -> apellido;
        $origen -> dni_clienter = $request -> dni;
        $origen -> telefono_clienter = $request -> telefono;
        $origen -> direccion_clienter = $request -> direccion;
        $origen -> save();

        $destino -> nombre_cliente = $request -> nombre2;
        $destino -> apellido_cliente = $request -> apellido2;
        $destino -> dni_cliente = $request -> dni2;
        $destino -> telefono_cliente = $request -> telefono2;
        $destino -> direccion_cliente = $request -> direccion2;
        $destino -> save();

        $encomienda -> peso_encomienda = $request -> peso;
        $encomienda -> tamaño_encomienda = $request -> tamaño;
        $encomienda -> destino_encomienda = $request -> destino;
        $encomienda -> pago_encomienda = $request -> pago;
        $encomienda -> descripcion_encomienda = $request -> descripcion;
        $encomienda -> id_personal = Auth::user()->id;
        $encomienda -> id_clienteremitente = $origen -> id;
        $encomienda -> id_clientedestinario = $destino -> id;
        $encomienda -> save();

        return view ('inicio');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function entrega($id)
    // {
    //
    //   $encomiendas = Encomienda::find($id);
    //   $encomiendas -> estado_encomienda = true;
    //   $encomiendas ->save();
    //   dd($encomiendas);
    //   return redirect('entrega');
    // }

    public function buscar(Request $request){
      $aux = ClienteRemitente::where('dni_clienter','=', $request->valor ) ->get();
      return $aux;
      }

    public function buscar2(Request $request2){
        $aux = ClienteDestinatario::where('dni_cliente','=', $request2->valor2 ) ->get();
        return $aux;
        }


}
