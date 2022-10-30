<?php

namespace App\Http\Controllers;

use App\Models\BitacoraCancelacion;
use Illuminate\Http\Request;

class BitacoraCancelacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('bitacoras.cancelacion');
    }

    public function getCancelacion()
    {
$bitacora = BitacoraCancelacion::join('carts','bitacora_cancelacions.carts_id','=','carts.id')
->join('users','bitacora_cancelacions.userCreator','=','users.id')
->select('users.name','bitacora_cancelacions.cSistema','carts.numero_venta','bitacora_cancelacions.motivo')->get();

return $bitacora;
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
     * @param  \App\Models\BitacoraCancelacion  $bitacoraCancelacion
     * @return \Illuminate\Http\Response
     */
    public function show(BitacoraCancelacion $bitacoraCancelacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BitacoraCancelacion  $bitacoraCancelacion
     * @return \Illuminate\Http\Response
     */
    public function edit(BitacoraCancelacion $bitacoraCancelacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BitacoraCancelacion  $bitacoraCancelacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BitacoraCancelacion $bitacoraCancelacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BitacoraCancelacion  $bitacoraCancelacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(BitacoraCancelacion $bitacoraCancelacion)
    {
        //
    }
}
