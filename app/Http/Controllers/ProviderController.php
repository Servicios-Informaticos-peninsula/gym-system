<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProviderRequest;
use App\Models\Provider;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proveedores = Provider::orderBy('id', 'asc')->paginate(10);
        return view('provider.index', compact('proveedores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProviderRequest $request)
    {
        try {
            $provider = new Provider();
            $provider->name = $request->name;
            if (is_null($request->number_phone)) {
                $provider->number_phone = 0000000000;
            } else {
                $provider->number_phone = $request->number_phone;
            }

            if (is_null($request->rfc)) {
                $provider->rfc = 'S/N';
            } else {
                $provider->rfc = $request->rfc;
            }
            $provider->save();
            return back()->with('success', '¡Se agrego el proveedor de forma exitosa!');
        } catch (\Throwable $th) {
            //dd($th);
            return back()->with('error', 'Hubo un error al agregar los datos. Contacta a soporte del sistema.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function show(Provider $provider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function edit(Provider $provider)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function update(ProviderRequest $request, $id)
    {
        try {
            $provider = Provider::findOrFail($id);
            $provider->name = $request->name;
            $provider->number_phone = $request->number_phone;
            $provider->rfc = $request->rfc;
            $provider->update();
            return back()->with('updated', '¡Se modifico el proveedor de forma exitosa!');
        } catch (\Throwable $th) {
            //dd($th);
            return back()->with('error', 'Hubo un error al agregar los datos. Contacta a soporte del sistema.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Provider $provider, $id)
    {
        try {
            $provider = Provider::find($id);

            $provider->delete();

            return back()->with('deleted', 'Se elimino correctamente el registro', $id);
        } catch (\Throwable $th) {
            $exception = $th->getMessage();
            return back()->with(['error' => 'No se pudo eliminar el registro, por favor, contacta a un administrado del sistema.', 'code' => $exception]);
        }
    }
}
