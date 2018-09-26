<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ClienteRemitente;
use App\Http\Requests\ClienteDestinatarioRequest;

class ClienteRemitenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     // $remitente = ClienteRemitente::paginate(15);
     // return view('entrega',compact('remitente'));
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
        $clienter = New ClienteRemitente;
        $clienter -> nombre_cliente = $request -> nombre2;
        $clienter -> apellido_cliente = $request -> apellido2;
        $clienter -> dni_cliente = $request -> dni2;
        $clienter -> telefono_cliente = $request -> telefono2;
        $clienter -> direccion_cliente = $request -> direccion2;
        $clienter -> save();

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
