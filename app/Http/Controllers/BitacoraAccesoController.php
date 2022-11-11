<?php

namespace App\Http\Controllers;

use App\Models\BitacoraAcceso;
use App\Models\Session;
use Illuminate\Http\Request;

class BitacoraAccesoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {return view('bitacoras.acceso');
    }
    public function getAcceso(Request $request)
    {

        $bitacoraAcceso = Session::join('users','sessions.user_id','=','users.id')
        ->select('users.name','sessions.user_agent','sessions.ip_address','sessions.payload','sessions.last_activity')->get();

        return $bitacoraAcceso;
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
     * @param  \App\Models\BitacoraAcceso  $bitacoraAcceso
     * @return \Illuminate\Http\Response
     */
    public function show(BitacoraAcceso $bitacoraAcceso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BitacoraAcceso  $bitacoraAcceso
     * @return \Illuminate\Http\Response
     */
    public function edit(BitacoraAcceso $bitacoraAcceso)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BitacoraAcceso  $bitacoraAcceso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BitacoraAcceso $bitacoraAcceso)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BitacoraAcceso  $bitacoraAcceso
     * @return \Illuminate\Http\Response
     */
    public function destroy(BitacoraAcceso $bitacoraAcceso)
    {
        //
    }
}
