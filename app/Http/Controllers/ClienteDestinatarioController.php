<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ClienteDestinatario;
use App\Http\Requests\ClienteDestinatarioRequest;
use Laracasts\Flash\Flash;

class ClienteDestinatarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      // $destinario = ClienteDestinatario::paginate(15);
      // return view('entrega',compact('destinario'));
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
        $cliented = New ClienteDestinatario;
        $cliented -> nombre_cliente = $request -> nombre;
        $cliented -> apellido_cliente = $request -> apellido;
        $cliented -> dni_cliente = $request -> dni;
        $cliented -> telefono_cliente = $request -> telefono;
        $cliented -> direccion_cliente = $request -> direccion;
        $cliented -> save();


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
}
