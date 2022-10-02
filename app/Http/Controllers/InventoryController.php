<?php

namespace App\Http\Controllers;

use App\Http\Requests\InventoryRequest;
use App\Models\Inventory;
use App\Models\Product;
use Exception;
use Illuminate\Support\Facades\Auth;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inventories = Inventory::paginate(20);
        $products = Product::all();

        return view('Inventory.index', compact('inventories', 'products'));
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
    public function store(InventoryRequest $request)
    {
        dd($request);
        try {
            Inventory::create([
                'products_id' => $request->product,
                'quantity' => $request->quantity,
                'minimum_alert' => $request->minimum_alert,
                'maximun_alert' => $request->maximun_alert,
                'purchase_price' => $request->purchase_price,
                'sales_price' => $request->seles_price,
                'asigned_by' => Auth::id(),
                //'status_sale' => false,
                // 'status_envio' => false,
            ]);

            return redirect()
                ->back()
                ->with('success', 'Registro Éxitoso!');
        } catch (Exception $e) {
            dd($e);
            return redirect()
                ->back()
                ->with('error', 'Hubo un Problema.');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(InventoryRequest $request, $id)
    {
        try {
            Inventory::find($id)->create([
                'products_id' => $request->product,
                'quantity' => $request->quantity,
                'minimum_alert' => $request->minimun_alert,
                'maximun_alert' => $request->maximun_alert,
                'purchase_price' => $request->purchase_price,
                'sales_price' => $request->seles_price,
                'asigned_by' => Auth::id(),
                //'status_sale' => ,
                //'status_envio' => ,
            ]);

            return redirect()
                ->back()
                ->with('success', 'Registro Éxitoso!');
        } catch (Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'Hubo un Problema.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Inventory::find($id)->delete();
    }
}
